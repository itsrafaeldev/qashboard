<?php

namespace App\Http\Controllers\Qashboard;

use App\Http\Controllers\Controller;
use App\Models\Registry;
use Illuminate\Http\Request;

class RegistryController extends Controller
{
    public function list(){
        $registries = Registry::all();
        return view('registries.list',compact('registries'));
    }

    public function formCreate(Request $request){
        $titleView = "Novo Registro";

        $registry = new Registry();
        $registry->id = 0;

        return view('registries.form', compact( 'registry', 'titleView'));
    }

    public function save(Request $request)
    {
         

        return response()->json(['created'=>'Registro criado com sucesso!'], 201);
    }

    public function formEdit(Registry $registry)
    {

        $titleView = "Editar Registro";


        return view('registries.form', compact( 'registry',  'titleView'));
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        $registry = Registry::find($data['id'], "id");
        $registry->registry_name = $data['registry_name'];
        $registry->description = $data['description'];
        $registry->save();

        return response()->json(['success' => 'Registro atualizado com sucesso!'], 200);
    }
    public function delete(Registry $registry)
    {
        $registry->delete();
        return response()->json( 204);
    }














}
