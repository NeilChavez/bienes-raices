   <main class="contenedor seccion">


     <h1>Contacto</h1>
     <picture>
       <source srcset="./build/img/destacada3.jpg" type="type/jpeg">
       <img loading="lazy" src="./build/img/destacada3.webp" alt="imagen destacada">
     </picture>

     <h2>Llene el formulario de contacto</h2>

     <?php
      if ($message) { ?>
       <p> <?php echo $message ?></p>
     <?php }
      ?>
     <form class="formulario" action="/contact" method="POST">

       <fieldset>
         <legend>Informacion Personal</legend>
         <label for="nombre">
           Nombre
         </label>
         <input type="text" id="nombre" name="contact[name]" placeholder="tu nombre">

         <!-- <label for="email">Tu email</label>
         <input type="email" id="email" name="contact[email]" placeholder="Tu email" class="hide">

         <label for="telefono">Telefono</label>
         <input type="tel" name="contact[telephon]" placeholder="tu telefono" id="telefono" class="hide">
 -->

         <label for="mensaje">Mensaje</label>
         <textarea id="mensaje" name="contact[message]" cols="30" rows="10"></textarea>
       </fieldset>
       <fieldset>
         <legend>Informacion sobre la propiedad</legend>
         <label for="opciones">Vende o compra</label>
         <select id="opciones" name="contact[type]">
           <option value="" disabled selected>Seleccione aqui</option>
           <option value="compra">Compra</option>
           <option value="vende">Vende</option>
         </select>

         <label for="presupuesto">Precio o presupuesto</label>
         <input type="number" name="contact[budget]" placeholder="Precio o presupuesto" id="presupuesto">


       </fieldset>

       <fieldset>
         <legend>Informacion sobre la propiedad</legend>
         <p>Coo desea ser contactado</p>

         <div class="forma-contacto">
           <label for="contactar-telefono">Telefono</label>
           <input type="radio" value="telefono" id="contactar-telefono" name="contact[contact]">

           <label for="contactar-email">Email</label>
           <input type="radio" value="email" id="contactar-email" name="contact[contact]">
         </div>
         <div id="contact"></div>


       </fieldset>

       <input type="submit" value="enviar" class="btn-verde">
     </form>
   </main>