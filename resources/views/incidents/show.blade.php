@extends('layouts.app')

@section('content')

    <div class="panel panel-heading">

            <div class="panel-heading">DashBoard</div>

            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Codigo</th>
                        <th>Proyecto</th>
                        <th>Categoria</th>
                        <th>Fecha de Envio</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td id="incident_key">{{$incident->id}}</td>
                        <td id="incident_project">{{$incident->project->name}}</td>
                        <td id="incident_category">{{$incident->category_name}}</td>
                        <td id="incident_created_at">{{$incident->created_at}}</td>
                    </tr>

                </tbody>
                <thead>
                    <tr>
                        <th>Asignadas a Mi</th>
                        <th>Visibilidad</th>
                        <th>Estado</th>
                        <th>Severidad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="incident_responsable">{{$incident->support_name}}</td>
                        <td id="incident_responsable">Publico</td>
                        <td id="incident_state">{{$incident->state}}</td>
                        <td id="incident_severity">{{$incident->severity_full}}</td>

                    </tr>
                </tbody>
            </table>
            <br>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <th>Titulo</th>
                        <td id="incident_sumary">{{$incident->title}}</td>
                    </tr>

                    <tr>
                        <th>Descripcion</th>
                        <td id="incident_description">{{$incident->description}}</td>
                    </tr>
                    <tr>
                        <th>Adjuntos</th>
                        <td id="incident_attachment">No se han adjuntado archivos</td>
                    </tr>
                </tbody>

            </table>
            <br>
            <button class="btn btn-primary btn-sm" id="incident_btn_apply">Atender Incidencia</button>

            <button class="btn btn-info btn-sm" id="incident_btn_open">Volver a abrir Incidencia</button>
            <button class="btn btn-info btn-sm" id="incident_btn_solve">Marcar como Resuelto</button>
            <button class="btn btn-success btn-sm" id="incident_btn_edit">Editar Incidencia</button>

        <button class="btn btn-danger btn-sm" id="incident_btn_derive">Derivar al Siguiente Nivel</button>
        </div>
    </div>



@endsection