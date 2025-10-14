<?php
require_once "../templates/partesuperior.php"; 
?>
    <h1>Prestamos Libros</h1>
    <p>Bienvenido a la sección de préstamos. En esta sección podrás gestionar los préstamos de libros y productos.</p>
    <div class="btn-agregar-prestamo">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar Prestamo</button>
    </div>
    <div>
        <table id="prestamos" class="display" style="width:100%">
            <thead>
                <tr>
                    <th style="display:none;">ID</th>
                    <th>Titulo</th>
                    <th>Nombre Alumno</th>
                    <th>Apellido Alumno</th>
                    <th>Fecha del Prestamo</th>
                    <th>Fecha de Devolucion</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
        </table>
    </div>

    <!-- MODAL -->
    <div class="modal fade" id="miModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Prestamo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <input type="hidden" id="id_prestamos" name="id_prestamos">
                            <div class="mb-3">
                                <label for="id_libro">Libro</label>
                                <select id="id_libro" name="id_libro" class="form-control" required></select>
                            </div>
                            <div class="mb-3">
                                <label for="dni_alumno">DNI del Alumno</label>
                                <input type="text" id="dni_alumno" name="dni_alumno" placeholder="Ingrese un DNI" required>
                            </div>
                            <div class="mb-3">
                                <label for="fecha_prestamo">Fecha de Prestamo</label>
                                <input type="date" min="2025-10-05" id="fecha_prestamo" name="fecha_prestamo" placeholder="Ingrese una Fecha " required>
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
    <script src="js/prestamos.js"></script>
<?php require_once "../templates/parteinferior.php"; ?>
