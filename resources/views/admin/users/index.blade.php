@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">DashBoard</div>




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
            <form action="/reportar" method="post">
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
                    <input type="text" name="password" class="form-control" value="{{old('password')}}">


                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary">Registrar </button>


                </div>
            </form>
            <table class="table">
                <thead>
                    <tr>
                        <th>E-mail</th>
                        <th>Nombre</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>arieldjmix@hotmail.com</td>
                        <td>Ariel</td>
                        <td>
                            <a href="#" class="btn btn-sm btn-primary"><span class="glyphicon glyphicon-edit"></span></a>
                            <a href="#" class="btn btn-sm btn-danger">Dars de Baja</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>


@endsection