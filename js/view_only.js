$(".btn").each(function(item){
	if ($(this).val().trim() != "View" && $(this).val().trim() != "Log Out")
	$( this ).addClass("hidden");
});