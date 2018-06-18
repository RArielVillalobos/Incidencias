<div class="panel panel-primary">
    <div class="panel-heading">Menu</div>

    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            @if(auth()->check())
                {{-- AGREGANDO CLASES CON LARAVEL(SI LA RUTA ES HOME AGREGAR LA CLASE ACTIVE )  --}}
                <li @if (request()->is('home')) class="active" @endif><a href="/home">Dashboard</a></li>
                @if(!auth()->user()->is_client)
                    <li @if (request()->is('ver')) class="active" @endif><a href="/ver">Ver Incidencias</a></li>
                @endif

                <li @if (request()->is('reportar')) class="active" @endif><a href="/reportar">Reportar Indicencias</a></li>

                @if(auth()->user()->is_admin)
                    <ul class="nav nav-pills">

                        <li role="presentation" class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                Administracion <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="/usuarios">Usuarios</a></li>
                                <li><a href="/proyectos">Proyectos</a></li>
                                <li><a href="/config">Configuracion</a></li>
                            </ul>
                        </li>

                    </ul>
                @endif

            @else
                <li><a href="#">Benvenido</a></li>
                <li><a href="#">Instrucciones</a></li>
                <li><a href="#">Creditos</a></li>



            @endif

        </ul>
    </div>

</div>

