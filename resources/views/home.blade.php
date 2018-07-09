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
                                <th>Resumen</th>
                            </tr>
                        </thead>
                        <tbody id="dashboard_my_incidents">
                            @foreach($incidencias as $incidencia)

                                <tr>
                                    <td>{{$incidencia->id}}</td>
                                    <td>{{$incidencia->category->name}}</td>
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
                            <th>Resumen</th>
                            <th>Opciones</th>
                        </tr>
                        </thead>
                        <tbody id="dashboard_no_responsible">


                        </tbody>

                    </table>

                </div>

            </div>

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Incidencias asignadas a Otros</h3>

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
                            <th>Resumen</th>
                            <th>Responsable</th>
                        </tr>
                        </thead>
                        <tbody id="dashboard_to_others">

                        </tbody>

                    </table>

                </div>

            </div>





        </div>
    </div>
@endsection
