<h1 class="nombre-pagina">Panel de Administración</h1>

<?php include_once __DIR__ . '/../templates/barra.php'; ?>


<h2 class="txt-center">Buscar Citas</h2>
<div class="busqueda">
    <form 
    class="formulario"
    >

        <div class="campo">
            <label for="fecha">Fecha</label>
            <input 
            type="date" 
            id="fecha" 
            name="fecha"
            value="<?php echo $fecha; ?>"
            >
        </div>
    </form>
</div>
<?php
    if(count($citas) === 0):
        echo '<h2 class="txt-center">No hay citas registradas</h2>';
    endif;
?>
<div id="citas-admin">
    <ul class="citas">
        <?php 
            $idCita = 0;
            foreach($citas as $key => $cita): 
                if($idCita !== $cita->id):
                    $total = 0;
        ?>          
                <li>
                    <p><span>ID:</span> <?php echo $cita->id ?></p>
                    <p><span>Hora:</span> <?php echo $cita->hora ?></p>
                    <p><span>Cliente:</span> <?php echo $cita->cliente ?></p>
                    <p><span>Email:</span> <?php echo $cita->email ?></p>
                    <p><span>Teléfono:</span> <?php echo $cita->telefono ?></p>
                    

                    <h3>Servicios</h3>

                    
        <?php 
                    $idCita = $cita->id;
                endif; 
                $total += $cita->precio;          
        ?>
                    <p><?php echo $cita->servicio; ?> <span class="white">$<?php echo $cita->precio; ?></span></p>
                
                <?php 

                    $actual = $cita->id; 
                    $proximo = $citas[$key + 1]->id ?? 0;
                    
                    if(esUltimo($actual, $proximo)):
                ?>
                        <p class="total"><span>Total:</span> $<?php echo $total; ?></p>

                        <form action="/api/eliminar" method="POST">
                            <input type="text" name="id" value="<?php echo $cita->id; ?>" hidden>
                            <input type="submit" class="boton-eliminar" value="Eliminar">
                        </form>
        <?php 
                    endif;
            endforeach; 
        ?>
                </li>
    </ul>
     
</div>

<?php $script = "<script src='build/js/buscador.js'></script>"; ?>