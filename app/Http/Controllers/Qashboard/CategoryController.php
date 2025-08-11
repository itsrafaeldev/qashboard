<?php

namespace App\Http\Controllers\Qashboard;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function list(){
        $categories = Category::all();
        return view('categories.list',compact('categories'));
    }

    public function formCreate(Request $request){
        $titleView = "Criar Categoria";

        $category = new Category();
        $category->id = 0;

        return view('categories.form', compact( 'category', 'titleView'));
    }

    public function save(Request $request)
    {
        $data = $request->json()->all();

        $newCategory = new Category();
        $newCategory->category_name = $data['category_name'];
        $newCategory->description = $data['description'];
        $newCategory->save();

        return response()->json(['created'=>'Categoria criada com sucesso!'], 201);
    }

    public function formEdit(Category $category)
    {

        $titleView = "Editar Categoria";


        return view('categories.form', compact( 'category',  'titleView'));
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        $category = Category::find($data['id'], "id");
        $category->category_name = $data['category_name'];
        $category->description = $data['description'];
        $category->save();

        return response()->json(['success' => 'Categoria atualizada com sucesso!'], 200);
    }
    public function delete(Category $category)
    {
        $category->delete();
        return response()->json( 204);
    }














}
