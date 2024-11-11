<?php

namespace App\Http\Controllers\Speciality;

use App\Models\Speciality;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $specialities = Speciality::where('id','<>',1)
            ->orderBy('cspeciality_name','asc')
            ->paginate(5); 
            //trae lo registros por paginas de a 5
            //si quiero traer todos los registros utiizo ->get()

        return view('Speciality.index',['specialities' => $specialities]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Speciality.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones 
        $rules = [
            'cspeciality_name' => 'required|unique:specialities,cspeciality_name',
        ];

        $messages = [
            'cspeciality_name.required' => '* El Nombre es obligatorio *',
            'cspeciality_name.unique' => '* El Nombre YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        $cspeciality_name = strtoupper($request->cspeciality_name);

        Speciality::create(
            [
               'cspeciality_name' => $cspeciality_name,
            ]

        );

        return redirect()->route('specialities.index');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $speciality = Speciality::find($id);

        return view('Speciality.edit', ['speciality' => $speciality]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
            
        //validaciones 
        $rules = [
            'cspeciality_name' => 'required|unique:specialities,cspeciality_name,'.$request->id,
        ];

        $messages = [
            'cspeciality_name.required' => '* El Nombre es obligatorio *',
            'cspeciality_name.unique' => '* El Nombre YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        //cargo las variables con los datosdel formulario
        $speciality_id = $request->id;
        $cspeciality_name = strtoupper($request->cspeciality_name);

        //buscar el registro de especialidades para actualizar
        $speciality = Speciality::find( $speciality_id );

        $speciality->update(
            [ 
                'cspeciality_name' => $cspeciality_name ,
            ]
        );

        return redirect()->route('specialities.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $speciality = Speciality::find($id);

        $speciality->delete();

        return redirect()->route('specialities.index');
    }
}
