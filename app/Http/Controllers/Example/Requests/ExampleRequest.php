<?php
/**
 * Created by PhpStorm.
 */
namespace App\Http\Controllers\Example\Requests;

use App\Http\Middleware\ApiRequest;

class ExampleRequest extends ApiRequest {
    public function authorize(){
        return true;
    }

    public function rules(){
        return [
            'name' => 'required|min:5|max:15',
            'age' => 'required'
        ];
    }

    public function attributes(){
        return [
            'name' => "Name is required",
            'nickname' => "Age is required"
        ];
    }
}