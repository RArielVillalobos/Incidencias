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
            <form action="/proyecto/{{$project->id}}" method="post">
                {{csrf_field()}}


                <div class="form-group">
                    <label for="email">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$project->name)}}">


                </div>
                <div class="form-group">
                    <label for="text">Descripcion</label>
                    <input type="description" name="description" class="form-control" value="{{old('description',$project->description)}}">


                </div>
                <div class="form-group">
                    <label for="start">Fecha Inicio</label>
                    <input type="date" name="start" class="form-control" value="{{old('start',$project->start)}}">


                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Actualizar</button>


                </div>
            </form>
            <div class="row">
                <div class="col-md-6">
                    <p>Categorias</p>
                    <form action="/categorias" method="POST" class="form-inline">
                        <div class="form-group">
                            <input placeholder="Ingrese Nombre" type="text" class="form-control">

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Añadir</button>

                        </div>


                    </form>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>

                                <th>Categoria</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>Proyecto A</td>

                            <td>
                                <a href="#" class="btn btn-sm btn-primary" title="Editar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                                    <span class="glyphicon glyphicon-remove"></span>

                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <p>Niveles</p>
                    <form action="/niveles" method="POST" class="form-inline">
                        <div class="form-group">
                            <input placeholder="Ingrese Nombre" type="text" class="form-control">

                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Añadir</button>

                        </div>


                    </form>
                    <br>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nivel</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>N1</td>
                            <td>Atencion Basica</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary" title="Editar">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </a>
                                <a href="#" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                                    <span class="glyphicon glyphicon-remove"></span>

                                </a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>


@endsection