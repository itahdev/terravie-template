<?php

namespace App\Transformers;

/**
 * @OA\Schema(
 *     properties={
 *         @OA\Property(property="data", type="object"),
 *         @OA\Property(
 *              property="meta",
 *              ref="#/components/schemas/MetaResource"
 *          ),
 *     }
 * )
 */
class ErrorResource extends Resource
{
    /**
     * @inheritDoc
     *
     * @param integer  $code
     * @param string   $message
     * @param array    $errors
     * @param $resource
     */
    public function __construct(int $code, string $message = 'Bad request', $errors = null, $resource = null)
    {
        parent::__construct($resource, new MetaResource($code, $message, $errors));
    }
}
