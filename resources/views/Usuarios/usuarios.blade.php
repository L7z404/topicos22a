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
                cosa
            </div>
        </div>
    </div>
</div>
@endsection

<script>
    setTimeout(function() {
        $('#alerte').fadeOut('slow');
    }, 5000); // <-- time in milliseconds
</script>