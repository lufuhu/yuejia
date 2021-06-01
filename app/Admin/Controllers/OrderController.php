<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Order;
use App\Models\Clientele;
use App\Models\Order as OrderModel;
use App\Models\Product;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class OrderController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Order::with(['user','product','clientele']), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->column('id')->sortable();
            $grid->column('user.nickname' ,'用户');
            $grid->column('clientele.name', '客户');
            $grid->column('product.title', '产品');
            $grid->column('num');
            $grid->column('price');
            $grid->column('after_num');
            $grid->column('status_att');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');

            });
        });
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     *
     * @return Show
     */
    protected function detail($id)
    {
        return Show::make($id, Order::with(['user','product','clientele']), function (Show $show) {
            $show->field('id');
            $show->field('user.nickname' ,'用户');
            $show->field('clientele.name', '客户');
            $show->field('product.title', '产品');
            $show->field('num');
            $show->field('price');
            $show->field('after_num');
            $show->field('status_at');
            $show->field('created_at');
            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new Order(), function (Form $form) {
            $user = User::getPluckList('id','nickname');
            $product = Product::getPluckList();
            $clientele = Clientele::getPluckList('id','name');
            $form->select('user_id')->options($user);
            $form->select('clientele_id')->options($product);
            $form->select('product_id')->options($clientele);
            $form->number('num');
            $form->currency('price');
            $form->number('after_num');
            $form->radio('status')->options(OrderModel::$EnumStatus);
        });
    }
}
