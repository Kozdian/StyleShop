<h1 class="nombre-pagina">Olvide mi Contraseña</h1>
<p class="descripcion-pagina">Reestablece tu contraseña escribiendo tu Correo Electrónico</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form 
action="/olvide" 
class="formulario"
method="POST"
>
    <div class="campo">
        <label for="email">Correo</label>
        <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="Introduce tu Correo Electrónico">
    </div>
    <div class="container-btn container-btn-space">
        <a class="boton" href="/">Volver</a>
        <input type="submit" class="boton" value="Enviar Instrucciones">
    </div>
</form>