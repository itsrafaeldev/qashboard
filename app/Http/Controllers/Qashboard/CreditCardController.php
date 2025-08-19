<?php

namespace App\Http\Controllers\Qashboard;

use App\Http\Controllers\Controller;
use App\Models\CreditCard;
use Illuminate\Http\Request;

class CreditCardController extends Controller
{
    public function list(){
        $creditCards = CreditCard::all();
        return view('credit-cards.list',compact('creditCards'));
    }

    public function formCreate(Request $request){
        $titleView = "Adicionar Cartão de Crédito";

        $creditCard = new CreditCard();
        $creditCard->id = 0;

        return view('credit-cards.form', compact( 'creditCard', 'titleView'));
    }

    public function save(Request $request)
    {
        $data = $request->json()->all();

        $newCreditCard = new CreditCard();
        $newCreditCard->name = $data['name'];
        $newCreditCard->final_number = $data['final_number'];
        $newCreditCard->closing_day = $data['closing_day'];
        $newCreditCard->user_id = 6;
        $newCreditCard->save();

        return response()->json(['created'=>'Cartão de Crédico adicionado com sucesso!'], 201);
    }

    public function formEdit(CreditCard $creditCard)
    {
        $titleView = "Editar Cartão de Crédito";
        return view('credit-cards.form', compact( 'creditCard',  'titleView'));
    }

    public function update(Request $request)
    {
        $data = $request->json()->all();
        $creditCard = CreditCard::find($data['id'], "id");
        $creditCard->name = $data['name'];
        $creditCard->final_number = $data['final_number'];
        $creditCard->closing_day = $data['closing_day'];
        $creditCard->save();

        return response()->json(['success' => 'Cartão de Crédico atualizado com sucesso!'], 200);
    }
    public function delete(CreditCard $creditCard)
    {
        $creditCard->delete();
        return response()->json( 204);
    }














}
