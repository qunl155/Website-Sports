<?php

namespace App\Http\Controllers\Admin;

use Session;
use Exception;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Http\Services\Menu\MenuService;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    protected $menuService = "App\Http\Services\Menu\MenuService";

    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'name' => 'Thêm sản phẩm'
        ]);
    }

    public function createt($request)
    {
        try {
            Menu::create([
                'name' => (string) $request->input('name'),
                'parent_id' => (string) $request->input('parent_id'),
                'description' => (string) $request->input('description'),
                'content' => (string) $request->input('content'),
                'active' => (string) $request->input('active'),
                // 'slug' => Str::slug($request->input('name'), '-')
            ]);
            Session::flash('success', 'Tạo danh mục thành công');
        } catch (Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
        return true;
    }

    public function store(CreateFormRequest $request)
    {
        if ($this->createt($request)) {
            $result = $this->createt($request);
        }

        return redirect()->back();
    }
}