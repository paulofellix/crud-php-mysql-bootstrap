<?php include_once 'cabecalho.html';?>	
<?php require_once 'conexao.php'; ?>

<?php 
$result = mysqli_query($link, "select * from album");
?>



<div class="row">
	<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
		<h3>Index
			<a href="novo.php">
				<button type="button" class="btn btn-primary">Novo</button>
			</a>
		</h3>	
	</div>	
</div>
<hr/>
<div class="row">
	<div class="col-md-10 col-lg-10 col-sm-10">
		<input type="text" id="pesquisaAlbum" class="form-control" />
	</div>
	<div class="col-md-2 col-lg-2 col-sm-2">
		<button id="btnPesquisarAlbum" class="btn btn-default">Pesquisar...</button>
	</div>
</div>
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-striped table-hover" id="tblAlbuns">
			<thead>
				<tr>
					<th>Id</th>	
					<th>Album</th>
					<th>Dt. Album</th>
					<th></th>
				</tr>
			</thead>
			<tbody>
				<?php 
				while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) 
				{
					$html = "<tr>";
					$html .= sprintf("<td>%s</td>",$row[id]);
					$html .= sprintf("<td>%s</td>",$row[ds_album]);
					$html .= sprintf("<td>%s</td>",$row[dt_album]);
					$html .= "<td>";
					$html .= sprintf(" <a href=detalhes.php?id=%s>Detalhes</a> | ",$row[id]);
					$html .= sprintf(" <a href=editar.php?id=%s>Editar</a> | ",$row[id]);
					$html .= sprintf(" <a href=excluir.php?id=%s>Excluir</a> ",$row[id]);
					$html .= "</td>";
					$html .= "</tr>";
					echo $html;
				}
				?>
			</tbody>
		</table>
	</div>	
</div>

<?php include_once 'rodape.html'; ?>

<script type="text/javascript">
	$(document).ready(function () {
		$('#btnPesquisarAlbum').click(function () {
			var termoPesquisa = $('#pesquisaAlbum').val();
			$.ajax({
				method: "GET",
				dataType: "JSON",
				url: "pesquisa.php?termoPesquisa="+ termoPesquisa,
				success: function (data) {
					$('#tblAlbuns tbody > tr').remove();
					$.each(data, function (i, album) {
						$('#tblAlbuns tbody').append(
							"<tr>" +
							"   <td>" + album.id + "</td>" +
							"   <td>" + album.ds_album + "</td>" +
							"   <td>" + album.dt_album + "</td>" +
							"   <td>"+
							"       <a href='detalhes.php?id="+album.id+"'>Detalhes</a> | "+
							"       <a href='editar.php?id="+album.id+"'>Editar</a> |    "+
							"       <a href='excluir.php?id="+album.id+"'>Excluir</a>"+
							"   </td>"+
							"</tr>"
							);
					});
				},
				error: function (data) {
					alert("Houve um erro na pesquisa");
				}
			});
		});
	});
</script>


