@extends('layouts.app', ['activePage' => 'Clientes', 'titlePage' => __('Clientes')])

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
                <h4 class="card-title">Vista de Clientes</h4>
                <p class="card-category">Aquí va la info de los clientes</p>
            </div>

            <div class="card-body">
                <a href="/clientes/crear" style="float: right;">
                    <button class="btn btn-success">Añadir Cliente</button>
                </a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col" style="color: purple; font-weight: bold;">ID</th>
                            <th scope="col" style="color: purple; font-weight: bold;">Name</th>
                            <th scope="col" style="color: purple; font-weight: bold;">Email</th>
                            <th>&ensp;</th>
                            <th>&ensp;</th>
                            <th>&ensp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($clientes as $cliente)
                        <tr>
                            <td scope="row">{{$cliente->id}}</td>
                            <td>{{$cliente->name}}</td>
                            <td>{{$cliente->email}}</td>
                            <td><a href="/clientes/detalles/{{$cliente->id}}"><button class="btn btn-warning">Detalle</button></a></td>
                            <td><a href="/clientes/edit/{{$cliente->id}}"><button class="btn btn-info">Edit</button></a></td>
                            <td>
                                <form action="{{route('clientes.delete', $cliente->id)}}" method="post">
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