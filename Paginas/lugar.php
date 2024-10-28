<?php
    require '../conexion.php';
    $where = "";

    if (isset($_GET['id_lugar'])) {
        $id_lugar = $_GET['id_lugar'];

        $sql = "SELECT * FROM lugar WHERE id_lugar = $id_lugar";

        $resultado = $mysqli->query($sql);

        if (!$resultado) {
            echo "Error en la consulta: " . $mysqli->error;
            exit;
        }

        $lugar = $resultado->fetch_assoc();
    } else {
        echo "No se ha seleccionado ningun lugar.";
        exit;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TURISMO SOACHA | DETALLES</title>
    <link rel="shortcut icon" href="../Img/escudo.jpg" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../Css/estilos.css">
</head>

<body>
    <header>
    <div class="Contenido_header"></div>
    </header>

    <nav>
        <div class="Contenido_nav"></div>
    </nav>

    <main>              
    <section class="detalles">
        <div class="container">
        <div class="card mb-3" style="max-width: 1100px;">
            <div class="row">
                <div class="col-md-6">
                    <img src="data:image/jpg;base64, <?php echo base64_encode($lugar['imagen']); ?>" class="img-fluid" alt="Imagen lugar turistico">
                </div>
                <div class="col-md-6">
                    <h2><?php echo $lugar['nombre']; ?></h2>
                    <p><?php echo $lugar['direccion']; ?></p>
                    <p><?php echo $lugar['descripcion']; ?></p>
                    
                    <a href="../index.php" class="btn btn-outline-success" style="margin-bottom: 10px">REGRESAR</a>
                </div>
            </div>
        </div>  
    </section>
    </main>

    <footer>
        <div class="Contenido_footer"></div>
    </footer>

</body>
    <script>
        $(document).ready(function(){
            $('.Contenido_header').load('../header.html');
        });

        $(document).ready(function(){
            $('.Contenido_nav').load('./nav_lugar.php');
        });

        $(document).ready(function(){
            $('.Contenido_footer').load('../footer.html');
        });
    </script>
</html>
