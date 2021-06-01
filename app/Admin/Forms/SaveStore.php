<?php

namespace App\Admin\Forms;

use App\Models\Product;
use App\Models\ProductsStore;
use Dcat\Admin\Admin;
use Dcat\Admin\Traits\LazyWidget;
use Dcat\Admin\Widgets\Form;
use Dcat\Admin\Contracts\LazyRenderable;

class SaveStore extends Form implements LazyRenderable
{
    use LazyWidget;

    // 使用异步加载功能

    // 处理请求
    public function handle(array $input)
    {
        // 获取外部传递参数
        $id = $this->payload['id'] ?? null;

        // 表单参数
        $num = $input['num'] ?? 0;

        if (!$id) {
            return $this->response()->error('参数错误');
        }
        $remark = "后台（" . Admin::user()->name . "）更新库存";
        ProductsStore::saveNum($id, $num, $remark, null, Admin::user()->id);
        return $this->response()->success('更新成功')->refresh();
    }

    public function form()
    {
        $product = Product::query()->find($this->payload['id']);
        $this->display('product_title', '产品')->default($product->title);
        $this->display('product_num', '当前库存')->default($product->num);
        $this->number('num', '新增或减少库存')->default(0);
    }

}
