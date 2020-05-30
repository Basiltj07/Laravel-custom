<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Mockery\Exception;

class ICommandRepository extends Command {

    protected $files;
    protected $signature = 'customCMD:repository {repositoryname}';
    protected $description = 'Command description';

    public function __construct(Filesystem $files) {
        parent::__construct();
        $this->files = $files;
    }

    public function handle() {
        try {
            $repositoryName = $this->argument('repositoryname');
            $filePath = $this->buildNameSpacePath($repositoryName);
            $content = $this->buildContentForRepository($repositoryName);
            $fullFilePath = $this->getFullPathOfFile($filePath);
            $this->makeDirectory($fullFilePath);
            if (!file_exists($fullFilePath)) {
                file_put_contents($fullFilePath, $content);
                $this->info($repositoryName." created successfully.");
            } else {
                throw new Exception($filePath . ' File already exists.');
            }
        } catch (Exception $e) {
            $this->error($e->getMessage());
        }
    }

    protected function getFullPathOfFile($name) {
        $name = Str::replaceFirst($this->laravel->getNamespace(), '', $name);
        return $this->laravel['path'].'/'.str_replace('\\', '/', $name).'.php';
    }

    private function buildNameSpacePath($name) {
        return $this->laravel->getNamespace()."Repositories".'\\'.$name;
    }

    private function makeDirectory($path) {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }

    private function buildContentForRepository($repositoryName) {
        $classNameArray = explode('/',$repositoryName);
        $className = end($classNameArray);
        $slicedClassName = array_slice($classNameArray, 0, -1); // array ( "Hello", "World" )
        $nameSpaceString = implode('\\', $slicedClassName);
        if($nameSpaceString) {
            $makeNameSpace = "<?php \n\nnamespace " . $this->laravel->getNamespace() . "Repositories\\" . $nameSpaceString . ";\n\n";
        } else {
            $makeNameSpace = "<?php \n\nnamespace " . $this->laravel->getNamespace() . "Repositories;"."\n\n";
        }
        $useBaseRepository = "use infrastructure\Repository\BaseRepository; \n\n";
        $nameServiceName = "class ". $className. " extends BaseRepository { \n\n\t public function getModel() {} \n \n \n }";
        $content = $makeNameSpace.$useBaseRepository.$nameServiceName;
        return $content;
    }
}