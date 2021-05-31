<?php

namespace App\Admin\Repositories;

use App\Models\Clientele as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Clientele extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
