<div>
    <a href="{{ route('home') }}" class="flex items-center mb-10">
        <img src="{{ asset('images/logo.png') }}" class="h-10" />
        <h1 class="text-xl text-gray-700 font-bold">Reportcard</h1>
    </a>
</div>

<div class="space-y-4">
    <div class="flex items-center gap-3">
        <img src="{{ asset('images/user.png') }}" class="h-10" />
        <div class="space-y-1">
            <p class="font-bold text-sm text-gray-700">{{ Auth::user()->name }}</p>
            <p class="text-xs text-gray-400">{{ Auth::user()->email }}</p>
        </div>
    </div>
    <div class="flex items-center flex-wrap gap-1">
        <span class="text-gray-700 text-sm">Permission : </span>
        @php
            $permissions = collect(auth()->user()->permissions)->sortBy('id');
            // dd(count($permissions));
        @endphp
        @if(count($permissions) != 0)
            @foreach($permissions as $permission)
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
</div>

<hr class="border-gray-300 my-6" />

<div>
    <div id="home" class="flex items-center h-12 p-3 my-3 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
        <a href="{{ route('home') }}" class="block w-full text-sm text-gray-700">
            <i class="fa-solid fa-house-chimney"></i>
            <span class="ml-3">Home</span>
        </a>
    </div>
    @foreach($permissions as $permission)
        @if($permission->id == 1)
            <div id="user-manage" class="flex items-center h-12 p-3 my-2 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
                <a href="{{ route('users.index') }}" class="block w-full text-sm text-gray-700">
                    <i class="fa-solid fa-users-gear"></i>
                    <span class="ml-3">{{ $permission->name }}</span>
                </a>
            </div>
        @elseif($permission->id == 2)
            <div id="sign-manage" class="flex items-center h-12 p-3 my-2 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
                <a href="{{ route('signs.index') }}" class="block w-full text-sm text-gray-700">
                    <i class="fa-solid fa-sign-hanging"></i>
                    <span class="ml-3">{{ $permission->name }}</span>
                </a>
            </div>
        @elseif($permission->id == 3)
            <div id="create-reportcards" class="flex items-center h-12 p-3 my-2 hover:bg-gray-200 hover:rounded-md transition-all duration-200">
                <a href="{{ route('reportcards.index') }}" class="block w-full text-sm text-gray-700">
                    <i class="fa-solid fa-clipboard"></i>
                    <span class="ml-3">{{ $permission->name }}</span>
                </a>
            </div>
        @endif
    @endforeach
</div>

<hr class="border-gray-300 my-6" />

<div>
    <div class="flex items-center h-12 p-3 my-2">
        <a href="{{ route('user.logout') }}" class="block w-full text-sm text-gray-700 hover:text-gray-900 transition-all duration-200">
            <i class="fa-solid fa-right-from-bracket"></i>
            <span class="ml-3">Logout</span>
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