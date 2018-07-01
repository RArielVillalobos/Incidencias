$(function () {
   $('[data-category]').on('click',editCategoryModal);
    $('[data-level]').on('click',editLevelModal);
});

function editCategoryModal(){
    //con this accedemos al elemento que tiene el evento osea al boton
    var category_id=$(this).data('category');
    //poniendo al input hidden el valor del id
    $('#category_id').val(category_id);

    //name
    var text_category=$(this).parent().prev().text();

    $('#category_name').val(text_category);



    //show

    $('#modalEditCategory').modal('show');

}
function editLevelModal(){
    var level_id=$(this).data('level');

    $('#level_id').val(level_id);

    //name
    var text_level=$(this).parent().prev().text();
    //insertando el name en el input del modal
    $('#level_name').val(text_level);

    //show
    $('#modalEditLevel').modal('show');
}

/*$(document).ready(function() {
    $('[data-category]').on('click',function(){

        $addPanel = $("#modalEditCategory");
        $addPanel.modal("show");
    });


});*/

