$(function(){

    $('#example').DataTable({
        responsive: true
    });

    $('.boton').click(function(){
        $('#atenderCita').modal();
    });
});