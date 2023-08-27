@extends('layouts.main')

@section('title','Sign Manage')

@section('content')
    <section class="relative">
        <div class="">
            <h1 class="text-xl text-gray-700 font-bold">Sign Management</h1>
        </div>
        <div class="mt-5 w-1/2 flex justify-end">
            <a href="{{ route('signs.create') }}" class="bg-gray-500 px-4 py-2 rounded-md text-xs text-white"><i class="fa-solid fa-plus"></i> Create New</a>
        </div>
        <div class="w-1/5 absolute top-5 right-5">
            <x-session-message/>
        </div>
        <div class="mt-5 w-1/2 rounded-t-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-500">
                    <tr>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Name</td>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Keyword</td>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Action</td>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    @foreach ($signs as $sign)
                        <tr>
                            <td class="p-3 text-xs text-gray-700">{{ $sign->name }}</td>
                            <td class="p-3 text-xs text-gray-700">{{ $sign->keyword }}</td>
                            <td class="p-3">
                                <div class="flex gap-4 items-center">
                                    <a href="{{ route('signs.show',$sign->id) }}" class="text-xs text-gray-600 hover:text-gray-700 transition-all duration-300"><i class="fa-solid fa-eye"></i></a>
                                    <a href="{{ route('signs.edit',$sign->id) }}" class="text-xs text-gray-600 hover:text-gray-700 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <button id="delete-btn" onclick="deletesign({{ $sign->id }},`{{ $sign->name }}`)" class="text-xs text-gray-600 hover:text-gray-700 transition-all duration-300"><i class="fa-solid fa-trash"></i></button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="w-1/2 mt-5">
            {{ $signs->links('pagination::tailwind') }}
        </div>

        {{-- Start Confirm Modal --}}
        <div id="confirm-modal" class="absolute z-10 top-0 w-full hidden fade">
            <div class="w-1/2 p-5 rounded-md bg-gray-100 mx-auto space-y-6">
                <div class="flex justify-center">
                    <img src="{{ asset('images/trash.svg') }}" class="w-52" />
                </div>
                <div class="text-center">
                    <h1 class="text-2xl text-gray-700">Are you sure you want to delete <span id="delete-name" class="font-bold"></span>'s sign ?</h1>
                </div>
                <div class="flex justify-end gap-3">
                    <button onclick="cancle()" class="px-4 py-3 bg-gray-500 rounded-md hover:bg-gray-600 text-white transition-all duration-300">Cancle</button>
                    <form id="delete-form" action="" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="px-4 py-3 bg-red-500 rounded-md hover:bg-red-600 text-white transition-all duration-300">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        {{-- End Confirm Modal --}}

    </section>
    
@endsection

@section('css')
    <style type="text/css">
        .fade {
            animation: fade .3s;
        }

        @keyframes fade {
            from {
                /* transform: scale(0); */
                opacity: 0;
            }

            to {
                opacity: 1;
            }
        }
    </style>
@endsection

@section('script')
    <script type="text/javascript">

        function deletesign(id,name){
            document.getElementById('delete-name').innerHTML = name;
            document.getElementById('confirm-modal').classList.remove('hidden');
            document.getElementById('delete-form').action = `{{ route('signs.index') }}` + `/${id}`;
        }

        function cancle(){
            document.getElementById('confirm-modal').classList.add('hidden');
        }
    </script>
@endsection