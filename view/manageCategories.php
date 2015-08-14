<div class="toolbox padding10">
	<a class="a-btn" href="home">
		<button class='btn btn-blue'><i class='fa fa-arrow-left fa-2x'></i><br />Retour</button>
	</a>
</div>
<div class="striped">
	<div class="pageCenter width80 centerBlock">
		<div class="">
			<h2 class="h2">Ajouter une catégorie</h2>
			<form id="formAddCategory" action="addCategory" method="POST">
				<label for="formAddCategoryName">Nom : </label>
				<input id="formAddCategoryName" class="inputText120" type="text" name="name" required/>
				<label for="formAddCategoryParent">Parent : </label>
				<select id="formAddCategoryParent" name="parent">
				<option value="0"></option>
				<?php
					foreach ($categories as $category) {
						echo "<option value='".$category->__get("id")."'>".$category->__get("name")."</option>";
					}
				?>
				</select>
				<input class="btn btn-blue padding5" id="formAddCategorySubmit" type="submit" value="Ajouter">
			</form>
		</div>
		<div id="categories" clas="">
			<?php
				echo ctrl_category_display(0,0,$categories,true);
			?>
		
		</div>
	</div>
</div>

<div class="modaleEdit" style="display:none">
	<div class="popup">
		<header>
			<div class="alignRight">
				<button class="btn btnHideModale"><i class='fa fa-times'></i></button>
			</div>
			<div class="alignLeft">
				<h2 class="h2">Modifier une catégorie</h2>
			</div>
		</header>
		<form id="formEditCategory" action="editCategory" method="POST">
			<input id="formEditCategoryId" type="hidden" name="id"/>
			<label for="formEditCategoryName">Nom : </label>
			<input id="formEditCategoryName" class="inputText120" type="text" name="name" required/>
			<label for="formEditCategoryParent">Parent : </label>
			<select id="formEditCategoryParent" name="parent" required>
				<option value="0"></option>
				<?php
					foreach ($categories as $category) {
						echo "<option value='".$category->__get("id")."'>".$category->__get("name")."</option>";
					}
				?>
			</select>
			<input class="btn btn-blue padding5" id="formAddRecordSubmit" type="submit" value="Sauvegarder">
		</form>
	</div>
</div>


<script>
	$("#btnEditCategory").click(function(){

	});
</script>