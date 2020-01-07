<?php

declare(strict_types=1);

namespace App\Http\Resources\User;

use Carbon\Carbon;
use App\Http\Resources\Resource;

class UserResource extends Resource
{
    /**
     * @param Request $request
     * 
     * @return array
     */
    public function toArray($request): array
    {
        $data = parent::toArray($request);
        
        if ($this !== null) {
            $data['created_at'] = $this->created_at instanceof Carbon ? $this->created_at->toRfc3339String() : null;
            $data['updated_at'] = $this->created_at instanceof Carbon ? $this->created_at->toRfc3339String() : null;
        }

        return $data;
    }
}
