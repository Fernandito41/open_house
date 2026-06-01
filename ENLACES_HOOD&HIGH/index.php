<?php

?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Carrito de Compras</title>
  <style>
    body { font-family: Arial, sans-serif; }
    .producto { margin-bottom: 16px; }
    #carrito {
      position: fixed;
      top: 80px;
      right: 20px;
      width: 300px;
      background: #f1f1f1;
      border: 1px solid #ccc;
      border-radius: 8px;
      padding: 16px;
      z-index: 9999;
    }
    #carrito h2 { margin-top: 0; }
    .carrito-item { border-bottom: 1px solid #ddd; padding: 8px 0; }
    .carrito-vacio { color: #888; }
    .btn-agregar { background: #4CAF50; color: white; border: none; padding: 8px 16px; border-radius: 4px; cursor: pointer; }
    .btn-eliminar { background: #e53935; color: white; border: none; padding: 4px 8px; border-radius: 4px; cursor: pointer; margin-left: 8px; }
  </style>
</head>
<body>
  <h1>Productos</h1>
  <div class="producto">
    <span>Producto 1</span>
    <button class="btn-agregar" onclick="agregarAlCarrito('Producto 1')">Agregar al carrito</button>
  </div>
  <div class="producto">
    <span>Producto 2</span>
    <button class="btn-agregar" onclick="agregarAlCarrito('Producto 2')">Agregar al carrito</button>
  </div>
  <div class="producto">
    <span>Producto 3</span>
    <button class="btn-agregar" onclick="agregarAlCarrito('Producto 3')">Agregar al carrito</button>
  </div>

  <div id="carrito">
    <h2>Carrito</h2>
    <div id="carrito-items" class="carrito-vacio">El carrito está vacío.</div>
  </div>

  <script>
    let carrito = [];

    function agregarAlCarrito(producto) {
      carrito.push(producto);
      mostrarCarrito();
    }

    function eliminarDelCarrito(index) {
      carrito.splice(index, 1);
      mostrarCarrito();
    }

    function mostrarCarrito() {
      const carritoDiv = document.getElementById('carrito-items');
      if (carrito.length === 0) {
        carritoDiv.innerHTML = '<span class="carrito-vacio">El carrito está vacío.</span>';
        return;
      }
      carritoDiv.innerHTML = '';
      carrito.forEach((item, idx) => {
        carritoDiv.innerHTML += `
          <div class="carrito-item">
            ${item}
            <button class="btn-eliminar" onclick="eliminarDelCarrito(${idx})">Eliminar</button>
          </div>
        `;
      });
    }
  </script>
</body>
</html>