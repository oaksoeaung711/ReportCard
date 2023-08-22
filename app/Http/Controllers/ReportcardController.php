<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadMarkRequest;
use Illuminate\Http\Request;

class ReportcardController extends Controller
{
    public function index()
    {
        return view('reportcards.index');
    }

    public function uploadmarks($place,$type)
    {
        if($place == 'preuni'){
            $place = 'Pre University';
        }

        if($type == '80marks'){
            $type = '80 Marks';
        }
        return view('reportcards.uploadmarks',compact('place','type'));
    }

    public function marks(UploadMarkRequest $request){
        dd($request->all());
    }
}
