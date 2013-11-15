<?php

if (isset($_POST['Tag']) && $_POST['Tag'] != '') {
    $tag = $_POST['Tag'];

    require 'src/conexion/db.class.php';
    require 'src/conexion/conf.class.php';

    $response = array(
        "tag" => $tag,
        "success" => 0,
        "error" => 0,
        "error_msg" => ""
    );

    switch ($tag) {
        case 'traeVentas':
            $bd = Db::getInstance();
            $sql = "SELECT id, telefono, direccion, movil, nombre, c_5, c_11, c_15, c_45, n_5, n_11, n_15, n_45 FROM master_venta;";
            $stmt = $bd->ejecutar($sql);
            $user = $bd->count($stmt);
            if ($user >= 1) {
                while ($x = $bd->obt_filas($stmt, 0)) {
                    $data[] = $x;
                }
                echo json_encode($data);
            } else {
                $response["error"] = 4;
                $response["error_msg"] = "No hay datos";
                echo json_encode($response);
            }
            break;
        default:
            echo "Respuesta no valida";
            break;
    }
} else {
    echo "Acceso denegado";
}
?>