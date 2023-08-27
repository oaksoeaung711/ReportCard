@if(Session::has('message'))
    @if(Session::get('message')['type'] === 'success')
        <div id="alert-box" class="w-full h-14 my-2 p-3 rounded-lg flex items-center bg-teal-100 relative">
            <strong class="text-teal-600 text-xs">{{ Session::get('message')['content'] }}</strong>
            <i id="alert-close" class="fa-solid fa-xmark text-teal-600 text-lg absolute top-0 right-3 cursor-pointer hover:text-teal-700 transition-all duration-300"></i>
        </div>
    @elseif(Session::get('message')['type'] === 'fail')
    <div id="alert-box" class="w-full h-14 my-2 p-3 rounded-lg flex items-center bg-rose-100 relative">
        <strong class="text-rose-600 text-xs">{{ Session::get('message')['content'] }}</strong>
        <i id="alert-close" class="fa-solid fa-xmark text-rose-600 text-lg absolute top-0 right-3 cursor-pointer hover:text-rose-700 transition-all duration-300"></i>
    </div>
    @endif

<script type="text/javascript">
    let alertbox = document.getElementById('alert-box');
    let alertclose = document.getElementById('alert-close');
    alertclose.addEventListener('click',function(){
        alertbox.remove();
    });
</script>
@endif