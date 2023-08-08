document.addEventListener('DOMContentLoaded', () => {
  eventListeners()
  darkMode()
})

function darkMode() {
  const prefiereDarkMode = window.matchMedia('(prefers-color-scheme: dark)')
  //console.log(prefiereDarkMode);
  if (prefiereDarkMode.matches) {
    document.body.classList.add('dark-mode')
  } else {
    document.body.classList.remove('dark-mode')
  }

  prefiereDarkMode.addEventListener('change', () => {
    if (prefiereDarkMode.matches) {
      document.body.classList.add('dark-mode')
    } else {
      document.body.classList.remove('dark-mode')
    }
  })

  const botonDarkMode = document.querySelector('.dark-mode-boton')

  botonDarkMode.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode')
  })
}

function eventListeners() {
  const mobileMenu = document.querySelector('.mobile-menu')
  mobileMenu.addEventListener('click', navegacionResponsive)

  // //show inputs conditionally
  // // const methodContactForm = document.querySelectorAll(
  // //   'input[name="contact[contact]"]'
  // // )

  const form = document.querySelector('.formulario')

  form && form.addEventListener('change', (e) => {
    if (e.target.matches('input[name="contact[contact]"]')) {
      const radioSelected = e.target.value
      const contactDiv = form.querySelector('#contact')
      contactDiv.innerHTML = ``

      if (radioSelected === 'telefono') {
        contactDiv.innerHTML = `
         <label for="telefono">Telefono</label>
         <input type="tel" name="contact[telephon]" placeholder="tu telefono" id="telefono" class="hide">

         <label for="fecha">Fecha:</label>
         <input type="date" id="fecha" name="contact[date]">

         <label for="hora">Hora:</label>
         <input type="time" id="hora" min="09:00" max="18:00" name="contact[hour]">
         `
      }
      if (radioSelected === 'email') {
        contactDiv.innerHTML = `
         <label for="email">Tu email</label>
         <input type="email" id="email" name="contact[email]" placeholder="Tu email" class="hide">
        `
      }
    }
  })
}

function navegacionResponsive() {
  const navegacion = document.querySelector('.navegacion')
  navegacion.classList.toggle('mostrar')

  //   if (navegacion.classList.contains("mostrar")) {
  //     navegacion.classList.remove("mostrar");
  //   } else {
  //     navegacion.classList.add("mostrar");
  //   }
}
