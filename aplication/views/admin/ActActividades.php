    <?php session_start(); // ADMINISTRADOR
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../models/Actividades.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/adminController.php');
    include ('../../controllers/adminController/actualizaController.php');

    $id_evento = ($_GET['evt']); // <- Mandar el id del evento para agregar en la tabla
    $id_actividad = ($_GET['act']);
    $id_usuario = $_GET['usr'];
    $eventos = new adminController();
    $arreglo = $eventos->edita_actividades($id_actividad);
    
    $rs3 = $eventos->consulta_tipos_usuarios("WHERE tipo = 'instructor'");
    $id_tipo_usuario = $rs3[0]['id_tipo_usuario'];
    $instructor = $eventos->instructo($id_tipo_usuario." AND a.id_asistente = ".$id_usuario);
    
    if (count($instructor)!=0) {
        $id_ins = $instructor[0]['nombre_asistente'];
    } else {
        $id_ins = '';
    }
    
    if (count($arreglo)!=0) {
    

    $datosActividades = array(
        'id_instructor' => $id_ins,
        'nombre_actividad' => $arreglo[0]['nombre_actividad'],
        'lugar' => $arreglo[0]['lugar'],
        'precio' => $arreglo[0]['precio'],
        'fecha_inicio' => $arreglo[0]['fecha_inicio'],
        'fecha_fin' => $arreglo[0]['fecha_fin'],
        'hora_inicio' => $arreglo[0]['hora_inicio'],
        'hora_fin' => $arreglo[0]['hora_fin'],
        'capacidad' => $arreglo[0]['capacidad'],
        'descripcion' => $arreglo[0]['descripcion'],
        'imagen' => $arreglo[0]['imagen'],
    );
    }
    
//libreria del formulario ----------------------------
    require '../../libs/zebra_form/Zebra_Form.php';
    //definimos el formulario ----------------------------
    $form = new Zebra_Form('form', 'POST', '', array());
    $form->language('espanol');
    if (count($arreglo)!=0) {
    $form->auto_fill($datosActividades);
    }

    //----------------------------------Comienza Form---------------------------------------//
    # id_instructor
    $form->add('label', 'label_id_instructor', 'id_instructor', 'ID Instructor:');
    $obj = $form->add('text', 'id_instructor');
