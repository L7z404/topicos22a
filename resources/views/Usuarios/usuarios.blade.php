@extends('layouts.app', ['activePage' => 'Usuarios', 'titlePage' => __('Usuarios')])

@section('content')
<div class="content">
    @if(session()->has('success'))
    <div id="alerte" class="alert alert-success">
        {{ session()->get('success') }}
    </div>
    @endif
    <div class="container-fluid">
        <div class="card">
            <div class="card-header card-header-primary">
                <h4 class="card-title">Vista de Usuarios</h4>
                <p class="card-category">Aquí va la info de los usuarios</p>
            </div>
            
            <div class="card-body">
                <a href="/usuarios/crear" style="float: right;">
                <button class="btn btn-success">Añadir Usuario</button>
            </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th>&ensp;</th>
                            <th>&ensp;</th>
                        </tr>
                    </thead>
                    <tbody>
                @foreach ($users as $user)
                            <tr>
                                <td scope="row">{{$user->id}}</td>
                                <td>{{$user->name}}</td>
                                <td>{{$user->email}}</td>
                                <td><a href="/usuarios/edit/{{$user->id}}"><button class="btn btn-info">Edit</button></a></td>
                                <td>
                                    <form action="{{route('usuarios.delete', $user->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(function() {
        $('#alerte').fadeOut('slow');
    }, 1000); // <-- time in milliseconds
</script>