<?php

namespace App\Http\Controllers;

use App\Models\Client; // Importe o modelo correspondente
use App\Models\Payment; // Importe o modelo correspondente
use App\Models\Boleto; // Importe o modelo correspondente
use App\Models\Card;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    // PAGAMENTOS
    public function getPagamentos()
    {
        $pagamentos = Payment::get();
        return $pagamentos;
    }

    public function postPagamento(Request $request)
    {
        $request->validate([
            'client_id' => 'required|integer',
            'amount' => 'required|numeric',
            'type' => 'required|string',
            'card_number' => 'nullable|string',
            'card_name' => 'nullable|string',
            'card_cvv' => 'nullable|string',
            'card_expiration' => 'nullable|string',
        ]);

        $type = $request->input('type');

        if ($type == 'boleto') {
            $numeroBoleto = $this->generateBoletoNumber();
            $boleto = Boleto::create([
                'client_id' => $request->input('client_id'),
                'numero_boleto' => $numeroBoleto,
            ]);

            $payment = Payment::create([
                'client_id' => $request->input('client_id'),
                'amount' => $request->input('amount'),
                'type' => $type,
                'boleto_id' => $boleto->id,
                'status' => 'pending',
            ]);

            return response()->json(['message' => 'Payment created', 'boleto_number' => $numeroBoleto], 201);
        } elseif ($type == 'cartao') {
            $card = Card::firstOrCreate(
                ['card_number' => $request->input('card_number')],
                [
                    'client_id' => $request->input('client_id'),
                    'card_name' => $request->input('card_name'),
                    'card_expiration' => $request->input('card_expiration'),
                    'card_cvv' => $request->input('card_cvv'),
                ]
            );

            $payment = Payment::create([
                'client_id' => $request->input('client_id'),
                'amount' => $request->input('amount'),
                'type' => $type,
                'card_id' => $card->id,
                'status' => 'paid',
            ]);

            return response()->json(['message' => 'Pagamento realizado com sucesso!'], 201);
        } else {
            return response()->json(['error' => 'Invalid payment type'], 400);
        }
    }

    private function generateBoletoNumber()
    {
        return sprintf('%012d', rand(1, 999999999999));
    }

    public function updatePagamento(Request $request, $id)
    {
        // $request->validate([
        //     'client_id' => 'required|integer',
        //     'amount' => 'required|numeric',
        //     'type' => 'required|string',
        //     'card_id' => 'nullable|integer',
        //     'boleto_id' => 'nullable|integer',
        //     'status' => 'required|string',
        // ]);

        $payment = Payment::findOrFail($id);

        $payment->amount = $request->input('amount') ?? $payment->amount;
        $payment->type = $request->input('type') ?? $payment->type;
        $payment->card_id = $request->input('card_id') ?? $payment->card_id;
        $payment->boleto_id = $request->input('boleto_id') ?? $payment->boleto_id;
        $payment->status = $request->input('status')?? $payment->status;

        $payment->save();

        return response()->json(['message' => 'Payment updated', 'payment' => $payment], 200);
    }

    public function deletePagamento($id)
    {
        $payment = Payment::findOrFail($id);
        $payment->delete();

        return response()->json(['message' => 'Payment deleted'], 200);
    }

    // CLIENTES
    public function getClientes()
    {
        $clientes = Client::all();
        // return view('dados-clientes', ['clientes' => $clientes]);
        return response()->json($clientes);
    }

    public function postCliente(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:clients',
            'cpf' => 'required|string|max:14|unique:clients',
        ]);

        $cliente = Client::create([
            'nome' => $request->input('nome'),
            'email' => $request->input('email'),
            'cpf' => $request->input('cpf'),
        ]);

        return redirect('/pagamento')->with('client_id', $cliente->id);
    }

    // public function postCliente(Request $request)
    // {
    //     $clientes = Client::create([
    //         'nome' => $request->input('nome'),
    //         'email' => $request->input('email'),
    //         'cpf' => $request->input('cpf'),
    //     ]);

    //     return view('welcome', ['cliente' => $clientes->id]);
    //     // return response()->json(['message' => 'Cliente criado com sucesso', 'cliente' => $cliente], 201);
    // }
    
    public function updateCliente(Request $request, $id)
    {

        $cliente = Client::findOrFail($id);

        $cliente->nome = $request->input('nome');
        $cliente->email = $request->input('email');
        $cliente->cpf = $request->input('cpf');

        $cliente->save();

        return response()->json(['message' => 'Cliente atualizado com sucesso', 'cliente' => $cliente], 200);
    }

    public function deleteCliente($id)
    {
        $cliente = Client::findOrFail($id);
        $cliente->delete();

        return response()->json(['message' => 'Cliente deletado com sucesso'], 200);
    }

    public function getPayments($id)
    {
        $cliente = Client::findOrFail($id);
        return view('pagamentos', ['cliente' => $cliente]);
    }
}