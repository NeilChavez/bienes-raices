<?php include './includes/templates/header.php'; ?>
    <main class="contenedor seccion contenido-centrado">
        <h1>Casa en venta frente al bosque</h1>
        <picture>
            <source srcset="./build/img/destacada.webp" type="image/webp">
            <source srcset="./build/img/destacada.jpg" type="image/jpeg">
            <img loading="lazy" src="./build/img/destacada.webp" alt="imagen destacada">
        </picture>
        <div class="resumen-propiedad">
            <p class="precio">
                $3.000.000
            </p>
            <ul class="iconos-caracteriticas">
                <li>
                    <img class="icono" loading="lazy" src="./build/img/icono_wc.svg" alt="icono wg">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="./build/img/icono_estacionamiento.svg" alt="icono estacionamiento">
                    <p>3</p>
                </li>
                <li>
                    <img class="icono" loading="lazy" src="./build/img/icono_dormitorio.svg" alt="icono dormitorio">
                    <p>3</p>
                </li>
            </ul>

            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Exercitationem, ex! Inventore molestias
                praesentium quae. Numquam, beatae similique ad est suscipit, voluptatibus aliquam iste praesentium
                voluptates voluptate quaerat. Similique, laboriosam id?
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Similique, magni! Cum, quae aut blanditiis
                distinctio similique quo, nihil vero, veniam eveniet doloribus voluptas laborum tempora impedit dolores
                soluta voluptatum magnam.
                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut nihil, impedit in dolores labore eligendi
                recusandae dolor maiores nemo eaque, repellat rem possimus mollitia temporibus odit est optio animi
                illum.
            </p>

            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam aliquam quas incidunt quos quibusdam
                possimus quaerat sapiente nesciunt repellendus expedita nobis nulla facilis suscipit illo sequi
                consectetur, aspernatur, veniam quo.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis vero maxime, recusandae assumenda
                minima illum, laborum debitis eveniet eius nesciunt, nihil ratione fuga vitae et delectus dolores
                deserunt ex maiores. Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati animi, quos qui
                minus aperiam voluptatibus cum! Itaque sequi dicta praesentium voluptatum expedita amet dolor aspernatur
                unde dolores minima! Vitae, quisquam.
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi blanditiis nemo quasi minima. Est
                quidem, vero tempore assumenda incidunt aperiam ex fugiat veniam accusantium temporibus perferendis
                dolorum totam distinctio? Deserunt.
            </p>
        </div>
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