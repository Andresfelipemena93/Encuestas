
<?php $encuestas = $this->encuestas_model->obtener('encuestas'); ?>

<div class="container-fluid">
    <h1 class="h3 mb-2 text-gray-800">Encuestas</h1>
    <p class="mb-4">Aquí se visualizan las encuestras realizadas por las diferentes personas.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Listado</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombres</th>
                            <th>Escolaridad</th>
                            <th>Género</th>
                            <th>Barrio o vereda</th>
                            <th>Rango de edad</th>
                            <th>Teléfono</th>
                            <th>Respuestas</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Fecha</th>
                            <th>Nombres</th>
                            <th>Escolaridad</th>
                            <th>Género</th>
                            <th>Barrio o vereda</th>
                            <th>Rango de edad</th>
                            <th>Teléfono</th>
                            <th>Respuestas</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach($encuestas as $encuesta) { ?>
                            <tr>
                                <td><?php echo $encuesta->fecha_creacion; ?></td>
                                <td><?php echo $encuesta->nombres; ?></td>
                                <td><?php echo $encuesta->escolaridad; ?></td>
                                <td><?php echo $encuesta->genero; ?></td>
                                <td><?php echo $encuesta->barrio; ?></td>
                                <td><?php echo $encuesta->rango_edad; ?></td>
                                <td><?php echo $encuesta->telefono; ?></td>
                                <td align="right"><?php echo $encuesta->total_respuestas; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>