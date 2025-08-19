<?php

namespace App\Http\Controllers\Qashboard;

use App\Http\Controllers\Controller;
use App\Models\{Registry, Category, Transaction, Installment};
use App\Models\CreditCard;
use DateTime;
use Illuminate\Http\Request;

class RegistryController extends Controller
{
    public function list()
    {
        $registries = Registry::all();
        return view('registries.list', compact('registries'));
    }

    //formulario despesas
    public function formCreateExpenses(Request $request)
    {
        $registry = new Registry();
        $registry->id = 0;
        $registry->transaction_id = 2;

        // return view('registries.form', compact( 'registry', 'titleView'));
        return self::formEdit($registry);
    }

    //formulario receitas
    public function formCreateRevenues(Request $request)
    {
        $registry = new Registry();
        $registry->id = 0;
        $registry->transaction_id = 1;


        // return view('registries.form', compact( 'registry', 'titleView'));
        return self::formEdit($registry);
    }

    public function formEdit(Registry $registry)
    {
        $titleView = "Editar Registro";

        if ($registry->id == 0) {
            $titleView = "Novo Registro";
        }

        $categories = Category::all();
        $transactions = Transaction::all();
        $credit_cards = CreditCard::all();

        return view(
            'registries.form',
            compact('registry', 'titleView', 'categories', 'transactions', 'credit_cards')
        );
    }


    public function updateOrCreateRegistry(Request $request)
    {

        $data = $request->json()->all();

        $competence = new DateTime($data['registry_date']);
        $success = 'Categoria criada com sucesso!';
        $statusHttp = 201;

        if($data['id'] != 0){
            $success = 'Categoria atualizada com sucesso!';
            $statusHttp = 204;

        }



        $registry = Registry::updateOrCreate(
            ['id' => $data['id'] ?? null],
            [
                'registry_name' => $data['registry_name'],
                'description' => $data['description'],
                'status' => $data['status'],
                'transaction_id' => $data['transaction_id'],
                'category_id' => $data['category_id'],
                'registry_date' => $data['registry_date'],
                'is_credit_card' => $data['is_credit_card'],
                'credit_card_id' => $data['credit_card_id'],
                'competence' => $competence->format('Y-m')
            ]
        );

        if ($registry->transaction_id == 2) {
             //transacion_id = 2 = 'DESPESA'
            self::saveExpenses(
                $data['quantity_installment'],
                $data['amount'],
                $registry,
                $data['credit_card_id'],
                $competence
            );
        }


        return response()->json(['success'=>$success, $statusHttp]);
    }

    public function saveExpenses($quantity_installment, $amount, $registry, $credit_card_id, $competence)
    {

        try {
            // ADICIONAR:
            // CRIAR TABELA/MODEL PARA CARTAO DE CREDITO, ONDE SERAO SALVOS O NOME DO CARTAO, NUMERO FINAL DO CARTAO, DATA DE FECHAMENTO DA FATURA
            // AO GRAVAR UM REGISTRO, SE O CHECKBOX ESTIVER MARCADO, ADICIONE UMA FLAG CARTAO-CREDITO AO REGISTRO;
            // SE O CHECKBOX ESTIVER MARCADO, MOSTRAR UM NOVO INPUT PARA SELECIONAR O CARTÃO DE CRÉDITO ADICIONADO;
            // COMPARAR A DATA INFORMADA AO GRAVAR O REGISTRO E A DATA DE FECHAMENTO DA FATURA DO CARTAO INFORMADO (SE INFERIOR, COMPETENCIA INICIAL = MES ATUAL,
            // SE SUPERIOR, COMPETENCIA INICIAL = MES ATUAL + 1);

            if (!$registry->installments()->exists()) {

                $credit_card = CreditCard::where('id', $credit_card_id)->first();
                $day_purchase = explode('-', $registry->registry_date)[2]; //[2] == data da compra

                for ($contador = 1; $contador <= $quantity_installment; $contador++) {

                    $competence = $competence->modify('+1 month');

                    if ($day_purchase < $credit_card->closing_day && $contador - 1 == 0) {
                        $competence = $competence->modify('-1 month');
                    }

                    $registry->installments()->create(
                        [
                            'current_installment' => $contador,
                            'amount' => $amount,
                            'quantity_installment' => $data['quantity_installment'] ?? 1,
                            'status' => 0,
                            'competence' => $competence->format('Y-m')
                        ]
                    );
                }
            }

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
