<?php

namespace App\Transformers;

use Illuminate\Pagination\LengthAwarePaginator;

/**
 * @OA\Schema(
 *     properties={
 *         @OA\Property(property="data", type="object"),
 *         @OA\Property(property="meta", ref="#/components/schemas/MetaResource")
 *     }
 * )
 */
class SuccessResource extends Resource
{
    /**
     * @param mixed   $resource
     * @param integer $code
     * @param string  $message
     */
    public function __construct(mixed $resource = null, int $code = 200, string $message = 'Successful')
    {
        if ($resource instanceof LengthAwarePaginator) {
            $pagination = [
                'total' => $resource->total(),
                'count' => $resource->count(),
                'per_page' => $resource->perPage(),
                'current_page' => $resource->currentPage(),
                'total_pages' => $resource->lastPage()
            ];
        }

        parent::__construct($resource, new MetaResource($code, $message, null, $pagination ?? null));
    }
}
