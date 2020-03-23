<?php

namespace App\Http\Controllers;

use App\trabajador;
use App\RoleUser;
use Illuminate\Http\Request;
use DB;

class AgenteController extends Controller
{
    public function index()
    {
        $data = DB::table('trabajador')
                ->join('role_user','role_user.user_id','trabajador.trab_usuario')
                ->where('role_user.role_id','=','2')
                ->get();
        return view('incidencia.index',['incidencia'=>$data]);
    }

    public function create()
    {
        return view('incidencia.create');
    }

    public function store(Request $request)
    {
        // $this->validate($request,[
        //     'apod_dni' => 'required|unique:apoderado,apod_dni|numeric|digits:8',
        //     'apod_ape' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
        //     'apod_nom' => 'required|max:50|regex:/^[\pL\s\-]+$/u',
        //     'apod_sexo' => 'required',
        //     'apod_email' => 'nullable',
        //     'apod_tel' => 'nullable|min:7|max:13'
        // ]);
        $data = $request->all();
        $inc = Incidencia::create($data);
        return redirect()->route('incidencia.index')->with('status', 'Incidencia agregado correctamente!');
    }

    public function show(Apoderado $apoderado)
    {
        //
    }

    public function edit($id)
    {
        $apoderado = Apoderado::find($id);
        return view ('apoderado.edit',['apod'=>$apoderado]);
    }

    public function update(Request $request, $id)
    {
        $apoderado = Apoderado::find($id);
        $request->all();
        $apoderado->update($request->all());
        return redirect()->route('apoderado.index')->with('status', 'Apoderado editado correctamente!');
    }

    public function destroy(Request $request, $id)
    {
        $apoderado = Apoderado::destroy($id);
        return redirect()->route('apoderado.index')->with('status', 'Apoderado eliminado correctamente!');
    }

    public function consultarApod($dni){
        $apoderado = DB::table('apoderado')
                        ->where('apoderado.apod_dni','=',$dni)
                        ->get();
        return $apoderado;
    }

}
