<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Category;








class CarController extends Controller
{
    public function allcars()
    {$cars=Car::get();
    return view('admin.cars',compact('cars'));}

    
    
    
    public function create(){
    return view('admin.addCar');}
   
    public function store(Request $request){
        $car=new car();
        $car->title=$request->title;
        $car->content=$request->content;
        $car->Luggage=$request->luggage;
        $car->doors=$request->doors;
        $car->passengers=$request->passengers;
        $car->price=$request->price;
        $car->active=$request->active;
        $car->image_name=$request->file('image')->getClientOriginalName();
        $car->image_data=file_get_contents($request->file('image')->getpathname());
        $car->category_id=$request->category;
        $car->save();
      return "inserted";
    }


    public function edit(string $id){
        $cars= car::findOrfail($id);
        return view ('admin.editCar');
    }

public function update(Request $request,string $id):RedirectResponse
{$cars= car::findOrfail($id);
 
        $cars->title=$request->title;
        $cars->content=$request->content;
        $cars->Luggage=$request->luggage;
        $cars->doors=$request->doors;
        $cars->passengers=$request->passengers;
        $cars->price=$request->price;
        $cars->active=$request->active;
        $cars->image_name=$request->file('image')->getClientOriginalName();
        $cars->image_data=file_get_contents($request->file('image')->getpathname());
        $cars->category_id=$request->category;
        $cars->save();
     return redirect('cars');

}

public function destroy(Request $request):RedirectResponse{
    $id=$request->id;
    $car=Car::findOrFail($id);
    $car->delete();
        return redirect('cars');
    
}
public function category_car(){
    $category= Car::find(1)->category;
    echo  $category->category_name;
    
    }
    public function all()
    {$cars=Car::paginate(10);
    return view('listing',compact('cars'));}

    public function lastcar(){
    $cars=Car::all()->where('id', '>', 38)
    ;
    return view('index',compact('cars'));}
    public function show(string $id){
        $car=Car::findOrFail($id);
        return view('single',compact('car'));
    }
}
