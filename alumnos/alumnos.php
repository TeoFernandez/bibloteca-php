<?php
require_once "../templates/partesuperior.php" 
?>
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
                                <label for="apellido">Apellido</label>
                                <input type="text" id="apellido" name="apellido" placeholder="Ingrese un Apellido" required>
                            </div>
                            <div class="mb-3">
                                <label for="carrera">Carrera</label>
                                <select id="carrera" name="carrera" class="form-control" required></select>
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
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/alumnos.js"></script>
<?php require_once "../templates/parteinferior.php" ?>
