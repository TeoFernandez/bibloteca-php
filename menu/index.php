<?php require_once "../templates/partesuperior.php" ?>

    <h1>Panel de Control</h1>
    <p>Bienvenido a la biblioteca</p>

    <div>
        <h3>📚 Libros más prestados</h3>
        <canvas id="graficolibros" style="width:100%;max-width:700px"></canvas>
    </div>
    <div>
        <h3>📚 Libros sin devolverr</h3>
        <canvas id="graficosindevolver" style="width:100%;max-width:700px"></canvas>
    </div>
    <div>
        <h3>📚 Alumnos con mas prestamos</h3>
        <canvas id="graficoalumnos" style="width:100%;max-width:700px"></canvas>
    </div>

    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js">
    </script>
    <script src="js/index.js"></script>
<?php require_once "../templates/parteinferior.php" ?>
