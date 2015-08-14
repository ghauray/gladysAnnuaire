<div class="toolbox padding10">
	<a class="a-btn" href="home">
		<button class='btn btn-blue'><i class='fa fa-arrow-left fa-2x'></i><br />Retour</button>
	</a>
	<a class="btn-edit a-btn" href="#">
		<button class='btn btn-green'><i class='fa fa-pencil fa-2x'></i><br />Modifier</button>
	</a>
	<a class='a-del a-btn' href='delRecord?id=".$value->getId()."' data-id='".$value->getId()."'>
		<button class='btn btn-red'><i class='fa fa-trash-o fa-2x'></i><br/>Supprimer</button>
	</a>
</div>
<div class="striped">
	<div class="pageCenter width80 centerBlock">
		<div class="padding10">
			<p>Libellé : <?php echo $record->getTitle(); ?></p>
			<p>Description : <?php echo $record->getDescription(); ?></p>


		</div>
	</div>
</div>

<div class="modaleEdit" style="display:none">
	<div class="popup">
		<header>
			<div class="alignRight">
				<button class="btnHideModale btn"><i class='fa fa-times'></i></button>
			</div>
			<div class="alignLeft">
				<h2 class="h2">Modifier un enregistrement</h2>
			</div>
		</header>
		<form id="formAddRecord" action="addRecord" method="POST">
			<input type="hidden" name="id" value="<?php echo $record->getId(); ?>">
			<label>Libellé : </label><input type="text" name="title" value="<?php echo $record->getTitle(); ?>"/><br/>
			<label>Description : </label><input type="text" name="description" value="<?php echo $record->getDescription(); ?>"/><br/>
			<input class="btn btn-blue padding5" type='submit' value='Sauvegarder' />
		</form>
	</div>
</div>