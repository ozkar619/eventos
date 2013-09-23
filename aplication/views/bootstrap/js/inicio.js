
function func_modal(nom,lugar,f_i,f_f,cont,info)
{
    document.getElementById("nombre").innerHTML = (nom);
    document.getElementById("informacion").innerHTML = ("Informacion : "+info);
    document.getElementById("fecha").innerHTML = ("Del "+f_i+" al "+f_f);
    document.getElementById("lugar").innerHTML = ("Lugar :"+lugar);
    document.getElementById("contacto").innerHTML =("Contacto :" + cont);
    $('#myModal').modal({
        show: true
    });
    
}



