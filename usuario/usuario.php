<?php
require_once "../templates/partesuperior.php" 
?>
    <h1>Usuarios</h1>
    <p>Bienvenido a la sección de usuarios. Aquí podrás gestionar la información de los usuarios.</p>

    <div class="btn-agregar-usuario">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#miModal">Agregar Usuario</button>
    </div>

    <div>
        <table id="usuario" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Usuario</th>
                    <th>Clave</th>
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
                            <input type="hidden" id="id" name="id">
                            <div class="mb-3">
                                <label for="username">Usuario</label>
                                <input type="text" id="username" name="username" placeholder="Ingrese un Usuario"  required>
                            </div>
                            <div class="mb-3">
                                <label for="clave">Contraseña</label>
                                <input type="text" id="clave" name="clave" placeholder="Ingrese una Contraseña"  required>
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
    <script>
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="js/usuario.js"></script>
<?php require_once "../templates/parteinferior.php" ?>
