@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">DashBoard</div>
        @if(session('notification'))
            <div class="alert alert-success">

                    {{session('notification')}}

            </div>
        @endif




        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                       <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="panel-body">
            <form action="/proyectos" method="post">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="email">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">


                </div>
                <div class="form-group">
                    <label for="text">Descripcion</label>
                    <input type="description" name="description" class="form-control" value="{{old('name')}}">


                </div>
                <div class="form-group">
                    <label for="start">Fecha Inicio</label>
                    <input type="date" name="start" class="form-control" value="{{old('start',date('Y-m-d'))}}">


                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Registrar Projecto</button>


                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Desciprion</th>
                        <th>Fecha de Inicio</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)


                    <tr>
                        <td>{{$project->name}}</td>
                        <td>{{$project->description}}</td>

                        <td>{{$project->start?:'No se Indico Fecha de Inicio'}}</td>
                        <td>

                            @if($project->trashed())
                                <a href="/projecto/{{$project->id}}/restaurar" class="btn btn-sm btn-success" title="Dar de Baja">Restaurar
                                    <span class="glyphicon glyphicon-remove"></span>

                                </a>
                            @else
                                <a href="/projecto/{{$project->id}}/eliminar" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                                    <span class="glyphicon glyphicon-remove"></span>

                                </a>
                                <a href="/proyecto/{{$project->id}}" class="btn btn-sm btn-primary" title="Editar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>

                            @endif

                        </td>
                    </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
    </div>


@endsection