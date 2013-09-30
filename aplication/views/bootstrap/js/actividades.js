
function modal_reg_act_usu(opc)
{
    switch (opc) {
        case 1:
            $msj = "Registro correcto";
            break;
        case 2:
            $msj = "Ya estas registrado!!!!!";
            break;
        case 3:
            $msj = "Registro INCORRECTO!!!!!!!,  Cruce de horarios";
            break;
        case 4:
            $msj = "Registro INCORRECTO!!!!!!!,  Ya no hay cupo";
            break;
        default:
            $msj = "Registro INCORRECTO!!!!!!!,  consultar al administrador";
            break;
    }

    document.getElementById("mensaje1").innerHTML = $msj;
    $('#modal_reg_act_usu').modal({
        show: true
    });
}
