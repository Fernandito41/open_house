<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebajas mujer</title>
</head>
<body>
    <link rel="stylesheet" href="../css/catalogos.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

</body>
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
    <a href="../ENLACES_HOOD&HIGH/mujer.php"><!--Link el cual te envia a camisetas para mujeres-->
      <img src="../img/woman.jpg"><!--Imagen de el apartado de camisetas para mujeres-->
      <div class="texto">CAMISETA</div><!--Texto que se sobrepone a la imagen de camiseta-->
    </a><!--Se cierra el link-->
      </div>
    <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/jeans1_mujer.php"><!--Link el cual te envia a jeans para mujeres-->
      <img src="../img/pantalon.mujer.jpg"><!--Imagen de el apartado de jeans para mujeres-->
      <div class="texto">JEANS</div><!--Texto que se sobrepone a la imagen de jeans-->
    </a><!--Se cierra el link-->
  </div>
    <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/vestidos_y_monos.php"><!--Link el cual te envia a vestidos y monos para mujeres-->
      <img src="../img/vestidos.jpg"><!--Imagen de el apartado de vestidos y monos para mujeres-->
      <Div class="texto">VESTIDOS Y MONOS</div><!--Texto que se sobrepone a la imagen de vestidos y monos-->
    </a><!--Se cierra el link-->
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/sudadera_mujer.php"><!--Link el cual te envia a sudaderas para mujeres-->
      <img src="../img/sudadera,jpg.jpg"><!--Imagen de el apartado de sudaderas para mujeres-->
      <Div class="texto">SUDADERAS</div><!--Texto que se sobrepone a la imagen de sudaderas-->
    </a><!--Se cierra el link-->
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/pantalon_mujer.php"><!--Link el cual te envia a pantalones para mujeres-->
      <img src="../img/woman1.jpg"><!--Imagen de el apartado de pantalones para mujeres-->
      <Div class="texto">PANTALONES</div><!--Texto que se sobrepone a la imagen de pantalones-->
    </a><!--Se cierra el link-->
  </div>
  <div class="texto_imagen">
    <a href="../ENLACES_HOOD&HIGH/tops_boddies.php"><!--Link el cual te envia a top y boddies para mujeres-->
      <img src="../img/topsyboddies.jpg"><!--Imagen de el apartado de top y boddies para mujeres-->
      <Div class="texto">TOPS Y BODDIES</div><!--Texto que se sobrepone a la imagen de top y boddies-->
    </a><!--Se cierra el link-->
  </div>
    </main>
    <div class="contenedor"><!--Aqui empiezan los contenedores de las prendas de mujeres donde aparecera
    la imagen de la  prenda, talla y precio-->
     <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido1.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido4,jpg.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Vestido Verde Corto</p> <!--El nomnbre de la prenda-->
            <p class="precio">25.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>
    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido2.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido3.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono Color Negro</p> <!--El nomnbre de la prenda-->
            <p class="precio">$30.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>
    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/Monocolorblanco.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido3.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestidos2.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono Color Blanco</p> <!--El nomnbre de la prenda-->
            <p class="precio">$30.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>
    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido4.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestidos1.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono Color Negro Grafito</p> <!--El nomnbre de la prenda-->
            <p class="precio">$35.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido5.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestidos.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono Color Blanco Escarcha</p> <!--El nomnbre de la prenda-->
            <p class="precio">$35.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/Vestidonegrocorto.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido6.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido5.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Vestido negro corto</p> <!--El nomnbre de la prenda-->
            <p class="precio">$20.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido7.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido6.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Vestido celeste mediano</p> <!--El nomnbre de la prenda-->
            <p class="precio">$28.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/monocolorcafe">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido8.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/mono1.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono Color Cafe</p> <!--El nomnbre de la prenda-->
            <p class="precio">$30.00</p><!--El precio de la prenda-->
        </a>
        
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido9.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido7.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">flare jegs jeans color rojo</p><!--El nomnbre de la prenda--> 
            <p class="precio">$45.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido10.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido8.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">flare jegs jeans verde oscuro</p> <!--El nomnbre de la prenda-->
            <p class="precio">$40.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido11.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido9.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">flare jegs jeans verde claro</p> <!--El nomnbre de la prenda-->
            <p class="precio">$45.00</p><!--El precio de la prenda-->
        </a>
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/flarejeansaqua.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido12.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido10.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">flare jegs jeans aqua</p> <!--El nomnbre de la prenda-->
            <p class="precio">$40.00</p><!--El precio de la prenda-->
        </a>
            
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/Monocolorblanco.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido13.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido11.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono color blanco</p> <!--El nomnbre de la prenda-->
            <p class="precio">$45.00</p><!--El precio de la prenda-->
        </a>
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/monoverdeoscuro.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido14.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido12.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono verde oscuro</p> <!--El nomnbre de la prenda-->
            <p class="precio">$45.00</p><!--El precio de la prenda-->
        </a>
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/monocolorplateado.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido15.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido13.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono plateado</p> <!--El nomnbre de la prenda-->
            <p class="precio">$40.00</p><!--El precio de la prenda-->
        </a>
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/flarejegsjeansblanco.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido16.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido14.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">flare jegs jeans color blanco</p> <!--El nomnbre de la prenda-->
            <p class="precio">$40.00</p><!--El precio de la prenda-->
        </a>
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/monocolorblanco2.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido17.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido15.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Mono color blanco manga larga </p> <!--El nomnbre de la prenda-->
            <p class="precio">$45.00</p><!--El precio de la prenda-->
        </a>
    </div>
    </div>
    </div>

    <div class="Cajas"><!--Se abre la caja donde se vera la imagen y el nombre de la prenda-->
      <a href="../catalogo mujer/vestidoblanco.html">
        <div class="contenido">
          <a href="../catalogo mujer/vestidos y monos/vestido18.php"><!--Se abre un link que te envia a otro lugar de la pagina donde aparece solamente la prenda y su in
            formacion-->
        <img src="../img/vestido16.jpg" alt=""><!--Imagen de la prenda-->
          </a><!--Se cierra el link-->
        <div class="informacion"><!--Se abre el div de la informacion de la prenda-->
            <p class="nombre">Vestido blanco</p> <!--El nomnbre de la prenda-->
            <p class="precio">$40.00</p><!--El precio de la prenda-->
        </a>
            <!--Aqui terminan las prendas-->
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
