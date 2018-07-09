$(function () {
    $('#list-of-projects').on('change',selectProject);
});

function selectProject(){
    var project_id=$(this).val();


    location.href='/seleccionar/proyecto/'+project_id;
}