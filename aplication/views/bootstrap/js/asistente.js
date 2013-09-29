
function funct_modal(id_act, id_usu, act)
{
    var u= document.getElementById("id_u");
    u.setAttribute("value",id_usu);
    
    var a =document.getElementById("id_a");
    a.setAttribute("value",id_act);
    
    var d =  document.getElementById("actividad");
    d.innerHTML = ("¿Eliminar "+act+" ?");
    
    $('#confirmacion').modal({
        show: true
    }); 
}



