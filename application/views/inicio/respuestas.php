<?php $respuestas_mas_seleccionadas = $this->configuracion_model->obtener('respuestas_mas_seleccionadas', ['id_tema' => $id_tema]); ?>

<?php foreach($respuestas_mas_seleccionadas as $respuesta) { ?>
    <h4 class="small font-weight-bold"><?php echo $respuesta->descripcion; ?> <span class="float-right"><?php echo $respuesta->cantidad; ?></span></h4>
    <div class="progress mb-4">
        <div class="progress-bar bg-success" role="progressbar" style="width: <?php echo (int)$respuesta->cantidad; ?>%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
<?php } ?>