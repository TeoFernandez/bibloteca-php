<?php
require_once "../templates/partesuperior.php"; 
?>
    <h1>Articulos</h1>
    <p>Bienvenido a la sección de artículos. Aquí encontrarás las funciones para la manipulación de articulos.</p>

    <div class="btn-agregar-articulo">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar Articulo</button>
    </div>
    <div>
        <table id="articulos" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Articulo</th>
                    <th>Descripcion</th>
                    <th>Numero Inventario</th>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Articulo</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <input type="hidden" id="id_articulo" name="id_articulo">
                            <div class="mb-3">
                                <label for="articulo">Articulo</label>
                                <input type="text" id="articulo" name="articulo" placeholder="Ingrese un Articulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="detalle">Descripcion</label>
                                <input type="text" id="detalle" name="detalle" placeholder="Ingrese una Descripcion" required>
                            </div>
                            <div class="mb-3">
                                <label for="numero_inventario">Numero Inventario</label>
                                <input type="text" id="numero_inventario" name="numero_inventario" placeholder="Ingrese un Numero de Inventario" required>
                            </div>
                            <div class="mb-3">
                                <label for="estado">Estado</label>
                                <select id="estado" name="estado" class="form-control" required></select>
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
    <script src="js/articulos.js"></script>


<?php require_once "../templates/parteinferior.php"; ?>