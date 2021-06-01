<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
use App\Admin\Forms\CheckUser as CheckUserForm;

class CheckUser extends RowAction
{
    protected $title = '审核';

    public function render()
    {
        $form = CheckUserForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
