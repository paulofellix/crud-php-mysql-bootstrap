<?php include_once 'cabecalho.html';?>
<?php require_once 'conexao.php'; ?>

<?php 

if ($_SERVER["REQUEST_METHOD"] == "GET")
{
	$id = $_GET["id"];
	$result = mysqli_query($link,"select * from album where id = ".$id);
	$data = mysqli_fetch_array($result,MYSQLI_BOTH);
}else{
	$id = $_POST["idAlbum"];
	$dsAlbum = $_POST["dsAlbum"];
	$dtAlbum = $_POST["dtAlbum"];
	
	if ($dsAlbum == "")
	{
		$erroDescricaoAlbum = "has-error";
		$temErro = true;
	}
	if ($dtAlbum == "")
	{
		$erroDataAlbum = "has-error";
		$temErro = true;
	}

	if($temErro){
		$data["id"] = $id;
		$data["ds_album"] = $dsAlbum;
		$data["dt_album"] = $dtAlbum;
		$alert = "erro";
	}else{
		$ds_album = str_replace($ds_album,"'","");
		$sqlUpdate = sprintf("update album set 
			ds_album = '%s',
			dt_album = '%s'
			where
			id = %s",
			$dsAlbum,
			$dtAlbum,
			$id);

		$result = mysqli_query($link,$sqlUpdate);

		if ($result)
		{
			$alert = "sucesso";
			$result = mysqli_query($link,"select * from album where id = ".$id);
			$data = mysqli_fetch_array($result,MYSQLI_BOTH);
		}
	}
}

?>

<h2>Editar</h2>

<div class="form-horizontal">
	<form action="editar.php" method="POST" role="form">
		<legend>Album</legend>
		<?php if ($alert == "sucesso") 
			{
				echo "<div class='alert alert-success alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
						Dados Salvos com sucesso!
					  </div>"; 
			}else if ($alert == "erro"){
				echo "<div class='alert alert-danger alert-dismissible' role='alert'>
						<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
							<span aria-hidden='true'>&times;</span>
						</button>
						Erro ao salvar os dados!
					  </div>"; 
			}
		?>
		<input type="hidden" name="idAlbum" id="inputIdAlbum" class="form-control" value="<?php echo $data['id']; ?>">
		<div class="form-group <?php echo $erroDescricaoAlbum ?>">
			<label for="inputDsAlbum" class="control-label col-sm-2 col-md-2 col-lg-2">Descrição do Album</label>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<input type="text" name="dsAlbum" id="inputDsAlbum" class="form-control" value="<?php echo $data['ds_album']; ?>" required="required">
				<?php if ($erroDescricaoAlbum == 'has-error') echo "<span class='help-block'>*O campo descrição do album é obrigatório</span>" ?>
			</div>
		</div>
		<div class="form-group <?php echo $erroDataAlbum ?>">
			<label for="inputDtAlbum" class="control-label col-sm-2 col-md-2 col-lg-2">Data do Album</label>
			<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
				<input type="date" name="dtAlbum" id="inputDtAlbum" class="form-control" value="<?php echo $data['dt_album']; ?>" required="required">
				<?php if ($erroDataAlbum == 'has-error') echo "<span class='help-block'>*O campo data do album é obrigatório</span>" ?>
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-offset-2 col-md-2">
				<button type="submit" class="btn btn-primary">Salvar</button>
			</div>
		</div>
	</form>
</div>
</div>

<?php include_once 'rodape.html';?>