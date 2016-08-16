<?php include_once 'cabecalho.html';?>
<?php require_once 'conexao.php'; ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
	$dsAlbum = $_POST["dsAlbum"];
	$dtAlbum = $_POST["dtAlbum"];

	foreach ($_POST as $key => $value)
	{
		if(empty($value))
		{
			if ($key == "dsAlbum")
			{
				$erros["dsAlbum"] = true;
			}else if($key == "dtAlbum")
			{
				$erros["dtAlbum"] = true;
			}
		}
	}

	if (!$erros)
	{
		$qryInsert = sprintf("insert into album values (null,'%s','%s')",$dsAlbum,$dtAlbum);
		$result = mysqli_query($link,$qryInsert);
		header("Location: index.php");
	}	
}

?>

<h3>Novo</h3>
<hr>

<form action="novo.php" method="POST" class="form-horizontal" role="form">
	<div class="form-group <?php if ($erros["dsAlbum"]) echo 'has-error' ?>">
		<label for="inputDsAlbum" class="col-sm-2 control-label">Descrição do Album:</label>
		<div class="col-sm-3">
			<input type="text" name="dsAlbum" id="inputDsAlbum" class="form-control" required="required">
			<?php if ($erros["dsAlbum"]): ?>
				<span class="help-block">*O campo descrição do album é obrigatório</span>				
			<?php endif ?>
		</div>
	</div>
	<div class="form-group <?php if ($erros["dtAlbum"]) echo 'has-error' ?>">
		<label for="inputDtAlbum" class="col-sm-2 control-label">Data do Album:</label>
		<div class="col-sm-2">
			<input type="date" name="dtAlbum" id="inputDtAlbum" class="form-control" value="" required="required" title="">
			<?php if ($erros["dtAlbum"]): ?>
				<span class="help-block">*O campo data do album é obrigatório</span>			
			<?php endif ?>
			
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-2 col-sm-offset-2">
			<button type="submit" class="btn btn-primary">Submit</button>
		</div>
	</div>
</form>

<?php include_once 'rodape.html';?>