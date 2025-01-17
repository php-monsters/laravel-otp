<?php

namespace PhpMonsters\Otp\Rules;

use Illuminate\Contracts\Validation\Rule;
use PhpMonsters\Otp\OtpFacade as Otp;

class OtpValidate implements Rule
{
    protected string $identifier;

    protected array $options;

    protected string $attribute;

    protected string $error;

    public function __construct(?string $identifier = null, array $options = [])
    {
        $this->identifier = $identifier ?: session()->getId();
        $this->options = $options;
    }

    public function passes($attribute, $value): bool
    {
        $result = Otp::validate($this->identifier, $value, $this->options);
        if ($result->status !== true) {
            $this->attribute = $attribute;
            $this->error = $result->error;

            return false;
        }

        return true;
    }

    public function message(): string
    {
        return __('otp::messages.'.$this->error, [
            'attribute' => $this->attribute,
        ]);
    }
}
