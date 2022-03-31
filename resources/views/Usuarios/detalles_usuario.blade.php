@extends('layouts.app', ['activePage' => 'Usuarios', 'titlePage' => __('Usuarios')])

@section('content')
<div class="content">
    <div class="row">
        <div class="col-md-12">
            <form action="{{route('usuarios.index')}}" method="get" class="form-horizontal">

                @csrf
                <div class="card">
                    <div class="card-header card-header-primary">
                        <h4 class="card-title">Detalle Usuario</h4>

                        <p class="card-category">Datos del usuario {{$user->id}}</p>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Nombre</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="name" placeholder="Nombre" value="{{$user->name}}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Correo</label>
                            <div class="col-sm-7">
                                <input type="email" class="form-control" name="email" placeholder="Correo" value="{{$user->email}}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Fecha de Creación</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="password" placeholder="" value="{{$user->created_at}}" disabled>
                            </div>
                        </div>
                        <div class="row">
                            <label for="name" class="col-sm-2 col-form-label">Fecha de Modificación</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control" name="password" placeholder="" value="{{$user->updated_at}}" disabled>
                            </div>
                        </div>
                    </div>
                    <!--Footer-->
                    <div class="card-footer ml-auto mr-auto">
                        <button type="submit" class="btn btn-primary">Regresar</button>
                    </div>
                    <!--End footer-->

                </div>
            </form>
        </div>
    </div>
</div>
@endsection