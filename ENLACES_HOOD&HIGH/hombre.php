<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebajas hombre</title>
</head>
<link rel="stylesheet" href="../css/hombre.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

<body>
      <!-- Aca empieza el navbar(barra de navegacion) -->
    <nav class="navbar"><!--Inicia la barra de navegacion con la clase para darle estilo-->
        <button class="icono_hamburgesa"><i class="bi bi-list"></i></button><!--Icono de barra lateral donde ira un tipo menu-->
        <div class="logo">HOOD&HIGH</div>

        <ul class="nav-links"><!--aqui van los enlaces de la barra de navegacion cada li es un enlace que redirige entre si-->
            <li><a href="../ENLACES_HOOD&HIGH/hombre.php">HOMBRE</a></li>
            <li><a href="../ENLACES_HOOD&HIGH/mujer.php">MUJER</a></li>
            <li><a href="../ENLACES_HOOD&HIGH/verano.php">VERANO</a></li>
        </ul><!--Termina los enlaces de la barra de navegacion-->

        <div class="search-container"><!--Contenedor de barra de busqueda-->
          <form action="../buscador/buscar.php" method="get">
            <input type="text" name="q" placeholder="Buscar..." class="search-input"><!--Barra de busqueda-->
            <button class="search-btn"><i class="fas fa-search"></i></button><!--Boton de busqueda-->
          </form>
        </div>
      
       <!-- ICONOS sacados de la libreria boopstrap -->
         <a href="../base.php">
        <button class="inicio"><i class="bi bi-house"></i></button><!--Icono de inicio-->
        </a>

        <a href="../carrito/carritodecompras.php"><!--Icono de carrito de compras-->
            <button class="carrito"><i class="bi bi-cart2"></i></button>
        </a>
        <!--finalizan los iconos-->
        <div class="registro-contenedor">
    <?php if(isset($_SESSION['usuario'])): ?>
        <!-- Usuario logueado: botón redirige al perfil -->
        <a href="../perfil/perfil.php" class="registro-link">
            <button class="registro">
                <i class="fa-regular fa-user"></i>
                <?php echo " " . $_SESSION['usuario']; ?>
            </button>
        </a>
    <?php else: ?>
          <!-- Usuario no logueado: botón redirige a iniciar sesión -->
        <a href="../../login/iniciar sesion.php" class="registro-link">
            <button class="registro">
                <i class="fa-regular fa-user"></i>
         
            </button>
        </a>
    <?php endif; ?>
</div> <!--Finaliza el icono de usuario con menu desplegable-->
        <!-- MENU LATERAL -->
        <div class="barra_lateral"><!--Menu lateral que se activa al dar click en el icono de barra lateral-->
            <ul><!--Enlaces del menu lateral-->
                <li><a href="../ENLACES_HOOD&HIGH/hombre.php">Hombre</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/mujer.php">Mujer</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/verano.php">Verano</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/Accesorios.php">Accesorios</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/enlace_Novedades.html">Novedades</a></li>
                <li><a href="../ENLACES_HOOD&HIGH/enlace_Ofertas.html">Ofertas</a></li>
            </ul>
        </div><!--Finaliza el menu lateral-->
    </nav><!--Finaliza todo el navbar(barra de navegacion)-->

<section class="nuevo"><!--Aqui comienzan las imagenes del apartado de nuevo-->
      <div class="nuevos_imagenes">
    <a href="../ENLACES_HOOD&HIGH/nuevo.php">
      <img src="../img/nuevo.jpg" alt="hombre">
      <div class="texto_nuevo">NEW</div>
    </a>
      </div>
    <div class="nuevos_imagenes">
    <a href="../ENLACES_HOOD&HIGH/nuevo.php">
      <img src="../img/nuevo2.jpg" alt="mujer">
      <div class="texto_nuevo">NEW</div>
    </a>
  </div>
 </section>
 <!--Aqui terminan las imagenes del apartado nuevo-->

 <!--Aqui comienza la franja de movimiento de las ofertas -->
<div class="franja-ofertas">
  <span class="ofertas-movimiento">
     <b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! | <b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |<b>OFERTAS 50%</b> por tu tercer prenda | ¡Aprovecha ahora! |
  </span>
</div>
<!--Aqui terminala franja de movimiento de las ofertas-->

