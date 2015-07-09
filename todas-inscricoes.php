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

$maxRows_Rs_Inscricao = 100;
$pageNum_Rs_Inscricao = 0;
if (isset($_GET['pageNum_Rs_Inscricao'])) {
  $pageNum_Rs_Inscricao = $_GET['pageNum_Rs_Inscricao'];
}
$startRow_Rs_Inscricao = $pageNum_Rs_Inscricao * $maxRows_Rs_Inscricao;

mysql_select_db($database_Formulario, $Formulario);
$query_Rs_Inscricao = "SELECT * FROM inscricao ORDER BY inscricao_id DESC";
$query_limit_Rs_Inscricao = sprintf("%s LIMIT %d, %d", $query_Rs_Inscricao, $startRow_Rs_Inscricao, $maxRows_Rs_Inscricao);
$Rs_Inscricao = mysql_query($query_limit_Rs_Inscricao, $Formulario) or die(mysql_error());
$row_Rs_Inscricao = mysql_fetch_assoc($Rs_Inscricao);

if (isset($_GET['totalRows_Rs_Inscricao'])) {
  $totalRows_Rs_Inscricao = $_GET['totalRows_Rs_Inscricao'];
} else {
  $all_Rs_Inscricao = mysql_query($query_Rs_Inscricao);
  $totalRows_Rs_Inscricao = mysql_num_rows($all_Rs_Inscricao);
}
$totalPages_Rs_Inscricao = ceil($totalRows_Rs_Inscricao/$maxRows_Rs_Inscricao)-1;
?><!DOCTYPE html>
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
    <div class="container" id="inscricoes" style="text-align: justify">
        <div class="alert-success" style="padding: 10px"><h2>Lista de inscrições no Curso de Extensão Cultural da Mulher / 2015</h2></div>
      <table border="1" class="table-bordered table-condensed table-hover"  style="width:100%">
        <tr style="font-weight:bold; text-align:center; color: #222222;" class="alert-warning">
          <td>Cod</td>
          <td>Nome Completo</td>
          <td>Identidade</td>
          <td>Endereço</td>
          <td>Cidade / Estado</td>
          <td>Telefone</td>
          <td>Sitauação</td>
        </tr >
        <?php do { ?>
          <tr style="font-weight:normal; text-align:center">
            <td><?php echo $row_Rs_Inscricao['inscricao_id']; ?></td>
            <td><?php echo $row_Rs_Inscricao['inscricao_nome']; ?></td>
            <td><a href="impressao.php?identidade=<?php echo $row_Rs_Inscricao['inscricao_identidade']; ?>"><?php echo $row_Rs_Inscricao['inscricao_identidade']; ?></a> -
                <?php echo $row_Rs_Inscricao['inscricao_emissoridt']; ?></td>
            <td><?php echo $row_Rs_Inscricao['inscricao_endereco']; ?> - nº: <?php echo $row_Rs_Inscricao['inscricao_numero']; ?></td>
            <td><?php echo $row_Rs_Inscricao['inscricao_cidade']; ?> / <?php echo $row_Rs_Inscricao['inscricao_estado']; ?></td>
            <td><?php echo $row_Rs_Inscricao['inscricao_telefone']; ?></td>
            <td><?php echo $row_Rs_Inscricao['inscricao_militar']; ?></td>
        </tr>
          <?php } while ($row_Rs_Inscricao = mysql_fetch_assoc($Rs_Inscricao)); ?>
      </table>
    </div>
</body>
</html>
<?php
mysql_free_result($Rs_Inscricao);
?>