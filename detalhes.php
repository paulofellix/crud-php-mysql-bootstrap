<?php include_once 'cabecalho.html';?>	
<?php require_once 'conexao.php'; ?>

<?php 
	$id = $_GET["id"];
	$result = mysqli_query($link,"select * from album where id = ".$id);
	$detalhe = mysqli_fetch_array($result,MYSQLI_BOTH);
?>

<h2>Detalhes</h2>
<hr/>

<div class="row">
	<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
		<dl class="dl-horizontal">
			<dt>
				Id do Album:
			</dt>
			<dd>
				<?php echo $detalhe["id"] ;?>
			</dd>
			<dt>
				Descrição:
			</dt>
			<dd>
				<?php echo $detalhe["ds_album"]; ?>
			</dd>
			<dt>
				Data do Album:
			</dt>
			<dd>
				<?php echo $detalhe["dt_album"] ?>
			</dd>
		</dl>
	</div>
</div>
<p>
	<?php printf("<a href=editar.php?id=%s>Editar</a> | <a href=index.php>Voltar para lista</a>  ",$detalhe["id"]); ?>
</p>

<?php	include_once 'rodape.html'; ?>
