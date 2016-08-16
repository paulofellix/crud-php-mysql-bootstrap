<?php include_once 'cabecalho.html';?>
<?php require_once 'conexao.php'; ?>

<?php 
	if ($_SERVER["REQUEST_METHOD"] == "GET")
	{
		$id = $_GET["id"];
		$result = mysqli_query($link,"select * from album where id = ".$id);
		$detalhe = mysqli_fetch_array($result,MYSQLI_BOTH);		
	}else{
		$id = $_POST["id"];
		$result = mysqli_query($link,"delete from album where id = ".$id);
		if($result){
			header("Location: index.php");
		}else{
			header("Location: excluir.php?id=".$id);
		}
	}

?>

<h2>Excluir</h2>
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

<form action="excluir.php" method="post" class="form-horizontal">
	<div class="form-group">
		<div class="col-sm-1 col-md-1 col-lg-1">
			<input type="hidden" name="id" id="inputId" class="form-control" value="<?php echo $detalhe["id"] ?>">	
			<button type="submit" class="btn btn-danger">Excluir</button>
		</div>
	</div>
</form>

<?php include_once 'rodape.html';?>