<!--Aqui empiezan los contenedores donde se almacena cada camisa
    que se vendera para los hombres-->
     <main class="imagenes"><!--Imagenes de apartado de camiseta, jeans, chaquetas, sudaderas, bemudas y accesorios-->
      <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/hombre.php">
      <img src="../img/camiseta.jpg">
      <div class="texto">CAMISETA</div>
    </a>
      </div>
    <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/pantalones1.php">
      <img src="../img/jeans.jpg">
      <div class="texto">JEANS</div>
    </a>
  </div>
    <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/chaquetas.php">
      <img src="../img/chaquetaa.jpg">
      <Div class="texto">CHAQUETAS</div>
    </a>
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/hoddies.php">
      <img src="../img/suaderas.jpg">
      <Div class="texto">SUDADERAS</div>
    </a>
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/bermudas.php">
      <img src="../img/bermudas.jpg">
      <Div class="texto">BERMUDAS</div>
    </a>
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/Accesorios.php">
      <img src="../img/accesorios.jpg">
      <Div class="texto">ACCESORIOS</div>
    </a>
  </div>
    </main>
    <!--Aqui termina los apartados de camiseta, jeans, chaquetas, sudaderas, bemudas y accesorios-->

<div class="contenedor"><!--Comienzan los contenedores de las camisas-->
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisaboxyfit.php">
        <div class="contenido">
        <img src="../img/boxi.jpg" alt="boxy fit">
         </a>
        <div class="informacion">
        <p class="nombre">Camisa boxy fit racodeloir hood&high</p>
        <p class="precio">$30.00</p>
       
        
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_corte_oversize_another.php">
        <div class="contenido">
        <img src="../img/camisa27.jpg" alt="">
         </a>
        <div class="informacion">
            <p class="nombre">Camisa corte oversize another</p>
            <p class="precio">$25.99</p>
        
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_corte_oversize_bordado.php">
        <div class="contenido">
        <img src="../img/camisa26.jpg" alt="">
         </a>
        <div class="informacion">
            <p class="nombre">Camisa corte Oversize bordado</p>
            <p class="precio">$25.99</p>
        
            
    </div>
    </div>
    </div> 
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_corte_oversize_hard.php">
        <div class="contenido">
        <img src="../img/camisa25.jpg" alt="">
         </a>
        <div class="informacion">
            <p class="nombre">Camisa corte oversize hard</p>
            <p class="precio">$25.99</p>
        
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_corte_oversize_cosmic_cherries.php">
        <div class="contenido">
        <img src="../img/camisa21.jpg" alt="">
         </a>
        <div class="informacion">
            <p class="nombre">Camisa corte oversize cosmic cherries</p>
            <p class="precio">$35.00</p>
        
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_essentials.php">
        <div class="contenido">
        <img src="../img/camisa12.jpg" alt="">
         </a>
        <div class="informacion">
            <p class="nombre">Camisa ESSENTIALS</p>
            <p class="precio">$40.00</p>
        
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_off_white.php">
        <div class="contenido">
        <img src="../img/camisa14.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa OFF WHITE</p>
            <p class="precio">$40.00</p>
    
            
    </div>
    </div>
    </div>
    
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_,manga_corta2pac.php">
        <div class="contenido">
        <img src="../img/overzide.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa manga corta 2pac</p> 
            <p class="precio">$55.00</p>
    
            
    </div>
    </div>
    </div>
    
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_street.php">
        <div class="contenido">
        <img src="../img/ov2.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camiseta street life</p> 
            <p class="precio">$35.00</p>
    
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a  href="../catalogo hombre/camisetas/camisablurry.php">
        <div class="contenido">
        <img src="../img/ov3.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa oversize BLURRY</p> 
            <p class="precio">$35.00</p>
    
            
    </div>
    </div>
    </div>

    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisa_rockstar.php">
        <div class="contenido">
        <img src="../img/ov4.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa manga corta ROCKSTAR </p> 
            <p class="precio">$25.00</p>
    
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisablack.php">
        <div class="contenido">
        <img src="../img/ov5.jpg" alt=""> 
         </a>
    <div class="informacion">
            <p class="nombre">camisa basic black</p> 
            <p class="precio">$22.00</p>
    
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisatrapstar.php">
        <div class="contenido">
        <img src="../img/ov6.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa trapstar</p> 
            <p class="precio">$25.00</p>
    
            
    </div>
    </div>
    </div>
    <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisabottega.php">
        <div class="contenido">
        <img src="../img/camisa10.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa overzise BOTTEGA WHITE</p> 
            <p class="precio">$35.00</p>

          </div> 
          </div> 
          </div>
          

     <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisastellar.php">
        <div class="contenido">
        <img src="../img/camisa20.jpg.." alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa STELLAR</p> 
            <p class="precio">$28.00</p>
      </div>      
    </div>
    </div>
     <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisacasualgris.php">
        <div class="contenido">
        <img src="../img/imagenov8.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa TRUSHER GRAY</p> 
            <p class="precio">$35.00</p>
           
    </div>
    </div>
    </div>

     <div class="Cajas">
      <a href="../catalogo hombre/camisetas/camisacasualblanca.php">
        <div class="contenido">
        <img src="../img/camisaov9.jpg" alt="">
         </a>
    <div class="informacion">
            <p class="nombre">Camisa TRUSHER WHITE</p> 
            <p class="precio">$38.00</p>
    </div>
    </div>
    </div>
    
            
    <!--empieza el footer(pie de pagina)-->
   <footer class="footer">
          <div class="footer-texto"><!--Texto del pie de pagina-->
          <p>SUSCRIBETE A NUESTRAS PAGINAS Y SE EL PRIMERO EN DESCUBRIR SU ESTILO</p>
          </div>
          <div class="footer-contenido"><!--Contenedor del pie de pagina-->
            <div class="social-column"><!--Inicio de nuestras redes sociales-->
          <a href="#" class="icon facebook">
      <div class="tooltip">Facebook</div>
      <span><i class="fab fa-facebook-f"></i></span><!--Icono de facebook-->
    </a>
    <a href="https://x.com/Hoodandhigh" class="icon twitter">
      <div class="tooltip">Twitter</div>
      <span><i class="fab fa-twitter"></i></span><!--Icono de twitter-->
    </a>
    <a href="https://www.instagram.com/hood_and_high/" class="icon instagram">
      <div class="tooltip">Instagram</div>
      <span><i class="fab fa-instagram"></i></span><!--Icono de instagram-->
    </a>
    <a href="https://www.tiktok.com/@hoodandhigh_sv" class="icon tiktok">
      <div class="tooltip">TikTok</div>
      <span><i class="fab fa-tiktok"></i></span><!--Icono de tiktok-->
      </a>
      <a href="https://wa.me/50377509207"class="icon whatsap">
        <div class="tooltip">Whatsap</div>
        <span><i class="fab fa-whatsapp"></i></span><!--Icono de whatsap-->
      </a>
      </div>
      <div class="footer-columns"><!--apartado de sugerencias-->
  <div class="footer-column">
    <h3>¿Necesitas ayuda?</h3><!--Titulo del apartado-->
    <div class="footer-links">
    <a href="../consultas/enviar_email.php" class="email-link"> Enviar e-mail<!--Enlace para enviar email-->
      <span class="small-text">Te responderemos lo antes posible</span><!--Texto pequeño debajo del enlace-->
    </a>
  </div><!--Finaliza el apartado de enviar email-->
  </div>
  <div class="footer-column"><!--Inicio del apartado de que es hood&high-->
  <h3 class="footer-title">Que es HOOD&HIGH</h3>
  <div class="footer-links">
    <a href="../ENLACES_HOOD&HIGH/enlace_sobre nostros.php">Sobre Hood&high</a><!--Enlaces que redirigen en el pie de pagina-->
    <a href="../ENLACES_HOOD&HIGH/enlace_Ofertas.html">Ofertas</a>
    <a href="../ENLACES_HOOD&HIGH/enlace_Novedades.html">Novedades</a>
  </div><!--Finaliza el apartado de que es hood&high-->
