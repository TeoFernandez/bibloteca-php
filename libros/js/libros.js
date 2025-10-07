$(document).ready(function(){
    let accion = "";
    let tabla = new DataTable ('#libros',{
        dom: 'Bfrtip',
        language: {
        url: 'https://cdn.datatables.net/plug-ins/1.10.24/i18n/Spanish.json'
        },
        ordering: false,
        info: false,
        responsive: true,
        ajax:{
            url:'../ajax/libros.ajax.php',
            dataSrc: ''
        },
        columns: [
            { data: 'titulo' },
            { data: 'autor'},
            { data: 'editorial'},
            { data: 'ISBN'},
            { data: 'numero_inventario'},
            { data: 'estado'},
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
    document.querySelectorAll('.btn-close').forEach(btn => {
        btn.addEventListener('click', () => setTimeout(() => btn.blur(), 0));
    });
    $('#miModal').on('shown.bs.modal',function(){
        cargarEstados();
    })
    function cargarEstados(){
        $.ajax({
            url: '../ajax/estado.ajax.php',
            method: 'GET',
            dataType: 'json',
            success: function(data) {
                let opciones = '<option value="">Seleccione un Estado</option>';
                data.forEach(function(estado){
                    opciones += `<option value="${estado.id_estado}">${estado.estado}</option>`;
                });
                $('#estado').html(opciones);
            },
            error: function(xhr, status, error) {
                console.error('Error al cargar los estado:', error);
                alert('Error al cargar los estado.');
            }
        });
        
    }
    $('#libros tbody').on('click','.btneditar', function(){
        //let tabla = $('#alumnos').DataTable();
        let data = tabla.row($(this).parents('tr')).data()
        accion = "modificar";

        $("#id_libro").val(data["id_libro"]);
        $("#titulo").val(data["titulo"]);
        $("#autor").val(data["autor"]);
        $("#editorial").val(data["editorial"]);
        $("#ISBN").val(data["ISBN"]);
        $("#numero_inventario").val(data["numero_inventario"]);
        $("#estado").val(data["estado"]);

    });
    $('#libros tbody').on('click','.btneliminar', function(){
        let data = tabla.row($(this).parents('tr')).data()
        let id_libro = data ['id_libro'];

        let datos = new FormData();
        datos.append('id_libro',id_libro)
        datos.append('accion','eliminar');

        Swal.fire({
            title: "Confirmacion?",
            text: "Estas seguro que deseas eliminar a este libro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "../ajax/libros.ajax.php",
                    method: "POST",
                    data:datos,
                    cache:false,
                    contentType: false,
                    processData: false,
                    success:function(respuesta){
                        console.log(respuesta);
                        tabla.ajax.reload();
                        Swal.fire('Éxito', 'Libro eliminado correctamente', 'success');
                    }
                })
            }else{}
        });
    })
    $('.btn-agregar-libro').on('click',function(){
        accion = "registrar";
    })
    //Guardar la informacion desde la ventana modal
    $('#btnguardar').on('click',function(){
        Swal.fire({
            title: "Confirmar ?",
            text: "Estas seguro que deseas registrar el Libro!",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: "#3085d6",
            cancelButtonColor: "#d33",
            confirmButtonText: "Si, deseo registrar!",
            cancelButtonText: "No, cancelar!"
            }).then((result) => {
            if (result.isConfirmed) {
                var id_libro = $("#id_libro").val(),
                    titulo = $("#titulo").val(),
                    autor = $("#autor").val(),
                    editorial = $("#editorial").val(),
                    ISBN = $("#ISBN").val()
                    numero_inventario = $("#numero_inventario").val()
                    estado = $("#estado").val()
                var datos = new FormData();
                datos.append('id_libro',id_libro)
                datos.append('titulo',titulo);
                datos.append('autor',autor);
                datos.append('editorial',editorial);
                datos.append('ISBN',ISBN);
                datos.append('numero_inventario',numero_inventario);
                datos.append('estado',estado);
                datos.append('accion',accion);
                
                if (titulo === '' || autor === '' || editorial === '' || ISBN ==='' || numero_inventario ==='' || estado ===''){
                    Swal.fire('Error, Por favor, completa todos los campos', 'error.');
                    return;
                }
                $.ajax({
                    url: "../ajax/libros.ajax.php",
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
                        Swal.fire('Éxito', 'Libro agregado correctamente', 'success');
                    }
                })
            }else{}
        })        
    })

})