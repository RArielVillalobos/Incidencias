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
            <form action="/proyecto-usuario" method="post">
                {{csrf_field()}}
                <input type="hidden" name="user_id" value="{{$user->id}}">
                <div class="row">
                    <div class="col-md-4">
                        <select name="project_id" class="form-control" id="select-project">
                            <option>Seleccione Proyecto</option>
                            @foreach($projects as $project)
                                <option value="{{$project->id}}">{{$project->name}}</option>

                            @endforeach
                        </select>

                    </div>
                    <div class="col-md-4">
                        <select name="level_id" class="form-control" id="select-level">

                        </select>

                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-block">Asignar Proyecto</button>

                    </div>
                </div>
            </form>
            <br>
            <p>Proyectos Asignados</p>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>Proyecto</th>
                    <th>Nivel</th>
                    <th>Opciones</th>
                </tr>
                </thead>
                <tbody>

                @foreach($projects_users as $project_user)
                    <tr>
                        <td>{{$project_user->project->name}}</td>
                        <td>{{$project_user->level->name}}</td>
                        <td>
                            <button class="btn btn-sm btn-success" id="editLevel" data-project="{{$project_user->project_id}}" data-nivel="{{$project_user->level->id}}" data-project-user="{{$project_user->id}}">Editar Nivel</button>

                            <a href="#" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                                <span>Eliminar</span>

                            </a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Nivel</h4>
                </div>
                <form action="{{route('proyecto-usuario.level.edit')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">


                        <input type="hidden" name="project_id" value="" id="project-id">
                        <input type="hidden" name="project-user" value="" id="project-user">
                        <div class="form-group">
                            <label>Nombre del Nivel</label>
                            <select class="form-control" name="level-id" id="select-nivel-edit">
                                <option>Lista Niveles</option>
                            </select>
                            {{--<input type="text" name="name" class="form-control" value="" id="level_name">--}}

                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

@endsection
@section('scripts')
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <script src="/js/admin/usuarios/edit.js"></script>
@endsection