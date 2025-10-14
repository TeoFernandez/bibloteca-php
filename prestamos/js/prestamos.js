$(document).ready(function(){
    let accion = "";
    let tabla = new DataTable ('#prestamos',{
        dom: 'Bfrtip',
        language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        ordering: true,
        info: false,
        responsive: true,
        ajax:{
            url:'../ajax/prestamos.ajax.php',
            dataSrc: ''
        },
        order: [[0, 'desc']],
        columns: [
            { data: 'id_prestamos', visible: false },
            { data: 'titulo' },
            { data: 'nombre'},
            { data: 'apellido'},
            { data: 'fecha_prestamo'},
            { data: 'fecha_devolucion'},
            { data: 'estado'},
            {
                data : 'null',
                render:function(data,type,row){
                    let botones = '';

                    if (row.fecha_devolucion !== null && row.fecha_devolucion !== "") {
                        // Préstamo ya devuelto: botón deshabilitado + eliminar
                        botones += `<button class="btn btn-secondary me-1" disabled>Devuelto</button>`;
                    } else {
                        // Préstamo activo: botón devolver + eliminar
                        botones += `<button class="btn btn-success btndevolver me-1">Devolver</button>`;
                    }

                    // Botón eliminar siempre visible
                    botones += `<button class="btn btn-danger btneliminar">Eliminar</button>`;

                    return botones;
                }
            }
        ]
    })
    $('#miModal').on('shown.bs.modal',function(){
        cargarLibros();
    })
    function cargarLibros(){
        $.ajax({
            url: '../ajax/librosprestamo.ajax.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let opciones = '<option value="">Seleccione un Libro</option>';
                data.forEach(function(libros){
                    opciones += `<option value="${libros.id_libro}">${libros.titulo}</option>`;
                });
                $('#id_libro').html(opciones);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los Libros:', error);
                alert('Error al cargar los Libros.');
            }
        });   
    }
    $('.btn-agregar-prestamo').on('click',function(){
        accion = "registrar";
    })
    $('#btnguardar').on('click',function(){
        Swal.fire({
            title: "Confirmar ?",
            text: "Estas seguro que deseas registrar el Prestamo!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, deseo registrar!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                var id_prestamos = $("#id_prestamos").val(),
                    id_libro = $("#id_libro").val(),
                    dni_alumno = $("#dni_alumno").val(),
                    fecha_prestamo = $("#fecha_prestamo").val()
                var datos = new FormData();
                datos.append('id_libro',id_libro)
                datos.append('dni_alumno',dni_alumno);
                datos.append('fecha_prestamo',fecha_prestamo);
                datos.append('accion',accion);
                
                if (id_libro === '' || dni_alumno === '' || fecha_prestamo === ''){
                    Swal.fire('Error, Por favor, completa todos los campos', 'error.');
                    return;
                }
                $.ajax({
                    url: "../ajax/prestamos.ajax.php",
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
                        Swal.fire('Éxito', 'Prestamo agregado correctamente', 'success');
                    }
                })
            }else{}
        })        
    })

    $('#prestamos tbody').on('click','.btndevolver', function(){
        let data = tabla.row($(this).parents('tr')).data()
        let id_prestamos = data['id_prestamos'];
        let id_libro = data['id_libro'];
        console.log(id_libro);
        Swal.fire({
            title: "Confirmacion Devolucion?",
            text: "Estas seguro de devolver este libro?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!",
            cancelButtonText: "No, cancelar!"
        }).then((result) => {
            if (result.isConfirmed) {
                let datos = new FormData();
                datos.append('id_prestamos',id_prestamos);
                datos.append('id_libro',id_libro);
                datos.append('accion','devolver');
                $.ajax({
                    url: "../ajax/prestamos.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        tabla.ajax.reload();
                        Swal.fire('Éxito', 'El libro fue devuelto correctamente', 'success');
                    }
                })
            }else{}
        });
    })
    $('#prestamos tbody').on('click','.btneliminar', function(){
        let data = tabla.row($(this).parents('tr')).data()
        let id_prestamos = data ['id_prestamos'];

        let datos = new FormData();
        datos.append('id_prestamos',id_prestamos)
        datos.append('accion','eliminar');

        Swal.fire({
            title: "Confirmacion?",
            text: "Estas seguro que deseas eliminar este Prestamo!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../ajax/prestamos.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        tabla.ajax.reload();
                        Swal.fire('Éxito', 'Prestamo eliminado correctamente', 'success');
                    }
                })
            }else{}
        });
    })

})