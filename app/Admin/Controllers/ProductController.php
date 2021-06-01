<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Product;
use Dcat\Admin\Actions\Action;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Admin\Actions\Grid\SaveStore;

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
            $grid->column('num');
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
                $filter->like('title');
                $filter->like('specification');
                $filter->like('group');
                $filter->like('supplier');
                $filter->between('created_at')->datetime();
            });
            $grid->model()->orderBy('id', 'desc');
            $grid->actions([new SaveStore()]);
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
            $show->field('num');
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
            $form->text('title')->required();
            $form->text('specification')->required();
            $form->text('group')->required();
            $form->text('supplier')->required();
            $form->currency('naked_price')->default(0);
            $form->currency('consumable')->default(0);
            $form->currency('carriage')->default(0);
            $form->currency('publicity_price')->default(0);
            $form->currency('price')->default(0);;
            $form->currency('activity_price')->default(0);;
            $form->image('img')->autoUpload()->removable(false)->retainable()->uniqueName()->saveFullUrl()->required();
        });
    }
}
