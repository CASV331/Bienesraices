<?php
// Importar DB
$db = conectarDB();

// Consultar
$query = "SELECT * FROM propiedades LIMIT $limite";

// Obtener resultados
$resultado = mysqli_query($db, $query);

?>


<div class="contenedor-anuncios">
    <?php while ($propiedad = mysqli_fetch_assoc($resultado)): ?>
        <div class="anuncio">
            <img
                class="img-anuncio"
                src="imagenes/<?php echo $propiedad['imagen']; ?>"
                alt="Imagen anuncio"
                loading="lazy" />
            <div class="contenido-anuncio">
                <h3><?php echo $propiedad['titulo']; ?></h3>
                <p class="descripcion-anuncio">
                    <?php echo $propiedad['descripcion']; ?>
                </p>
                <p class="precio">$ <?php echo $propiedad['precio']; ?></p>

                <ul class="iconos-caracteristicas">
                    <li>
                        <img
                            loading="lazy"
                            src="build/img/icono_wc.svg"
                            alt="Icono-WC" />
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

                <a href="anuncio.php?id=<?php echo $propiedad['id']; ?>" class="boton-azul-block"> Ver propiedad </a>
            </div>
        </div>
    <?php endwhile; ?>
</div><!--Contenido anuncio-->
<?php
// Cerrar la conexion
mysqli_close($db);
?>