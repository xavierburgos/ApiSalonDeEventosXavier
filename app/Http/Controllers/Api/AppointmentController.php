<?php

namespace App\Http\Controllers\Api;
use App\Http\Requests\StoreAppointment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\appointments;
use Symfony\Component\HttpFoundation\Response;

use Exception;


class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $appointments = appointments::all();
        return response()->json([
         "appointments" => $appointments
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
 
    public function store(StoreAppointment $request)
    {
        try {
            //alta
            $appointments = new appointments();
            $appointments->start_time = $request->start_time;
            $appointments->end_time = $request->end_time;
            $appointments->date = $request->date;
            $appointments->employee_id = $request->employee_id;
            $appointments->client_id = $request->client_id;
            $appointments->branch_id = $request->branch_id;
            $appointments->save();

            //respuesta exitosa
            return response($appointments, Response::HTTP_CREATED);
            } catch (Exception $e) {
                return response()->json(['Error ta mal algo' => $e->getMessage()]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(appointments $appointments)
    {
        return $appointments;
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreAppointment $request, appointments $appointments)
    {
        try{
            $appointments->start_time = $request->start_time;
            $appointments->end_time = $request->end_time;
            $appointments->date = $request->date;
            $appointments->employee_id = $request->employee_id;
            $appointments->client_id = $request->client_id;
            $appointments->branch_id = $request->branch_id;
            $appointments->save();
            $data = [
                'message' => 'Se guardo correctamente',
                'appointments' => $appointments
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
    public function destroy(appointments $appointments)
    {
        $appointments->delete();
        $data = [
            'message' => 'Se elimino correctamente',
            'appointments' => $appointments
        ];
        return response()->json($data);
    }
}
