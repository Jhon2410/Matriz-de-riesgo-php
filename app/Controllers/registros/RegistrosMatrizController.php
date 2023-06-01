<?php
class Database
{
    private static $servername = "localhost";
    private static $username = "root";
    private static $password = "";
    private static $database = "matriz";
    private static $conn;

    public static function connect()
    {
        self::$conn = new mysqli(self::$servername, self::$username, self::$password, self::$database);

        if (self::$conn->connect_error) {
            die("Conexión fallida: " . self::$conn->connect_error);
        }
    }

    public static function getConnection()
    {
        if (!self::$conn) {
            self::connect();
        }
        return self::$conn;
    }
}

class RegistroController
{
    public function crearRegistro($codigoMatriz, $fechaIdentificacion, $codigoRiesgo, $riesgo, $definicionDescripcion, $causas, $afectaInfraestructuraCritica, $activosInformacionAsociados, $tipoActivoVinculado, $criticidadActivo, $tipoRiesgo, $posibilidadOcurrencia, $impacto, $procesoCorrectivo)
    {
        // Realizar la inserción en la tabla "registros" (ajusta el nombre de la tabla según tu estructura)
        $conn = Database::getConnection();
        $query = "INSERT INTO registros (fecha_identificacion, riesgo, definicion_descripcion, causas, afecta_infraestructura_critica, activos_informacion_asociados, tipo_activo_vinculado, criticidad_activo, tipo_riesgo, posibilidad_ocurrencia, impacto, proceso_correctivo, matriz_riesgo_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        if ($stmt) {
            $stmt->bind_param("sssssssssssss", $fechaIdentificacion, $riesgo, $definicionDescripcion, $causas, $afectaInfraestructuraCritica, $activosInformacionAsociados, $tipoActivoVinculado, $criticidadActivo, $tipoRiesgo, $posibilidadOcurrencia, $impacto, $procesoCorrectivo, $codigoMatriz);

            if ($stmt->execute()) {
                // La inserción fue exitosa
                echo "Registro creado correctamente.";
            } else {
                // Ocurrió un error al insertar el registro
                echo "Error al crear el registro: " . $stmt->error;
            }

            $stmt->close();
        } else {
            // Ocurrió un error al preparar la consulta
            echo "Error al preparar la consulta: " . $conn->error;
        }

        $conn->close();
    }

    public function actualizarRegistro($id, $codigoMatriz, $fechaIdentificacion, $codigoRiesgo, $riesgo, $definicionDescripcion, $causas, $afectaInfraestructuraCritica, $activosInformacionAsociados, $tipoActivoVinculado, $criticidadActivo, $tipoRiesgo, $posibilidadOcurrencia, $impacto, $procesoCorrectivo)
    {
        // Actualizar el registro en la tabla "registros" (ajusta el nombre de la tabla según tu estructura)
        $conn = Database::getConnection();
        $query = "UPDATE registros SET  fecha_identificacion = ?, riesgo = ?, definicion_descripcion = ?, causas = ?, afecta_infraestructura_critica = ?, activos_informacion_asociados = ?, tipo_activo_vinculado = ?, criticidad_activo = ?, tipo_riesgo = ?, posibilidad_ocurrencia = ?, impacto = ?, proceso_correctivo = ? WHERE id = ?";
        $stmt = $conn->prepare($query);

        if ($stmt === false) {
            // Ocurrió un error al preparar la consulta
            echo "Error al preparar la consulta: " . $conn->error;
            return false;
        }

        $stmt->bind_param("ssssssssssssi", $fechaIdentificacion, $riesgo, $definicionDescripcion, $causas, $afectaInfraestructuraCritica, $activosInformacionAsociados, $tipoActivoVinculado, $criticidadActivo, $tipoRiesgo, $posibilidadOcurrencia, $impacto, $procesoCorrectivo, $id);

        if ($stmt->execute()) {
            // La actualización fue exitosa
            return true;
        } else {
            // Ocurrió un error al actualizar el registro
            echo "Error al actualizar el registro: " . $stmt->error;
            return false;
        }

        $stmt->close();
        $conn->close();
    }


    public function eliminarRegistro($id)
    {
        // Eliminar el registro de la tabla "registros" (ajusta el nombre de la tabla según tu estructura)
        $conn = Database::getConnection();
        $query = "DELETE FROM registros WHERE id = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            // La eliminación fue exitosa
            return true;
        } else {
            // Ocurrió un error al eliminar el registro
            return false;
        }

        $stmt->close();
        $conn->close();
    }
}

