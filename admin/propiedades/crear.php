<?php
// Validar sesion
require '../../includes/app.php';
$auth = autenticado();

if (!$auth) {
    header('Location: /Bienesraices/');
}

// Base de datos
$db = conectarDB();

// Consulta para optener los vendedores
$consulta = "SELECT * FROM vendedores";
$resultado = mysqli_query($db, $consulta);

// Arreglo con mensajes de errores
$errores = [];

$titulo = '';
$precio = '';
$descripcion = '';
$habitaciones = '';
$wc = '';
$estacionamiento = '';
$vendedorId = '';

// Ejecutar el codigo una ver que el usuario envie el formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $titulo = mysqli_real_escape_string($db, $_POST['titulo']);
    $precio = mysqli_real_escape_string($db, $_POST['precio']);
    $descripcion = mysqli_real_escape_string($db, $_POST['descripcion']);
    $habitaciones = mysqli_real_escape_string($db, $_POST['habitaciones']);
    $wc = mysqli_real_escape_string($db, $_POST['wc']);
    $estacionamiento = mysqli_real_escape_string($db, $_POST['estacionamiento']);
    $vendedorId = mysqli_real_escape_string($db, $_POST['vendedor']);
    $creado = date('Y/m/d');

    // Asignar files hacia una variable
    $imagen = $_FILES['imagen'];

    if (!$titulo) {
        $errores[] = "Debes añadir un titulo";
    }
    if (!$precio) {
        $errores[] = "El precio es obligatorio";
    }
    if (strlen($descripcion) < 50) {
        $errores[] = "La descripcion debe tener almenos 50 caracteres";
    }
    if (!$habitaciones) {
        $errores[] = "La cantidad de habitaciones es obligatorio";
    }
    if (!$wc) {
        $errores[] = "La cantidad de baños es obligatorio";
    }
    if (!$estacionamiento) {
        $errores[] = "La cantidad de estacionamientos es obligatorio";
    }
    if (!$vendedorId) {
        $errores[] = "Asigna un vendedor";
    }
    if (!$imagen['name']) {
        $errores[] = "Agrega una imagen al anuncio";
    }

    // Validar por tamaño
    $medida = 40000 * 100;

    if ($imagen['size'] > $medida || $imagen['error']) {
        $errores[] = "La imagen es muy pesada";
    }

    // Revisar que el arreglo de errores este vacio
    if (empty($errores)) {

        //* SUBIDA DE ARCHIVOS *//

        //Crear carpeta
        $carpetaImagenes = '../../imagenes/';

        if (!is_dir($carpetaImagenes)) {
            mkdir($carpetaImagenes);
        }

        $extension = explode('.', $imagen['name']);
        $extension = end($extension);

        // Generar un nombre unico
        $nombreImagen = md5(uniqid(rand(), true)) . '.' . $extension;


        // Subir la imagen
        move_uploaded_file($imagen['tmp_name'], $carpetaImagenes . $nombreImagen);

        //Insertar en la base de datos
        $query = " INSERT INTO propiedades (titulo, precio, imagen, descripcion, habitaciones, wc, estacionamiento, creado, vendedores_id) VALUES ( '$titulo', '$precio', '$nombreImagen', '$descripcion', '$habitaciones', '$wc', '$estacionamiento', '$creado', '$vendedorId' );";

        $resultado = mysqli_query($db, $query);

        if ($resultado) {
            // Redireccionar al usuario
            header("Location: /Bienesraices/admin?resultado=1");
        }
    }
}


incluirTemplate('header');
?>

<main class="contenedor seccion">
    <h1>Crear</h1>

    <a href="/Bienesraices/admin/" class="boton-azul">Volver</a>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form class="formulario" method="POST" action="/Bienesraices/admin/propiedades/crear.php" enctype="multipart/form-data">
        <fieldset>
            <legend>Informacion general</legend>

            <label for="titulo">Titulo:</label>
            <input type="text" name="titulo" id="titulo" placeholder="Titulo de propiedad" value="<?php echo $titulo; ?>">

            <label for="precio">Precio:</label>
            <input type="number" name="precio" id="precio" placeholder="Precio de propiedad" value="<?php echo $precio; ?>">

            <label for="imagen">Imagen:</label>
            <input type="file" name="imagen" id="imagen" accept="image/jpeg, image/png">

            <label for="descripcion">Descripcion:</label>
            <textarea name="descripcion" id="descripcion"><?php echo $descripcion; ?></textarea>
        </fieldset>
        <fieldset>
            <legend>Informacion de la propiedad</legend>

            <label for="habitaciones">Habitaciones:</label>
            <input type="number" name="habitaciones" id="habitaciones" min="1" max="10" value="<?php echo $habitaciones; ?>">

            <label for="wc">WC:</label>
            <input type="number" name="wc" id="wc" min="1" max="10" value="<?php echo $wc; ?>">

            <label for="estacionamiento">Estacionamientos:</label>
            <input type="number" name="estacionamiento" id="estacionamiento" min="1" max="10" value="<?php echo $estacionamiento; ?>">
        </fieldset>
        <fieldset>
            <legend>Vendedor</legend>

            <select name="vendedor">
                <option selected disabled>--Selecciona un vendedor--</option>
                <?php while ($row = mysqli_fetch_assoc($resultado)) : ?>
                    <option <?php echo $vendedorId === $row['id'] ? 'selected' : ''; ?> value="<?php echo $row['id']; ?>">
                        <?php echo $row['nombre'] . " " . $row['apellido']; ?>
                    </option>
                <?php endwhile; ?>
            </select>
        </fieldset>

        <input type="submit" class="boton boton-verde" value="Guardar propiedad">
    </form>
</main>

<?php
incluirTemplate('footer');
?>