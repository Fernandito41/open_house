<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rebajas hombre</title>
</head>
<link rel="stylesheet" href="../css/nuevo.css">
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
    
<div class="secciones_hombre"><!--Con esto podremos redirigirnos a otros apartados de hombres-->
    <a href="../ENLACES_HOOD&HIGH/hombre.html">
    <button class="Botones">Camisas</button>
    </a>
    <a href="../ENLACES_HOOD&HIGH/pantalones1.html">
    <button class="Botones">Pantalones</button>
    </a>
    <a href="../ENLACES_HOOD&HIGH/hoddies.html">
    <button class="Botones">hoodies</button>
    </a>
    <button class="Botones">Nuevo</button>
    </div>
    <br>
    <div class="para_ti">
    <strong>NEW ➡</strong>
    <div class="botones_para_ti">
        <button class="filtro">ver todo</button>
        <button class="filtro">Ropa</button>
        <button class="filtro">Accesorios</button>
    </div>
</div>

<!-- Contenedor de productos -->
<div class="contenedor">
    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
            <a href="../catalogo hombre/catalogo nuevo/new1.php">
            <img src="../img/new1.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Jean retro washed</p>
                <p class="precio">$35.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
         <a href="../catalogo hombre/catalogo nuevo/new2.php">
            <img src="../img/new2.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Chaqueta Varsity</p>
                <p class="precio">$40.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
           <a href="../catalogo hombre/catalogo nuevo/new3.php">
            <img src="../img/new3.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Chaqueta College NY</p>
                <p class="precio">$49.99</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
             <a href="../catalogo hombre/catalogo nuevo/new4.php">
            <img src="../img/new-conjunto.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Camisetas NFL19</p>
                <p class="precio">$30.99</p>
            </div>
        </div>
    </div>
    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
            <a href="../catalogo hombre/catalogo nuevo/new5.php">
            <img src="../img/new4.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Chaqueta Mercedes</p>
                <p class="precio">$50.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
               <a href="../catalogo hombre/catalogo nuevo/new6.php">
            <img src="../img/new5.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Camiseta VARSITY46</p>
                <p class="precio">$35.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
              <a href="../catalogo hombre/catalogo nuevo/new7.php">
            <img src="../img/new6.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Camiseta HERITAGE97</p>
                <p class="precio">$40.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
             <a href="../catalogo hombre/catalogo nuevo/new8.php">
            <img src="../img/new7.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Camiseta FlAMING22</p>
                <p class="precio">$49.99</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
              <a href="../catalogo hombre/catalogo nuevo/new9.php">
            <img src="../img/new8.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Pantalon cargo TAN</p>
                <p class="precio">$30.99</p>
            </div>
        </div>
    </div>
    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
             <a href="../catalogo hombre/catalogo nuevo/new10.php">
            <img src="../img/new9.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Jean Straight Classic</p>
                <p class="precio">$35.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
              <a href="../catalogo hombre/catalogo nuevo/new11.php">
            <img src="../img/new10.jpg" alt="">
            </a>
            <div class="informacion">
                <p class="nombre">Durag Black Flow</p>
                <p class="precio">$10.00</p>
            </div>
        </div>
    </div>

    <div class="Cajas">
        <div class="contenido">
            <div class="etiqueta">NEW</div>
             <a href="../catalogo hombre/catalogo nuevo/new12.php">
            <img src="../img/new11.jpg" alt="">
            </a>
            <div class="informacion">
              
                <p class="nombre">Pañoleta red</p>
                <p class="precio">$8.00</p>
            </div>
        </div>
    </div>


<div class="new_jeans">YOUR STYLE IS HERE ➡</div>
<br>
<div class="Cajas">
    <div class="cotenido">
       <div class="etiqueta">NEW</div>
         <a href="../catalogo hombre/catalogo nuevo/nuevo1.php">
        <img src="../img/new12.jpg" alt="">
       </a>
    <div class="informacion">
            <p class="nombre">Camisa retro Cristiano Ronaldo</p> 
            <p class="precio">$49.99</p>
    
            
    </div>
    </div>
    </div>
    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
     <a href="../catalogo hombre/catalogo nuevo/nuevo2.php">
        <img src="../img/new20.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">Hoodie nike</p> 
            <p class="precio">$39.99</p>

            
    </div>
    </div>
    </div>
    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
      <a href="../catalogo hombre/catalogo nuevo/nuevo3.php">
        <img src="../img/new13.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">Camiseta GREEN00</p> 
            <p class="precio">$30.99</p>
    
            
    </div>
    </div>
    </div>

    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
      <a href="../catalogo hombre/catalogo nuevo/nuevo4.php">
        <img src="../img/new14.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">CAMISETA LOONEY07</p> 
            <p class="precio">$35.99</p>
                 
    </div>
    </div>
    </div>

    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
       <a href="../catalogo hombre/catalogo nuevo/nuevo5.php">
        <img src="../img/new19.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">SHORT FULL WHITE</p> 
            <p class="precio">$40.99</p>
            
            
    </div>
    </div>
    </div>
    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
      <a href="../catalogo hombre/catalogo nuevo/nuevo6.php">
        <img src="../img/new16.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">CAMISETA BRAND</p> 
            <p class="precio">$49.99</p>
           
            
    </div>
    </div>
    </div>
    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
      <a href="../catalogo hombre/catalogo nuevo/nuevo7.php">
        <img src="../img/new17.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">JEANS BAGGY PARCHE</p> 
            <p class="precio">$49.99</p>
              
            
    </div>
    </div>
    </div>
    <div class="Cajas">
    <div class="cotenido">
    <div class="etiqueta">NEW</div>
       <a href="../catalogo hombre/catalogo nuevo/nuevo8.php">
        <img src="../img/new18.jpg" alt="">
    </a>
    <div class="informacion">
            <p class="nombre">PANTALON BAGGY PRINT</p> 
            <p class="precio">$49.99</p>  
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

         