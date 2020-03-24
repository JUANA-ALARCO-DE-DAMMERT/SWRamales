<?php 
  $trab_data = DB::table('trabajador')
                  ->join('role_user','role_user.user_id','trabajador.trab_dni')
                  ->join('roles','roles.id','role_user.role_id')
                  ->where('trabajador.trab_dni','=',Auth::user()->usuario)->first();
 ?>
@extends('plantilla.plantilla')
@section('contenido')
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800">Bienvenido: {{$trab_data->trab_apellidos . ', ' .$trab_data->trab_nombres}}</h1>
  <h2 class="h3 mb-0 text-gray-800">Cargo: {{$trab_data->description}}</h2>
</div>
<div class="row">
    @if(Auth::user()->hasrole('admin'))
        @if($trab_data->trab_est == 1)

		<h1>Administrador</h1>
	    @else
		    <div class="d-sm-flex align-items-center justify-content-between my-4">
		      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
		    </div>
   	    @endif
 @endif
<!-- ------------------------------------------------------------------------------ -->
@if(Auth::user()->hasrole('tecn'))
  @if($trab_data->trab_est == 1)
<<<<<<< HEAD
	   
=======
>>>>>>> fa04d53a02e002e19d3de86380d0a5b96dc72feb
	   <h1>Tecnico</h1>
	   

	    @else
		    <div class="d-sm-flex align-items-center justify-content-between my-4">
		      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
		    </div>
   	    @endif
 @endif
<!-- --------------------------------------------------------------------------------- -->
<<<<<<< HEAD
 @if(Auth::user()->hasrole('agent'))
=======
 @if(Auth::user()->hasrole('agen'))
>>>>>>> fa04d53a02e002e19d3de86380d0a5b96dc72feb
  @if($trab_data->trab_est == 1)
	   
		<h1>Agente</h1>

	    @else
		    <div class="d-sm-flex align-items-center justify-content-between my-4">
		      <h1 class="h4 mb-0 text-gray-800">No tienes acceso </h1>
		    </div>
   	    @endif
 @endif
</div>
@endsection