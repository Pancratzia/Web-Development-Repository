<?php

foreach ($alertas as $key => $mensajes) :
    foreach ($mensajes as $mensaje) :
?>
        <div class="alerta error">
            <?php echo $mensaje; ?>
        </div>
<?php endforeach;
endforeach;

?>