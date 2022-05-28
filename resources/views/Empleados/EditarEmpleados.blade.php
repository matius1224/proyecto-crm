@extends('layouts.app')
@section('content')
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
<form action="{{  route('editar.empleado') }}" method="POST" >
@csrf
<input type="hidden" name="id" value="{{$empleado->id}}">
<div class = "container">
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputEmail4">Primer nombre</label>
      <input type="text"  name="primer_nombre" class="form-control" id="primer_nombre" value="{{$empleado->primer_nombre}}">
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Apellido</label>
      <input type="text" name="apellido" class="form-control" id="apellido" value="{{$empleado->apellido}}">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Compañia</label>
    <select class="form-control text-10" name="compania_id" aria-label="">
                                                <option selected value="{{$compañia->id}}">{{$compañia->nombre}}</option>
                                                @php 
                                               foreach ($compañias as $cmp):
                                                 echo '<option name="compania_id" value="'.$cmp["id"].'">'.$cmp["nombre"].'</option>';
                                              endforeach;
                                              @endphp
                                                
                                              </select>
  </div>
  <div class="form-group">
    <label for="inputAddress2">Correo</label>
    <input type="text"  name="correo" class="form-control" id="correo" placeholder="" value="{{$empleado->correo}}">
  </div>
  <div class="form-group">
    <label for="inputAddress2">telefono</label>
    <input type="text"  name="telefono" class="form-control" id="telefono" placeholder="" value="{{$empleado->telefono}}">
  </div>
  <br>
  
  
  <button type="submit" class="btn btn-primary">Guardar</button>
  </div>











</form>
@endsection

