<?php 

namespace App\Repositories\Agency;

use App\Models\Agency\Example;
use App\Models\Forms;
use function GuzzleHttp\Promise\all;
use Illuminate\Support\Facades\DB;

class ExampleRepository {

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