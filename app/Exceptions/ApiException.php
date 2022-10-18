<?php

namespace App\Exceptions;

use RuntimeException;
use Throwable;

class ApiException extends RuntimeException
{
    /** @var mixed */
    private mixed $data;

    /**
     * ApiException constructor.
     *
     * @param integer        $httpCode
     * @param string         $message
     * @param mixed          $data
     * @param Throwable|null $previous
     */
    public function __construct(int $httpCode, string $message, mixed $data = null, Throwable $previous = null)
    {
        $this->data = $data;
        parent::__construct($message, $httpCode, $previous);
    }

    /**
     * @return mixed|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return ApiException
     */
    public static function serviceUnavailable(string $message = 'Service unavailable', mixed $data = null): ApiException
    {
        return new ApiException(503, $message, $data);
    }

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return ApiException
     */
    public static function badRequest(string $message = 'Bad request', mixed $data = null): ApiException
    {
        return new ApiException(400, $message, $data);
    }

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return ApiException
     */
    public static function forbidden(string $message = 'Forbidden', mixed $data = null): ApiException
    {
        return new ApiException(403, $message, $data);
    }

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return ApiException
     */
    public static function notFound(string $message = 'Not found', mixed $data = null): ApiException
    {
        return new ApiException(404, $message, $data);
    }

    /**
     * @param string $message
     * @param mixed  $data
     *
     * @return ApiException
     */
    public static function conflict(string $message = 'Conflict', mixed $data = null): ApiException
    {
        return new ApiException(409, $message, $data);
    }
}
