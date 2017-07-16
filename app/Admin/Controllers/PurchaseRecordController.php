<?php

namespace App\Admin\Controllers;

use App\Models\StCategory;
use App\Models\StPurchaseRecord;

use Zofe\Rapyd\DataEdit\DataEdit;
use Zofe\Rapyd\DataGrid\DataGrid;
use Zofe\Rapyd\DataFilter\DataFilter;

class PurchaseRecordController extends BaseController
{

    public function index()
    {
        $filter = DataFilter::source(StPurchaseRecord::with('category'));
        $filter->add('purchase_time', '入货时间', 'daterange')->format('Y-m-d', 'zh-CN');
        $filter->submit('筛选');
        $filter->reset('重置');
        $filter->link('admin/purchase-records/edit', '新增');
        $filter->build();

        $grid = DataGrid::source($filter);

        $grid->add('purchase_record_id', 'ID', true)->style("width:100px");
        $grid->add('category.name', '货品名称');
        $grid->add('quantity', '入货数量');
        $grid->add('total', '入货总价');
        $grid->add('purchase_time', '入货时间');
        $grid->add('comment', '备注');
        $grid->add('category.seller.address', '供应商地址');
        $grid->add('category.seller.name', '供应商');
        $grid->add('category.option_name', '货品规格');

        $grid->edit('/admin/purchase-records/edit', '操作', 'show|modify|delete');
        $grid->orderBy('purchase_record_id', 'desc');
        $grid->paginate(self::DEFAULT_PER_PAGE);

        $grid->build();

        return view('rapyd.filtergrid', compact('filter', 'grid'));
    }

    public function edit()
    {
        $edit = DataEdit::source(new StPurchaseRecord());
        $edit->label('入货信息');
        $edit->link("/admin/purchase-records", "列表", "TR")->back();
        $edit->add('category_id', '货品名', 'select')->options(StCategory::pluck("name", "category_id")->toArray());
        $edit->add('quantity', '入货数量', 'number');
        $edit->add('purchase_time', '入货时间', 'date')->format('Y-m-d', 'zh-CN');
        $edit->add('total', '总价', 'text');
        $edit->add('comment', '备注', 'textarea')->attributes(array('rows' => 3));

        $edit->saved(function () use ($edit) {
            $categoryId = $edit->model->category_id;
            $quantity = $edit->model->quantity;
            $category = StCategory::find($categoryId);
            $category->total += $quantity;
            $category->total_in += $quantity;
            $category->save();
        });

        return $edit->view('rapyd.edit', compact('edit'));

    }
}
