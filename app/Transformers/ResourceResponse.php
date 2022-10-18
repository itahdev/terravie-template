<?php

namespace App\Transformers;

use Illuminate\Http\Resources\Json\ResourceResponse as JsonResourceResponse;
use Illuminate\Pagination\AbstractCursorPaginator;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Support\Collection;

class ResourceResponse extends JsonResourceResponse
{
    /**
     * @inheritDoc
     */
    protected function wrap($data, $with = [], $additional = []): array
    {
        if ($data instanceof Collection) {
            $data = $data->all();
        }

        if ($this->haveDefaultWrapperAndDataIsUnwrapped($data)) {
            $data = [$this->wrapper() => $data];
        } elseif ($this->haveAdditionalInformationAndDataIsUnwrapped($data, $with, $additional)) {
            $data = [($this->wrapper() ?? 'data') => $data];
        }

        if (!$data[$this->wrapper()] &&
            !($this->resource->resource instanceof Collection ||
                $this->resource->resource instanceof AbstractPaginator ||
                $this->resource->resource instanceof AbstractCursorPaginator)
        ) {
            $data[$this->wrapper()] = (object)[];
        }

        return array_merge_recursive($data, $with, $additional);
    }
}
