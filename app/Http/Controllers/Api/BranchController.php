<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\StoreBranch;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\branches;
use Symfony\Component\HttpFoundation\Response;


class BranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches = branches::all();
        return response()->json([
         "branches" => $branches
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBranch $request)
    {
        try {  
            $branches = new branches();
            $branches->name = $request->name;
            $branches->address = $request->address;
            $branches->save();

            //respuesta exitosa
            return response($branches, Response::HTTP_CREATED);
        }catch (Exception $e) {
            return response()->json(['Error, rellena los campos' => $e->getMessage()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(branches $branches)
    {
        return $branches; 
    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, branches $branches)
    {
        try{
            $branches->name = $request->name;
            $branches->address = $request->address;
            $branches->save();
            $data = [
                'message' => 'Se guardo correctamente',
                'branches' => $branches
            ];
            return response()->json($data);
        }catch (Exception $e) {
            return response()->json(['Error ta mal algo' => $e->getMessage()]);
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(branches $branches)
    {
        $branches->delete();
        $data = [
            'message' => 'Se elimino correctamente',
            'branches' => $branches
        ];
        return response()->json($data);
    }
}
