<?php 

namespace App\Repositories\Example;

use App\Models\Example\Example;
use Infrastructure\Repository\BaseRepository as Repository;

class ExampleRepository extends Repository{
     public function getModel() {
        return new Example();
    }

    public function createExample($exampleData) {
        return Example::create($exampleData);
    }

    public function getExample(){
        return Example::get();
    }

    public function updateExample($exampleData,$id){
        return Example::find($id)
            ->update($exampleData);
    }

    public function getExampleRow($id) {
        return Example::find($id);
    }

    public function deleteExample($id) {
        return Example::find($id)
            ->delete();
    }
 }