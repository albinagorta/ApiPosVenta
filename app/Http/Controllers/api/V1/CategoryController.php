<?php

namespace App\Http\Controllers\api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;

class CategoryController extends Controller
{

    public function index()
    {
        $cat = Category::all();
        return $cat;
    }

    public function store(Request $request)
    {
        $cat = new Category();
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->state = $request->state;
        $cat->save();
        return $cat;
    }

    public function show($id)
    {
        $cat = Category::find($id);
        return $cat; 
    }

    public function update(Request $request, $id)
    {
        $cat = Category::findOrFail($request->id);
        $cat->name = $request->name;
        $cat->description = $request->description;
        $cat->state = $request->state;
        $cat->save();

        return $cat;
    }


    public function destroy($id)
    {
        $cat = Category::find($id);
        category::destroy($id);

        return  $cat;

    }
}
