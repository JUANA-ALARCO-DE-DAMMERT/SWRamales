@extends('plantilla.plantilla')
@section('contenido')
<div class="mb-4">
    <h1>Registrar Incidencia </h1>
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
<form action="{{url('incidencia')}}" method="post">
  @method('POST')
  {{ csrf_field() }}
    <div class="row">
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Nombre de Agente</label>
                <input type="text" name="inc_agente" class="form-control">
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
                  <option value="0" hidden>Pendiente</option>
                </select>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="form-group">
                <label>Tecnico *</label>
                <select name="inc_tecnico" class="form-control selectpicker" data-live-search="true" required>
                  <option value="inc_tecnico" hidden>--- Seleccione ---</option>
                    <option value="0">por elegir</option>
                </select>
            </div>
        </div>       
        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrar">
                <a href="{{url('incidencia')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection