$(function() {
	$('.book').click(function() {
		if (id = $(this).data("id")) {
			window.location = siteUrl + 'books/' + id + '/edit';
		}
	});
});
