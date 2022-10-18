<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;

/**
 * @OA\Schema(
 *     properties={
 * @OA\Property(property="code", type="integer"),
 * @OA\Property(property="message", type="string"),
 * @OA\Property(
 *              property="pagination",
 *              type="object",
 * @OA\Property(property="total", type="integer"),
 * @OA\Property(property="count", type="integer"),
 * @OA\Property(property="per_page", type="integer"),
 * @OA\Property(property="current_page", type="integer"),
 * @OA\Property(property="total_pages", type="integer"),
 *          ),
 * @OA\Property(property="errors", type="object"),
 *     }
 * )
 */
class MetaResource extends JsonResource
{
    /** @var int */
    public int $code;

    /** @var string */
    public string $message;

    /** @var array|null */
    public ?array $pagination;

    /** @var array|null */
    public ?array $errors;

    /**
     * MetaResource constructor.
     * @param integer    $code
     * @param string     $message
     * @param array|null $errors
     * @param array|null $pagination
     */
    public function __construct(int $code, string $message, array $errors = null, array $pagination = null)
    {
        $this->code = $code;
        $this->message = $message;
        $this->pagination = $pagination;
        $this->errors = $errors;

        parent::__construct($errors);
    }

    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'code' => $this->code,
            'message' => $this->message,
            'pagination' => $this->pagination,
            'errors' => $this->errors,
        ];
    }
}
