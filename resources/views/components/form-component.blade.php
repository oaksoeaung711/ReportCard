<div class="w-full my-2">
    <label for="{{ $formid }}" class="text-[9px] font-semibold {{ $errors->has($formname) ? "text-red-500" : "text-gray-600" }} }}">{{ $formlabel }}</label>
    <div class="flex">
        <div class="w-10 z-10 text-center flex justify-center items-center">
            <i class="fa-solid fa-{{ $formicon }} {{ $errors->has($formname) ? "text-red-500" : "text-gray-300" }} text-xs"></i>
        </div>
        <input 
            type="{{ $formtype }}"
            name="{{ $formname }}"
            value="{{ empty($formvalue) ? old($formname) : $formvalue }}"
            id="{{ $formid }}"
            class="w-full border-2 text-md text-gray-600 {{ $errors->has($formname) ? "border-red-500" : "border-gray-200" }} text-xs py-2 pl-10 -ml-10 outline-none focus:border-gray-500"
            placeholder="{{ $formplaceholder }}"
            autocomplete="off"
        />
    </div>
    @error($formname)
        <p class="text-red-500 text-xs mt-1">{{ $errors->first($formname) }}</p>
    @enderror
</div>