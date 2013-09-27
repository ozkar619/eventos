
function modal_reg_act_usu(opc)
{
    switch (opc) {
        case 1:
            $msj = "Registro correcto";
            break;
        case 2:
            $msj = "Registro INCORRECTO!!!!!!!, Ya estas registrado";
            break;
        case 3:
            $msj = "Registro INCORRECTO!!!!!!!,  Cruce de horarios";
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
function alerta(opc) {
    switch (opc) {
        case 1:
            alert("Registro correcto");
            break;
        case 2:
            alert("Registro INCORRECTO!!!!!!!, Ya estas registrado");
            break;
        case 3:
            alert("Registro INCORRECTO!!!!!!!,  Cruce de horarios");
            break;
            defaul:
                    alert("Registro INCORRECTO!!!!!!!,  consultar al administrador");
            break;
    }
}