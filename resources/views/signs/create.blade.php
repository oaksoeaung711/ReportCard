@extends('layouts.main')

@section('title','Create New Sign')

@section('content')
    <section class="relative">
        <div class="">
            <h1 class="text-3xl text-gray-700 font-bold">Upload A New Sign</h1>
        </div>

        <div class="mt-10 w-1/3 p-5 shadow-lg rounded-lg">
            <form action="{{ route('signs.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <x-form-component formtype="text" formname="name" formid="name" formlabel="Name" formicon="signature" formplaceholder="Enter Sign Name" />

                <x-form-component formtype="text" formname="keyword" formid="keyword" formlabel="Keyword" formicon="keyboard" formplaceholder="Enter Sign Keyword" />

                <div class="border border-gray-300 rounded-xl p-6 relative">
                    <input type="file" id="file" name="signimage" class="w-full h-full absolute inset-0 z-50 opacity-0" onchange="fileview(event)" />
                    <div class="text-center">
                        <img id="preview" src="{{ asset('images/upload.svg') }}" class="w-24 object-cover mx-auto" />
                        <h3 class="text-gray-900 font-medium text-sm mt-2">
                            <label for="file" class="">
                                <span>Click Here To Upload Your</span>
                                <span class="text-gray-600">Sign</span>
                            </label>
                        </h3>
                        <span class="text-gray-500 text-xs mt-1">PNG</span>
                    </div>
                </div>
                @error('signimage')
                    <p class="mt-1 text-red-500">{{ $errors->first('signimage') }}</p>
                @enderror

                <div class="flex justify-end gap-2 mt-5">
                    <a href="{{ route('signs.index') }}" class="px-4 py-3 border border-gray-500 text-gray-500 rounded-md">Cancle</a>
                    <button class="px-4 py-3 bg-gray-500 text-white rounded-md">Upload</button>
                </div>
            </form>
        </div>

    </section>
@endsection

@section('script')
    <script type="text/javascript">
        function fileview(event){
            const getinput = event.target;
            const getpreview = document.getElementById('preview');
            getpreview.src = URL.createObjectURL(getinput.files[0]);
        }
    </script>
@endsection