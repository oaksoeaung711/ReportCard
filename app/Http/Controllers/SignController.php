<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignRequest;
use App\Http\Requests\UpdateSignRequest;
use App\Models\Sign;
use Illuminate\Support\Facades\Storage;

class SignController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $signs = Sign::paginate(10);
        return view('signs.index',compact('signs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('signs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSignRequest $request)
    {
        if(empty(Sign::where('keyword',$request->keyword)->first())){
            $imagepath = $request->file('signimage')->store('signimages');
            Sign::create([
                'name' => $request->name,
                'keyword' => strtolower($request->keyword),
                'path' => $imagepath,
            ]);
            return redirect()->route('signs.index')->with('message',['type'=>'success','content'=>"$request->name's sign is uploaded successfully"]);
        }else{
            return redirect()->route('signs.index')->with('message',['type'=>'fail','content'=>"Keyword cannot be same. Please check keyword first"]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Sign $sign)
    {
        return view('signs.show',compact('sign'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sign $sign)
    {
        return view('signs.edit',compact('sign'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSignRequest $request, Sign $sign)
    {
        if($request->has('signimage')){
            Storage::disk('sign')->delete($sign->path);
            $imagepath = $request->file('signimage')->store('signimages');
            $sign->update([
                'path' => $imagepath,
            ]);
        }

        $sign->update([
            'name' => $request->name,
            'keyword' => $request->keyword,
        ]);
        return redirect()->route('signs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sign $sign)
    {

        Storage::disk('sign')->delete($sign->path);
        echo "Success";
        $sign->delete();
        return redirect()->route('signs.index')->with('message',['type'=>'success','content'=>"$sign->name's sign is deleted successfully"]);
    }
}
