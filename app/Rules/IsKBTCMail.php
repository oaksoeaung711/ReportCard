<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class IsKBTCMail implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $v = explode("@",$value);
        if($v[1] !== 'kbtc.edu.mm'){
            $fail('You must use an email from KBTC.');
        }
    }
}
