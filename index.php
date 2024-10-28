<?php
require 'conexion.php';
$where = "";
if (!empty($_POST)) {
    $valor = $_POST['dato'];
    if (!empty($valor)) {
        $where = "WHERE nombre LIKE '%$valor%' OR descripcion LIKE '%$valor%' OR direccion LIKE '%$valor%'";
    }
}
$sql = "SELECT * FROM lugar $where";
$resultado = $mysqli->query($sql);
if (!$resultado) {
    echo "Error en la consulta: " . $mysqli->error;
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TURISMO SOACHA | INICIO</title>
    <link rel="shortcut icon" href="./Img/escudo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="Css/estilos.css">
</head>
<body>
<header>
    <div class="Contenido_header"></div>
</header>
<nav>
    <div class="Contenido_nav"></div>
</nav>
<main>
    <section class="lugares">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php while ($row = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
                    <div class="col">
                        <div class="card shadow-sm" style="min-height: 420px;">
                            <center><img height="240px" width="215px" style="border-radius: 10px; margin-top: 15px" src="data:image/jpg;base64, <?php echo base64_encode($row['imagen']) ?>" alt="Imagen lugar turistico"></center>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['nombre'] ?></h5>
                                <h6 class="card-text"><?php echo $row['direccion'] ?></h6>
                                <br>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a type="button" href="Paginas/lugar.php?id_lugar=<?php echo $row['id_lugar']; ?>" class="btn btn-outline-success" style="margin-right: 10px">MÁS INFORMACIÓN</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
        </div>
    </section>
</main>
<footer>
    <div class="Contenido_footer"></div>
</footer>
<script>
    $(document).ready(function(){
        $('.Contenido_header').load('./header.html');
    });
    $(document).ready(function(){
        $('.Contenido_nav').load('./nav.php');
    });
    $(document).ready(function(){
        $('.Contenido_footer').load('./footer.html');
    });
</script>
</body>
</html>
