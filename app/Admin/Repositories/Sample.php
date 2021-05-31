<?php

namespace App\Admin\Repositories;

use App\Models\Sample as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class Sample extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
