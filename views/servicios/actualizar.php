<h1 class="nombre-pagina">Actualizar Servicio</h1>

<p class="descripcion-pagina">Modifica los valores</p>


<?php include_once __DIR__ . '/../templates/alertas.php'; ?>


<form 
method="POST"
class="formulario"
>
    
    <?php include_once __DIR__ . '/formulario.php'; ?>

    <div class="container-btn container-btn-space">
        <a href="/servicios" class="boton">Volver</a>
        <input type="submit" class="boton" value="Actualizar Servicio">
    </div>
</form>