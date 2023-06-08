<!-- app/Views/dashboard.php -->
<?php
$pageTitle = 'main';
ob_start();
$content = ob_get_clean();
require '../../layouts/admin.php';
require '../../../Controllers/matriz/MatrizObtenerMatrizController.php';
$contador = 0;
?>

<style>
    .btn {
        margin: 0px 0px 0px 0px;
    }

    .btn-group {
        margin: 0px 0px 0px 0px;
    }

    #itemDetails {
        margin: 0px 0px 0px 0px;
        padding: 15px;
        font-size: small;
        background-color: #000;
        color: #0f0 !important;
    }
</style>


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
                </div>
                <div class="modal-body">
                    <div id="itemDetails"></div>
                </div>
            </div>
        </div>
    </div>

    <?php foreach ($matriz_de_riesgo as $index => $matriz): ?>
        <?php echo $index; ?>
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
                    <td class="controlable" id="<?php echo $matriz['id'] ?>_controlable<?php echo $index; ?>b"></td>
                    <td class="atencion" id="<?php echo $matriz['id'] ?>_atencion<?php echo $index; ?>b"></td>
                    <td class="prioridad" id="<?php echo $matriz['id'] ?>_prioridad<?php echo $index; ?>b"></td>
                </tr>
                <tr>
                    <th>Medio</th>
                    <td class="atencion" id="<?php echo $matriz['id'] ?>_atencion<?php echo $index; ?>m"></td>
                    <td class="importante" id="<?php echo $matriz['id'] ?>_importante<?php echo $index; ?>m"></td>
                    <td class="alta-prioridad" id="<?php echo $matriz['id'] ?>_alta-prioridad<?php echo $index; ?>m"></td>
                </tr>
                <tr>
                    <th>Alto</th>
                    <td class="prioridad" id="<?php echo $matriz['id'] ?>_prioridad<?php echo $index; ?>a"></td>
                    <td class="alta-prioridad" id="<?php echo $matriz['id'] ?>_alta-prioridad<?php echo $index; ?>a"></td>
                    <td class="critico" id="<?php echo $matriz['id'] ?>_critico<?php echo $index; ?>a"></td>
                </tr>
            </tbody>
        </table>

        <script>

            var registros = <?php echo json_encode($matriz['registros']); ?>;

            if (registros && registros.length > 0 && registros[0]['id'] !== null) {
                registros.forEach(function (registro, index) {
                    var nivelImpacto = registro['impacto'];
                    var nivelProbabilidad = registro['posibilidad_ocurrencia'];
                    var clasificacion = clasificarRiesgo(nivelImpacto, nivelProbabilidad);

                    var celda;

                    switch (nivelImpacto) {
                        case 'Bajo':
                            switch (nivelProbabilidad) {
                                case 'Bajo':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_controlable<?php echo $index; ?>b');
                                    break;
                                case 'Medio':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_atencion<?php echo $index; ?>b');
                                    break;
                                case 'Alto':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_prioridad<?php echo $index; ?>b');
                                    break;
                            }
                            break;
                        case 'Medio':
                            switch (nivelProbabilidad) {
                                case 'Bajo':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_atencion<?php echo $index; ?>m');
                                    break;
                                case 'Medio':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_importante<?php echo $index; ?>m');
                                    break;
                                case 'Alto':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_alta-prioridad<?php echo $index; ?>m');
                                    break;
                            }
                            break;
                        case 'Alto':
                            switch (nivelProbabilidad) {
                                case 'Bajo':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_prioridad<?php echo $index; ?>a');
                                    break;
                                case 'Medio':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_alta-prioridad<?php echo $index; ?>a');
                                    break;
                                case 'Alto':
                                    celda = document.getElementById('<?php echo $matriz['id'] ?>_critico<?php echo $index; ?>a');
                                    break;
                            }
                            break;
                    }

                    if (celda) {
                        var parrafo = document.createElement('p');
                        parrafo.setAttribute('class', 'shadow-item registro');
                        parrafo.setAttribute('data-registro', JSON.stringify(registro));
                        parrafo.textContent = registro['riesgo'];
                        parrafo.setAttribute('title', clasificacion);
                        parrafo.setAttribute('data-toggle', 'tooltip');
                        parrafo.setAttribute('data-placement', 'top');
                        parrafo.setAttribute('data-html', 'true');

                        celda.appendChild(parrafo);
                    }
                });
            }
        </script>
    <?php endforeach; ?>


    <script>
        function mostrarModal(registro) {
            if (registro) {
                var itemDetails = document.getElementById('itemDetails');
                itemDetails.innerHTML = '';

                // Crear elementos HTML para mostrar los detalles del riesgo
                var titulo = document.createElement('h4');
                titulo.textContent = registro.riesgo;
                itemDetails.appendChild(titulo);

                var impacto = document.createElement('p');
                impacto.textContent = 'Nivel de impacto: ' + registro.impacto;
                itemDetails.appendChild(impacto);

                var probabilidad = document.createElement('p');
                probabilidad.textContent = 'Nivel de probabilidad: ' + registro.posibilidad_ocurrencia;
                itemDetails.appendChild(probabilidad);

                var casoControl = document.createElement('p');
                casoControl.textContent = 'Caso de control: ' + registro.proceso_correctivo;
                itemDetails.appendChild(casoControl);

                
                var AfectaInfraCritica = document.createElement('p');
                AfectaInfraCritica.textContent = 'Riesgo afecta infraestructura critica: ' + registro.afecta_infraestructura_critica;
                itemDetails.appendChild(AfectaInfraCritica);

                var fecha_identificacion = document.createElement('p');
                fecha_identificacion.textContent = 'Fecha de identificacion: ' + registro.fecha_identificacion;
                itemDetails.appendChild(fecha_identificacion);

                var definicion_descripcion = document.createElement('p');
                definicion_descripcion.textContent = 'Definicion descripcion: ' + registro.definicion_descripcion;
                itemDetails.appendChild(definicion_descripcion);

                var causas = document.createElement('p');
                causas.textContent = 'Causas: ' + registro.causas;
                itemDetails.appendChild(causas);

                var activos_informacion_asociados = document.createElement('p');
                activos_informacion_asociados.textContent = 'Activos informacion asociados: ' + registro.activos_informacion_asociados;
                itemDetails.appendChild(activos_informacion_asociados);

                var tipo_activo_vinculado = document.createElement('p');
                tipo_activo_vinculado.textContent = 'Tipo activo vinculado: ' + registro.tipo_activo_vinculado;
                itemDetails.appendChild(tipo_activo_vinculado);

                var criticidad_activo = document.createElement('p');
                criticidad_activo.textContent = 'Criticidad activo: ' + registro.criticidad_activo;
                itemDetails.appendChild(criticidad_activo);

                var tipo_riesgo = document.createElement('p');
                tipo_riesgo.textContent = 'Tipo riesgo: ' + registro.tipo_riesgo;
                itemDetails.appendChild(tipo_riesgo);

                var matriz_riesgo_id = document.createElement('p');
                matriz_riesgo_id.textContent = 'Matriz riesgo id: ' + registro.matriz_riesgo_id;
                itemDetails.appendChild(matriz_riesgo_id);


                // Mostrar el modal
                $('#itemModal').modal('show');
            }
        }
        var elementos = document.getElementsByClassName('registro');
        Array.from(elementos).forEach(function (registro) {
            registro.addEventListener('click', function (e) {
                mostrarModal(JSON.parse(e.target.getAttribute('data-registro')));
            });
        });
    </script>

</div>