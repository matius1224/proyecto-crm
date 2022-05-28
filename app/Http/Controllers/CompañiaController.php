<?php

namespace App\Http\Controllers;
// use App\Http\Request;
use App\Models\Compañia;
use App\Models\Empleado;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
// use Illuminate\Http\Request ;

class CompañiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos=Compañia::get();
        return view('Compañias.compañias',[
            'datos'=>$datos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *@param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
        $validated = $request->validate([
            'nombre' => 'required',
            'correo' => 'required|email:rfc,dns',
            
            'pag' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100|image|mimes:jpeg,png,jpg',
        ]);
               
       
        $file = $request->file('logo');
        // dd($request->file('logo'));
        if($file){
            $request->logo= $request->file('logo')->store('public');
        }
        
                    $user = Compañia::create([
                        'nombre' => $request->nombre,
                        'correo' => $request->correo,
                        'logo' => $request->logo,
                        'pagina_web' => $request->pag,
                    ]);
                
                     return redirect()->back()->with('message', 'Registro creado');
               
             
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
       
        return view('Compañias.CrearCompañia');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // dd($request->id);
        $compañia=Compañia::where('id',$request->id)->first();

        return view('Compañias.EditarCompañias',
    [ 'compañia'=>$compañia]);
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
            'nombre' => 'required',
            'correo' => 'required|email:rfc,dns',
            
            'pag' => 'required',
            'logo' => 'dimensions:min_width=100,min_height=100|image|mimes:jpeg,png,jpg',
        ]);


        try {
            $comp = Compañia::find($request->id);
            $file = $request->file('logo');
        // dd($comp);
        if($file){
            $request->logo= $request->file('logo')->store('public');
        }
            if($file){
                $compañia = Compañia::where('correo',$comp->correo)->update([
                    'nombre' => $request->nombre,
                    'correo' => $request->correo,
                    'logo' => $request->logo,
                    'pagina_web' => $request->pag
                   
                ]);
            }else{
                $compañia = Compañia::where('correo',$comp->correo)->update([
                    'nombre' => $request->nombre,
                    'correo' => $request->correo,
                    'pagina_web' => $request->pag
                   
                ]);
            }
            
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
        $comp =Compañia::find($request->id);
        // $img=Storage::delete($comp->logo);
        $img= Storage::disk('public')->delete($comp->logo); 
        $comp->delete();
       
        return  redirect()->back()->with('message', 'Registro eliminado');
   
    
    }
}
