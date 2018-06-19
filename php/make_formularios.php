			
			
	<form action="" method="post" class="form-horizontal form-label-left">
	
			<div class="form-group">
			
				<div class="col-md-3 control-label">
					<label for="nombre">Nombres</label>
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" readonly value="<?php echo $codigo; ?>" name="consecutivo" />
				</div>
				
			</div>

			<div class="form-group">

				<div class="col-md-3">
								<button type="button" class="btn btn-success" onclick="enviar();">Enviar</button>
		      					<input type="reset" class="btn btn-danger" name="limpiar" id="limpiar" value="Limpiar" />
				</div>
			</div>

		

	</form>