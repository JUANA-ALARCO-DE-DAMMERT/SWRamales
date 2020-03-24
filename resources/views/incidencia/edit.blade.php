@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <h1>Atender Incidencia</h1>
    @if (count($errors)>0)
      <div class="alert alert-danger">
        <p>Corregir los siguientes campos:</p>
        <ul>
          @foreach ($errors->all() as $error)
          <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
</div>
<form action="{{url('incidencia/'.$inc->inc_id)}}" method="POST" class="my-3">
    @method('PATCH')
    {{ csrf_field() }}
    <div class="row">
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Nombre de Agente</label>
                <select name="inc_agente" class="form-control selectpicker" data-live-search="true" required>
                    <option value="" hidden>--- Seleccione ---</option>

                </select>
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Codigo Anydesk *</label>
                <input type="text" name="inc_codanydesk" class="form-control">
            </div>
        </div>        
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Password Anydesk </label>
                <input type="text" name="inc_passanydesk" class="form-control">
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Observacion </label>
            	<textarea type="text" name="inc_observacion" class="form-control" placeholder="Ingrese aqui su Observacion"></textarea>
            </div>
        </div>
        <div class="col-xl-3 col-md-6">
            <div class="form-group">
                <label for="">Estado *</label>
                <select name="inc_estado" class="form-control" >
                  <option value="" selected>--Seleccione--</option>
                  	@if  ($inc->inc_estado ==0)
                  <option value="0" selected>Pendiente</option>
                  	@elseif ($inc->inc_estado == 1)
                  <option value="" selected>Atendiendo</option>
                  	@else ($inc->inc_estado == 2)
                  <option value="" selected>Atendido</option>	
                  	@endif  
                </select>
            </div>
        </div>  
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Tecnico Atender </label>
                <input type="text" name="inc_passanydesk" class="form-control">
            </div>
        </div>


        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" value="Atender" class="btn btn-warning">
                <a href="{{url('incidencia')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection