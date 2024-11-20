<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Exception;
class UploadController extends Controller
{
    public function store($request)
    {
        if ($request->hasFile('file')) {
            try {
                $name = $request->file('file')->getClientOriginalName();

                $pathFull = 'uploads/' . date("Y/m/d");
                $request->file('file')->storeAs(
                    'public/' . $pathFull,
                    $name
                );
                return '/storage/' . $pathFull . '/' . $name;

            } catch (Exception $err) {
                return false;
            }
        }

    }

    public function store2(Request $request)
    {
        $url = $this->store($request);
        if ($url != false) {
            return response()->json([
                'error' => false,
                'url' => $url
            ]);
        }
        return response()->json(['error' => true]);
    }
}