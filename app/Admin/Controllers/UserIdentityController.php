<?php

namespace App\Admin\Controllers;

use App\Admin\Actions\Grid\CheckUser;
use App\Admin\Repositories\UserIdentity;
use App\Models\UserIdentity as UserIdentityModel;
use App\Models\User;
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
        return Grid::make(UserIdentity::with(['user']), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->column('id')->sortable();
            $grid->column('user.nickname', '用户');
            $grid->column('identity_att');
            $grid->column('remark');
            $grid->column('status_att');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();
            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('user_id', '用户ID');
                $filter->equal('identity')->radio(User::$EnumIdentity);
                $filter->equal('status')->radio(UserIdentityModel::$EnumStatus);
            });

            $grid->disableCreateButton();
            $grid->disableDeleteButton();
            $grid->disableEditButton();
            $grid->disableViewButton();

            $grid->model()->orderBy('id', 'desc');
            $grid->actions([new CheckUser()]);
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
        return Show::make($id, UserIdentity::with(['user']), function (Show $show) {
            $show->field('id');
            $show->field('user.nickname', '用户');
            $show->field('identity_att');
            $show->field('remark');
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
        return Form::make(UserIdentity::with(['user']), function (Form $form) {
            $form->display('user.name', "用户");
            $form->select('identity')->options(User::$EnumIdentity);
            $form->textarea('remark');
            $form->radio('status')->options(UserIdentityModel::$EnumStatus);
        });
    }
}
