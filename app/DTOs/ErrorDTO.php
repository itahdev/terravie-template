<?php

namespace App\DTOs;

class ErrorDTO implements BaseDTO
{
    /** @var string */
    private string $errorCode;

    /**
     * ErrorDTO constructor.
     *
     * @param string $errorCode
     */
    public function __construct(string $errorCode)
    {
        $this->errorCode = $errorCode;
    }

    /**
     * Convert this object to array
     *
     * @return string[]
     */
    public function toArray(): array
    {
        return [
            'error_code' => $this->errorCode,
        ];
    }
}
