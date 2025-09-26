<?php require_once "../templates/partesuperior.php" ?>

    <h1>Alumnos</h1>
    <p>Bienvenido a la sección de alumnos. Aquí podrás gestionar la información de los alumnos.</p>

    <div class="btn-agregar-alumno">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar Alumno</button>
    </div>
    <div>
        <table id="alumnos" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Dni</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Carrera</th>
                </tr>
            </thead>
        </table>
    </div>
    <!-- MODAL -->
    <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Alumno</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <div class="mb-3">
                                <label for="dni">Dni</label>
                                <input type="number" id="dni" name="dni" placeholder="Ingrese un Dni" required>
                            </div>
                            <div class="mb-3">
                                <label for="nombre">Nombre</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Ingrese un Nombre" required>
                            </div>
                            <div class="mb-3">
                                <label for="apellido">apellido</label>
                                <input type="text" id="apellido" name="apellido" placeholder="Ingrese un Apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="carrera">Carrera</label>
                                <input type="text" id="carrera" name="carrera" placeholder="Ingrese una Carrera" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="button" class="btn btn-primary" id="btnguardar">Guardar</button>
                </div>
            </div>
        </div>
    </div>
    <!-- 1. jQuery primero -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Data tables -->
    <script src="//cdn.datatables.net/2.3.3/js/dataTables.min.js"></script>
    <!-- Fontawesome -->
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <script>
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
        })
    </script>
<?php require_once "../templates/parteinferior.php" ?>
