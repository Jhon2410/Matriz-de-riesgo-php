<?php

function clasificarRiesgo($nivelImpacto, $nivelProbabilidad)
{
    switch ($nivelImpacto) {
        case 'Bajo':
            switch ($nivelProbabilidad) {
                case 'Bajo':
                    return 'Controlable';
                case 'Medio':
                    return 'Atención';
                case 'Alto':
                    return 'Prioridad';
            }
            break;
        case 'Medio':
            switch ($nivelProbabilidad) {
                case 'Bajo':
                    return 'Atención';
                case 'Medio':
                    return 'Importante';
                case 'Alto':
                    return 'Alta prioridad';
            }
            break;
        case 'Alto':
            switch ($nivelProbabilidad) {
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



?>