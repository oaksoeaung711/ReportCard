@extends('layouts.main')

@section('title','Upload Marks')

@section('content')
    <section class="">
        <div class="">
            <h1 class="text-xl text-gray-700 font-bold">{{ $formatplace }} ({{ $formattype }})</h1>
        </div>

        <div class="mt-10 w-1/2">
            <form action="{{ route('reportcards.uploadmarks',[$place,$type]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full text-xs">
                    <input type="file" name="marks" class="file:text-xs file:bg-gray-500 file:h-full file:border-0 file:text-gray-50 border w-full h-10 rounded"/>
                </div>
                
                <div class="flex justify-end gap-3 w-full mt-5">
                    <a href="{{ route('reportcards.index') }}" class="px-4 py-2 border border-gray-500 text-xs text-gray-700 rounded-md">Cancle</a>
                    <button class="px-4 py-2 bg-gray-500 text-xs text-white rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
