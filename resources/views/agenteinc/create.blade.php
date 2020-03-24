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
<form action="{{url('agenteinc')}}" method="post">
  @method('POST')
  {{ csrf_field() }}
    <div class="row">
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Nombre de Agente</label>
                <select name="inc_agente" class="form-control selectpicker" data-live-search="true" required>
                    <option value="" hidden>--- Seleccione ---</option>
                    @foreach($agentes as $a)
                        <option value="{{$a->trab_id}}">{{$a->trab_apellidos.', '.$a->trab_nombres}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xl-5 col-md-6">
            <div class="form-group">
                <label for="">Codigo Anydesk *</label>
                <input type="text" name="inc_codanydesk" class="form-control" onkeypress="return solonumeros(event)" maxlength="9">
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
                <select name="inc_estado" class="form-control" readonly >
                  <option value="0" selected>Pendiente</option>
                </select>
            </div>
        </div>    
        <div class="col-xl-12 my-4">
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrar">
                <a href="{{url('agenteinc')}}" class="btn btn-danger">Cancelar</a>
            </div>
        </div>
    </div>
</form>
@endsection
<script >
        function solonumeros(e){
       key = e.keyCode || e.which;
       tecla = String.fromCharCode(key).toLowerCase();
       letras = "0123456789";
       especiales = "8-37-39-46";

       tecla_especial = false
       for(var i in especiales){
            if(key == especiales[i]){
                tecla_especial = true;
                break;
            }
        }

        if(letras.indexOf(tecla)==-1 && !tecla_especial){
            return false;
        }
    }
//////
</script>