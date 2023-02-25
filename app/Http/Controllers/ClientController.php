<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\JsonResponse;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        $clientes = Client::with('addresses')->paginate(5);
        return response()->json($clientes, 200);
    }

    public function store(StoreClienteRequest $request): JsonResponse
    {
        $client = Client::create($request->all());
        $client->addresses()->create(["address" => $request->address, "state" => $request->state, "city" => $request->city]);
        return response()->json($client, 200);
    }

    public function show(Client $cliente): JsonResponse
    {
        return response()->json($cliente, 200);
    }

    public function update(UpdateClienteRequest $request, Client $client): JsonResponse
    {
        $client->update($request->only(['name', 'cpf', 'date_birth', 'sex']));
        $endereco = new Address(["address" => $request->address, "state" => $request->state, "city" => $request->city]);
        $client->addresses()->save($endereco);

        return response()->json($client, 200);
    }

    public function destroy(Client $client)
    {
        $client->delete();
        $client->addresses()->delete();
        return response()->json('Cliente removido com sucesso!', 200);
    }
}
