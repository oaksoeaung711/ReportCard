@extends('layouts.main')

@section('title','Edit User Permission')

@section('content')
    <section class="">
        <div class="">
            <h1 class="text-xl text-gray-700 font-bold">Edit Permissions For {{ $user->name }}</h1>
        </div>
        <div class="mt-5 w-1/2 rounded-t-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-500">
                    <tr>
                        <td colspan="2" class="w-1/4 p-3 text-xs text-white font-semibold">Permissions</td>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    <form id="permission" action="{{ route('users.update',$user->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    @foreach ($permissions as $permission)
                        <tr>
                            <td class="p-3 text-xs text-gray-700">{{ $permission->name }}</td>
                            <td>
                                <label class="relative inline-flex items-center mr-5 cursor-pointer">
                                    <input type="checkbox" name="{{ $permission->id }}" class="sr-only peer"
                                    @foreach ($user->permissions as $userpermission)
                                        @if($userpermission->id == $permission->id)
                                            checked
                                        @endif
                                    @endforeach
                                    >
                                    <div class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-gray-300 dark:peer-focus:ring-gray-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-gray-600"></div>
                                </label>
                            </td>
                        </tr>
                        
                    @endforeach
                    </form>
                </tbody>
            </table>
        </div>
        <div class="w-1/2 mt-5 flex justify-end gap-3">
            <a href="{{ route('users.index') }}" class="w-24 py-2 border border-gray-500 rounded-md text-xs text-center text-gray-700">Cancle</a>
            <button form="permission" class="w-24 py-2 bg-gray-500 rounded-md text-center text-xs text-white">Save</button>
        </div>
    </section>
@endsection