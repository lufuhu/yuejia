<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\UserIdentity;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserIdentityController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new UserIdentity(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('user_id');
            $grid->column('identity');
            $grid->column('remark');
            $grid->column('status');
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
        return Show::make($id, new UserIdentity(), function (Show $show) {
            $show->field('id');
            $show->field('user_id');
            $show->field('identity');
            $show->field('remark');
            $show->field('status');
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
        return Form::make(new UserIdentity(), function (Form $form) {
            $form->display('id');
            $form->text('user_id');
            $form->text('identity');
            $form->text('remark');
            $form->text('status');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
