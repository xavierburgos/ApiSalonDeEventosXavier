<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\clients;
use App\Http\Requests\StoreClient;
use Symfony\Component\HttpFoundation\Response;
use Exception;


class ClientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClient $request)
    {
        try {   
            //alta del usuario
            $client = new clients();
            $client->name = $request->name;
            $client->lastname = $request->lastname;
            $client->age = $request->age;
            $client->email = $request->email;
            $client->tel = $request->tel;
            $client->save();
            //respuesta exitosa
            return response($client, Response::HTTP_CREATED);
        }catch (Exception $e) {
            return response()->json(['Error, rellena los campos' => $e->getMessage()], 400);
        }
    }

    //all-clients
    public function index() {
        $clients = clients::all();
        return response()->json([
         "clients" => $clients
        ]);
     }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(clients $client)
    {
        return $client; 
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreClient $request, clients $client)
    {        
        try{
            $client->name = $request->name;
            $client->lastname = $request->lastname;
            $client->age = $request->age;
            $client->email = $request->email;
            $client->tel = $request->tel;
            $client->save();
            $data = [
                'message' => 'Se guardo correctamente',
                'client' => $client
            ];
          return response()->json($data);
        }
        catch (Exception $e) {
            return response()->json(['Error ta mal algo' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(clients $client)
    {

        $client->delete();
        $data = [
            'message' => 'Se elimino correctamente',
            'client' => $client
        ];
        return response()->json($data);
    }
}
