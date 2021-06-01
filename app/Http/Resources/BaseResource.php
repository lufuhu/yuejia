<?php

namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Log;

class BaseResource extends JsonResource
{
    public function toArray($request)
    {
        return parent::toArray($request);
    }
}
