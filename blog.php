<?php
require 'includes/app.php';
incluirTemplate('header');
?>
<main class="contenedor seccion contenido-centrado">
  <h2>Nuestro blog</h2>

  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog1.webp" type="image/webp" />
        <source srcset="build/img/blog1.jpg" type="image/jpg" />
        <img loading="lazy" src="build/img/blog1.jpg" alt="Texto entrada
            blog"
          </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Terraza en el techo de tu casa</h4>
        <p>Escrito el: <span>20/11/2023</span> por: <span>Admin</span></p>

        <p>
          Consejos para construir una terraza en el techo de tu casa con los
          mejores materiables y ahorrando dinero
        </p>
      </a>
    </div>
  </article>
  <article class="entrada-blog">
    <div class="imagen">
      <picture>
        <source srcset="build/img/blog2.webp" type="image/webp" />
        <source srcset="build/img/blog2.jpg" type="image/jpg" />
        <img loading="lazy" src="build/img/blog2.jpg" alt="Texto entrada
            blog"
          </picture>
    </div>
    <div class="texto-entrada">
      <a href="entrada.html">
        <h4>Guia para la decoracion de tu hogar</h4>
        <p>Escrito el: <span>23/11/2023</span> por: <span>Admin</span></p>

        <p>
          Maximiza el espacio en tu hogar con esta guia, aprende a combinar
          muebles y colores para darle vida a tu hogar
        </p>
      </a>
    </div>
  </article>
</main>

<?php
incluirTemplate('footer');
?>