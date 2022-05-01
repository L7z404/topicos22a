@extends('layouts.app', ['activePage' => 'Usuarios', 'titlePage' => __('Clientes')])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('clientes.update', $cliente->id)}}" method="post" class="form-horizontal">

                @csrf
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Cliente</h4>

                        <p class="card-category">Edita tus datos</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$cliente->name}}" autofocus>
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" placeholder="Correo" value="{{$cliente->email}}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Escribe Nueva Contraseña</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="password" placeholder="Contraseña" value="">
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                    <!--End footer-->

                </div>
            </form>
        </div>
    </div>
</div>
@endsection