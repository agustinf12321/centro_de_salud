<?php

namespace App\Http\Controllers\HealthInsurance;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//modelos
use App\Models\HealthInsurance;

class HealthInsuranceController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $insurances = HealthInsurance::where('id','<>',1)
            ->orderBy('cinsurance_name','asc')
            ->paginate(5); 
            //trae lo registros por paginas de a 5
            //si quiero traer todos los registros utiizo ->get()

        return view('healthinsurance.index',['insurances' => $insurances]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('healthinsurance.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones 
        $rules = [
            'cinsurance_name' => 'required|unique:health_insurances,cinsurance_name',
        ];

        $messages = [
            'cinsurance_name.required' => '* El Nombre es obligatorio *',
            'cinsurance_name.unique' => '* El Nombre YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        $cinsurance_name = strtoupper($request->cinsurance_name);

        HealthInsurance::create(
            [
               'cinsurance_name' => $cinsurance_name,
            ]

        );

        return redirect()->route('insurances.index');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $insurance = HealthInsurance::find($id);

        return view('healthinsurance.edit', ['insurance' => $insurance]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
            
        //validaciones 
        $rules = [
            'cinsurance_name' => 'required|unique:health_insurances,cinsurance_name,'.$request->id,
        ];

        $messages = [
            'cinsurance_name.required' => '* El Nombre es obligatorio *',
            'cinsurance_name.unique' => '* El Nombre YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        //cargo las variables con los datosdel formulario
        $insurance_id = $request->id;
        $cinsurance_name = strtoupper($request->cinsurance_name);

        //buscar el registro de obras sociales para actualizar
        $insurance = HealthInsurance::find( $insurance_id );

        $insurance->update(
            [ 
                'cinsurance_name' => $cinsurance_name ,
            ]
        );

        return redirect()->route('insurances.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $insurance = HealthInsurance::find($id);

        $insurance->delete();

        return redirect()->route('insurances.index');
    }
}
