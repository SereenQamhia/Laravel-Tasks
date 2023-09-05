<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;

class FruitController extends Controller
{
 
    public function index()
    {
        $fruits = Fruit::all();
        return view('fruit.index', compact('fruits'));
    }

  
    public function create()
    {
        return view('fruit.create');
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'required',
            'quantity' => 'required|integer',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust validation rules as needed
        ]);
    
        // Upload and store the image
        $image = $request->file('image');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('images/Fruits'), $imageName);
    
        // Create a new Fruit with the image filename
        Fruit::create([
            'name' => $request->name,
            'price' => $request->price,
            'description' => $request->description,
            'quantity' => $request->quantity,
            'image' => $imageName, 
        ]);
    
        return redirect()->route('fruit.index')->with(['success' => 'created successfully
        ']);
    }

 
    public function show(Fruit $fruit)
    {
        //
    }

 
    public function edit( $id)
    {
        $data = Fruit::find($id);
        return view('fruit.edit', compact('data'));
    }

  
    public function update(Request $request, $id)
    {   

        $data['name'] = $request->name;
        $data['description'] = $request->description;
        $data['quantity'] = $request->quantity;
        $data['price'] = $request->price;

        Fruit::where(['id' => $id])->update($data);
        return redirect()->route('fruit.index')->with(['success' => 'Updated successfully
        ']);
    }


    public function destroy($id)
    {
        Fruit::destroy($id);
        return redirect()->route('fruit.index')->with(['success' => 'Deleted successfully
        ']);
    }
}
