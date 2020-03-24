<!DOCTYPE html>
<html>
<head>
    <title>Registro de Incidenciasss</title>
    <meta http-equiv="refresh" content="10">
</head>
<body>

</body>
</html>
@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <div class="row">

        <div class="col-xl-6">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
            @endif
        </div>
    </div>
</div>
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Tabla de Incidencias</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-bordered table-sm" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <th>Ticket</th>
                    <th>Nombre del Agente</th>
                    <th>Codigo Anydesk</th>
                    <th>Password Anydesk</th>
                    <th>Observaciones</th>
                    <th>Estado</th>
                    <th>Tecnico que lo atiende</th>
                    <th>opciones</th>
                </thead>
                <tbody>
                    @foreach($incidencia as $inc)
                    <tr>
                        <td >{{'0R0'.$inc->inc_id}}</td>
                            <?php 
                                $agente = DB::table('trabajador')
                                ->where('trabajador.trab_dni','=',$inc->inc_agente)->first();
                            ?>
                        <td align="justify" >{{$agente->trab_apellidos.', '.$agente->trab_nombres}}</td>
                        <td  align="center">{{$inc->inc_codanydesk}}</td>
                        <td align="center">{{$inc->inc_passanydesk}}</td>
                        <td width="25" width="25"  align="justify" >{{$inc->inc_observacion}}</td>
                        <td align="center">
                                @if ($inc->inc_estado == 0)
                                    <span class="badge badge-danger">Pendiente</span>
                                @elseif ($inc->inc_estado == 1)
                                    <span class="badge badge-secondary">Atendiendo</span>
                                @else ($inc->inc_estado == 2)
                                    <span class="badge badge-success">Atendido</span>
                                @endif                            
                        </td>
                            <?php 
                                $tecnico = DB::table('trabajador')
                                ->where('trabajador.trab_dni','=',$inc->inc_tecnico)->first();
                            ?>
                        <td align="center">
                            
                            @if(!$inc->inc_tecnico)
                                
                            @else
                                {{$tecnico->trab_apellidos.', '.$tecnico->trab_nombres}}
                            @endif

                        </td>
                        <td>    
                                @if ($inc->inc_estado == 0)
                                    <a href="{{url('tecnicoinc/'.$inc->inc_id.'/edit')}}" class="btn btn-info">Atender</a>
                                @elseif ($inc->inc_estado == 1)
                                    <a href="{{url('tecnicoinc/'.$inc->inc_id.'/edit')}}" class="btn btn-info">Atender</a>
                                @endif          
                                              
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection