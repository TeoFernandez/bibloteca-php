<?php require_once "../templates/partesuperior.php"; ?>
    <h1>Prestamos</h1>
    <p>Bienvenido a la sección de préstamos. En esta sección podrás gestionar los préstamos de libros y productos.</p>
    <div class="btn-agregar-prestamo">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar Prestamo</button>
    </div>
    <div>
        <table id="prestamo" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Numero de Inventario</th>
                    <th>DNI del Alumno</th>
                    <th>Fecha de Prestamo</th>
                    <th>Fecha de Devolucion</th>
                    <th>Estado</th>
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
                            <div class="mb-3">
                                <label for="numero_inventario">Numero de Inventario</label>
                                <input type="number" id="numero_inventario" name="numero_inventario" placeholder="Ingrese un Numero de Inventario" required>
                            </div>
                            <div class="mb-3">
                                <label for="autor">DNI del Alumno</label>
                                <input type="text" id="autor" name="autor" placeholder="Ingrese un Autor" required>
                            </div>
                            <div class="mb-3">
                                <label for="editorial">Fecha de Prestamo</label>
                                <input type="text" id="editorial" name="editorial" placeholder="Ingrese una Editorial " required>
                            </div>
                            <div class="mb-3">
                                <label for="ISBN">Fecha de Devolucion</label>
                                <input type="number" id="ISBN" name="ISBN" placeholder="Ingrese una Numero de ISBN" required>
                            </div>
                            <div class="mb-3">
                                <label for="copias">Estado</label>
                                <input type="number" id="copias" name="copias" placeholder="Ingrese la cantidad de copias" required>
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

    

<?php require_once "../templates/partesuperior.php"; ?>
