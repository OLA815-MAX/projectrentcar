<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Testimonial;
use Illuminate\Http\RedirectResponse;
class TestimonialController extends Controller
{
    //
    public function alltest()
    {$Testimonials=Testimonial::get();
    return view('admin.testimonials',compact('Testimonials'));}


    public function create()
    {return view ('admin.addTestimonials');}


    public function store(Request $request):RedirectResponse
    {   $request->validate([
        'name' => 'required',
        'published' => 'sometimes|in:on,1',
    ]);

    $Testimonial= new testimonial();
    $Testimonial->name=$request->name;
    $Testimonial->Position	=$request->postion;
    $Testimonial->content=$request->content;
    $Testimonial->published=$request->boolean('published');
    $Testimonial->image_name=$request->file('image')->getClientOriginalName();
    $Testimonial->image_data=file_get_contents($request->file('image')->getpathname());
    
    
    
    $Testimonial->SAVE();
    return redirect('alltest');

}
public function edit(string $id)
{ $testimonial=Testimonial::findOrfail($id);
return view('admin.editTestimonials',compact('testimonial'));}

public function update(Request $request,string $id):RedirectResponse
{$Testimonial= Testimonial::findOrfail($id);
    $Testimonial->name=$request->name;
    $Testimonial->Position=$request->position;
    $Testimonial->content=$request->content;
    $Testimonial->published=$request->boolean('published');
    $Testimonial->image_name=$request->image;
    $Testimonial->image_data=$request->image;

 $Testimonial->SAVE();
     return redirect('alltest');

}
public function destroy(Request $request):RedirectResponse{
    $id=$request->id;
    $testimonial=Testimonial::findOrFail($id);
    $testimonial->delete();
        return redirect('alltest');
    
}
public function show(){
    $Testimonials=Testimonial::get();
    return view('testimonials',compact('Testimonials'));
}
}
