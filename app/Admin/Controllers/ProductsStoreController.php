<?php

namespace App\Admin\Controllers;


use App\Admin\Repositories\ProductsStore;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ProductsStoreController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(ProductsStore::with(['user','admin','product']), function (Grid $grid) {
            $grid->simplePaginate();
            $grid->column('id')->sortable();
            $grid->column('user.nickname', '操作人');
            $grid->column('admin.name','操作人');
            $grid->column('product.title', '产品');
            $grid->column('before_num');
            $grid->column('num');
            $grid->column('after_num');
            $grid->column('remark');
            $grid->column('created_at');
            $grid->column('updated_at')->sortable();

            $grid->filter(function (Grid\Filter $filter) {
                $filter->equal('id');
                $filter->equal('user_id', '用户ID');
                $filter->equal('admin_id', '管理员ID');
                $filter->equal('product_id', '产品ID');
                $filter->like('remark');
                $filter->between('created_at')->datetime();
            });
            $grid->model()->orderBy('id', 'desc');
            $grid->disableActions();
            $grid->disableCreateButton();
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
        return Show::make($id, new ProductsStore(), function (Show $show) {
//            $show->field('id');
//            $show->field('admin_id');
//            $show->field('num');
//            $show->field('product_id');
//            $show->field('remark');
//            $show->field('user_id');
//            $show->field('created_at');
//            $show->field('updated_at');
        });
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        return Form::make(new ProductsStore(), function (Form $form) {
//            $form->display('id');
//            $form->text('admin_id');
//            $form->text('num');
//            $form->text('product_id');
//            $form->text('remark');
//            $form->text('user_id');
//
//            $form->display('created_at');
//            $form->display('updated_at');
        });
    }
}
