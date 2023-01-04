<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\InvokableRule;

class Isbn implements InvokableRule
{
    private const ISBN_CASE_10 = 10;
    private const ISBN_CASE_13 = 13;

    /**
     * Run the validation rule.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     * @return void
     */
    public function __invoke($attribute, $value, $fail)
    {
        foreach ($value as $isbn) {
            if (!in_array(mb_strlen($isbn), [self::ISBN_CASE_10, self::ISBN_CASE_13], true)) {
                $fail(sprintf('The :attribute must contain %d or %d No. of chars. Isbn :%s', self::ISBN_CASE_10, self::ISBN_CASE_13, $isbn));
            }
        }
    }
}
