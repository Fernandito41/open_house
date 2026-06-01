<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nuevo verano</title>
</head>
<link rel="stylesheet" href="../css/verano.css">
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

<!--Aqui empiezan los contenedores donde se almacena cada prenda que se vendera en este apartado-->
    <div class="contenedor"><!--Comienzan los contenedores de las camisas-->
    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/camisa_con_bolsillos.php">
        <img src="../img/verano1.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa con Bolsillos</p> 
            <p class="precio">$30.00</p>
            </a>
    </div>
    </div>
    </div>
    
    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/blusa_otoño.php">
        <img src="../img/Veranoss.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Boddie blanco</p> 
            <p class="precio">$25.00</p>
            </a>
        
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/blusa_con_lazos.php">
        <img src="../img/verano3.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Blusa con lazos</p> 
            <p class="precio">$27.00</p>
        </a>
           
    </div>
    </div>
    </div>
    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/Camisa_floreada.php">
        <img src="../img/verano4.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa Floreada</p> 
            <p class="precio">$15.00</p>
        </a>
            
    </div>
    </div>
    </div>
    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/Blusa_de_lino.php">
        <img src="../img/veranos1.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Blusa de Lino</p> 
            <p class="precio">$30.00</p>
        </a>
           
    </div>
    </div>
    </div>
    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/blusa_de_manga_corta.php">
        <img src="../img/veranos2.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Blusa de Manga Corta</p> 
            <p class="precio">$35.00</p>
        </a>
            
    </div>
    </div>
    </div>
    
    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/camisa_caspen.php">
        <img src="../img/veranos3.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa Caspen</p> 
            <p class="precio">$25.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/blusa_elegante.php">
        <img src="../img/veranos4.jpg" >
        <div class="informacion">
            <p class="nombre">Blusa Elegante</p> 
            <p class="precio">$45.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/camisa_henley.php">
        <img src="../img/veranos5.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa Henley</p> 
            <p class="precio">$25.00</p>
        </a>
           
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/short_corto.php">
        <img src="../img/veranos6.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Short Corto </p> 
            <p class="precio">$15.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/mesh_short.php">
        <img src="../img/veranos7.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Mesh Short</p> 
            <p class="precio">$20.00</p>
        </a>
           
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/camisa_con_boton_delantero.php">
        <img src="../img/veranos8.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa con Boton Delantero</p> 
            <p class="precio">$30.00</p>
        </a>
           
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
        <a href="../catalogo verano/playera.php">
        <img src="../img/veranos9.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Playera Marrón</p> 
            <p class="precio">$15.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/comfortcana_camisa.php">
        <img src="../img/veranos10.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa Comfortcana</p> 
            <p class="precio">$32.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/playera_blanca.php">
        <img src="../img/veranos11.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Playera Blanca</p> 
            <p class="precio">$12.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
        <a href="../catalogo verano/camisa_polo.php">
        <img src="../img/veranos12.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Camisa Polo</p> 
            <p class="precio">$38.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/blusa_esfera.php">
        <img src="../img/veranos13.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Blusa Esfera</p> 
            <p class="precio">$32.00</p>
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
          <a href="../catalogo verano/short_de_playa.php">
        <img src="../img/veranos14.jpg" alt="boxy fit">
        <div class="informacion">
            <p class="nombre">Short de Playa</p> 
            <p class="precio">$10.00</p>
        </a>
            
    </div>
    </div>
    </div>
</div><!--Terminan los contenedores de las camisas-->


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
