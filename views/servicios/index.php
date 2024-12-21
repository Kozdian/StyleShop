<h1 class="nombre-pagina">Servicios</h1>

<p class="descripcion-pagina">Administración de Servicios</p>



<?php include_once __DIR__ . '/../templates/barra.php'; ?>


<ul class="servicios">
    <?php foreach($servicios as $servicio): ?>
        <li>
            <p><span>Nombre:</span> <?php echo $servicio->nombre; ?></p>
            <p><span>Precio:</span> <span class="white">$<?php echo $servicio->precio; ?></span></p>
            
            <div class="container-btn container-btn-space">
                <a class="boton-agregar" href="/servicios/actualizar?id=<?php echo $servicio->id; ?>">Actualizar</a>
                
                <form 
                action="/servicios/eliminar"
                method="POST"
                >
                    <input type="text" name="id" value="<?php echo $servicio->id; ?>" hidden>
                    <input type="submit" value="Borrar" class="boton-eliminar">
                    
                </form>
            </div>
        
        </li>

    <?php endforeach; ?>
</ul>