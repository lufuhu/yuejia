<?php

namespace App\Admin\Repositories;

use App\Models\ProductsStore as Model;
use Dcat\Admin\Repositories\EloquentRepository;

class ProductsStore extends EloquentRepository
{
    /**
     * Model.
     *
     * @var string
     */
    protected $eloquentClass = Model::class;
}
