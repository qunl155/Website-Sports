<?php

namespace App\Http\Controllers\Admin;

use Session;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Menu\CreateFormRequest;
use App\Models\admin;
use Illuminate\Http\Request;
use App\Models\Menu;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class MenuController extends Controller
{

    //x
    public function getParent()
    {
        return Menu::where('parent_id', 0)->get();
    }

    //form thêm
    public function create()
    {
        return view('admin.menu.add', [
            'title' => 'Thêm danh mục mới',
            'name' => 'Thêm danh mục',

            'menus' => $this->getParent()
        ]);
    }



    //x
    public function createAdd($request)
    {
        $validator = Validator::make($request->only('name'), [
            'name' => [
                'required',
                Rule::unique('menus')//->ignore($request->input('name')),
            ],
        ]);

        if ($validator->fails()) {
            return back()->withErrors(['name' => 'Tên danh mục đã tồn tại, vui lòng chọn tên khác.'])->withInput();
        }

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


    //x
    public function store(CreateFormRequest $request)
    {
        $this->createAdd($request);
        return redirect()->back();
    }


    //x
    public function getAll()
    {
        return Menu::orderByDesc('id')->paginate(20);
    }


    //form danh sách
    public function index()
    {
        return view('admin.menu.list', [
            'title' => 'Danh sách danh mục',
            'name' => 'Danh sách của các danh mục',
            'menus' => $this->getAll()
        ]);
    }

    //x
    public function destroy_Main($request)
    {
        $id = (int) $request->input('id');
        $menu = Menu::where('id', $id)->first();
        if ($menu) {
            return Menu::where('id', $id)->orWhere('parent_id', $id)->delete();
        }
        return false;
    }

    public function destroy(Request $request): JsonResponse
    {
        $result = $this->destroy_Main($request);
        if ($result) {
            return response()->json([
                'check' => true,
                'message' => 'Xoá thành công danh mục'
            ]);
        }
        return response()->json([
            'check' => false
        ]);
    }


    public function update1($request, $menu): bool
    {
        if ($request->input('parent_id') != $menu->id) {
            $menu->parent_id = (int) $request->input('parent_id');
        }
        $menu->name = (string) $request->input('name');
        $menu->description = (string) $request->input('description');
        $menu->content = (string) $request->input('content');
        $menu->active = (string) $request->input('active');
        $menu->save();
        Session::flash('success', 'Cập nhật danh mục thành công');
        return true;
    }

    //x
    public function update2(Menu $menu, CreateFormRequest $request)
    {
        $this->update1($request, $menu);

        return redirect('/admin/menus/list');
    }

    //form sửa
    public function fix(Menu $menu)
    {
        return view('admin.menu.edit', [
            'title' => 'Chỉnh sửa danh mục' . $menu->name,
            'name' => 'Danh mục ' . $menu->name,
            'menu' => $menu,
            'menus' => $this->getParent()
        ]);
    }
}