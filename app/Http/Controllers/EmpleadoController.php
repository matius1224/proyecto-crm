<?php

namespace App\Http\Controllers;
use App\Models\Compañia;
use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        
        $datos=Empleado::join('compañias', 'compania_id', '=', 'compañias.id')
        ->select('*','compañias.nombre')->get();
        return view('Empleados.empleados',
    [ 'datos'=> $datos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $validated = $request->validate([
            'primer_nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email:rfc,dns',
            'compania_id'=> 'required',
            
            'telefono' => 'required',
           
        ]);

        
                    $user = Empleado::create([
                        'primer_nombre' => $request->primer_nombre,
                        'apellido' => $request->apellido,
                        'compania_id' => $request->compania_id,
                        'correo' => $request->correo,
                        'telefono' => $request->telefono
                    ]);
                
                    return  redirect()->back()->with('message', 'Registro creado');
               
             
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $compañias=Compañia::get();  
        return view('Empleados.CrearEmpleado',
    ['compañias'=>$compañias]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
        
        $empleado=Empleado::where('id',$request->id)->first();
        // dd($empleado->compania_id);
        $compañia=Compañia::where('id',$empleado->compania_id)->first();
        $compañias=Compañia::get();

        return view('Empleados.EditarEmpleados',
    [ 'empleado'=>$empleado,
'compañia'=>$compañia,
'compañias' => $compañias]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $validated = $request->validate([
            'primer_nombre' => 'required',
            'apellido' => 'required',
            'correo' => 'required|email:rfc,dns',
            'compania_id'=> 'required',
            
            'telefono' => 'required',
           
        ]);


        try {
            $emp = Empleado::find($request->id);
                $empleado = Empleado::where('id',$emp->id)->update([
                    'primer_nombre' => $request->primer_nombre,
                    'apellido' => $request->apellido,
                    'compania_id' => $request->compania_id,
                    'correo' => $request->correo,
                    'telefono' => $request->telefono
                ]);
            
                return  redirect()->back()->with('message', 'Registro creado');

           } catch (QueryException $e) {
               return $e;
           }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $emp =Empleado::find($request->id);
        $emp->delete();
       
        return  redirect()->back()->with('message', 'Registro eliminar');
   
    
    }
}
