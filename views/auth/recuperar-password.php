<h1 class="nombre-pagina">Recuperar Contraseña</h1>
<p class="descripcion-pagina">Coloca tu nueva Contraseña a continuación</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<?php if($error) return; ?>
<form 
class="formulario"
method="POST"
>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Introduce tu nueva Contraseña">
    </div>
    <div class="container-btn container-btn-space">
        <a class="boton" href="/">Volver</a>
        <input type="submit" class="boton" value="Crear Nueva Contraseña">
    </div>
</form>