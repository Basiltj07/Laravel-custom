<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ICommand extends Command {

    protected $customStructure, $routeName;
    protected $signature = 'customCMD:module {modulename}';
    protected $description = 'Command to create modules for each functionality';

    public function handle() {
        try {
            $moduleName = $this->argument('modulename');
            $moduleName = ucwords($moduleName);
            $this->routeName = strtolower($moduleName);
            $this->buildcustomStructure($moduleName);
            shell_exec($this->customStructure);
            $this->info($moduleName." Module created successfully.");
        } catch (\Exception $e) {
            $this->rollBack($moduleName);
            $this->error('Error got in module creation. Please contact InApp PHP team.');
        }
    }

    private function buildcustomStructure($moduleName) {
        try {
            $this->customStructure = "
                            php artisan make:controller $moduleName/$moduleName".'Controller'."
                            php artisan make:model Models/$moduleName/$moduleName
                            php artisan inapp:service $moduleName/$moduleName".'Service'."
                            php artisan inapp:repository $moduleName/$moduleName".'Repository'."
                            echo \"<?php \n\n\n ?>\" >> routes/$this->routeName.php";
        } catch (\Exception $e){
            $this->error('Error got in module creation. Please contact InApp PHP team.');
        }
    }

    private function rollBack($moduleName) {
        $rollBackScript = "
                            rm -rf  app/Http/Controllers/$moduleName
                            rm -rf app/Models/$moduleName
                            rm -rf app/Services/$moduleName
                            rm -rf app/Repositories/$moduleName";

        shell_exec($rollBackScript);
    }
}