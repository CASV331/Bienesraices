<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Conoce sobre nosotros</h1>
  <div class="contenido-nosotros">
    <div class="imagen">
      <picture>
        <source srcset="build/img/nosotros.webp" type="image/web" />
        <source srcset="build/img/nosotros.jpg" type="image/jpg" />
        <img
          loading="lazy"
          src="build/img/nosotros.jpg"
          alt="Imagen sobre nosotros" />
      </picture>
    </div>

    <div class="texto-nostros">
      <blockquote>25 años de experiencia</blockquote>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Neque
        sapiente alias inventore? Ducimus libero qui voluptatibus enim
        adipisci architecto nulla dignissimos odio! Non quaerat cumque,
        debitis totam exercitationem sint quasi!
      </p>
      <p>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Cumque
        quisquam voluptate quod, eveniet natus, ducimus sed enim odio
        deleniti dolores sunt quidem.
      </p>
    </div>
  </div>
</main>

<section class="contenedor seccion">
  <h2>Mas sobre nosotros</h2>
  <div class="iconos-nosotros">
    <div class="icono">
      <img
        src="build/img/icono1.svg"
        alt="Icono seguridad"
        loading="lazy" />
      <h3>Seguridad</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis
        molestiae voluptas, quisquam dicta libero amet ducimus numquam quas
        fugiat quod nostrum commodi saepe aliquam ipsa odio hic dolorem
        itaque exercitationem!
      </p>
    </div>
    <div class="icono">
      <img
        src="build/img/icono2.svg"
        alt="Icono seguridad"
        loading="lazy" />
      <h3>Precio</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis
        molestiae voluptas, quisquam dicta libero amet ducimus numquam quas
        fugiat quod nostrum commodi saepe aliquam ipsa odio hic dolorem
        itaque exercitationem!
      </p>
    </div>
    <div class="icono">
      <img
        src="build/img/icono3.svg"
        alt="Icono seguridad"
        loading="lazy" />
      <h3>A Tiempo</h3>
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis
        molestiae voluptas, quisquam dicta libero amet ducimus numquam quas
        fugiat quod nostrum commodi saepe aliquam ipsa odio hic dolorem
        itaque exercitationem!
      </p>
    </div>
  </div>
</section>

<?php
incluirTemplate('footer');
?>