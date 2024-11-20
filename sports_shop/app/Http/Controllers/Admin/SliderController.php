<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Exception;
use Session;
use Log;
use Illuminate\Http\Request;
use App\Http\Requests\Slider\SliderRequest;
class SliderController extends Controller
{
    //form slider
    public function create()
    {
        return view('admin.slider.add', [
            'title' => 'Thêm slider mới',
            'name' => 'Thêm slider'
        ]);
    }

    //x
    public function store(SliderRequest $request)
    {
        $this->create2($request);
        return redirect()->back();
    }

    //x
    public function create2($request)
    {
        try {
            Slider::create([
                'name' => (string) $request->input('name'),
                'url' => (string) $request->input('url'),
                'thumb' => (string) $request->input('thumb'),
                'sort_by' => (string) $request->input('sort_by'),
                'active' => (string) $request->input('active'),
            ]);
            Session::flash('success', 'Thêm Slider mới thành công');
        } catch (Exception $err) {
            Session::flash('error', 'Thêm Slider lỗi');
            Log::info($err->getMessage());
            return false;
        }
        return true;
    }
}