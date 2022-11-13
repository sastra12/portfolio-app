<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    //
    public function AboutPage()
    {
        $data = About::find(1);
        return view('admin.about_page.about_page_all', compact('data'));
    }

    public function UpdateAbout(Request $request)
    {
        $data = About::find($request->id);
        if ($request->hasFile('about_image')) {
            File::delete(public_path('upload/home_about/' . $data->about_image));
            $image = $request->file('about_image');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(523, 605)->save('upload/home_about/' . $name_generate);

            About::findOrFail($data->id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_description' => $request->long_desc,
                'about_image' => $name_generate
            ]);

            $notification = array(
                'message' => 'About Page Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            About::findOrFail($data->id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'short_desc' => $request->short_desc,
                'long_description' => $request->long_desc,
            ]);

            $notification = array(
                'message' => 'About Page Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
