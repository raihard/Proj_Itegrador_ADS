<?php 

require "./views/header.php";
require '../config/conecta.php';
require './views/footer.php';

$action = $_REQUEST['acao'];

$qryMesaMax = mysql_query("select max(mes_id) as ultimaMesa from mes_mesa") or die(mysql_error());
$qryFuncionario = mysql_query("select max(func_id) as ultimofuncionario from func_funcionario") or die(mysql_error());
$qryProdutoMax = mysql_query("select max(prod_id) as ultimoproduto from prod_produto") or die(mysql_error());
$qryAdcionalMax = mysql_query("select max(ad_id) as ultimoadicional from ad_adcionais") or die(mysql_error());

while ($row = mysql_fetch_assoc($qryMesaMax)) {
    $mes_id = $row['ultimaMesa'];
}

while ($row = mysql_fetch_assoc($qryFuncionario)) {
    $func_id = $row['ultimofuncionario'];
}

while ($row = mysql_fetch_assoc($qryProdutoMax)) {
    $prod_id = $row['ultimoproduto'];
}

while ($row = mysql_fetch_assoc($qryAdcionalMax)) {
    $ad_id = $row['ultimoadcionais'];
}

switch ($action) {
    case "insertMesa":
        $novaMesa = $mes_id+1;
        $mes_tamanho = $_REQUEST['mes_tamanho'];
        mysql_query("insert into mes_mesa(mes_id,mes_tamanho,mes_status)values('','$mes_tamanho','F')")or die(mysql_error());
        echo '<div class="alert alert-success">Mesa cadastrada com sucesso!</div>';
        echo "<script>window.location = 'inicio.php'</script>";
        break;
		
    case "updateMesa":
        echo "i equals 1";
        break;
		
	case "insertFuncionario":
		$novoFuncionario = $func_id+1;
		$nome = $_REQUEST['func_nome'];
		$cpf = $_REQUEST['func_cpf'];
		$endereco = $_REQUEST['func_endereco'];
		$numero = $_REQUEST['func_numero'];
		$bairro = $_REQUEST['func_bairro'];
		$estado = $_REQUEST['func_estado'];
		$cidade = $_REQUEST['func_cidade'];
		mysql_query("insert into func_funcionario(func_id,func_nome,func_cpf,func_endereco,func_numero,func_bairro,func_estado,func_cidade) values('','$nome','$cpf','$endereco','$numero','$bairro','$estado','$cidade')")or die(mysql_error());
		echo '<div class="alert alert-success">Funcionário cadastrado com sucesso!</div>';
        echo "<script>window.location = 'inicio.php'</script>";
		
		break;
		
	case "insertProduto":
		$novoProduto = $prod_id+1;
		$descricao = $_REQUEST['prod_descricao'];
		$tipo = $_REQUEST['prod_tipo'];
		$valor = $_REQUEST['prod_valor'];
		mysql_query("insert into prod_produto(prod_id,prod_descricao,prod_tipo,prod_valor) values('','$descricao','$tipo','$valor')")or die(mysql_error());
		echo '<div class="alert alert-success">Produto cadastrado com sucesso!</div>';
        echo "<script>window.location = 'inicio.php'</script>";
		
	break;
	
	case "insertAdcional":
		$novoAdcional = $ad_id+1;
		$descricao = $_REQUEST['ad_descricao'];
		$tipo = $_REQUEST['ad_tipo'];
		$valor = $_REQUEST['ad_valor'];
		mysql_query("insert into ad_adcionais(ad_id,ad_descricao,ad_tipo,ad_valor)values ('','$descricao','$tipo','$valor')")or die(mysql_error());
		echo '<div class="alert alert-success">Adcional cadastrado com sucesso!</div>';
        echo "<script>window.location = 'inicio.php'</script>";
	break;
	
	case "abrirMesa":
		mysql_query("uptade mes_mesa set mes_status = 'O' where mes_id = '1'")or die(mysql_error());
	break;
}



?>