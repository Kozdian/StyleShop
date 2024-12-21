<h1 class="nombre-pagina">Agenda una Cita</h1>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>

<div id="app">
    <nav class="tabs">
        <button class="" type="button" data-paso="1">Servicios</button>
        <button class="" type="button" data-paso="2">Datos</button>
        <button class="" type="button" data-paso="3">Resumen</button>
    </nav>

    <div id="paso-1" class="seccion txt-center">
        <h2 class="">Servicios</h2>
        <p class="blue">Elige cualquiera de nuestros servicios</p>
        <div id="servicios" class="listado-servicios"></div>
    </div>
    <div id="paso-2" class="seccion txt-center">
        <h2 class="">Datos</h2>
        <p>Coloca tus datos para hacer una reservación</p>
        
        <form 
        class="formulario"
        >
            <div class="campo">
                <label for="nombre">Nombre</label>
                <input 
                type="text" 
                id="nombre" 
                placeholder="Introduce tu Nombre"
                value="<?php echo $nombre; ?>"
                disabled
                >
            </div>
            <div class="campo">
                <label for="fecha">Fecha</label>
                <input 
                type="date" 
                id="fecha" 
                min="<?php echo date('Y-m-d', strtotime('+1 day')) ?>"
                >
            </div>
            
            <div class="campo">
                <label for="hora">Hora</label>
                <input 
                type="time" 
                id="hora" 
                >
            </div>
            <input type="text" id="id" value="<?php echo $id; ?>" hidden>
        </form>
    </div>
    <div id="paso-3" class="seccion contenido-resumen">
        <h2 class="">Resumen</h2>
        <p>Verifica que la información sea correcta</p>
        
    </div>
    <div class="paginacion container-btn container-btn-space">
        <button id="anterior" class="boton"><- Anterior</button>
        <button id="siguiente" class="boton">Siguiente -></button>
    </div>


</div>


<?php 
    $script = "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script src='build/js/app.js'></script>
    "; 
?>