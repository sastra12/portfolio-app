<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\HomeSlide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Image;

class HomeSliderController extends Controller
{
    //
    public function HomeSlider()
    {
        $data = HomeSlide::find(1);
        return view('admin.home_slide.home_slide_all', compact('data'));
    }

    public function UpdateSlider(Request $request)
    {
        $homeSlide = HomeSlide::find($request->id);
        if ($request->hasFile('home_slide')) {
            File::delete(public_path('upload/home_slide/' . $homeSlide->home_slide));
            $image = $request->file('home_slide');
            $name_generate = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            Image::make($image)->resize(636, 852)->save('upload/home_slide/' . $name_generate);

            HomeSlide::findOrFail($homeSlide->id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
                'home_slide' => $name_generate
            ]);

            $notification = array(
                'message' => 'Home Slide Updated With Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        } else {
            HomeSlide::findOrFail($homeSlide->id)->update([
                'title' => $request->title,
                'short_title' => $request->short_title,
                'video_url' => $request->video_url,
            ]);

            $notification = array(
                'message' => 'Home Slide Updated Without Image Successfully',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
