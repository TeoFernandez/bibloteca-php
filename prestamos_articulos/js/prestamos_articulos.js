$(document).ready(function(){
    let accion = "";
    let tabla = new DataTable ('#prestamos_articulos',{
        dom: 'Bfrtip',
        language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        ordering: true,
        info: false,
        responsive: true,
        ajax:{
            url:'../ajax/prestamosarticulos.ajax.php',
            dataSrc: ''
        },
        order: [[0, 'desc']],
        columns: [
            { data: 'id_prestamos_articulos', visible: false },
            { data: 'articulo' },
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
        cargarArticulos();
    })
    function cargarArticulos(){
        $.ajax({
            url: '../ajax/articulosprestamo.ajax.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let opciones = '<option value="">Seleccione un Articulo</option>';
                data.forEach(function(articulos){
                    opciones += `<option value="${articulos.id_articulo}">${articulos.articulo}</option>`;
                });
                $('#id_articulo').html(opciones);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los Articulos:', error);
                alert('Error al cargar los Articulos.');
            }
        });   
    }
    $('.btn-agregar-prestamo-articulo').on('click',function(){
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
                var id_prestamos_articulos = $("#id_prestamos_articulos").val(),
                    id_articulo = $("#id_articulo").val(),
                    dni_alumno = $("#dni_alumno").val(),
                    fecha_prestamo = $("#fecha_prestamo").val()
                var datos = new FormData();
                datos.append('id_articulo',id_articulo)
                datos.append('dni_alumno',dni_alumno);
                datos.append('fecha_prestamo',fecha_prestamo);
                datos.append('accion',accion);
                
                if (id_articulo === '' || dni_alumno === '' || fecha_prestamo === ''){
                    Swal.fire('Error, Por favor, completa todos los campos', 'error.');
                    return;
                }
                $.ajax({
                    url: "../ajax/prestamosarticulos.ajax.php",
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
    $('#prestamos_articulos tbody').on('click','.btneliminar', function(){
        let data = tabla.row($(this).parents('tr')).data()
        let id_prestamos_articulos = data ['id_prestamos_articulos'];

        let datos = new FormData();
        datos.append('id_prestamos_articulos',id_prestamos_articulos)
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
                    url: "../ajax/prestamosarticulos.ajax.php",
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
    $('#prestamos_articulos tbody').on('click','.btndevolver', function(){
        let data = tabla.row($(this).parents('tr')).data()
        let id_prestamos_articulos = data['id_prestamos_articulos'];
        let id_articulo = data['id_articulo'];
        console.log(id_articulo);
        Swal.fire({
            title: "Confirmacion Devolucion?",
            text: "Estas seguro de devolver este Articulo?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!",
            cancelButtonText: "No, cancelar!"
        }).then((result) => {
            if (result.isConfirmed) {
                let datos = new FormData();
                datos.append('id_prestamos_articulos',id_prestamos_articulos);
                datos.append('id_articulo',id_articulo);
                datos.append('accion','devolver');
                $.ajax({
                    url: "../ajax/prestamosarticulos.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        tabla.ajax.reload();
                        Swal.fire('Éxito', 'El Articulo fue devuelto correctamente', 'success');
                    }
                })
            }else{}
        });
    })
})