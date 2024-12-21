<h1 class="nombre-pagina">Crear Cuenta</h1>
<p class="descripcion-pagina">Llena el siguiente formulario para crear una cuenta.</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form 
action="/crear-cuenta" 
class="formulario"
method="POST"
>
    <div class="campo">
        <label for="nombre">Nombre</label>
        <input 
        type="text" 
        id="nombre" 
        name="nombre" 
        placeholder="Introduce tu Nombre"
        value="<?php echo s($usuario->nombre); ?>"
        >
    </div>
    <div class="campo">
        <label for="apellido">Apellido</label>
        <input 
        type="text" 
        id="apellido" 
        name="apellido" 
        placeholder="Introduce tu Apellido"
        value="<?php echo s($usuario->apellido); ?>"
        >
    </div>
    <div class="campo">
        <label for="telefono">Teléfono</label>
        <input 
        type="tel" 
        id="telefono" 
        name="telefono" 
        placeholder="Introduce tu numero Telefónico"
        value="<?php echo s($usuario->telefono); ?>"
        >
    </div>
    <div class="campo">
        <label for="email">Correo</label>
        <input 
        type="email" 
        id="email" 
        name="email" 
        placeholder="Introduce tu Correo Electrónico"
        value="<?php echo s($usuario->email); ?>"
        >
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
        type="password" 
        id="password" 
        name="password" 
        placeholder="Crea tu Contraseña"
        >
    </div>

    <div class="container-btn container-btn-space">
        <a class="boton" href="/">Volver</a>
        <input type="submit" class="boton" value="Crear Cuenta">
    </div>


</form>