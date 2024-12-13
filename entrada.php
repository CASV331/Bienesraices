<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion contenido-centrado">
  <h1>Decoracion de tu hogar</h1>

  <picture>
    <source srcset="build/img/destacada2.webp" type="image/webp" />
    <source srcset="build/img/destacada2.jpg" type="image/jpg" />
    <img
      loading="lazy"
      src="build/img/destacada2.jpg"
      alt="Imagen propiedad" />
  </picture>
  <p class="informacion-meta">
    Escrito el: <span>20/11/2023</span> por: <span>Admin</span>
  </p>
  <div class="resumen-propiedad">
    <p>
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Unde
      officiis tempore eius ipsam iure ex rerum nulla quis culpa
      repudiandae, amet quae odit excepturi libero omnis aliquid ducimus
      quos? Cumque. Lorem ipsum dolor sit, amet consectetur adipisicing
      elit. Sequi explicabo repellendus error quibusdam accusantium quos
      sapiente, possimus fugiat pariatur quae voluptates totam fuga
      provident voluptatum voluptate delectus dolorem quidem veniam.
    </p>
  </div>
</main>

<?php
incluirTemplate('footer');
?>