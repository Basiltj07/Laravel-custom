<?php 

namespace App\Services\Example;
use App\Repositories\Example\ExampleRepository;
use Zend\Diactoros\Request;

class ExampleService {

    public function __construct(ExampleRepository $exampleRepository)
    {
        $this->exampleRepository = $exampleRepository;
    }

    public function createExample($exampleData) {
        return $this->exampleRepository->createExample($insertData);
    }

    public function getAllExample(){
        return $this->exampleRepository->getAllExample();
    }

    public function updateExample($exampleData,$exampleId){
        return $this->exampleRepository->updateExample($exampleData,$exampleId);
    }

    public function getExamplRow($exampleId){
        $exampleData  = $this->exampleRepository->getExampleRow($exampleId);
        return $exampleData;
    }

    public function deleteExample($id){
        return $this->exampleRepository->deleteExample($id);
    }    
}