<form class="form-horizontal" method="get" action="">
	<fieldset>

	<!-- Form Name -->
	<legend>Ajouter un jeu</legend>

	<!-- Text input-->
	<div class="form-group">
		<label class="col-md-4 control-label" for="id">ID du jeu</label>  
		<div class="col-md-4">
			<input id="id" name="id" placeholder="" class="form-control input-md" required="" type="text">

		</div>
	</div>

	<!-- Textarea -->
	<div class="form-group">
		<label class="col-md-4 control-label" for="desc">Description</label>
		<div class="col-md-4">                     
			<textarea class="form-control" id="desc" name="desc"></textarea>
		</div>
	</div>
		
	<input type="hidden" name="action" value="created" />
	<input type="hidden" name="controller" value="game" />

	<!-- Button -->
	<div class="form-group">
		<label class="col-md-4 control-label" for=""></label>
		<div class="col-md-4">
			<button type="submit" id="" name="" class="btn btn-default">Ajouter</button>
		</div>
	</div>

	</fieldset>
</form>
