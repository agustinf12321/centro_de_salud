<?php

namespace App\Http\Controllers\Office;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

//modelos
use App\Models\Office;

class OfficeController extends Controller
{
   /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $offices = Office::where('id','<>',1)
        ->orwhere('id',1)
        ->orderBy('coffice_name','asc')
        ->paginate(5); 
            //trae lo registros por paginas de a 5
            //si quiero traer todos los registros utiizo ->get()

        return view('offices.index',['offices' => $offices]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('offices.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //validaciones 
        $rules = [
            'coffice_name' => 'required|unique:offices,coffice_name',
        ];

        $messages = [
            'coffice_name.required' => '* El numero es obligatorio *',
            'coffice_name.unique' => '* El numero YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        $coffice_name = strtoupper($request->coffice_name);

        Office::create(
            [
               'coffice_name' => $coffice_name,
            ]

        );

        return redirect()->route('offices.index');
    }

        /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $office = Office::find($id);

        return view('offices.edit', ['office' => $office]);
       
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        
        //validaciones 
        $rules = [
            'coffice_name' => 'required|unique:offices,coffice_name,'.$request->id,
        ];

        $messages = [
            'coffice_name.required' => '* El numero es obligatorio *',
            'coffice_name.unique' => '* El numero YA EXISTE *',
        ];

        $request->validate($rules, $messages);

        //cargo las variables con los datosdel formulario
        $office_id = $request->id;
        $coffice_name = strtoupper($request->coffice_name);

        //buscar el registro de obras sociales para actualizar
        $coffice = Office::find( $office_id );

        $coffice->update(
            [ 
                'coffice_name' => $coffice_name ,
            ]
        );

        return redirect()->route('offices.index');
  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $office = Office::find($id);

        $office->delete();

        return redirect()->route('offices.index');
    }
}
