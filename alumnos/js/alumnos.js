$(document).ready(function(){
    let accion = "";
    let tabla = new DataTable ('#alumnos',{
        dom: 'Bfrtip',
        language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        ordering: false,
        info: false,
        responsive: true,
        ajax:{
            url:'../ajax/alumnos.ajax.php',
            dataSrc: ''
        },
        columns: [
            { data: 'dni' },
            { data: 'nombre' },
            { data: 'apellido'},
            { data: 'carrera'},
            {
                data : 'null',
                render:function(data,type,row){
                    return `<button class="btn btn-principal btneditar" data-bs-target="#miModal" data-bs-toggle="modal">
                    <i class="fa-solid fa-pen"></i>
                    </button>
                    <button class ="btn btn-danger btneliminar">
                    <i class="fa-solid fa-trash"></i>
                    </button>
                    `
                }
            }
        ]
    })
    $('#miModal').on('shown.bs.modal',function(){
        cargarCarreras();
    })
    function cargarCarreras(){
        $.ajax({
            url: '../ajax/carreras.ajax.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let opciones = '<option value="">Seleccione una Carrera</option>';
                data.forEach(function(carreras){
                    opciones += `<option value="${carreras.id_carrera}">${carreras.carrera}</option>`;
                });
                $('#carrera').html(opciones);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar las carreras:', error);
                alert('Error al cargar las carreras.');
            }
        });
    }
    

    $('#alumnos tbody').on('click','.btneditar', function(){
        let tabla = $('#alumnos').DataTable();
        let data = tabla.row($(this).parents('tr')).data()
        accion = "modificar";

        $("#dni").val(data["dni"]);
        $("#nombre").val(data["nombre"]);
        $("#apellido").val(data["apellido"]);
        $("#carrera").val(data["carrera"]);
    });

    $('#alumnos tbody').on('click','.btneliminar', function(){
        //let tabla = $('#alumnos').DataTable();
        let data = tabla.row($(this).parents('tr')).data()
        let dni = data ['dni'];

        let datos = new FormData();
        datos.append('dni',dni)
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
                    url: "../ajax/alumnos.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        tabla.ajax.reload();
                        Swal.fire('Éxito', 'Alumno eliminado correctamente', 'success');
                    }
                })
            }else{}
        });
    })

    $('.btn-agregar-alumno').on('click',function(){
        accion = "registrar";
    })
    //Guardar la informacion desde la ventana modal
    $('#btnguardar').on('click',function(){
        Swal.fire({
            title: "Confirmar ?",
            text: "Estas seguro que deseas registrar el alumno!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, deseo registrar!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                var nombre = $("#nombre").val(),
                    apellido = $("#apellido").val(),
                    carrera = $("#carrera").val(),
                    dni = $("#dni").val()
                var datos = new FormData();
                datos.append('nombre',nombre)
                datos.append('apellido',apellido);
                datos.append('dni',dni);
                datos.append('carrera',carrera);
                datos.append('accion',accion);
                
                if (nombre === '' || apellido === '' || dni === '' || carrera ===''){
                    Swal.fire('Error, Por favor, completa todos los campos', 'error.');
                    return;
                }
                $.ajax({
                    url: "../ajax/alumnos.ajax.php",
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
                        Swal.fire('Éxito', 'Alumno agregado correctamente', 'success');
                    }
                })
            }else{}
        })        
    })
    
})