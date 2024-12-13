<?php
require 'includes/app.php';
incluirTemplate('header');

// Recuperar ID
$id = $_GET['id'];
$id = filter_var($id, FILTER_VALIDATE_INT);

if (!$id) {
  header('Location: /Bienesraices/');
}

// Conectar DB
$db = conectarDB();

// Consultar
$query = "SELECT * FROM propiedades WHERE id = $id";

// Obtener resultados
$resultado = mysqli_query($db, $query);
if (!$resultado->num_rows) {
  header('Location: /Bienesraices/');
}
$propiedad = mysqli_fetch_assoc($resultado);

?>

<main class="contenedor seccion contenido-centrado">
  <h2><?php echo $propiedad['titulo']; ?></h2>
  <img
    loading="lazy"
    src="imagenes/<?php echo $propiedad['imagen']; ?>"
    alt="Imagen propiedad" />
  <div class="resumen-propiedad">
    <p class="precio">$<?php echo $propiedad['precio']; ?></p>

    <ul class="iconos-caracteristicas">
      <li>
        <img loading="lazy" src="build/img/icono_wc.svg" alt="Icono-WC" />
        <p><?php echo $propiedad['wc']; ?></p>
      </li>
      <li>
        <img
          loading="lazy"
          src="build/img/icono_estacionamiento.svg"
          alt="Estacionamiento" />
        <p><?php echo $propiedad['estacionamiento']; ?></p>
      </li>
      <li>
        <img
          loading="lazy"
          src="build/img/icono_dormitorio.svg"
          alt="icono-dormitorio" />
        <p><?php echo $propiedad['habitaciones']; ?></p>
      </li>
    </ul>
    <p>
      <?php echo $propiedad['descripcion']; ?>
    </p>
  </div>
</main>
<?php
incluirTemplate('footer');
mysqli_close($db);
?>