// Crear una instancia del controlador
$registroController = new RegistroController();

// Verificar el action y realizar la operación correspondiente
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['action'])) {
        $action = $_GET['action'];
        $matriz_id = $_GET['matriz_id'];

        // Crear un nuevo registro
        if ($action === 'crear') {
            $codigoMatriz = $_POST['codigo'];
            $fechaIdentificacion = $_POST['fecha_identificacion'];
            $codigoRiesgo = $_POST['codigo_riesgo'];
            $riesgo = $_POST['riesgo'];
            $definicionDescripcion = $_POST['definicion_descripcion'];
            $causas = $_POST['causas'];
            $afectaInfraestructuraCritica = $_POST['afecta_infraestructura_critica'];
            $activosInformacionAsociados = $_POST['activos_informacion_asociados'];
            $tipoActivoVinculado = $_POST['tipo_activo_vinculado'];
            $criticidadActivo = $_POST['criticidad_activo'];
            $tipoRiesgo = $_POST['tipo_riesgo'];
            $posibilidadOcurrencia = $_POST['posibilidad_ocurrencia'];
            $impacto = $_POST['impacto'];
            $procesoCorrectivo = $_POST['proceso_correctivo'];

            if ($registroController->crearRegistro($codigoMatriz, $fechaIdentificacion, $codigoRiesgo, $riesgo, $definicionDescripcion, $causas, $afectaInfraestructuraCritica, $activosInformacionAsociados, $tipoActivoVinculado, $criticidadActivo, $tipoRiesgo, $posibilidadOcurrencia, $impacto, $procesoCorrectivo)) {
                header('Location: ../../Views/admin/manage/registros.php?mensaje=Registro creado correctamente.&matriz_id=' . $matriz_id );
            } else {
                header('Location: ../../Views/admin/manage/registros.php?error=Error al crear el registro.&matriz_id=' . $matriz_id );
            }
        }

        // Actualizar un registro existente
        if ($action === 'actualizar') {
            $id = $_POST['id'];
            $codigoMatriz = $_POST['codigo'];
            $fechaIdentificacion = $_POST['fecha_identificacion'];
            $codigoRiesgo = $_POST['codigo_riesgo'];
            $riesgo = $_POST['riesgo'];
            $definicionDescripcion = $_POST['definicion_descripcion'];
            $causas = $_POST['causas'];
            $afectaInfraestructuraCritica = $_POST['afecta_infraestructura_critica'];
            $activosInformacionAsociados = $_POST['activos_informacion_asociados'];
            $tipoActivoVinculado = $_POST['tipo_activo_vinculado'];
            $criticidadActivo = $_POST['criticidad_activo'];
            $tipoRiesgo = $_POST['tipo_riesgo'];
            $posibilidadOcurrencia = $_POST['posibilidad_ocurrencia'];
            $impacto = $_POST['impacto'];
            $procesoCorrectivo = $_POST['proceso_correctivo'];

            if ($registroController->actualizarRegistro($id, $codigoMatriz, $fechaIdentificacion, $codigoRiesgo, $riesgo, $definicionDescripcion, $causas, $afectaInfraestructuraCritica, $activosInformacionAsociados, $tipoActivoVinculado, $criticidadActivo, $tipoRiesgo, $posibilidadOcurrencia, $impacto, $procesoCorrectivo)) {
                header('Location: ../../Views/admin/manage/registros.php?mensaje=Registro actualizado correctamente.&matriz_id=' . $matriz_id );
            } else {
                header('Location: ../../Views/admin/manage/registros.php?error=Error al actualizar el registro.&matriz_id=' . $matriz_id );

            }
        }

        // Eliminar un registro existente
        if ($action === 'eliminar') {
            $id = $_POST['id'];

            if ($registroController->eliminarRegistro($id)) {
                header('Location: ../../Views/admin/manage/registros.php?mensaje=Registro eliminado correctamente.&matriz_id=' . $matriz_id );

            } else {
                header('Location: ../../Views/admin/manage/registros.php?error=Error al eliminar el registro.&matriz_id=' . $matriz_id );

            }
        }
    } else {
        echo "Acceso no válido.";
    }
} else {
    echo "Acceso no válido.";
}
?>