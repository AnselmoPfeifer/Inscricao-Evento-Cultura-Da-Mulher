function formatar(mascara, documento){
    var i = documento.value.length;
    var saida = mascara.substring(0,1);
    var texto = mascara.substring(i)

    if (texto.substring(0,1) != saida){
        documento.value += texto.substring(0,1);
    }

}

function radio(){

    document.form.caso_2.style.visibility='visible';
}
