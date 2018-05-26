<form action="<?php echo base_url();?>galeria/upload" class="dropzone dz-min" id="dropzone_example" enctype="multipart/form-data" method="POST">
	<div class="fallback">
		
		
	</div>
	<input type="hidden" name="album" value="<?php echo $album;?>">
</form>

<div id="dze_info" class="hidden">
	
	<br />
	<div class="panel panel-default">
		<div class="panel-heading">
			<div class="panel-title">Informaçoes da imagem</div>
		</div>
		
		<table class="table table-bordered">
			<thead>
				<tr>
					<th width="40%">Nome</th>
					<th width="15%">Tamanho</th>
					<th width="15%">Tipo</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody>
			</tbody>
			<tfoot>
				<tr>
					<td colspan="4"></td>
				</tr>
			</tfoot>
		</table>
	</div>
</div>