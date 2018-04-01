$(document).ready(function(){
	$("#company").hide();
	$("#profile").show();
});

function profile(){
	$("#profile").show();
	$("#company").hide();
}

function company(){
	$("#profile").hide();
	$("#company").show();
}