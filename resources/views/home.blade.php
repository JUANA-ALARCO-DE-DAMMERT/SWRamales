<?php 
  $trab_data = DB::table('trabajador')
                  ->join('role_user','role_user.user_id','trabajador.trab_dni')
                  ->join('roles','roles.id','role_user.role_id')
                  ->where('trabajador.trab_dni','=',Auth::user()->usuario)->first();
 ?>

@extends('plantilla.plantilla')
@section('content')
@if(Auth::user()->hasrole('admin'))
<h1>
	dsda
</h1>
@endif
@endsection
