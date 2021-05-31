<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\User;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;
use App\Models\User as UserModel;
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
            $grid->simplePaginate();
            $grid->column('id')->sortable();
            $grid->column('phone');
            $grid->column('mail');
            $grid->column('nickname');
            $grid->column('avatarurl')->image(null, 50, 50);
            $grid->column('gender')->using(UserModel::$EnumGender);
            $grid->column('identity')->using(UserModel::$EnumIdentity);
            $grid->column('check_user')->using(UserModel::$EnumCheckUser);
            $grid->column('status')->using(UserModel::$EnumStatus);
            $grid->column('last_login_time');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->like('phone');
                $filter->like('mail');
                $filter->like('nickname');
                $filter->equal('gender')->select(UserModel::$EnumGender);
                $filter->equal('identity')->select(UserModel::$EnumIdentity);
                $filter->equal('check_user')->select(UserModel::$EnumCheckUser);
                $filter->equal('status')->select(UserModel::$EnumStatus);
                $filter->between('last_login_time')->datetime();
                $filter->between('created_at')->datetime();
            });

            $grid->model()->orderBy('id', 'desc');

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
            $show->field('avatarurl')->image(null, 50, 50);
            $show->field('gender')->using(UserModel::$EnumGender);
            $show->field('identity')->using(UserModel::$EnumIdentity);
            $show->field('check_user')->using(UserModel::$EnumCheckUser);
            $show->field('status')->using(UserModel::$EnumStatus);
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
            $form->display('openid');
            $form->display('unionid');
            $form->text('phone');
            $form->text('mail');
            $form->text('nickname');
            $form->image('avatarurl');
            $form->select('gender')->options(UserModel::$EnumGender);
            $form->select('identity')->options(UserModel::$EnumIdentity);
            $form->select('check_user')->options(UserModel::$EnumCheckUser);
            $form->select('status')->options(UserModel::$EnumStatus);
            $form->display('session_key');
            $form->display('keyword');
            $form->display('last_login_time');

            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
