<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Sample;
use App\Models\Sample as SampleModel;
use App\Models\Clientele;
use App\Models\Product;
use App\Models\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class SampleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(Sample::with(['user','product','clientele']), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->column('id')->sortable();
            $grid->column('user.nickname' ,'用户');
            $grid->column('clientele.name', '客户');
            $grid->column('product.title', '产品');
            $grid->column('specification');
            $grid->column('num');
            $grid->column('price');
            $grid->column('carriage');
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
        return Show::make($id, Sample::with(['user','product','clientele']), function (Show $show) {
            $show->field('id');
            $show->field('user.nickname' ,'用户');
            $show->field('clientele.name', '客户');
            $show->field('product.title', '产品');
            $show->field('specification');
            $show->field('num');
            $show->field('price');
            $show->field('carriage');
            $show->field('status_att');
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
        return Form::make(new Sample(), function (Form $form) {

            $user = User::getPluckList('id','nickname');
            $product = Product::getPluckList();
            $clientele = Clientele::getPluckList('id','name');
            $form->select('user_id')->options($user);
            $form->select('clientele_id')->options($product);
            $form->select('product_id')->options($clientele);
            $form->text('specification');
            $form->number('num');
            $form->currency('price');
            $form->currency('carriage');
            $form->radio('status')->options(SampleModel::$EnumStatus);
        });
    }
}
