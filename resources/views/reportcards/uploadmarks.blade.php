@extends('layouts.main')

@section('title','Upload Marks')

@section('content')
    <section class="">
        <div class="">
            <h1 class="text-3xl text-gray-700 font-bold">{{ $formatplace }} ({{ $formattype }})</h1>
        </div>

        <div class="mt-10 w-1/2">
            <form action="{{ route('reportcards.uploadmarks',[$place,$type]) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="w-full">
                    <input type="file" name="marks" class="file:bg-gray-500 file:h-full file:border-0 file:text-gray-50 border w-full h-12 rounded"/>
                </div>
                
                <div class="flex justify-end gap-3 w-full mt-5">
                    <a href="{{ route('reportcards.index') }}" class="px-4 py-3 border border-gray-500 text-gray-700 rounded-md">Cancle</a>
                    <button class="px-4 py-3 bg-gray-500 text-white rounded-md">Submit</button>
                </div>
            </form>
        </div>
    </section>
@endsection
