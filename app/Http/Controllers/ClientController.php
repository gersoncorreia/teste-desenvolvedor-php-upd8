<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreClienteRequest;
use App\Http\Requests\UpdateClienteRequest;
use App\Models\Address;
use App\Models\Client;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use Inertia\Response;

class ClientController extends Controller
{
    public function index(): JsonResponse
    {
        $clientes = Client::with('addresses')->paginate();
        return response()->json($clientes, 200);
    }
    public function create(): Response
    {
        return Inertia::render('Client');
    }

    public function store(StoreClienteRequest $request): RedirectResponse
    {
        $request->validated();
        $client = Client::create($request->all());
        $client->addresses()->create(["address" => $request->address, "state" => $request->state, "city" => $request->city]);
        return Redirect::route('client.create');
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
