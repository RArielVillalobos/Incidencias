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
            <form action="" method="post">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{old('email',$user->email)}}">


                </div>
                <div class="form-group">
                    <label for="email">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name',$user->name)}}">


                </div>
                <div class="form-group">
                    <label for="password">Contraseña <em>Ingresar solo si se desea modificar</em></label>
                    <input type="text" name="password" class="form-control" value="{{old('password')}}">


                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Guardar Usuario </button>


                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>Proyecto A</td>
                    <td>N1</td>
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


@endsection