<?php

namespace App\Admin\Controllers;

use App\Admin\Repositories\Clientele;
use Dcat\Admin\Form;
use Dcat\Admin\Grid;
use Dcat\Admin\Show;
use Dcat\Admin\Http\Controllers\AdminController;

class ClienteleController extends AdminController
{
    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        return Grid::make(new Clientele(), function (Grid $grid) {
            $grid->column('id')->sortable();
            $grid->column('name');
            $grid->column('platform');
            $grid->column('contact_name');
            $grid->column('contact_wx');
            $grid->column('contact_tel');
            $grid->column('contact_post');
            $grid->column('group');
            $grid->column('address');
            $grid->column('address_name');
            $grid->column('address_tel');
            $grid->column('level');
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
        return Show::make($id, new Clientele(), function (Show $show) {
            $show->field('id');
            $show->field('name');
            $show->field('platform');
            $show->field('contact_name');
            $show->field('contact_wx');
            $show->field('contact_tel');
            $show->field('contact_post');
            $show->field('group');
            $show->field('address');
            $show->field('address_name');
            $show->field('address_tel');
            $show->field('level');
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
        return Form::make(new Clientele(), function (Form $form) {
            $form->display('id');
            $form->text('name');
            $form->text('platform');
            $form->text('contact_name');
            $form->text('contact_wx');
            $form->text('contact_tel');
            $form->text('contact_post');
            $form->text('group');
            $form->text('address');
            $form->text('address_name');
            $form->text('address_tel');
            $form->text('level');
        
            $form->display('created_at');
            $form->display('updated_at');
        });
    }
}
