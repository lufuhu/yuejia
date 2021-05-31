<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Sample;
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
        return Grid::make(new Sample(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('clientele_id');
            $grid->column('product_id');
            $grid->column('specification');
            $grid->column('num');
            $grid->column('price');
            $grid->column('carriage');
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
        return Show::make($id, new Sample(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('clientele_id');
            $show->field('product_id');
            $show->field('specification');
            $show->field('num');
            $show->field('price');
            $show->field('carriage');
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
            $form->display('id');
            $form->text('user_id');
            $form->text('clientele_id');
            $form->text('product_id');
            $form->text('specification');
            $form->text('num');
            $form->text('price');
            $form->text('carriage');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
