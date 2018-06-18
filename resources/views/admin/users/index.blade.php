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
            <form action="/usuarios" method="post">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" name="email" class="form-control" value="{{old('email')}}">


                </div>
                <div class="form-group">
                    <label for="email">Nombre</label>
                    <input type="text" name="name" class="form-control" value="{{old('name')}}">


                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <input type="text" name="password" class="form-control" value="{{old('password',str_random(6))}}">


                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Registrar </button>


                </div>
            </form>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)


                    <tr>
                        <td>{{$user->email}}</td>
                        <td>{{$user->name}}</td>
                        <td>
                            <a href="/usuarios/{{$user->id}}" class="btn btn-sm btn-primary" title="Editar">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </a>
                            <a href="/usuarios/{{$user->id}}" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                            <span class="glyphicon glyphicon-remove"></span>

                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


@endsection