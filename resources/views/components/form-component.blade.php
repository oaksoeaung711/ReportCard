<div class="w-full mb-10">
    <label for="{{ $formid }}" class="text-xs font-semibold @error($formname) text-red-500 @enderror">{{ $formlabel }}</label>
    <div class="flex">
        <div class="w-10 z-10 text-center flex justify-center items-center">
            <i class="fa-solid fa-{{ $formicon }} {{ $errors->has($formname) ? "text-red-500" : "text-gray-300" }}"></i>
        </div>
        <input 
            type="{{ $formtype }}"
            name="{{ $formname }}"
            value="{{ old($formname) }}"
            id="{{ $formid }}"
            class="w-full border-2 text-md text-gray-600 {{ $errors->has($formname) ? "border-red-500" : "border-gray-200" }} py-2 pl-12 -ml-10 outline-none focus:border-gray-500"
            placeholder="{{ $formplaceholder }}"
            autocomplete="off"
        />
    </div>
    @error($formname)
        <p class="text-red-500 text-xs mt-1">{{ $errors->first($formname) }}</p>
    @enderror
</div>