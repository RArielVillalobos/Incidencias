$(function(){
    $('#select-project').on('change',onSelectProjectChange);
    $('[data-nivel]').on('click',editLevel);
});

function onSelectProjectChange(){
    var project_id=$(this).val();


    //AJAX//el servidor va a devolver un data(informacion), no una vista
    //cuando hacemos una peticion a una ruta que solo devolvera datos se lo conoce como WEB SERVICES aun conjunto se lo llama API
    var html_select='<option value="">Seleccione Nivel</option>';
    $.get('/api/projecto/'+project_id+'/niveles',function(data){
        for (var i=0; i<data.length; i++){
            html_select+='<option value="'+data[i].id+'">'+data[i].name+'</option>';
        }

    $('#select-level').html(html_select);


    });

}
function editLevel(){

    var project_id=$(this).data('project');
    var project_user_id=$(this).data('project-user');






    var html_select='<option value="">Seleccione Nivel</option>';
    $.get('/api/projecto/'+project_id+'/niveles',function(data){
        for (var i=0; i<data.length; i++){
            //html_select+='<option value="'+data[i].id+'">'+data[i].name+'</option>';

            //usando literal template(comillas invertidas)
            html_select+=`<option value="${data[i].id}">${data[i].name}</option>`;
        }

        $('#project-id').val(project_id);
        $('#project-user').val(project_user_id);
        $('#select-nivel-edit').html(html_select);



    });

    $('#modalEditLevel').modal('show');
}