@extends('layouts.app', ['activePage' => 'Proveedores', 'titlePage' => __('Proveedores')])

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
                <h4 class="card-title">Vista de Proveedor</h4>
                <p class="card-category">Aquí va la info de los Proveedor</p>
            </div>

            <div class="card-body">
                <a href="/proveedores/crear" style="float: right;">
                    <button class="btn btn-success">Añadir Proveedor</button>
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
                        @foreach ($proveedores as $proveedor)
                        <tr>
                            <td scope="row">{{$proveedor->id}}</td>
                            <td>{{$proveedor->name}}</td>
                            <td>{{$proveedor->email}}</td>
                            <td><a href="/proveedores/detalles/{{$proveedor->id}}"><button class="btn btn-warning">Detalle</button></a></td>
                            <td><a href="/proveedores/edit/{{$proveedor->id}}"><button class="btn btn-info">Edit</button></a></td>
                            <td>
                                <form action="{{route('proveedores.delete', $proveedor->id)}}" method="post">
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