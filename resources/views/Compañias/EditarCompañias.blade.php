@extends('layouts.app')
@section('content')
<form action="{{  route('editar.compañia') }}" method="POST" enctype= multipart/form-data>
@csrf
<input type="hidden" name="id" value="{{$compañia->id}}">
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
      <label for="inputEmail4">Nombre</label>
      <input type="text"  name="nombre" class="form-control" id="nombre" value="{{$compañia->nombre}}">
    
    <div class="form-group col-md-6">
      <label for="inputPassword4">Correo</label>
      <input type="text" name="correo" class="form-control" id="correo" value="{{$compañia->correo}}">
    </div>
  </div>
  </div>
  <div class="form-group">
    <label for="inputAddress">Logo</label>
    <input type="file"
       id="avatar" name="logo" accept="image/png, image/jpeg" class="form-control" id="logo" placeholder="" value="{{$compañia->logo}}">
  </div>
  <div class="form-group">
    <label for="inputAddress2">Pagina Web</label>
    <input type="text"  name="pag" class="form-control" id="pag" placeholder="" value="{{$compañia->pagina_web}}">
  </div>
  <br>
  
  
  <button type="submit" class="btn btn-primary">Sign in</button>
  </div>











</form>
@endsection

