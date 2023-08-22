@extends('layouts.main')

@section('title','Create Reportcards')

@section('content')
    <section class="relative grid grid-cols-3 gap-y-5">
        <div class="col-span-3">
            <h1 class="text-3xl text-gray-700 font-bold">Create Reportcards</h1>
        </div>

        <div class="col-span-2">
            <h1 class="text-2xl text-gray-600 my-5">Pre University</h1>

            <div class="space-y-5 my-5">
                <div class="flex items-center">
                    <a href="{{ route('reportcards.uploadmarks',['preuni','80marks']) }}" class="shadow w-full h-20 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-xl text-gray-500">80 Marks</a>
                </div>
    
                <div class="flex items-center">
                    <a href="" class="shadow w-full h-20 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-xl text-gray-500">50 Marks</a>
                </div>
            </div>

            <hr class="" />
        </div>

        <div class="col-span-2">
            <h1 class="text-2xl text-gray-600 my-5">International School</h1>

            <div class="space-y-5 my-5">
                <div class="flex items-center">
                    <a href="" class="shadow w-full h-20 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-xl text-gray-500">Cambridge</a>
                </div>
    
                <div class="flex items-center">
                    <a href="" class="shadow w-full h-20 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-xl text-gray-500">Government</a>
                </div>

                <div class="flex items-center">
                    <a href="" class="shadow w-full h-20 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-xl text-gray-500">Graduation</a>
                </div>
            </div>

            <hr class="" />
        </div>
    </section>
@endsection
