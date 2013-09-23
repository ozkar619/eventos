
function modal_reg_act_usu(opc)
{
    if (opc == 1) {
        document.getElementById("mensaje1").innerHTML = "Registro corresto!!!!1";
        $('#modal_reg_act_usu').modal({
            show: true
        });
    } else {
        document.getElementById("mensaje1").innerHTML = "Registro incorrecto || ya estas inscrito!!!!1";
        $('#modal_reg_act_usu').modal({
            show: true
        });
    }

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