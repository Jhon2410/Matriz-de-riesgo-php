<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'main';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
require '../../../Controllers/matriz/MatrizObtenerMatrizController.php';
?>
<script>
    function mostrarModal(detalle) {
        // Buscar el registro correspondiente al detalle proporcionado
        var registro = <?php echo json_encode($matriz['registros']); ?>.find(function (registro) {
            return registro['riesgo'] === detalle;
        });

        if (registro) {
            var itemDetails = document.getElementById('itemDetails');
            itemDetails.innerHTML = '';

            // Crear elementos HTML para mostrar los detalles del riesgo
            var titulo = document.createElement('h4');
            titulo.textContent = detalle;
            itemDetails.appendChild(titulo);

            var impacto = document.createElement('p');
            impacto.textContent = 'Nivel de impacto: ' + registro['impacto'];
            itemDetails.appendChild(impacto);

            var probabilidad = document.createElement('p');
            probabilidad.textContent = 'Nivel de probabilidad: ' + registro['posibilidad_ocurrencia'];
            itemDetails.appendChild(probabilidad);

            // Mostrar el modal
            $('#itemModal').modal('show');
        }
    }
</script>

<script>


    function clasificarRiesgo(nivelImpacto, nivelProbabilidad) {
        switch (nivelImpacto) {
            case 'Bajo':
                switch (nivelProbabilidad) {
                    case 'Bajo':
                        return 'Controlable';
                    case 'Medio':
                        return 'Atención';
                    case 'Alto':
                        return 'Prioridad';
                }
                break;
            case 'Medio':
                switch (nivelProbabilidad) {
                    case 'Bajo':
                        return 'Atención';
                    case 'Medio':
                        return 'Importante';
                    case 'Alto':
                        return 'Alta prioridad';
                }
                break;
            case 'Alto':
                switch (nivelProbabilidad) {
                    case 'Bajo':
                        return 'Prioridad';
                    case 'Medio':
                        return 'Alta prioridad';
                    case 'Alto':
                        return 'Crítico';
                }
                break;
        }

        return 'Clasificación no encontrada';
    }

</script>
<!-- Contenido específico de la vista -->
<div class="container-fluid my-3">
    <!-- Modal -->
    <div class="modal fade" id="itemModal" tabindex="-1" role="dialog" aria-labelledby="itemModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="itemModalLabel">Detalles del elemento</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="itemDetails"></div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($matriz_de_riesgo as $matriz): ?>
        <table class="matriz-riesgo-table my-3">
            <thead>
                <tr>
                    <th>
                        <?php echo $matriz['codigo'] ?>
                    </th>
                    <th>Bajo</th>
                    <th>Medio</th>
                    <th>Alto</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th>Bajo</th>
                    <td class="controlable" id="<?php echo $matriz['codigo'] ?>_controlable"></td>
                    <td class="atencion" id="<?php echo $matriz['codigo'] ?>_atencion"></td>
                    <td class="prioridad" id="<?php echo $matriz['codigo'] ?>_prioridad"></td>
                </tr>
                <tr>
                    <th>Medio</th>
                    <td class="atencion" id="<?php echo $matriz['codigo'] ?>_atencion"></td>
                    <td class="importante" id="<?php echo $matriz['codigo'] ?>_importante"></td>
                    <td class="alta-prioridad" id="<?php echo $matriz['codigo'] ?>_alta-prioridad"></td>
                </tr>
                <tr>
                    <th>Alto</th>
                    <td class="prioridad" id="<?php echo $matriz['codigo'] ?>_prioridad"></td>
                    <td class="alta-prioridad" id="<?php echo $matriz['codigo'] ?>_alta-prioridad"></td>
                    <td class="critico" id="<?php echo $matriz['codigo'] ?>_critico"></td>
                </tr>
            </tbody>
        </table>


        <script>
            var registros = <?php echo json_encode($matriz['registros']); ?>;

            if (registros && registros.length > 0 && registros[0]['id'] !== null) {
                registros.forEach(function (registro) {
                    var nivelImpacto = registro['impacto'];
                    var nivelProbabilidad = registro['posibilidad_ocurrencia'];
                    var clasificacion = clasificarRiesgo(nivelImpacto, nivelProbabilidad);

                    var celda;

                    switch (nivelImpacto) {
                        case 'Bajo':
                            switch (nivelProbabilidad) {
                                case 'Bajo':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_controlable');
                                    break;
                                case 'Medio':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_atencion');
                                    break;
                                case 'Alto':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_prioridad');
                                    break;
                            }
                            break;
                        case 'Medio':
                            switch (nivelProbabilidad) {
                                case 'Bajo':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_atencion');
                                    break;
                                case 'Medio':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_importante');
                                    break;
                                case 'Alto':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_alta-prioridad');
                                    break;
                            }
                            break;
                        case 'Alto':
                            switch (nivelProbabilidad) {
                                case 'Bajo':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_prioridad');
                                    break;
                                case 'Medio':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_alta-prioridad');
                                    break;
                                case 'Alto':
                                    celda = document.getElementById('<?php echo $matriz['codigo'] ?>_critico');
                                    break;
                            }
                            break;
                    }

                    if (celda) {
                        var parrafo = document.createElement('p');
                        parrafo.setAttribute('class', 'shadow-item');
                        parrafo.textContent = registro['riesgo'];
                        parrafo.setAttribute('title', clasificacion);
                        parrafo.setAttribute('data-toggle', 'tooltip');
                        parrafo.setAttribute('data-placement', 'top');
                        parrafo.setAttribute('data-html', 'true');

                        // Agregar evento onclick para mostrar el modal
                        parrafo.addEventListener('click', function () {
                            mostrarModal(registro['riesgo']);
                        });

                        celda.appendChild(parrafo);
                    }
                });
            }
        </script>
    <?php endforeach; ?>


</div>