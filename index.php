<?php include_once 'cabecalho.html';?>	
<?php require_once 'conexao.php'; ?>

<?php 
$result = mysqli_query($link, "select * from album");
?>


<h2>Index</h2>
<hr/>

<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
		<table class="table table-striped table-hover">
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

<?php	include_once 'rodape.html'; ?>


