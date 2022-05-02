@extends('layouts.app', ['activePage' => 'Productos', 'titlePage' => __('Productos')])

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
                <h4 class="card-title">Vista de Productos</h4>
                <p class="card-category">Aquí va la info de los Productos</p>
            </div>

            <div class="card-body">
                <a href="/productos/crear" style="float: right;">
                    <button class="btn btn-success">Añadir Producto</button>
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
                        @foreach ($productos as $producto)
                        <tr>
                            <td scope="row">{{$producto->id}}</td>
                            <td>{{$producto->name}}</td>
                            <td>{{$producto->email}}</td>
                            <td><a href="/productos/detalles/{{$producto->id}}"><button class="btn btn-warning">&ensp;<i class="material-icons">ballot</i>&ensp;</button></a></td>
                            <td><a href="/productos/edit/{{$producto->id}}"><button class="btn btn-info">&ensp;<i class="material-icons">create</i>&ensp;</button></a></td>
                            <td>
                                <form action="{{route('productos.delete', $producto->id)}}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="btn btn-danger">&ensp;<i class="material-icons">remove_circle</i>&ensp;</button>
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