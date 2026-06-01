<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Catálogo Ropa</title>
<link rel="stylesheet" href="../css/quienessomos.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
</head>
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
    <main>
        <h1>SOBRE HOOD&HIGH</h1><!--El titulo que se vera al inicio de la pagina-->
        <div class="quienes">¿QUIENES SOMOS?</div>
    <div class="contenedor"><!--Se usa la clase contenedor que se usara para almacenar cada espacio donde
        se encuentre el texto y una imagem-->
    <img src="../img/imagen1.jpg" class="img1"><!--Imagen que acompañara al texto-->
    <div>
        <h2>LA MARCA</h2>
        <p>
            Hood&High nace en el año 2025 y se presenta como una marca de ropa dirigida para el publico joven, prometiendo mantenerse al margen de la moda que varia
            constantemente, consiguiendo adaptarse siempre a las ultimas tendencias. Hood&High aprovecha la flexibilidad de su modelo de negocio
            para adaptare a los cambios que pueden producirse. Los modelos de cada campaña son desarrollados por el equipo creativo de Hood&High 
            tomando como inspiracion las tendencias de moda. El equipo de diseñadores de Hood&High esta formado por 5 profesionales que evaluan
            constantemente los cambios que se pueden producir en los gustos de ropa en los jovenes y mediante ello sacar cada vez las mejores
            colecciones de ropa del mercado.</p>
    </div>
    </div>
    <div class="contenedor"><!--Aqui se utiliza nuevamente la clase de contenedor para el otro texto-->
        <img src="../img/modelo.jpg" class="img2"><!--Imagen que acompañara al texto-->
        <div>
            <h2>EL CONCEPTO</h2>
            <p>Proyecciones graficas, pantallas y colores son las caracteristicas que convierten a Hood&High en una gran tienda, ya que toda la ropa como: pantalones, camisas, sudaderas y mas
                esta diseñada para dar la maxima relevancia a la exposicion de la moda, mientras que todos los materiales utiliazados para cada prenda han sido elegidos cuidadosamente
                para ofrecer la maxima libertad a sus clientes mientras descubren las ultimas tendencias de la moda. Todos los elementos de la tienda los diseña el equipo de imagen de
                Hood&High. Esta tienda esta diseñada con el proposito de que los jovenes puedan sentirse atraidos y comodos al revisar nuestro catalogo.</p>
        </div>
    </div>
    <div class="contenedor"><!--Otro contenedor para almacenar un texto y una imagen-->
        <img src="../img/instalaciones.jpg" class="img3"><!--Imagen que acompaña al texto-->
        <div>
            <h2>EL TARGET</h2>
            <p>El publico al cual esta enfocado Hood&High son jovenes con conocimento sobre las ultimas tendencias de la moda y los cuales quieran verse bien y tener un estilo
                propio, enfocado a jovenes interesados en la musica, redes sociales, nuevas tecnologias y que esten al tanto de las ultimas tendencias de moda.</p>
        </div>
    </div>
        <div class="contenedor"><!---otro contenedor-->
        <img src="../img/edificio.jpg" class="img4"><!--Imagen que acompañara al texto-->
        <div>
            <h2>OBJETIVOS</h2>
            <p>Hood&High siendo una tienda la cual nace mediante una tienda online, aspira a ser una de las tiendas mas reconocidas a nivel mundial, utilizando todas las herramientas
                posibles, utilizando estrategias de marketing en nuestras redes sociales para hacernos muy conocidos y luego poder tener locales en distintos paises para asi lograr
                aumentar y maximizar nuestras ventas.</p>
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
