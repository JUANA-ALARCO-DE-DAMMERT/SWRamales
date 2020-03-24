<?php

namespace App\Http\Controllers;

use App\Incidencia;
use Illuminate\Http\Request;
use DB;

class AgenteincController extends Controller
{
    public function index()
    {
        $data = DB::table('incidencia')
                    ->join('trabajador','trabajador.trab_id','incidencia.inc_agente')
                    ->get();
        return view('incidencia.index',['incidencia'=>$data]);
    }

    public function create()
    {
        $data = DB::table('trabajador')
                        ->join('role_user','role_user.user_id','trabajador.trab_id')
                        ->where('role_user.role_id','=','3')
                        ->get();
        return view('incidencia.create',['agentes'=>$data]);
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'inc_agente' => 'required',
            'inc_codanydesk' => 'required',
            'inc_passanydesk' => 'required',
            'inc_observacion' => 'required',
            'inc_estado' => 'required'
        ]);
        $data = $request->all();
        $inc = Incidencia::create($data);
        return redirect()->route('incidencia.index')->with('status', 'Incidencia agregado correctamente!');
    }
}
