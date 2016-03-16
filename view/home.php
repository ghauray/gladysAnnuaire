<div class="toolbox displayTable">
	<div class="displayTableRow">
		<div class="catagories displayTableCell col30 padding10">
<!-- Manage categories -->
			<a href="manageCategories">
				<button class="btn btn-blue padding5"><i class='fa fa-tag fa-2x'></i><br/>Gérer les catégories</button>
			</a>
		</div>
		<div class="displayTableCell col70 padding10">
<!-- Create new record -->
			<button class="btn-edit btn btn-blue padding5"><i class='fa fa-file-o fa-2x'></i><br/>Ajouter un enregistrement</button>
		</div>
	</div>
</div>

<div class="displayTable">
	<div class="displayTableRow">
		<div class="catagories displayTableCell col30">
<!-- Categories List -->
			<div id="categories">
				<?php
					echo ctrl_category_display(0,0,$categories,false);
				?>
			
			</div>
		</div>
		<div class="displayTableCell col70 padding10">
<!-- Records list -->
			<div id="records">
				<h2 class="h2">Enregistrements</h2>
				<?php
					if(sizeof($records)!=0) {
				?>
				<table id="TableList">
					<tr>
						<th>Libellé</th><th>Description</th><th>Catégories</th><th class="alignCenter">Voir</th><th class="alignCenter">Supprimer</th>
					</tr>
							<?php
							foreach ($records as $record){
								echo "<tr id='recordN".$record->__get("id")."''>";
									echo "<td>".$record->__get("title")."</td>";
									echo "<td>".$record->__get("description")."</td>";
									echo "<td>";
										foreach ($links as $link) {
											if($link->__get("id_record") == $record->__get("id")) {
												echo "<span class='tag'>".$link->__get("category")->__get("name")."</span>";
											//	echo $link->__get("id_category")." "
												//var_dump($link->getLinkedRecord);
											}
										}
									echo "</td>";
									echo "<td class='alignCenter'>
										<a class='a-edit' href='record?id=".$record->__get("id")."'>
											<button class='btn btn-blue'><i class='fa fa-search-plus fa-2x'></i></button>
										</a>
									</td>";
									echo "<td class='alignCenter'>
										<a class='a-del' href='delRecord?id=".$record->__get("id")."'>
											<button class='btn btn-red'><i class='fa fa-trash-o fa-2x'></i></button>
										</a>
									</td>";
								echo '</tr>';
							}
						}else {
							echo '<p>Pas d\'enregistrement</p>';
						}
					?>
				</table>
			</div>		
		</div>
	</div>
</div>
<!-- Popup -->
<div class="modaleEdit" style="display:none">
	<div class="popup">
		<header>
			<div class="alignRight">
				<button class="btnHideModale btn"><i class='fa fa-times'></i></button>
			</div>
			<div class="alignLeft">
				<h2 class="h2">Ajouter un enregistrement</h2>
			</div>
		</header>
		<form id="formAddRecord" action="addRecord" method="POST">
			<label for="formAddRecordTitle">Libellé : </label>
			<input id="formAddRecordTitle" class="inputText120" type="text" name="title" required/>
			<label for="formAddRecordDescription">Description : </label>
			<input id="formAddRecordDescription" type="text" name="description" required/>
			<input class="btn btn-blue padding5" id="formAddRecordSubmit" type="submit" value="Ajouter">
		</form>
	</div>
</div>
<!-- /Popup -->