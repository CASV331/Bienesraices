<?php
// Conectar la base de datos
require 'includes/app.php';
$db = conectarDB();

// Atenticar usuario
$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email =  mysqli_real_escape_string($db, filter_var($_POST['correo'], FILTER_VALIDATE_EMAIL));

    $password = mysqli_real_escape_string($db, $_POST['contraseña']);

    if (!$email) {
        $errores[] = "El correo es obligatorio";
    }

    if (!$password) {
        $errores[] = "La contraseña es obligatoria";
    }

    if (empty($errores)) {

        //Verificar si el usuario existe
        $query = "SELECT * FROM usuarios WHERE email = '$email'";
        $resultado = mysqli_query($db, $query);
        if ($resultado->num_rows) {
            // Revisar si la contraseña es correcta
            $usuario = mysqli_fetch_assoc($resultado);

            // Verificar si la contraseña es correcta
            $auth = password_verify($password, $usuario['password']);

            if ($auth) {
                // El usuario esta autenticado
                session_start();

                // Llenar el arreglo de la sesion
                $_SESSION['usuario'] = $usuario['email'];
                $_SESSION['login'] = true;

                header('Location: admin/');
            } else {
                $errores[] = "Contraseña incorrecta";
            }
        } else {
            $errores[] = "El usuario no existe";
        }
    }
}

// Agrega el header
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
    <h1>Iniciar sesion</h1>
    <?php foreach ($errores as $error): ?>
        <div class="alerta error">
            <?php echo $error; ?>
        </div>
    <?php endforeach; ?>
    <form method="POST" class="formulario">
        <fieldset>
            <legend>Correo y contraseña</legend>
            <label for="correo">Correo</label>
            <input name="correo" id="correo" type="email" placeholder="Tu correo" required />

            <label for="contraseña">Contraseña</label>
            <input name="contraseña" id="contraseña" type="password" placeholder="Tu contraseña" required />
        </fieldset>
        <input type="submit" value="Iniciar Sesion" class="boton boton-azul" />
    </form>
</main>

<?php
incluirTemplate('footer');
?>