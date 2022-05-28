@extends('layouts.app')
@section('content')
<form action="{{  route('crear.empleadov2') }}" method="POST" >
@csrf

<div class = "container">
@if(session()->has('message'))
    <div class="alert alert-success">
        {{ session()->get('message') }}
    </div>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Primer nombre</label>
      <input type="text"  name="primer_nombre" class="form-control" id="primer_nombre">
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
      <input type="text" name="apellido" class="form-control" id="apellido">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Compañia</label>
    <select class="form-control text-10" name="compania_id" aria-label="">
                                                <option selected value="0">Seleccione la compañia...</option>
                                               @php 
                                               foreach ($compañias as $emp):
                                                 echo '<option name="compania_id" value="'.$emp["id"].'">'.$emp["nombre"].'</option>';
                                              endforeach;
                                              @endphp
                                                
                                              </select>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Correo</label>
    <input type="text"  name="correo" class="form-control" id="correo" placeholder="">
  </div>
  <div class="form-group">
    <label for="inputAddress2">telefono</label>
    <input type="text"  name="telefono" class="form-control" id="telefono" placeholder="">
  </div>
  <br>
  
  
  <button type="submit" class="btn btn-primary">Guardar</button>
  </div>











</form>
@endsection

