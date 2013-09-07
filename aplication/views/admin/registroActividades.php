    <?php
    session_start();
    include ('../../models/Conexion.php');
    include ('../../models/Modelo.php');
    include ('../../models/Actividades.php');
    include ('../../libs/adodb5/adodb-pager.inc.php');
    include ('../../libs/adodb5/adodb.inc.php');
    include ('../../controllers/adminController/registroActController.php');
    
    
        $id_evento = ($_GET['id_evento']); #-> Obtenemos id_evento que fue enviado por parametro        
        $datosActividades = array(
            'id_evento' => $id_evento,
            'id_instructor' => '',
            'nombre_actividad' => '',
            'lugar' => '',
            'precio' => '',
            'fecha_inicio' => '',
            'fecha_fin' => '',
            'hora_inicio' => '',
            'hora_fin' => '',
            'descripcion' => '',
            'imagen' => '',
        );
        
        //libreria del formulario ----------------------------
        require '../../libs/zebra_form/Zebra_Form.php';
        //definimos el formulario ----------------------------
        $form = new Zebra_Form('form', 'POST', '', array());
        $form->language('espanol');
        $form->auto_fill($datosActividades);


        //----------------------------------Comienza Form---------------------------------------//
        # id_evento        
        $obj = $form->add('hidden', 'id_evento');
        $obj->set_rule(array(
            'required' => array('error', 'ID es requerido!'),
        ));
    
        # id_instructor
        $form->add('label', 'label_id_instructor', 'id_instructor', 'ID Instructor:');
        $obj = $form->add('text', 'id_instructor');
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
        $form->add('note', 'note_fecha_inicio', 'fecha_inicio', 'Formato de Fecha (AAAA, MM, DD)');

        # Fecha fin
        $form->add('label', 'label_fecha_fin', 'fecha_fin', 'Fecha Fin');
        $obj = $form->add('date', 'fecha_fin');
        $obj->set_rule(array(
            'required' => array('error', 'Date is required!'),
            'date' => array('error', 'Date is invalid!'),
        ));
        $obj->format('Y-m-d');
        $obj->direction(1);
        $form->add('note', 'note_fecha_fin', 'fecha_fin', 'Formato de Fecha (AAAA, MM, DD)');

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

        # Descripcion
        $form->add('label', 'label_descripcion', 'descripcion', 'Descripcion:');
        $obj = $form->add('textarea', 'descripcion');
        $obj->set_rule(array(
            'required' => array('error', 'Descripcion es requerido!')
        ));

        //imagen
        $form->add('label', 'label_file', 'file', 'Sube una imagen para el evento');
        $obj = $form->add('file', 'file');
        $obj->set_rule(array(
            'upload' => array('../images/imgActividades', ZEBRA_FORM_UPLOAD_RANDOM_NAMES, 'error', 'Could not upload file!<br>Check that the "tmp" folder exists inside the "examples" folder and that it is writable'),
            'image' => array('error', 'File must be a jpg, png or gif image!'),
            'filesize' => array(102400, 'error', 'File size must not exceed 100Kb!'),
        ));       

        $form->add('submit', 'btnsubmit', 'Registrar');

        //----------------------------------Termina Form---------------------------------------//



        //validamos el formulario -------------------------------
        if ($form->validate()) {
            $actividad = new RegistroActController();
            if (isset($_POST)) {
                $_POST['imagen']=$_FILES['file']['name'];
                if ($actividad->registraActividad($_POST)) {
                    header("Location: adminActivity.php?id_evento=$id_evento");
                    exit();
                }
            }
        }
        //--------------------------------------------------------

    include("../layouts/header.php");
    ?>
        <link rel="stylesheet" href="../../libs/zebra_form/public/css/zebra_form.css">
        <script src="../../libs/zebra_form/public/javascript/zebra_form.js"></script>

        <div class="span6 offset3">
            <h2>Registro de Actividades.</h2>
            <?php
                $form->render();
            ?>
        </div>

    <?php
    include("../layouts/footer.php");
    ?>