//    $obj->add_options(array(
//            #---------------------------------------------------------------------------------------
//            #                       No Puedo Meterlo en un arreglo :(                        
////            $instructor[0]['id_asistente'] => $instructor[0]['nombre_asistente'],
////            $instructor[1]['id_asistente'] => $instructor[1]['nombre_asistente'],
//                      
//            #---------------------------------------------------------------------------------------
//        ));
    $obj->set_rule(array(
        'required' => array('error', 'ID es requerido!'),
    ));

    # nombre_actividad
    $form->add('label', 'label_nombre_actividad', 'nombre_actividad', 'Nombre Actividad:');
    $obj = $form->add('text', 'nombre_actividad');
    $obj->set_rule(array(
        'required' => array('error', 'Nombre es requerido!'),
    ));

    # lugar
    $form->add('label', 'label_lugar', 'lugar', 'Lugar:');
    $obj = $form->add('text', 'lugar');
    $obj->set_rule(array(
        'required' => array('error', 'Lugar es requerido!')
    ));

    # Precio
    $form->add('label', 'label_precio', 'precio', 'Precio:');
    $obj = $form->add('text', 'precio');
    $obj->set_rule(array(
        'required' => array('error', 'Precio es requerido!')
    ));

    # Fecha Inicio
    $form->add('label', 'label_fecha_inicio', 'fecha_inicio', 'Fecha Inicio');
    $obj = $form->add('date', 'fecha_inicio');
    $obj->set_rule(array(
        'required' => array('error', 'Date is required!'),
        'date' => array('error', 'Date is invalid!'),
    ));
    $obj->format('Y-m-d');
    $obj->direction(1);
    $form->add('note', 'note_fecha_inicio', 'fecha_inicio', 'Formato de Fecha (M, D, Y)');

    # Fecha fin
    $form->add('label', 'label_fecha_fin', 'fecha_fin', 'Fecha Fin');
    $obj = $form->add('date', 'fecha_fin');
    $obj->set_rule(array(
        'required' => array('error', 'Date is required!'),
        'date' => array('error', 'Date is invalid!'),
    ));
    $obj->format('Y-m-d');
    $obj->direction(1);
    $form->add('note', 'note_fecha_fin', 'fecha_fin', 'Formato de Fecha (Y, M, d)');

    # Hora Inicio
    $form->add('label', 'label_hora_inicio', 'hora_inicio', 'Hora Inicio:');
    $obj = $form->add('time', 'hora_inicio', '', array(
        'format' => 'hm',
        'hours' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23),
        'minutes' => array(00, 01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59),
            ));

    $obj->set_rule(array(
        'required' => array('error', 'Time is required!'),
    ));

    # Hora Fin
    $form->add('label', 'label_hora_fin', 'hora_fin', 'Hora Fin:');
    $obj = $form->add('time', 'hora_fin', '', array(
        'format' => 'hm',
        'hours' => array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23),
        'minutes' => array(00, 01, 02, 03, 04, 05, 06, 07, 08, 09, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59),
            ));

    $obj->set_rule(array(
        'required' => array('error', 'Time is required!'),
    ));
    
    $form->add('label', 'label_capacidad', 'capacidad', 'Capacidad:');
    $obj = $form->add('text', 'capacidad');
    $obj->set_rule(array(
        'required' => array('error', 'Capacidad de la Actividad es requerido!')
    ));

    # Descripcion
    $form->add('label', 'label_descripcion', 'descripcion', 'Descripcion:');
    $obj = $form->add('textarea', 'descripcion');
    $obj->set_rule(array(
        'required' => array('error', 'Descripcion es requerido!')
    ));

    //imagen
    $_SESSION['nombre_img'] = md5(rand(0, 500));
    $form->add('label', 'label_file', 'file', 'Sube una imagen para el evento');
    $obj = $form->add('file', 'file');
    $obj->set_rule(array(
        'upload' => array('../images/imgActividades', $_SESSION['nombre_img'], 'error', 'Could not upload file!<br>Check that the "tmp" folder exists inside the "examples" folder and that it is writable'),
        'image' => array('error', 'File must be a jpg, png or gif image!'),
        'filesize' => array(102400, 'error', 'File size must not exceed 100Kb!'),
        'required' => array('error', 'Se Requiere de una Imagen!')
    ));


    // "submit"

    $form->add('submit', 'btnsubmit', 'Actualizar');
    //----------------------------------Termina Form---------------------------------------//
    //validamos el formulario -------------------------------
    if ($form->validate()) {
        $actividad = new ActualizaController();
        if (isset($_POST)) {
            $_POST['imagen'] = $_SESSION['nombre_img'] . $_FILES['file']['name'];
            if ($actividad->actualiza_actividad($_POST, $id_actividad)) {
                header("Location: Actividades.php?evt=$id_evento");

                exit();
            }
        }
    }
    //--------------------------------------------------------


    include("../layouts/header.php");
    $llave = $eventos->valida_actividades($id_evento, $_SESSION['nombre'], $id_actividad)
    ?>

        <link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">
        <script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script><br/>

        <div class="span6 offset3">
            
                <?php
                if (count($llave)!=0 && $llave[0]['id_asistente'] == $_SESSION['id_usuario']) {
                    echo "<h2>Actualizacion de Actividades.</h2>";
                    $form->render();
                } else {
                    die('<br/><h2>Error 404... Tu Solicitud no ha podido ser atendida. !!!');
                }
                ?>
        </div>
    
    <?php include("../layouts/footer.php"); ?>
