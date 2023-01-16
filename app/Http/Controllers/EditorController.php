<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EditorController extends Controller
{

    public function store(Request $request) {
        // $this->uploadImage($request);
        dd($request->all());
    }

    public function uploadImage(Request $request) {
        if ($request->hasFile('upload')) {
            $originName = $request->file('upload')->getClientOriginalName();
            $fileName = pathinfo($originName, PATHINFO_FILENAME);
            $extension = $request->file('upload')->getClientOriginalExtension();
            $fileName = $fileName."_".md5(microtime()).".".$extension;

            $request->file('upload')->move(public_path('media'), $fileName);

            $url = asset('media/'.$fileName);

            return response()->json([
                'filename'=> $fileName,
                'uploaded' => 1,
                'url' => $url
            ]);

        }
    }

}
