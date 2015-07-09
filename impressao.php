<?php require_once('Connections/Formulario.php'); ?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$colname_Rs_Inscricao = "-1";
if (isset($_GET['identidade'])) {
  $colname_Rs_Inscricao = $_GET['identidade'];
}
mysql_select_db($database_Formulario, $Formulario);
$query_Rs_Inscricao = sprintf("SELECT * FROM inscricao WHERE inscricao_identidade = %s", GetSQLValueString($colname_Rs_Inscricao, "text"));
$Rs_Inscricao = mysql_query($query_Rs_Inscricao, $Formulario) or die(mysql_error());
$row_Rs_Inscricao = mysql_fetch_assoc($Rs_Inscricao);
$totalRows_Rs_Inscricao = mysql_num_rows($Rs_Inscricao);
?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>Impressao da Ficha de inscrição</title>
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
    <div class="container"style="text-align: justify">

                <table class="table table-bordered table-responsive table-hover">
                    <tr>
                        <td  class="cabecalho alert-success" style="text-align: center; font-weight: bold;" colspan="2">FICHA DE INSCRIÇÃO -  Codigo: <?php echo $row_Rs_Inscricao['inscricao_id']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:left;"><b>Dados da participante:</td>

                    </tr>

                    </tr>
                    <tr>
                        <td><b>Nome: </b><?php echo $row_Rs_Inscricao['inscricao_nome']; ?></td>
                        <td><b>Telefone: </b><?php echo $row_Rs_Inscricao['inscricao_telefone']; ?></td>
                  </tr>
                    <tr>
                        <td><b>Identidade:</b> <?php echo $row_Rs_Inscricao['inscricao_identidade']; ?></td>
                        <td><b>Orgao Emissor: </b><?php echo $row_Rs_Inscricao['inscricao_emissoridt']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Cidade: </b><?php echo $row_Rs_Inscricao['inscricao_cidade']; ?></td>
                        <td><b>Estado: </b><?php echo $row_Rs_Inscricao['inscricao_estado']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Endereço: </b><?php echo $row_Rs_Inscricao['inscricao_endereco']; ?></td>
                        <td><b>Numero: </b><?php echo $row_Rs_Inscricao['inscricao_numero']; ?></td>
                    </tr>
                    <tr>
                        <td><b>Bairro: </b><?php echo $row_Rs_Inscricao['inscricao_bairro']; ?></td>
                        <td><b>CEP: </b><?php echo $row_Rs_Inscricao['inscricao_cep']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"><b>E-mail: </b><?php echo $row_Rs_Inscricao['inscricao_email']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align:left;"><b>Dados do Militar Vinculado ao Participante (Cônjuge, Responsável ou Coordenador):</td>

                    </tr>
                    <tr>
                        <td><b>Situação: </b><?php echo $row_Rs_Inscricao['inscricao_militar']; ?></td>
                        <td><b>Nome / OM: </b><?php echo $row_Rs_Inscricao['inscricao_nome_militar']; ?> / <?php echo $row_Rs_Inscricao['inscricao_om']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="2" style="text-align: center">
                            <a class="btn btn-block glyphicon glyphicon-print" onClick="print()"> Imprimir</a>                        </td>
                    </tr>
                </table>
  
</div>
</body>
</html>
<?php
mysql_free_result($Rs_Inscricao);
?>
