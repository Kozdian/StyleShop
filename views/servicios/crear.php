<h1 class="nombre-pagina">Nuevo Servicio</h1>

<p class="descripcion-pagina">Llena todos los campos para crear un servicio</p>



<?php include_once __DIR__ . '/../templates/alertas.php'; ?>


<form 
action="/servicios/crear"
method="POST"
class="formulario"
>
    
    <?php include_once __DIR__ . '/formulario.php'; ?>

    <div class="container-btn container-btn-space">
        <a href="/servicios" class="boton">Volver</a>
        <input type="submit" class="boton" value="Guardar Servicio">
    </div>
</form>