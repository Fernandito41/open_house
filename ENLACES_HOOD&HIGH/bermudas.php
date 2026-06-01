<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebajas hombre</title>
</head>
<link rel="stylesheet" href="../css/catalogos.css">
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

<main class="imagenes"><!--imagenes de apartado de hombre,mujer y verano-->
      <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/hombre.php"><!--Link el cual te envia a camisetas para hombres-->
      <img src="../img/camiseta.jpg"><!--Imagen de el apartado de camisetas para hombres-->
      <div class="texto">CAMISETA</div><!--Texto que se sobrepone a la imagen de camiseta-->
    </a><!--Se cierra el link-->
      </div>
    <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/pantalones1.php"><!--Link el cual te envia a jeans para hombres-->
      <img src="../img/jeans.jpg"><!--Imagen de el apartado de jeans para hombres-->
      <div class="texto">JEANS</div><!--Texto que se sobrepone a la imagen de jeans-->
    </a><!--Se cierra el link-->
  </div>
    <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/chaquetas.php"><!--Link el cual te envia a chaquetas para hombres-->
      <img src="../img/chaquetaa.jpg"><!--Imagen de el apartado de chaquetas para hombres-->
      <Div class="texto">CHAQUETAS</div><!--Texto que se sobrepone a la imagen de chaquetas-->
    </a><!--Se cierra el link-->
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/hoddies.php"><!--Link el cual te envia a hoddies para hombres-->
      <img src="../img/suaderas.jpg"><!--Imagen de el apartado de hoddies para hombres-->
      <Div class="texto">SUDADERAS</div><!--Texto que se sobrepone a la imagen de hoddies-->
    </a><!--Se cierra el link-->
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/bermudas.php"><!--Link el cual te envia a bermudas para hombres-->
      <img src="../img/bermudas.jpg"><!--Imagen de el apartado de bermudas para hombres-->
      <Div class="texto">BERMUDAS</div><!--Texto que se sobrepone a la imagen de bermudas-->
    </a><!--Se cierra el link-->
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/Accesorios.php"><!--Link el cual te envia a accesorios para hombres-->
      <img src="../img/accesorios.jpg"><!--Imagen de el apartado de accesorios para hombres-->
      <Div class="texto">ACCESORIOS</div><!--Texto que se sobrepone a la imagen de accesorios-->
    </a><!--Se cierra el link-->
  </div>
    </main>
<div class="contenedor">
    <div class="Cajas">
    <div class="cotenido">
      <a href="../catalogo hombre/bermudas/shortbasic.php">
        <img src="../img/bermudas.jpg" alt="">
      </a>
    <div class="informacion">
            <p class="nombre">Short basic</p> 
            <p class="precio">$35.00</p>
            
    </div>
    </div>
    </div>
<div class="Cajas">
    <div class="contenido">
      <a href="../catalogo hombre/bermudas/shortlunneteblack.php">
        <img src="../img/bermudas1.jpg" alt="">
      </a>
    <div class="informacion">
            <p class="nombre">Short Lunnete Black</p> 
            <p class="precio">$40.00</p>
            
    </div>
    </div>
    </div>    

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/8ball.php">
        <img src="../img/bermudas3.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Stussy 8ball Jorts</p> 
            <p class="precio">$49.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortmcdonalds.php">
        <img src="../img/bermudas4.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short Mcdonalds</p> 
            <p class="precio">$30.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortdemezclilla.php">
        <img src="../img/bermudas5.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short de mezclilla</p> 
            <p class="precio">$50.00</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortestampadoestrella.php">
        <img src="../img/bermudas6.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short Estampado Estrella</p> 
            <p class="precio">$65.00</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortbaggyelixblack.php">
        <img src="../img/bermudas7.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short baggy elix black</p> 
            <p class="precio">$55.00</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortbasicsuperbaggy.php">
        <img src="../img/bermudas8.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short basic super baggy</p> 
            <p class="precio">$49.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortbaggyamericanstyle.php">
        <img src="../img/bermudas9.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short baggy american style</p> 
            <p class="precio">$49.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortbasicbvintagecross.php">
        <img src="../img/bermudas10.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short basic vintage cross</p> 
            <p class="precio">$35.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortbaggystreetwear.php">
        <img src="../img/short_streetwear.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short baggy streetwear</p> 
            <p class="precio">$49.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortjeansoversize.php">
        <img src="../img/bermudas11.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short Jeans Oversize</p> 
            <p class="precio">$39.99</p>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo hombre/bermudas/shortoversizegris.php">
        <img src="../img/bermudas12.jpg" alt="">
          </a>
    <div class="informacion">
            <p class="nombre">Short Oversize Gris</p> 
            <p class="precio">$40.00</p>
            
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

         