<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Validator;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    function customValidate($data, $rules, $messages){
        return Validator::make($data,$rules,[],$messages)->validate();
    }

    function uploadFile($file, $folder){
        if($file){
            $filename = $file->hashName();
            $file->storeAs('/public/'. $folder, $filename);
            return $filename;
        }
    }
}
