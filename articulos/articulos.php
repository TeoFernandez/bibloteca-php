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
                    <th>Cantidad</th>
                    <th>Detalle</th>
                    <th>Numero de Inventario</th>
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
                            <div class="mb-3">
                                <label for="articulo">Articulo</label>
                                <input type="text" id="articulo" name="articulo" placeholder="Ingrese un Articulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="cantidad">Cantidad</label>
                                <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese un Cantidad" required>
                            </div>
                            <div class="mb-3">
                                <label for="detalle">Detalle</label>
                                <input type="text" id="detalle" name="detalle" placeholder="Ingrese un Detalle" required>
                            </div>
                            <div class="mb-3">
                                <label for="numero_inventario">Numero de Inventario</label>
                                <input type="number" id="numero_inventario" name="numero_inventario" placeholder="Ingrese una Numero de Inventario" required>
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
        

    </script>


<?php require_once "../templates/parteinferior.php"; ?>