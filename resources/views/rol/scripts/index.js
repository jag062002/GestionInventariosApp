$(document).ready(function(){
    $('.btn-eliminar').click(function(e){

        e.preventDefault();

        Swal.fire({
            title: "¿Deseas eliminar este registro",
            text: "No podrás revertilo",
            icon: "question",
            showCancelButton: true,
        }).then((result) => {

            if(result.isConfirmed){

                const form = $(this).closest('form');

                form.submit();
            }
        });
    });
});
