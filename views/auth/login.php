<h1 class="nombre-pagina">Login</h1>
<p class="descripcion-pagina">Inicia Sesión con tus datos</p>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>

<form 
class="formulario" 
action="/"
method="POST"
>
    <div class="campo">
        <label for="email">Correo</label>
        <input 
        type="email"
        id="email"
        name="email"
        placeholder="Introduce tu Correo"
        value="<?php echo s($auth->email); ?>"
        >
    </div>
    <div class="campo">
        <label for="password">Contraseña</label>
        <input 
        type="password"
        id="password"
        name="password"
        placeholder="Introduce tu Contraseña"
        >
    </div>
    <div class="container-btn container-btn-right">
        <input type="submit" class="boton" value="Iniciar Sesión">
    </div>

</form>


<div class="acciones">
    <a href="/crear-cuenta">¿Aún no tienes una cuenta? Crea una.</a>
    <a href="/olvide">¿Olvidaste tu Contraseña?</a>
</div>