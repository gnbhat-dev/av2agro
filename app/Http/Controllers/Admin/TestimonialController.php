<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TestimonialController extends Controller
{
    
    //Display a listing of the resource.
    
    public function index()
    {
        $testimonials = Testimonial::orderBy('sort_order')->paginate(15);
        return view('admin.testimonials.index', compact('testimonials'));
    }
  
    //Show the form for creating a new resource.

    public function create()
    {
        return view('admin.testimonials.create');
    }
    
    //Store a newly created resource in storage.
    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'location' => 'nullable|string|max:100',
            'message' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpeg,jpg,png|max:1024',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? 0;
        Testimonial::create($validated);

        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial added.');
    }

    // Display the specified resource.

    public function show(Testimonial $testimonial)
    {
        return redirect()->route('admin.testimonials.edit', $testimonial);
    }
    
    //Show the form for editing the specified resource.

    public function edit(Testimonial $testimonial)
    {
        return view('admin.testimonials.edit', compact('testimonial'));
    }
    
    // Update the specified resource in storage.

    public function update(Request $request, Testimonial $testimonial)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:100',
            'location' => 'nullable|string|max:100',
            'message' => 'required|string|max:1000',
            'photo' => 'nullable|image|mimes:jpg,jpeg,png|max:1024',
            'is_active' => 'nullable|boolean',
            'sort_order' => 'nullable|integer|min:0',
        ]);
        if ($request->hasFile('photo')) {
            if ($testimonial->photo) {
                Storage::disk('public')->delete($testimonial->photo);
            }
            $validated['photo'] = $request->file('photo')->store('testimonials', 'public');
        }
        $validated['is_active'] = $request->boolean('is_active', true);
        $validated['sort_order'] = $validated['sort_order'] ?? $testimonial->sort_order;
        $testimonial->update($validated);
        return redirect()->route('admin.testimonials.index')
            ->with('success', 'Testimonial updated.');
    }

    // Remove the specified resource from storage.

    public function destroy(Testimonial $testimonial)
    {
        if ($testimonial->photo) {
            Storage::disk('public')->delete($testimonial->photo);
        }
        $testimonial->delete();
        return redirect()->route('admin.testimonials.index')->with('success', 'Testimonial deleted.');
    }
}
