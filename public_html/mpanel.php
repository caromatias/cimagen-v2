<?php

if (isset($_POST['Tag']) && $_POST['Tag'] != '') {
    $tag = $_POST['Tag'];

    $response = array(
        "tag" => $tag,
        "success" => 0,
        "error" => 0,
        "error_msg" => ""
    );

    switch ($tag) {
        case 'traePeriodistas':
            include "admin/procesos/conectar.php";
            $query = "select id, nombre,imagen, correo, estado from periodista;";
            $res = mysql_query($query);
            mysql_close($con);
            if (mysql_num_rows($res) >= 1) {
                while($reg = mysql_fetch_array($res)) {
                    $data[] = $reg;
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