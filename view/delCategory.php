<div class="toolbox padding10">
	<a class="a-btn" href="manageCategories">
		<button class='btn btn-blue'><i class='fa fa-arrow-left fa-2x'></i><br />Retour</button>
	</a>
</div>
<div class="striped">
	<div class="pageCenter width80 centerBlock">
		<h1 class="h1">Des problèmes ont étés détectés lors de la suppréssion de la catégorie : <span class='tag'><?php echo $currentCategory->__get("name") ?></span></h1>
			<form action="resolveDelete" method="POST">
				<?php
				echo "<input type='hidden' name='parent' value='".$currentCategory->__get("parent")."'/>";
				echo "<input type='hidden' name='currentId' value='".$currentCategory->__get("id")."'/>";
				$idChildren = "";
				foreach ($children as $child) {
					$idChildren .= $child->__get("id");
					if ($child !== end($children)){
						$idChildren .= ";";
					}
				}
				echo "<input type='hidden' name='children' value='".$idChildren."'/>";
				if(!is_null($parent)) {
					echo "<input type='radio' name='choiceResolve' id='grandParent'  value='grandParent' required checked='checked' /><label for='grandParent'> Passer toutes les catégories enfants en tant qu'enfant de la catégorie : <span class='tag'>".$parent->__get('name')."</span></label><br/>";
				}

				?>
				
				<input type="radio" name="choiceResolve" id="principal" value="principal" required /><label for="principal"> Passer toutes les catégories enfants en catégorie principale</label><br/>
				<input type="radio" name="choiceResolve" id="chooseForAll" value="chooseForAll" required /><label for="chooseForAll"> Choisir pour chaque enfant : </label><br/>
			
				<h2 class='h2'>Les catégories enfant :</h2>
				<?php
						echo "<table class='borderCollapse'>";
							foreach ($children as $child) {
								echo "<tr>";
									echo "<td class='displayTableCell col50 padding10'>";
										echo "<span class='tag'>".$child->__get("name")."</span> ";
										echo "<select id='child".$child->__get("id")."' name='child".$child->__get("id")."' class='relative bottom1 selectResolve displayNone'>";
											echo "<option value='0'></option>";
											foreach ($categories as $category) {
													echo "<option value='".$category->__get("id")."'>".$category->__get("name")."</option>";
											}

										echo "</select>";
									echo " </td>";
								echo "</tr>";
							}
						echo "</table>";
				?>
				<div class="alignCenter">
					<input class="btn btn-blue fontSize20 padding10" type="submit" value="Valider"/>
				</div>
			</form>
</div>
