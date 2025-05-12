<?php

namespace App\Http\Controllers;

use App\Models\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $clients = Client::all();
        return view('clients.list', ['data'=> $clients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('clients.form');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email',
            'cpf' => 'required|string|min:11|max:11|unique:clients,cpf',
            'phone' => 'required|string|min:11|max:20',
        ]);
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'phone' => $request->phone,

        ];

        Client::create($data);
        return redirect("clients");
    }

    /**
     * Display the specified resource.
     */
    public function show(Client $client)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
         $client = Client::find($id);
        if (!$client) {
            return redirect("clients")->with('error', 'Client not found');
        }
        return view('clients.form', ['client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $client = Client::find($id);
        if (!$client) {
            return redirect("clients")->with('error', 'Client not found');
        }
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:clients,email,' . $client->id,
            'cpf' => 'required|string|min:11|max:11|unique:clients,cpf,' . $client->id,
            'phone' => 'required|string|min:11|max:20',
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'phone' => $request->phone,

        ];

        $client->update($data);

        return redirect("clients");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $client = Client::find($id);
        if (!$client) {
            return redirect("clients")->with('error', 'Client not found');
        }
        $client->delete();
        return redirect("clients");
    }

    public function search(Request $request){
        if (!empty($request->value)) {
            $value = $request->value;
            $type = $request->type;

            $data = Client::where($type, 'like', "%$value%")->get();
            if (empty($data)) {
                return view("clients.list", ['data' => $data])->with('error', 'Nenhum resultado encontrado.');
            }
        }else{
            $data = Client::All();
        }

        return view("clients.list", ['data' => $data]);
    }
}
