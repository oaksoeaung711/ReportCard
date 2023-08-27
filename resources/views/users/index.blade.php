@extends('layouts.main')

@section('title','User Manage')

@section('content')
    <section class="relative">
        <div class="">
            <h1 class="text-xl text-gray-700 font-bold">User Management</h1>
        </div>
        <div class="mt-5 rounded-t-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-500">
                    <tr>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Name</td>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Email</td>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Permissions</td>
                        <td class="w-1/4 p-3 text-xs text-white font-semibold">Action</td>
                    </tr>
                </thead>
                <tbody class="bg-gray-100">
                    @foreach ($users as $user)
                        <tr>
                            <td class="p-3 text-xs text-gray-700">{{ $user->name }}</td>
                            <td class="p-3 text-xs text-gray-700">{{ $user->email }}</td>
                            <td class="p-3 text-xs text-gray-700">
                                <div class="flex gap-1 items-center flex-wrap">
                                    @if(count($user->permissions) != 0)
                                        @foreach ($user->permissions as $permission)
                                            @if($permission->id == 1)
                                                <span class="px-1 bg-rose-300 rounded-full text-[9px] text-rose-700 tracking-tighter">{{ $permission->name }}</span>
                                            @elseif($permission->id == 2)
                                                <span class="px-1 bg-yellow-300 rounded-full text-[9px] text-yellow-700 tracking-tighter">{{ $permission->name }}</span>
                                            @elseif($permission->id == 3)
                                                <span class="px-1 bg-sky-300 rounded-full text-[9px] text-sky-700 tracking-tighter">{{ $permission->name }}</span>
                                            @endif
                                        @endforeach
                                    @else
                                        <span class="px-1 bg-gray-300 rounded-full text-[9px] text-gray-700 tracking-tighter">None</span>
                                    @endif
                                </div>
                            </td>
                            <td class="p-3">
                                @if (Auth::user()->id != $user->id && empty($user->permissions->find(1)))
                                    <div class="flex gap-5">
                                        <a href="{{ route('users.edit',$user->id) }}" class="text-xs text-gray-600 hover:text-gray-700 transition-all duration-300"><i class="fa-solid fa-pen-to-square"></i></a>
                                        
                                        <button id="delete-btn" onclick="deleteuser({{ $user->id }},`{{ $user->name }}`)" class="text-xs text-gray-600 hover:text-gray-700 transition-all duration-300"><i class="fa-solid fa-trash"></i></button>
                                    </div>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-5">
            {{ $users->links('pagination::tailwind') }}
        </div>

        {{-- Start Confirm Modal --}}
        <div id="confirm-modal" class="absolute z-10 top-0 w-full hidden fade">
            <div class="w-1/2 p-5 rounded-md bg-gray-100 mx-auto space-y-6">
                <div class="flex justify-center">
                    <img src="{{ asset('images/trash.svg') }}" class="w-52" />
                </div>
                <div class="text-center">
                    <h1 class="text-2xl text-gray-700">Are you sure you want to delete <span id="delete-name" class="font-bold"></span>?</h1>
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

        function deleteuser(id,name){
            document.getElementById('delete-name').innerHTML = name;
            document.getElementById('confirm-modal').classList.remove('hidden');
            document.getElementById('delete-form').action = `{{ route('users.index') }}` + `/${id}`;
        }

        function cancle(){
            document.getElementById('confirm-modal').classList.add('hidden');
        }
    </script>
@endsection