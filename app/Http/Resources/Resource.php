<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Support\Str;
use Illuminate\Http\Resources\Json\Resource as BaseResource;

class Resource extends BaseResource
{
    public $includes = [];

    public function setIncludes(array $includes = []): self
    {
        if ($includes) {
            $this->includes = $includes;
        }

        return $this;
    }

    public function toArray($request): array
    {
        $this->processIncludes($this->includes);

        return parent::toArray($request);
    }

    protected function processIncludes(array $includes = []): void
    {
        foreach ($includes as $include) {
            $relationship = Str::camel($include);

            if (!method_exists($this->resource, $relationship)) {
                continue;
            }

            $this->resource->loadMissing([$relationship]);
        }
    }
}
