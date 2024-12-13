<?php
require 'includes/app.php';
incluirTemplate('header');
?>

<main class="contenedor seccion">
  <h1>Contacto</h1>

  <picture>
    <source srcset="build/img/destacada3.webp" type="image/webp" />
    <source srcset="build/img/destacada3.jpg" type="image/jpg" />
    <img
      loading="lazy"
      src="build/img/destacada3.jpg"
      alt="Imagen destacada" />
  </picture>
  <h2>Comuniquese con nosotros</h2>
  <form class="formulario">
    <fieldset>
      <legend>informacion personal</legend>
      <label for="nombre">Nombre</label>
      <input id="nombre" type="text" placeholder="Tu nombre" />

      <label for="email">Email</label>
      <input id="email" type="email" placeholder="Tu email" />

      <label for="telefono">Telefono</label>
      <input id="telefono" type="tel" placeholder="Tu telefono" />

      <label for="mensaje">Mensaje</label>
      <textarea id="mensaje"></textarea>
    </fieldset>

    <fieldset>
      <legend>Informacion sobre la propiedad</legend>

      <label for="opciones">Vende o compra:</label>
      <select id="opciones">
        <option value="" disabled selected>
          --Seleccione una opcion--
        </option>
        <option value="Compra">Compra</option>
        <option value="Vende">Vende</option>
      </select>

      <label for="presupuesto">Presupuesto o presupuesto</label>
      <input
        id="presupuesto"
        type="number"
        placeholder="Tu precio o presupuesto" />
    </fieldset>
    <fieldset>
      <legend>Contacto</legend>
      <p>¿Como desea ser contactado?</p>

      <div class="forma-contacto">
        <label for="contactar-telefono">Telefono</label>
        <input
          name="contacto"
          type="radio"
          value="telefono"
          id="contactar-telefono" />
        <label for="contactar-email">Email</label>
        <input
          name="contacto"
          type="radio"
          value="email"
          id="contactar-email" />
      </div>

      <p>Si eligio telefono, porfavor eliga la fecha y hora</p>

      <label for="fecha">Fecha</label>
      <input type="date" id="fecha" />
      <label for="hora">Hora</label>
      <input type="time" id="hora" min="09;00" max="18:00" />
    </fieldset>

    <input type="submit" class="boton-azul" value="Enviar" />
  </form>
</main>

<?php
incluirTemplate('footer');
?>