<?php include './includes/templates/header.php'; ?>


    <main class="contenedor seccion">

        <h1>Conoce sobre nosotros</h1>
        <div class="contenido-nosotros">
            <div class="imagen">
                <picture>
                    <source srcset="./build/img/nosotros.webp" type="image/webp">
                    <source srcset="./build/img/nosotros.jpg" type="image/jpeg">
                    <img src="./build/img/nosotros.jpg" alt="sobre nosotros">
                </picture>
            </div>

            <div class="text-nosotros">
                <blockquote>25 anios de experiencia</blockquote>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, officiis omnis numquam vero
                    soluta ducimus eaque enim a quod ullam facilis est cum magni deleniti dolores vel tempora hic sint!
                </p>
                <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Libero dignissimos aperiam eum eius! Facere
                    et inventore quam tenetur quibusdam, voluptates quas labore nisi explicabo? Reprehenderit mollitia
                    neque aliquid accusamus earum.</p>
            </div>
        </div>
    </main>

    <section class="contenedor seccion">
        <h1>Mas sobre nosotros</h1>
        <div class="iconos-nosotros">
            <div class="icono">
                <img src="./build/img/icono1.svg" alt="Icono seguridad">
                <h3>Seguridad</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, non quo voluptas reprehenderit
                    dolor tenetur iusto eveniet velit deleniti aspernatur possimus, cupiditate provident id explicabo
                    inventore nemo a ut qui.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono2.svg" alt="Icono precio">
                <h3>Precio</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, non quo voluptas reprehenderit
                    dolor tenetur iusto eveniet velit deleniti aspernatur possimus, cupiditate provident id explicabo
                    inventore nemo a ut qui.</p>
            </div>
            <div class="icono">
                <img src="./build/img/icono3.svg" alt="Icono rapidez">
                <h3>A tiempo</h3>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veritatis, non quo voluptas reprehenderit
                    dolor tenetur iusto eveniet velit deleniti aspernatur possimus, cupiditate provident id explicabo
                    inventore nemo a ut qui.</p>
            </div>
        </div>
    </section>

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