<?php

namespace App\Http\Controllers\Qashboard;

use App\Http\Controllers\Controller;
use App\Models\{Registry, Category, Transaction, Installment};
use Illuminate\Http\Request;

class RegistryController extends Controller
{
    public function list()
    {
        $registries = Registry::all();
        return view('registries.list', compact('registries'));
    }

    public function formCreate(Request $request)
    {
        $registry = new Registry();
        $registry->id = 0;

        // return view('registries.form', compact( 'registry', 'titleView'));
        return self::formEdit($registry);
    }

    // public function save(Request $request)
    // {
    //     dd($request->all());
    //     return response()->json(['created'=>'Registro criado com sucesso!'], 201);
    // }

    public function formEdit(Registry $registry)
    {
        $titleView = "Editar Registro";

        if ($registry->id == 0) {
            $titleView = "Novo Registro";
        }

        $categories = Category::all();
        $transactions = Transaction::all();

        return view(
            'registries.form',
            compact('registry', 'titleView', 'categories', 'transactions')
        );
    }

    public function save(Request $request)
    {

        try {
            $data = $request->json()->all();
            $registry = Registry::updateOrCreate(
                ['id' => $data['id'] ?? null],
                [
                    'registry_name' => $data['registry_name'],
                    'description' => $data['description'],
                    'status' => $data['status'],
                    'transaction_id' => $data['transaction_id'],
                    'category_id' => $data['category_id'],
                    'registry_date' => $data['registry_date'],
                ]
            );
            if (!$registry->installments()->exists()) {
                for ($contador = 1; $contador <= $data['quantity_installment']; $contador++) {
                    $registry->installments()->create(
                        [
                            'current_installment' => $contador,
                            'amount' => $data['amount'],
                            'quantity_installment' => $data['quantity_installment'] ?? 1,
                            'status' => 0
                        ]
                    );
                }
            }
            

            // $registry->load('installments');
            // dd($registry);

            return response()->json(['success' => 'Operação realizada com sucesso!'], 200);
        } catch (\Throwable $e) {
            dd($e);
        }

    }
    public function delete(Registry $registry)
    {
        $registry->delete();
        return response()->json(204);
    }














}
