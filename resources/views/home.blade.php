@extends('layouts.app')

@section('content')
    <div class="panel panel-primary">
        <div class="panel-heading">Dashboard</div>

        <div class="panel-body">
            {{--@if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif

            You are logged in!--}}
            @if(auth()->user()->is_support)
                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Incidencias asignadas a Mi</h3>

                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <th>Severidad</th>
                                <th>Estado</th>
                                <th>Fecha de Creacion</th>
                                <th>Titulo</th>
                            </tr>
                            </thead>
                            <tbody id="dashboard_my_incidents">
                            @foreach($mis_incidencias as $incidencia)

                                <tr>

                                    <td>
                                        <a href="/ver/{{$incidencia->id}}">{{$incidencia->id}}</a>
                                    </td>

                                    <td>{{$incidencia->category_name}}</td>
                                    <td>{{$incidencia->severity_full}}</td>
                                    <td>{{$incidencia->state}}</td>
                                    <td>{{$incidencia->created_at}}</td>
                                    <td>{{$incidencia->title_short}}</td>
                                </tr>
                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Incidencias sin Asignar</h3>

                    </div>
                    <div class="panel-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th>Codigo</th>
                                <th>Categoria</th>
                                <th>Severidad</th>
                                <th>Estado</th>
                                <th>Fecha de Creacion</th>
                                <th>Titulo</th>
                                <th>Opciones</th>
                            </tr>
                            </thead>
                            <tbody id="dashboard_no_responsible">
                            @foreach($incidencias_pendientes as $incidencia)
                                <tr>
                                    <td>
                                        <a href="/ver/{{$incidencia->id}}">{{$incidencia->id}}</a>
                                    </td>
                                    <td>{{$incidencia->category_name}}</td>
                                    <td>{{$incidencia->severity_full}}</td>
                                    <td>{{$incidencia->state}}</td>
                                    <td>{{$incidencia->created_at}}</td>
                                    <td>{{$incidencia->title_short}}</td>

                                    <td>
                                        <a class="btn btn-primary btn-sm" href="#">Atender</a>
                                    </td>
                                </tr>

                            @endforeach

                            </tbody>

                        </table>

                    </div>

                </div>

            @endif


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Incidencias Reportadas por Mí</h3>

                </div>
                <div class="panel-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Categoria</th>
                            <th>Severidad</th>
                            <th>Estado</th>
                            <th>Fecha de Creacion</th>
                            <th>Titulo</th>
                            <th>Responsable</th>
                        </tr>
                        </thead>
                        <tbody id="dashboard_to_others">

                            @foreach($incidencias_reportadas_por_mi as $incidencia)
                                <tr>
                                    <td>
                                        <a href="/ver/{{$incidencia->id}}">{{$incidencia->id}}</a>
                                    </td>
                                    <td>{{$incidencia->category_name}}</td>
                                    <td>{{$incidencia->severity_full}}</td>
                                    <td>{{$incidencia->state}}</td>
                                    <td>{{$incidencia->created_at}}</td>
                                    <td>{{$incidencia->title_short}}</td>
                                    {{-- suport es el que esta atendiendo la incidencia--}}
                                    <td>{{$incidencia->support_id ?: 'Sin Asignar'}}</td>


                                </tr>

                            @endforeach
                        </tbody>

                    </table>

                </div>

            </div>





        </div>
    </div>
@endsection
