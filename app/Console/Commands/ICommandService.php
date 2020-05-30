<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Filesystem\Filesystem;
use Illuminate\Support\Str;
use Mockery\Exception;

class ICommandService extends Command {

    protected $files;
    protected $signature = 'customCMD:service {servicename}';
    protected $description = 'Command description';

    public function __construct(Filesystem $files) {
        parent::__construct();
        $this->files = $files;
    }

    public function handle() {
        try {
            $serviceName = $this->argument('servicename');
            $filePath = $this->buildNameSpacePath($serviceName);
            $content = $this->buildContentForService($serviceName);
            $fullFilePath = $this->getFullPathOfFile($filePath);
            $this->makeDirectory($fullFilePath);
            if (!file_exists($fullFilePath)) {
                file_put_contents($fullFilePath, $content);
                $this->info($serviceName." created successfully.");
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
        return $this->laravel->getNamespace()."Services".'\\'.$name;
    }

    private function makeDirectory($path) {
        if (!$this->files->isDirectory(dirname($path))) {
            $this->files->makeDirectory(dirname($path), 0777, true, true);
        }
        return $path;
    }

    private function buildContentForService($serviceName) {
        $classNameArray = explode('/',$serviceName);
        $className = end($classNameArray);
        $slicedClassName = array_slice($classNameArray, 0, -1);
        $nameSpaceString = implode('\\', $slicedClassName);
        if($nameSpaceString) {
            $makeNameSpace = "<?php \n\nnamespace " . $this->laravel->getNamespace() . "Services\\" . $nameSpaceString . ";\n\n";
        } else {
            $makeNameSpace = "<?php \n\nnamespace " . $this->laravel->getNamespace() . "Services;"."\n\n";
        }
        $nameServiceName = "class ". $className. " { \n // \n }";
        $content = $makeNameSpace.$nameServiceName;
        return $content;
    }
}