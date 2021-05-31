<?php

namespace App\Admin\Repositories;

use App\Models\UserIdentity as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class UserIdentity extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
