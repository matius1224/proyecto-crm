<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

<div class="container">
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
<table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">Nombre</th>
      <th scope="col">Correo</th>
      <th scope="col">Logo</th>
      <th scope="col">Pagina Web</th>
      <th scope="col">Acciones</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        @foreach($datos as $d)
      <td>{{$d->nombre}}</td>
      <td>{{$d->correo}}</td>
      <td ><img  src="{{Storage::url($d->logo)}}" alt="img"></td>
      <td>{{$d->pagina_web}}</td>
      
      <td>
          <form action="{{route('edit.compañia')}}" method="GET">
          @csrf
            <input type="hidden" name="id" value="{{$d->id}}">
          <button type="submit" class="btn btn-warning">Editar</button>
          </form>
        </td>
      <td>
          <form action="{{route('eliminar.compañia')}}" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$d->id}}">
          <button type="submit" class="btn btn-danger">Eliminar</button>
          </form>
        </td>
        
    </tr>
    @endforeach
    <tr>
     
  </tbody>
</table>

<a href="{{route('crear.compañia')}}"><button type="button" class="btn btn-primary">Crear +</button></a>
</div>
</body>
</html>