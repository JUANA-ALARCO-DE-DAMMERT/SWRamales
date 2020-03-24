<?php

namespace App\Http\Controllers;

use App\Incidencia;
use Illuminate\Http\Request;
use DB;

class TecnicoincController extends Controller
{
    public function index()
    {
        $data = DB::table('incidencia')
                    //->join('trabajador','trabajador.trab_id','incidencia.inc_agente')
                    ->get();
        return view('tecnicoinc.index',['incidencia'=>$data]);
    }
    public function edit(Request $request, $id)
    {
        $incidencia = Incidencia::find($id);
        $tecnicos = DB::table('trabajador')
                    ->join('role_user','role_user.user_id','trabajador.trab_id')
                    ->where('role_user.role_id','=','2')
                    ->get();
        return view ('tecnicoinc.edit',['inc'=>$incidencia,'tecnicos'=>$tecnicos]);
    }

    public function update(Request $request, $id)
    {
        $incidencia = Incidencia::find($id);
        $request->all();
        $incidencia->update($request->all());
        return redirect()->route('tecnicoinc.index')->with('status', 'Incidencia atendida correctamente!');
    }
}
