<?php


namespace App\Http\Resources;

class ClienteleResource extends BaseResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['platform_att'] = $this->platform_att;
        return $data;
    }
}
