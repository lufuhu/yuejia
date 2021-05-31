<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Product;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Product(), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->column('id')->sortable();
            $grid->column('title');
            $grid->column('specification');
            $grid->column('group');
            $grid->column('supplier');
            $grid->column('naked_price');
            $grid->column('consumable');
            $grid->column('carriage');
            $grid->column('publicity_price');
            $grid->column('price');
            $grid->column('activity_price');
            $grid->column('img')->image(null, 50, 50);
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
        return Show::make($id, new Product(), function (Show $show) {
            $show->field('id');
            $show->field('title');
            $show->field('specification');
            $show->field('group');
            $show->field('supplier');
            $show->field('naked_price');
            $show->field('consumable');
            $show->field('carriage');
            $show->field('publicity_price');
            $show->field('price');
            $show->field('activity_price');
            $show->field('img')->image(null, 50, 50);
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
        return Form::make(new Product(), function (Form $form) {
            $form->display('id');
            $form->text('title');
            $form->text('specification');
            $form->text('group');
            $form->text('supplier');
            $form->text('naked_price');
            $form->text('consumable');
            $form->text('carriage');
            $form->text('publicity_price');
            $form->text('price');
            $form->text('activity_price');
            $form->image('img')->autoUpload()->retainable()->uniqueName()->saveFullUrl();

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
