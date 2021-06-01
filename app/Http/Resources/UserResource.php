<?php


namespace App\Http\Resources;

class UserResource extends BaseResource
{
    public function toArray($request)
    {
        $data = parent::toArray($request);
        $data['status_att'] = $this->status_att;
        $data['gender_att'] = $this->gender_att;
        return $data;
    }
}
