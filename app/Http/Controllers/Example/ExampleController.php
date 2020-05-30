<?php

namespace App\Http\Controllers\Example;

use App\Extensions\Facades\JSONResponse;
use App\Http\Controllers\Example\Requests\ExampleRequest;
use App\Http\Controllers\Controller;
use App\Services\Example\ExampleService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Mockery\Exception;
use Validator;

class ExampleController extends Controller {
    public $exampleService;

    public function __construct(ExampleService $exampleService)
    {
        $this->exampleService = $exampleService;
    }

    public function createExample(ExampleRequest $request) {
        try {
            $exampleData = $request->all();
           $isSaved = $this->exampleService->createExample($exampleData);
            if ($isSaved){
                return JSONResponse::send(Config::get("constants.STATUS.STATUS_SUCCESS"),"example added successfully",$isSaved);
            }
            else {
                return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"), "Failed to add Example");
            }
        }
        catch (Exception $e) {
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"),Config::get("constants.ERROR_MESSAGE.SOMETHING_WENT_WRONG"),[], Config::get("constants.STATUS_CODE.HTTP_422"));
        }
    }

    public function getAllExample() {
        try{
            $exampleList = $this->exampleService->getAllExample();
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_SUCCESS"), "Example listed successfully",$exampleList);
        }
        catch (Exception $e) {
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"), Config::get("constants.ERROR_MESSAGE.SOMETHING_WENT_WRONG"), [], Config::get("constants.STATUS_CODE.HTTP_422"));
        }
    }

    public function getExample(Request $request){
        try{
            $id = $request->id;
            $exampleRow = $this->exampleService->getExampleRow($id);
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_SUCCESS"),"Example fetched successfully", $exampleRow);
        }
        catch (Exception $e){
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"), Config::get("constants.ERROR_MESSAGE.SOMETHING_WENT_WRONG"), [], Config::get("constants.STATUS_CODE.HTTP_422"));
        }
    }

    public function updateExample(Request $request){
        try{
            $exampleData = $request->exampleData;
            $exampleId = $request->id;
            $isUpdate = $this->exampleService->updateExample($exampleData,$exampleId);
            if ($isUpdate)
            {
                return JSONResponse::send(Config::get("constants.STATUS.STATUS_SUCCESS"), "Example updated successfully", $userData);
            }
            else
            {
                return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"), "Example updation failed");
            }

        }
        catch (Exception $e){
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"), Config::get("constants.ERROR_MESSAGE.SOMETHING_WENT_WRONG"), [], Config::get("constants.STATUS_CODE.HTTP_422"));
        }
    }

    public function deleteExample(Request $request){
        try{
            $exampleId = $request->id;
            $isExample = $this->exampleService->deleteExample($exampleId);
            if ($isExample){
                return JSONResponse::send(Config::get("constants.STATUS.STATUS_SUCCESS"), "Example Deleted");
            }
            else {
                return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"),"Failed to delete");
            }
        }
        catch (Exception $e){
            return JSONResponse::send(Config::get("constants.STATUS.STATUS_FAILURE"), Config::get("constants.ERROR_MESSAGE.SOMETHING_WENT_WRONG"), [], Config::get("constants.STATUS_CODE.HTTP_422"));
        }
    }

}
