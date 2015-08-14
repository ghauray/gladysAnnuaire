$(document).ready(function(){
	/**
	 * Confirm suppression
	 */
	$('.a-del').click(function(){
		if(!confirm("Êtes vous sur de vouloir supprimer cet élément ?")){
			return false;
		}
	});


	/**
	 * Manage modale. Edit button make modale visible
	 */
	// $(".modale-edit").css("display","none");
	var visible = false;
	$(".btn-edit").click(function(){
		console.log($(".ModaleEdit"));
		$(".modaleEdit").css("display","block");
		visible = true;
	});

	$(".btnHideModale").click(function(){
		$(".modaleEdit").css("display","none");
		visible = false;
	});
	$(document).keydown(function(e) {
		if(e.keyCode == 27 && visible) {
			$(".modaleEdit").css("display","none");
		}
	});
	//For category only
	$(".edit-category").click(function(){
		$('#formEditCategoryId').val($(this).data('id'));
		$('#formEditCategoryName').val($(this).data('name'));
		$('#formEditCategoryParent option[value="'+$(this).data('parent')+'"]').prop('selected', true);
	});

	/**
	 * Manage DelCategory
	 */
	$("#chooseForAll").click(function(){
		$(".selectResolve").css("display","inline");
	});
	$("#principal").click(function(){
		$(".selectResolve").css("display","none");
	});
	$("#grandParent").click(function(){
		$(".selectResolve").css("display","none");
	});
});