<div class="flex items-center mb-14">
    <img src="{{ asset('images/logo.png') }}" class="w-14" />
    <h1 class="text-4xl text-gray-700 font-bold">Reportcard</h1>
</div>

<div class="space-y-7">
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/user.png') }}" class="w-12" />
        <div class="space-y-1">
            <p class="font-bold text-gray-700">{{ auth()->user()->name }}</p>
            <p class="text-sm text-gray-400">{{ auth()->user()->email }}</p>
        </div>
    </div>
    <div class="flex flex-wrap gap-1">
        <span class="text-gray-700">Permission : </span>
        @foreach(auth()->user()->permissions as $permission)
            @if($permission->id == 1)
                <span class="py-1 px-1.5 bg-rose-300 rounded-full text-xs text-rose-700 tracking-tighter">{{ $permission->name }}</span>
            @elseif($permission->id == 2)
                <span class="py-1 px-1.5 bg-yellow-300 rounded-full text-xs text-yellow-700 tracking-tighter">{{ $permission->name }}</span>
            @elseif($permission->id == 3)
                <span class="py-1 px-1.5 bg-sky-300 rounded-full text-xs text-sky-700 tracking-tighter">{{ $permission->name }}</span>
            @endif
        @endforeach
    </div>
</div>

<hr class="border-gray-300 mt-6 mb-12" />

<div>
    <div class="flex items-center h-12 p-3 my-3 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
        <a href="#" class="block w-full text-lg text-gray-700">
            <i class="fa-solid fa-users-gear"></i>
            <span class="ml-5">User Manage</span>
        </a>
    </div>
</div>

<hr class="border-gray-300 my-6" />

<div>
    <div class="flex items-center h-12 p-3 my-3">
        <a href="{{ route('user.logout') }}" class="block w-full text-lg text-gray-700 hover:text-gray-900 transition-all duration-200">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="ml-5">Logout</span>
        </a>
    </div>
</div>