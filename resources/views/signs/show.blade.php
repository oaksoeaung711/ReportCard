@extends('layouts.main')

@section('title','Sign')

@section('content')
    <section class="relative">
        <div class="w-96 rounded overflow-hidden shadow-lg p-5">
            <div>
                <a href="{{ URL::previous() }}" class="mt-3 text-lg text-gray-700"><i class="fa-solid fa-arrow-left"></i></a>
            </div>
            <div class="flex justify-center">
                <img src="{{ url($sign->path) }}" class="w-32 object-cover object-center" />
            </div>
            <div class="px-6 py-4 space-y-3">
                <p class="text-md text-gray-600 font-bold mb-3">Name: {{ $sign->name }}</p>
                <p class="text-sm text-gray-500">Keyword: {{ $sign->keyword }}</p>
                <p class="text-sm text-gray-500">Created At: {{ $sign->created_at->diffForHumans() }}</p>
                <p class="text-sm text-gray-500">Updated At: {{ $sign->updated_at->diffForHumans() }}</p>
            </div>
        </div>
    </section>
@endsection
