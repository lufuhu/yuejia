<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class UserController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new User(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('phone');
            $grid->column('mail');
            $grid->column('openid');
            $grid->column('unionid');
            $grid->column('nickname');
            $grid->column('avatarurl');
            $grid->column('gender');
            $grid->column('identity');
            $grid->column('check_user');
            $grid->column('status');
            $grid->column('session_key');
            $grid->column('keyword');
            $grid->column('last_login_time');
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
        return Show::make($id, new User(), function (Show $show) {
            $show->field('id');
            $show->field('phone');
            $show->field('mail');
            $show->field('openid');
            $show->field('unionid');
            $show->field('nickname');
            $show->field('avatarurl');
            $show->field('gender');
            $show->field('identity');
            $show->field('check_user');
            $show->field('status');
            $show->field('session_key');
            $show->field('keyword');
            $show->field('last_login_time');
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
        return Form::make(new User(), function (Form $form) {
            $form->display('id');
            $form->text('phone');
            $form->text('mail');
            $form->text('openid');
            $form->text('unionid');
            $form->text('nickname');
            $form->text('avatarurl');
            $form->text('gender');
            $form->text('identity');
            $form->text('check_user');
            $form->text('status');
            $form->text('session_key');
            $form->text('keyword');
            $form->text('last_login_time');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
