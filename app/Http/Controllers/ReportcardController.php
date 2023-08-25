<?php

namespace App\Http\Controllers;

use App\Http\Requests\UploadMarkRequest;
use App\Models\Sign;
use Illuminate\Http\Request;
use League\CommonMark\Node\Block\Document;
use League\Csv\Reader;
use League\Csv\Statement;

class ReportcardController extends Controller
{
    public function index()
    {
        return view('reportcards.index');
    }

    public function uploadmarks($place,$type)
    {
        if($place == 'preuni'){
            $formatplace = 'Pre University';
        }elseif($place = 'is'){
            $formatplace = "International School";
        }

        if($type == '80marks'){
            $formattype = '80 Marks';
        }elseif($type == '50marks'){
            $formattype = '50 Marks';
        }elseif($type == 'cambridge'){
            $formattype = 'Cambridge';
        }elseif($type == 'government'){
            $formattype = 'Government';
        }
        return view('reportcards.uploadmarks',compact('place','type','formatplace','formattype'));
    }

    public function marks(UploadMarkRequest $request,$place,$type){
        $signs = Sign::all();
        $reader = Reader::createFromPath($request->marks, 'r');
        $reader->setHeaderOffset(0);
        $records = $reader->getRecords();
        $students = [];

        if($place == 'preuni' && $type == '80marks'){
            foreach($records as $record){
                $students[$record['Name']] = $record;
                array_shift($students[$record['Name']]);
            }
            return view('reportcards.preuni',compact('students','type','signs'));
        }elseif($place == 'preuni' && $type == '50marks'){
            foreach($records as $record){
                $students[$record['Name']] = $record;
                array_shift($students[$record['Name']]);
            }
            return view('reportcards.preuni',compact('students','type','signs'));
        }elseif($place == 'is' && $type == 'cambridge'){
            foreach($records as $record){
                $students[$record['Name']] = $record;
                array_shift($students[$record['Name']]);
            }
            return view('reportcards.iscambridge',compact('students','signs'));
        }elseif($place == 'is' && $type == 'government'){
            foreach($records as $record){
                $students[$record['Name']] = $record;
                array_shift($students[$record['Name']]);
            }
            return view('reportcards.isgovernment',compact('students','signs'));
        }
    }
}
