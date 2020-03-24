@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <div class="row">
        <div class="col-xl-6">
            <a href="{{url('incidencia/create')}}" class="btn btn-primary">Registrar Incidencia</a>
        </div>
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
                        <td>{{'00'.$inc->inc_id.'RAC'}}</td>
                            <?php 
                                $agente = DB::table('trabajador')
                                ->where('trabajador.trab_dni','=',$inc->inc_agente)->first();
                            ?>
                        <td>{{$agente->trab_apellidos.', '.$agente->trab_nombres}}</td>
                        <td>{{$inc->inc_codanydesk}}</td>
                        <td>{{$inc->inc_passanydesk}}</td>
                        <td>{{$inc->inc_observacion}}</td>
                        <td>
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
                        <td>
                            
                            @if(!$inc->inc_tecnico)
                                
                            @else
                                {{$tecnico->trab_apellidos.', '.$tecnico->trab_nombres}}
                            @endif

                        </td>
                        <td>       
                            <a href="{{url('')}}" class="btn btn-sm btn-warning">Atender</a>                  
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection