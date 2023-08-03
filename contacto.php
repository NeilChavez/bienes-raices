<?php include './includes/templates/header.php';
require 'includes/app.php';
?>

    <main class="contenedor seccion">

        <h1>Contacto</h1>

        <picture>
            <source srcset="./build/img/destacada3.webp" type="type/webp">
            <source srcset="./build/img/destacada3.jpg" type="type/jpeg">
            <img loading="lazy" src="./build/img/destacada3.webp" alt="imagen destacada">
        </picture>

        <h2>Llene el formulario de contacto</h2>
        <form class="formulario">

            <fieldset>
                <legend>Informacion Personal</legend>
                <label for="nombre">
                    Nombre
                </label>
                <input type="text" id="nombre" placeholder="tu nombre">

                <label for="email">Tu email</label>
                <input type="email" id="email" placeholder="Tu email">

                <label for="telefono">Telefono</label>
                <input type="tel" placeholder="tu telefono" id="telefono">

                <label for="mensaje">Mensaje</label>
                <textarea name="mensaje" id="mensaje" cols="30" rows="10"></textarea>
            </fieldset>
            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <label for="opciones">Vende o compra</label>
                <select id="opciones">
                    <option value="" disabled selected>Seleccione aqui</option>
                    <option value="compra">Compra</option>
                    <option value="vende">Vende</option>
                </select>

                <label for="presupuesto">Precio o presupuesto</label>
                <input type="number" placeholder="Precio o presupuesto" id="presupuesto">


            </fieldset>

            <fieldset>
                <legend>Informacion sobre la propiedad</legend>
                <p>Coo desea ser contactado</p>

                <div class="forma-contacto">
                    <label for="contactar-telefono">Telefono</label>
                    <input type="radio" name="check" value="telefono" id="contactar-telefono">

                    <label for="contactar-email">Email</label>
                    <input type="radio" name="check" value="email" id="contactar-email">
                </div>
                <p>
                    Si eligio' telefono, elija la fecha y la hora para ser contactado
                </p>
                <label for="fecha">Fecha:</label>
                <input type="date" id="fecha">

                <label for="hora">Hora:</label>
                <input type="time" id="hora" min="09:00" max="18:00">

            </fieldset>

            <input type="submit" value="enviar" class="btn-verde">
        </form>
    </main>

    <footer class="seccion">

        <div class="contenedor contenedor-footer">
            <nav class="navegacion">
                <a href="nosotros.php">Nosotros</a>
                <a href="anuncios.php">Anuncios</a>
                <a href="blog.php">Blog</a>
                <a href="contacto.php">Contacto</a>
            </nav>
        </div>
        <p class="copyright">
            Todos los derechos reservados 2023
        </p>
    </footer>
    <script src="./build/js/bundle.min.js"></script>
</body>

</html>
