<?php

namespace App\Admin\Actions\Grid;

use Dcat\Admin\Grid\RowAction;
use Dcat\Admin\Widgets\Modal;
use App\Admin\Forms\SaveStore as SaveStoreForm;

class SaveStore extends RowAction
{
    protected $title = '库存';

    public function render()
    {
        $form = SaveStoreForm::make()->payload(['id' => $this->getKey()]);

        return Modal::make()
            ->lg()
            ->title($this->title)
            ->body($form)
            ->button($this->title);
    }
}
