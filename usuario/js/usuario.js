$(document).ready(function(){
    let accion = "";
    let tabla = new DataTable ('#usuario',{
        dom: 'Bfrtip',
        language: {
            url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        ordering: false,
        info: false,
        responsive: true,
        ajax:{
            url:'../ajax/usuario.ajax.php',
            dataSrc: ''
        },
        columns: [
            { data: 'id' },
            { data: 'usuario'},
            { data: 'clave'},
            {
                data : 'null',
                render:function(data,type,row){
                    return `
                    <button class ="btn btn-danger btneliminar">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    `
                }
            }
        ]
    })
    $('.btn-agregar-usuario').on('click',function(){
        accion = "registrar";
    })

    //Guardar la informacion desde la ventana modal
    $('#btnguardar').on('click',function(){
        Swal.fire({
            title: "Confirmar ?",
            text: "Estas seguro que deseas registrar el usuario!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, deseo registrar!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                var usuario = $("#username").val(),
                    clave = $("#clave").val(),
                    id = $("#id").val()
                var datos = new FormData();
                datos.append('username',usuario)
                datos.append('clave',clave);
                datos.append('id',id);
                datos.append('accion',accion);
                if (usuario === '' || clave === ''){
                    Swal.fire('Error, Por favor, completa todos los campos', 'error.');
                    return;
                }
                $.ajax({
                    url: "../ajax/usuario.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        // cerrar modal
                        const modal = bootstrap.Modal.getOrCreateInstance(document.getElementById('miModal'));
                        modal.hide();
                        // limpiar backdrop gris "atascado"
                        $('.modal-backdrop').remove();
                        $('body').removeClass('modal-open');
                        $('body').removeAttr('style');
                        // refrescar tabla
                        tabla.ajax.reload();
                        // limpiar formulario
                        $('#miModal form')[0].reset();
                        Swal.fire('Éxito', 'usuario agregado correctamente', 'success');
                    }
                })
            }else{}
        })
    })
    $('#usuario tbody').on('click','.btneliminar', function(){
        let data = tabla.row($(this).parents('tr')).data()
        let id = data ['id'];

        let datos = new FormData();
        datos.append('id',id)
        datos.append('accion','eliminar');

        Swal.fire({
            title: "Confirmacion?",
            text: "Estas seguro que deseas eliminar a este alumno!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../ajax/usuario.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        tabla.ajax.reload();
                        Swal.fire('Éxito', 'Usuario eliminado correctamente', 'success');
                    }
                })
            }else{}
        });
    })
})