</div>

<div class="footer-column"><!--Inicio del apartado de te puede interesar-->
  <h3 class="footer-title">Te puede interesar</h3>
  <div class="footer-links">
    <a href="../ENLACES_HOOD&HIGH/chaquetas.php">Chaquetas</a>
    <a href="../ENLACES_HOOD&HIGH/tops_boddies.php">Tops y crop tops</a>
    <a href="../ENLACES_HOOD&HIGH/jeans1_mujer.php">Jeans</a>
    <a href="../ENLACES_HOOD&HIGH/pantalones1.php">Pantalones</a>
    <a href="../ENLACES_HOOD&HIGH/hoddies.php">Camisetas y hoodies</a>
  </div><!--Finaliza el apartado de te puede interesar-->
</div>
  </div>
  </div>
  </footer><!--finaliza el footer-->
  <div class="footer-legal"><!--Inicio del pie de pagina legal-->
  <div class="footer-legal-links"><!--enlaces de todos los terminos (ninguno redirige solo es vista)-->
    <a href="#">Terminos y condiciones</a>
    <a href="#">De #hood&high</a>
    <a href="#">Condiciones de uso</a>
    <a href="#">Politica de privacidad</a>
  </div>
  <span class="footer-legal-2025">© 2025 HOOD&HIGH</span>
</div><!--Aqui termina pie de pagina-->
 <!-- SCRIPTS -->
    <script>
        const hamburguesa = document.querySelector('.icono_hamburgesa');
        const barraLateral = document.querySelector('.barra_lateral');
        hamburguesa.addEventListener('click', () => {
            barraLateral.classList.toggle('activa');
        });
        document.addEventListener('click', (e) => {
            if (barraLateral.classList.contains('activa') &&
                !barraLateral.contains(e.target) &&
                !hamburguesa.contains(e.target)) {
                barraLateral.classList.remove('activa');
            }
        });
    </script>
    </body>
</html>