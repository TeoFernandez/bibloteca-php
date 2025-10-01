<?php
require_once "../templates/partesuperior.php"; 
?>

    <h1>Libros</h1>
    
    <p>Bienvenido a la sección de Libros. Aquí encontrarás las funciones para la manipulación de Libros.</p>

    <div class="btn-agregar-libro">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar Libro</button>
    </div>
    <div>
        <table id="libros" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Autor</th>
                    <th>Editorial</th>
                    <th>ISBN</th>
                    <th>Cantidad de Copias</th>
                    <th>Número de Inventario</th>
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
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Agregar Libro</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
            <div class="modal-body">
                <div>
                    <form>
                        <div>
                            <div class="mb-3">
                                <label for="titulo">Titulo</label>
                                <input type="text" id="titulo" name="titulo" placeholder="Ingrese un Titulo" required>
                            </div>
                            <div class="mb-3">
                                <label for="autor">Autor</label>
                                <input type="text" id="autor" name="autor" placeholder="Ingrese un Autor" required>
                            </div>
                            <div class="mb-3">
                                <label for="editorial">Editorial</label>
                                <input type="text" id="editorial" name="editorial" placeholder="Ingrese una Editorial " required>
                            </div>
                            <div class="mb-3">
                                <label for="ISBN">ISBN</label>
                                <input type="number" id="ISBN" name="ISBN" placeholder="Ingrese una Numero de ISBN" required>
                            </div>
                            <div class="mb-3">
                                <label for="copias">Cantidad de Copias</label>
                                <input type="number" id="copias" name="copias" placeholder="Ingrese la cantidad de copias" required>
                            </div>
                            <div class="mb-3">
                                <label for="numero_inventario">Número de Inventario</label>
                                <input type="number" id="numero_inventario" name="numero_inventario" placeholder="Ingrese una Numero de inventario" required>
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

