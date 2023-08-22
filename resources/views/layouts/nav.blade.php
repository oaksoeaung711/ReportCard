<div>
    <a href="{{ route('home') }}" class="flex items-center mb-14">
        <img src="{{ asset('images/logo.png') }}" class="w-14" />
        <h1 class="text-4xl text-gray-700 font-bold">Reportcard</h1>
    </a>
</div>

<div class="space-y-7">
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/user.png') }}" class="w-12" />
        <div class="space-y-1">
            <p class="font-bold text-gray-700">{{ Auth::user()->name }}</p>
            <p class="text-sm text-gray-400">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="flex items-center flex-wrap gap-1">
        <span class="text-gray-700">Permission : </span>
        @foreach(auth()->user()->permissions as $permission)
            @if($permission->id == 1)
                <span class="px-1.5 py-0.5 bg-rose-300 rounded-full text-xs text-rose-700 tracking-tighter">{{ $permission->name }}</span>
            @elseif($permission->id == 2)
                <span class="px-1.5 py-0.5 bg-yellow-300 rounded-full text-xs text-yellow-700 tracking-tighter">{{ $permission->name }}</span>
            @elseif($permission->id == 3)
                <span class="px-1.5 py-0.5 bg-sky-300 rounded-full text-xs text-sky-700 tracking-tighter">{{ $permission->name }}</span>
            @endif
        @endforeach
    </div>
</div>

<hr class="border-gray-300 mt-6 mb-12" />

<div>
    <div id="home" class="flex items-center h-12 p-3 my-3 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
        <a href="{{ route('home') }}" class="block w-full text-lg text-gray-700">
            <i class="fa-solid fa-house-chimney"></i>
            <span class="ml-5">Home</span>
        </a>
    </div>
    @foreach(auth()->user()->permissions as $permission)
        @if($permission->id == 1)
            <div id="user-manage" class="flex items-center h-12 p-3 my-3 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
                <a href="{{ route('users.index') }}" class="block w-full text-lg text-gray-700">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="ml-5">{{ $permission->name }}</span>
                </a>
            </div>
        @elseif($permission->id == 2)
            <div id="sign-manage" class="flex items-center h-12 p-3 my-3 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
                <a href="{{ route('signs.index') }}" class="block w-full text-lg text-gray-700">
                    <i class="fa-solid fa-sign-hanging"></i>
                    <span class="ml-5">{{ $permission->name }}</span>
                </a>
            </div>
        @elseif($permission->id == 3)
            <div id="create-reportcards" class="flex items-center h-12 p-3 my-3 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
                <a href="{{ route('reportcards.index') }}" class="block w-full text-lg text-gray-700">
                    <i class="fa-solid fa-clipboard"></i>
                    <span class="ml-5">{{ $permission->name }}</span>
                </a>
            </div>
        @endif
    @endforeach
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

<div class="absolute bottom-0">
    <div>
        <img src="{{ asset('images/city2.svg') }}" class="w-full" />
    </div>
</div>

@if(request()->is('/'))
<script type="text/javascript">
    document.getElementById('home').classList.add('bg-gray-200','rounded-md');
</script>
@elseif(request()->routeIs('users.*'))
<script type="text/javascript">
    document.getElementById('user-manage').classList.add('bg-gray-200','rounded-md');
</script>
@elseif(request()->routeIs('signs.*'))
<script type="text/javascript">
    document.getElementById('sign-manage').classList.add('bg-gray-200','rounded-md');
</script>
@elseif(request()->routeIs('reportcards.*'))
<script type="text/javascript">
    document.getElementById('create-reportcards').classList.add('bg-gray-200','rounded-md');
</script>
@endif