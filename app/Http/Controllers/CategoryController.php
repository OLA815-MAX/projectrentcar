<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Http\RedirectResponse;
use App\Models\Car;

class CategoryController extends Controller
{ public function allcat()
    {$categories=Category::get();
    return view('admin.categories',compact('categories'));}
    
    public function create()
    {return view ('admin.addCategory');}


    public function store(Request $request):RedirectResponse
    {
    $new_cat= new category();
    $new_cat->category_name=$request->name;
   $new_cat->SAVE();
    return  redirect('categories');

}
public function edit(string $id)
{ $category= category::findOrfail($id);
return view('admin.editcategory',compact('category'));}

public function update(Request $request,string $id):RedirectResponse
{$category= category::findOrfail($id);
 $category->category_name=$request->name;
 $category->SAVE();

     return redirect('categories');

}
public function destroy(Request $request):RedirectResponse{
    $id=$request->id;
    $category=Category::findOrFail($id);
    $category->delete();{
        return redirect('categories');
    }

}

public function car_category(){
    $cars=Category::find(1)->cars;
    foreach($cars as $car){
    echo "car category is ". $car->image_name;
    echo"<br>";
}

}}