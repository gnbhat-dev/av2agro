<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BannerController extends Controller
{
    public function index()
    {
        $banners=Banner::latest()->get();
        return view('admin.banners.index',compact('banners'));
    }
    
    public function store(Request $request)
    {
        $validated=$request->validate([
            'title'=>'required|string|max:255',
            'description'=>'nullable|string',
            'button_text'=>'nullable|string|max:100',
            'button_link'=>'nullable|string|max:255',
            'image'=>'required|image|mimes:jpeg,jpg,png,webp|max:4096'
        ]);

        $imagePath=$request->file('image')->store('banners','public');

        Banner::create([
            'title'=>$validated['title'],
            'description'=>$validated['description'],
            'button_text'=>$validated['button_text'],
            'button_link'=>$validated['button_link'],
            'image'=>$imagePath,
            'is_active'=>true,
        ]);
        return back()->with(
            'success','Banner added successfully.'
        );
    }

    public function destroy(Banner $banner)
    {
        Storage::disk('public')->delete($banner->image);
        $banner->delete();
        return back()->with(
            'success', 'Banner deleted successfully.'
        );
    }
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit',compact('banner'));
    }
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'button_text' => 'nullable|string|max:100',
            'button_link' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:4096'
        ]);

        $data = [
            'title' => $validated['title'],
            'description' => $validated['description'],
            'button_text' => $validated['button_text'],
            'button_link' => $validated['button_link'],
        ];

        if ($request->hasFile('image')) {

            // delete old image
            if ($banner->image && Storage::disk('public')->exists($banner->image)) {
                Storage::disk('public')->delete($banner->image);
            }

            $data['image'] = $request->file('image')->store('banners', 'public');
        }

        $banner->update($data);

        return back()->with('success', 'Banner updated successfully.');
    }
}