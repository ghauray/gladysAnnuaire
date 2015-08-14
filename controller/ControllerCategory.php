<?php

function ctrl_category_display($parent, $level, $categories, $commands){
	$html = "";
	$previousLevel = 0;
	if (!$level && !$previousLevel) {
		$html .= "<ul class='tagList'>";	
	} 
	foreach ($categories as $category) {
		if($parent == $category->__get("parent")) {
			if($previousLevel < $level){
				$html .= "<ul class='tagList'>";
			}
			$html .= "<li class='liTag' data-id='".$category->__get("id")."'><span class='tag'>".$category->__get("name");
			if($commands) {
				$html .= " 	<a class='a-btn a-del' href='delCategory?id=".$category->__get("id")."'>
								<button class='btn btn-red relative bottom1'><i class='fa fa-trash-o'></i></button>
							</a>";
				$html .= " 	<a id='btnEditCategory' class='a-btn btn-edit edit-category' data-id='".$category->__get("id")."' data-name='".$category->__get("name")."' data-parent='".$category->__get("parent")."' href='#'><button class='btn btn-green relative bottom1'><i class='fa fa-pencil'></i></button></a></span>";
			} else {
				$html.="</span>";
			}
			$previousLevel = $level;
			$html .= ctrl_category_display($category->__get("id"),($level + 1), $categories,$commands);
		}
	}
	if(($previousLevel==$level) && ($previousLevel != 0)){
		$html .= "</ul></li>";
	}elseif($previousLevel == $level){
		$html .= "</ul>";
	}else {
		$html .= "</li>";
	}
	return $html;
}

function ctrl_category_add($entries){
	$category = new Category();
	$category->editCategory($entries);
	header('Location: manageCategories');
}

function ctrl_category_del($id){
	$errors['isChildren'] = false;
	$category = new Category();
	$category->getCategory($id);
	if(ctrl_category_getChildren($id)){
		//There is children
		$errors['isChildren'] = true;
		$errors['children'] = array();
		foreach (ctrl_category_getChildren($id) as $idChild) {
			$child = new Category();
			$errors['children'][] = $child->getCategory($idChild);	
		}
	}
	if(!$errors['isChildren']) {
		$category->deleteCategory();
		header('Location: manageCategories');
	} else {
		$errors['currentCategory'] = $category;
		$parent = new Category();
		if($category->__get("parent") !=0 ){
			$errors['parent'] = $parent->getCategory($category->__get("parent"));
		} else {
			$errors['parent'] = null;
		}
		$errors['categories'] = Category::getCategories();
		render('delCategory.php',$errors);
	}
}

function ctrl_category_getChildren($id) {
	$categories = Category::getCategories();
	foreach ($categories as $category) {
		if($category->__get("parent") !=0 && $category->__get("parent") == $id) {
			$children[] = $category->__get("id");
		}
	}
	return $children;
}

function ctrl_category_resolveDelete($entries = array()) {
	
	$idChildren = explode(";",$entries["children"]);

	switch ($entries["choiceResolve"]) {
		case "principal":
			foreach ($idChildren as $idChild) {
				$child = new Category();
				$child->getCategory($idChild);
				$child->__set("parent",0);
				$child->saveCategory();
			}
			break;
		case "grandParent":
			foreach ($idChildren as $idChild) {
				$child = new Category();
				$child->getCategory($idChild);
				$child->__set("parent",$entries["parent"]);
				$child->saveCategory();
			}
			break;
		case "chooseForAll":
			foreach ($idChildren as $idChild) {
				$child = new Category();
				$child->getCategory($idChild);
				$child->__set("parent",$entries["child".$idChild]);
				$child->saveCategory();
			}
			break;
	}
	$currentCategory = new Category();
	$currentCategory->getCategory($entries["currentId"]);
	$currentCategory->deleteCategory();
	header('Location: manageCategories');
}


function ctrl_category_edit($entries){
	$category = new Category();
	$category->editCategory($entries);
	header('Location: manageCategories');
}