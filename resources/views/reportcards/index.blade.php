@extends('layouts.main')

@section('title','Create Reportcards')

@section('content')
    <section class="relative grid grid-cols-3 gap-y-3">
        <div class="col-span-3">
            <h1 class="text-xl text-gray-700 font-bold">Create Reportcards</h1>
        </div>

        <div class="col-span-2">
            <h1 class="text-lg text-gray-600 my-3">Pre University</h1>

            <div class="space-y-5">
                <div class="flex items-center">
                    <a href="{{ route('reportcards.uploadmarks',['preuni','80marks']) }}" class="shadow w-full h-16 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-md text-gray-500">80 Marks</a>
                </div>
    
                <div class="flex items-center">
                    <a href="{{ route('reportcards.uploadmarks',['preuni','50marks']) }}" class="shadow w-full h-16 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-md text-gray-500">50 Marks</a>
                </div>

                <div class="flex items-center">
                    <a href="{{ route('reportcards.uploadmarks',['preuni','unigraduation']) }}" class="shadow w-full h-16 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-md text-gray-500">Graduation</a>
                </div>
            </div>
            <hr class="my-6" />
        </div>

        <div class="col-span-2">
            <h1 class="text-lg text-gray-600 my-3">International School</h1>

            <div class="space-y-5">
                <div class="flex items-center">
                    <a href="{{ route('reportcards.uploadmarks',['is','cambridge']) }}" class="shadow w-full h-16 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-md text-gray-500">Cambridge</a>
                </div>
    
                <div class="flex items-center">
                    <a href="{{ route('reportcards.uploadmarks',['is','government']) }}" class="shadow w-full h-16 p-5 flex items-center rounded-md border hover:shadow-xl transition-all duration-500 text-md text-gray-500">Government</a>
                </div>
            </div>
            <hr class="my-6" />
        </div>
    </section>
@endsection
