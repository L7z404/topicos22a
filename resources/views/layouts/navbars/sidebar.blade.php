<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Inicio') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Usuarios' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('usuarios') }}">
          <i class="material-icons">account_circle</i>
            <p>{{ __('Usuario') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Clientes' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('cliente') }}">
          <i class="material-icons">reduce_capacity</i>
            <p>{{ __('Clientes') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Productos' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('producto') }}">
          <i class="material-icons">inventory</i>
          <p>{{ __('Productos') }}</p>
        </a>
      </li>
      <li class="nav-item{{ $activePage == 'Proveedores' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('proveedor') }}">
          <i class="material-icons">token</i>
            <p>{{ __('Proveedores') }}</p>
        </a>
      </li>
  
    </ul>
  </div>
</div>
