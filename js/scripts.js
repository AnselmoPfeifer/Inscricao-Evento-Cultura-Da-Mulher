/**
 * Created by 0940680044 on 02/06/15.
 */
<!--Validação de formulario-->
<script language="javascript">
function checarDados()
{
    with (document.inscricao)
    {

        if (nome.value == "")
        {
            alert("O Nome é Obrigatório! ");
            nome.focus();
            return false;
        }

        if (identidade.value == "")
        {
            alert("A Identidade é Obrigatória!")
            identidade.focus();
            return false;
        }

        if (emissor.value == "")
        {
            alert("O Orgão Emissor é Obrigatório!")
            emissor.focus();
            return false;
        }

        if (datanasc.value == "")
        {
            alert("A data nascimento é Obrigatória!")
            datanasc.focus();
            return false;
        }

        if (endereco.value == "")
        {
            alert("O endereço é Obrigatório!")
            endereco.focus();
            return false;
        }

        if (cidade.value == "")
        {
            alert("A cidade é Obrigatória!")
            cidade.focus();
            return false;
        }
        <!-- Estado -->
        if (estado.value == "")
        {
            alert("O Estado é Obrigatório!")
            estado.focus();
            return false;
        }
        <!-- email -->
        if (email.value == "")
        {
            alert("O e-mail é Obrigatório!")
            email.focus();
            return false;
        }
        <!-- telefone-->
        if (telefone.value == "")
        {
            alert("O telefone é Obrigatório!")
            telefone.focus();
            return false;
        }
        <!-- frequencia -->
        if (frequencia.value == "")
        {
            alert("A frequencia é  Obrigatória!")
            frequencia.focus();
            return false;
        }
    }
}
</script>
<!--Fim-->