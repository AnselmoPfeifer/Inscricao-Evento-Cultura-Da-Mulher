<?php
    $servername = "localhost";
    $username  =   "root";
    $password  = "123";
    $dbname = "cmo_culturadamulher";

    //Cria a conexao
    $conn = new mysqli($servername, $username, $password, $dbname);

    //Check a conexao
    if($conn->connect_error){
        die("Connection failed: ". $conn->connect_error);
    }

$inscricao_nome = strtoupper($_POST["inscricao_nome"]);
$inscricao_identidade = strtoupper($_POST["inscricao_identidade"]);
$inscricao_emissoridt = strtoupper($_POST["inscricao_emissoridt"]);
$inscricao_endereco = strtoupper($_POST["inscricao_endereco"]);
$inscricao_numero = strtoupper($_POST["inscricao_numero"]);
$inscricao_bairro = strtoupper($_POST["inscricao_bairro"]);
$inscricao_cep = strtoupper($_POST["inscricao_cep"]);
$inscricao_cidade = strtoupper($_POST["inscricao_cidade"]);
$inscricao_estado = strtoupper($_POST["inscricao_estado"]);
$inscricao_email = strtoupper($_POST["inscricao_email"]);
$inscricao_telefone = strtoupper($_POST["inscricao_telefone"]);
$inscricao_militar = strtoupper($_POST["inscricao_militar"]);
$inscricao_nome_militar = strtoupper($_POST["inscricao_nome_militar"]);
$inscricao_om = strtoupper($_POST["inscricao_om"]);


$sql = "INSERT INTO inscricao (inscricao_id,inscricao_nome,inscricao_identidade,inscricao_emissoridt,inscricao_endereco,
                  inscricao_numero,inscricao_bairro,inscricao_cep,inscricao_cidade,inscricao_estado, inscricao_email,inscricao_telefone,inscricao_militar,inscricao_nome_militar,inscricao_om)
                  VALUES (NULL ,'$inscricao_nome','$inscricao_identidade','$inscricao_emissoridt','$inscricao_endereco','$inscricao_numero','$inscricao_bairro','$inscricao_cep','CAMPO GRANDE',
                  '$inscricao_estado','$inscricao_email','$inscricao_telefone','$inscricao_militar','$inscricao_nome_militar','$inscricao_om')";

    if($conn->query($sql) == TRUE) {
        //echo "Conecao realizada com sucesso";
    }else{
        echo "Error: " . $sql . "<br> . $conn->error";
    }

    $conn->close();

?>
<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Cadastro Realizado com Sucesso</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Formulário de Inscrição a Corrida da Paz">
    <meta name="author" content="Anselmo Pfeifer">

    <!--link rel="stylesheet/less" href="less/bootstrap.less" type="text/css" /-->
    <!--link rel="stylesheet/less" href="less/responsive.less" type="text/css" /-->
    <!--script src="js/less-1.3.3.min.js"></script-->
    <!--append ‘#!watch’ to the browser URL, then refresh the page. -->

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <![endif]-->

    <!-- Fav and touch icons -->
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="img/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="img/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="img/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="img/apple-touch-icon-57-precomposed.png">
    <link rel="shortcut icon" href="img/favicon.png">

    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
    <script type="text/javascript" src="js/scripts.js"></script>
</head>
<body>
<div class="container"style="text-align: justify;">
    <h1 class="alert-info" style="padding: 20px; width: 500px; text-align: center">
        <strong>Inscrição realizada com sucesso!</strong>
    </h1>

    <h2 class="alert-success" style="padding: 20px; width: 500px; text-align: center">
        até 12 de Agosto 2015</small></h2>

    <h3 class="alert-warning" style="padding: 20px; width: 500px; text-align: center">
        <a href="impressao.php?identidade=<?php echo $_POST['inscricao_identidade'];?>" class="btn btn-success" style="text-align: center">
            Para impressão do comprovante de inscrição Click Aqui!</a>
        </h3>




</div>
</body>
</body>
</html>

