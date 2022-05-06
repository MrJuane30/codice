<template>
    <div class="bg-light">
         <h2 class="text-center text-dark titulo">Nosotros</h2>
        <div class="container" data-aos="fade-left">
            <div class="row">
            <div class="col">
                <div class=" col-md-4 card border-0 shadow" style="float:left;">
                    <img src="data:image/png;base64,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" alt="...">
                        <div class="card-body text-center">
                          <h4>Somos
                            <span
                            class="txt-rotate"
                            data-period="2000"
                            data-rotate='[ "Divulgación", "Ciencia", "Educación"]'></span>
                        </h4>
                        <h3 class=" card-title mb-0 text-center">CoDiCE</h3>
                        </div>
                </div>
                <div class="col-md border-left-0">
                  <h3 class="text-center">Nuestra historia</h3>
                    <p class="text-cjustify font-bold font-italic">CoDiCE surge de la colaboración de expertos en las distintas ramas del conocimiento, el cual  se forma a partir del Curso de Divulgación Oral de la Ciencia organizado por la Dirección  de Comunicación de la Ciencia de la Universidad Veracruzana, impartido por el M. en C. José Manuel Posada de la Concha, en el cual los integrantes unen sus habilidiades e intereses   con el único objetivo de divulgar la ciencia a la población de Xalapa y la región.
                    </p>
                     <h3 class="text-center">¿Quiénes somos?</h3>
                    <p class="text-cjustify font-bold font-italic">Somos una organización sin fines de lucro, que contribuye a la educación y al fomento de la  ciencia en México, a través de actividades lúdicas y creativas, que combina las artes y la  educación ofreciendo posibilidades de desarrollar el interés, curiosidad y gusto por lo  científico con base en la corriente pedagógica del constructivismo. Buscamos el desarrollo  del pensamiento científico a temprana edad en áreas como Matemáticas Física, Química,  Biología, Medio Ambiente y Tecnología.  
                    En CoDiCE desarrollamos programas educativos para complementar las actividades de los  sistemas de educación pública y privada, museos y espacios de tiempo libre y ocio. Las  actividades van desde talleres de ciencia, capacitación y cursos a todos aquellos interesados  en fomentar la ciencia entre la población. 
                    </p>
                    <h3 class="text-center"> Misión: </h3>
                    <p class="text-cjustify font-bold font-italic">Fomentar, promover y difundir el gusto por la ciencia, a través de la participación  comprometida y gustosa en los niños, jóvenes y adultes. Fortalecer el entendimiento de su  entorno y de su papel en la naturaleza. 
                    </p>
                    <h3 class="text-center"> Visión: </h3>
                    <p class="text-justify font-bold font-italic">La sociedad ejerce de manera plena y responsable su derecho a la ciencia, reconoce su  carácter plural como elemento sustancial de la existencia humana. La ciencia dialoga con  todos los conocimientos del país y del mundo. Las acciones científicas se definen y desarrollan mediante el consenso y la participación  activa de la ciudadanía; tanto la labor institucional y la no institucional se realizan de forma  profesional, comprometida y eficiente.  
                    </p>
                </div>
                <div class="col-md text-center">
                  <router-link to="/nosotros">
                     <a class="btn btn-outline-primary btn-lg">Ver más</a>
                  </router-link>
                </div>
            </div>
        </div>
    </div>
    <div class="bg-warning border" data-aos="fade-right">
        <div class="container my-4 mt-5">
        <h2 class="text-center text-success titulo">Contactanos</h2>
          <div class="row">
          <div class="col-lg-4 col-md-12 mb-4">
            <div class="">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <transition name="fade">
                     <img src="storage/static/facebook.jpeg" class="img-fluid rounded-circle" />
                      </transition>

                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body text-center">
                <h4 class="card-title text-primary">Nuestro facebook</h4>
                <p class="card-text">
                  ¡Comunícate a través de nuestro facebook!
                </p>
                  <a href="#!" class="btn btn-primary" @click="redirect('https://www.facebook.com/codiceoficialmx')">Ir a facebook</a>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-12 mb-4" >
            <div class="">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="storage/static/correo.jpeg" class="img-fluid rounded-circle" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body text-center">
                <h4 class="card-title">Nuestro correo</h4>
                <p class="card-text">
                  ¡Comunícate a través de nuestro correo!
                </p>
                  <router-link to="/contacto">
                     <a class="btn btn-outline-dark btn-lg">Ver más</a>
                  </router-link>              
                </div>
            </div>
          </div>

        <div class="col-lg-4 col-md-12 mb-4">
            <div class="">
              <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                <img src="storage/static/wassap.jpeg" class="img-fluid rounded-circle" />
                <a href="#!">
                  <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                </a>
              </div>
              <div class="card-body text-center">
                <h4 class="card-title text-success">Nuestro Whatsapp</h4>
                <p class="card-text">
                    ¡Comunícate a través de nuestro whatsapp!
                </p>
                  <a href="#!" class="btn btn-success">Ir a whatsapp</a>
              </div>
            </div>
          </div>
        </div>
    </div>
    </div>
    </div>        
</template>

<script>
    import animation from '../assets/animations/animationText1';
export default {
      components: {    
      },
      mounted (){
          animation         
      }, 
      methods: {
         redirect: function (link, target = '_blank') {
            window.open(link, target);
        },
      }
    
}
</script>
<style lang="scss">
.titulo {
      color: #050000;
      font-size: 7rem;
      font-family: 'Teko', sans-serif;
      text-shadow: 8px 8px #12081f;
      margin: 0;
      @media (max-width: 767px) {
        font-size: 3rem;
      }
    }
</style>

