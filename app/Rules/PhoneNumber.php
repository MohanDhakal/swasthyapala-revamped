<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

use function PHPUnit\Framework\isEmpty;

class PhoneNumber implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */

    public function passes($attribute, $value)
    {
        $flag = 0;
        if (isEmpty($value)) {
            $flag = 1;
        } else {
            $flag = preg_match("(^98|97\d{8}$)", $value);
        }
        return $flag;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */

    public function message()
    {
        return 'The Phone Number does not match the expected format';
    }
}
