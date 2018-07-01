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
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <div class="form-group">
                            <input placeholder="Ingrese Nombre" name="name" type="text" class="form-control">

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
                            @foreach ($categories as $category)
                            <tr>
                                <td>{{$category->name}}</td>

                                <td>
                                    <button type="button"  class="btn btn-sm btn-primary" title="Editar" data-category="{{$category->id}}">
                                        <span class="glyphicon glyphicon-pencil">Editar</span>
                                    </button>
                                    <a href="/categoria/{{$category->id}}/borrar" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                                        <span class="glyphicon glyphicon-remove"></span>

                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-md-6">
                    <p>Niveles</p>
                    <form action="/niveles" method="POST" class="form-inline">
                        {{csrf_field()}}
                        <input type="hidden" name="project_id" value="{{$project->id}}">
                        <div class="form-group">
                            <input placeholder="Ingrese Nombre" name="name" type="text" class="form-control">

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
                            @foreach($levels as $key=>$level)

                                <tr>
                                    <td>N{{$key+1}}</td>

                                    <td>{{$level->name}}</td>
                                    <td>
                                        <button  class="btn btn-sm btn-primary" title="Editar" data-level="{{$level->id}}">
                                            <span class="glyphicon glyphicon-pencil"></span>
                                        </button>
                                        <a href="/nivel/{{$level->id}}/borrar" class="btn btn-sm btn-danger" title="Dar de Baja">Darse de Baja
                                            <span class="glyphicon glyphicon-remove"></span>

                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>


        </div>
    </div>

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditCategory">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Categoria</h4>
                </div>
                <form action="/categoria/editar" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">

                            <input type="hidden" name="category_id" value="" id="category_id" >
                            <div class="form-group">
                                <label>Nombre de la Categoria</label>
                                <input type="text" name="name" class="form-control" value="" id="category_name">

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

    <div class="modal fade" tabindex="-1" role="dialog" id="modalEditLevel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Editar Nivel</h4>
                </div>
                <form action="{{route('level.edit')}}" method="post">
                    {{csrf_field()}}
                    <div class="modal-body">

                        <input type="hidden" name="level_id" value="" id="level_id">
                        <div class="form-group">
                            <label>Nombre del Nivel</label>
                            <input type="text" name="name" class="form-control" value="" id="level_name">

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
    <script src="/js/admin/proyectos/edit.js"></script>

@endsection

