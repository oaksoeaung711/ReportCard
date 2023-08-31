<div class="w-full my-2">
    <label for="{{ $formid }}" @class([
            "text-[9px] font-semibold",
            "text-red-500"=>$errors->has($formname),
            "text-gray-600"=>!$errors->has($formname)
        ])>
        {{ $formlabel }}
    </label>
    <div class="flex">
        <div class="w-10 z-10 text-center flex justify-center items-center">
            <i @class([
                "fa-solid fa-$formicon text-xs",
                "text-gray-300"=> !$errors->has($formname),
                "text-red-500" => $errors->has($formname),
                ])
            ></i>
        </div>
        <input 
            type="{{ $formtype }}"
            name="{{ $formname }}"
            value="{{ empty($formvalue) ? old($formname) : $formvalue }}"
            id="{{ $formid }}"
            @class([
                "w-full border-2 text-md text-gray-600 text-xs py-2 pl-10 -ml-10 outline-none focus:border-gray-500",
                'border-red-500' => $errors->has($formname)
            ])
            placeholder="{{ $formplaceholder }}"
            autocomplete="off"
        />
    </div>
    @error($formname)
        <p class="text-red-500 text-xs mt-1">{{ $errors->first($formname) }}</p>
    @enderror
</div>