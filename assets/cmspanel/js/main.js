$(document).ready(function() {
	// banner image upload button
	$("#banner-upload-button").click(function() {
	   $("#banner-input-file").click();
	});
	$("#banner-input-file").live('change', function() {
		$('#banner-file-name').html('[' + $(this).val() + ']');
	});

	// product image upload button
	$("#product-upload-button").click(function() {
	   $("#product-input-file").click();
	});
	$("#product-input-file").live('change', function() {
		$('#product-file-name').html('[' + $(this).val() + ']');
	});

	// product icon image upload button
	$("#product-icon-upload-button").click(function() {
	   $("#product-icon-input-file").click();
	});
	$("#product-icon-input-file").live('change', function() {
		$('#product-icon-file-name').html('[' + $(this).val() + ']');
	});
});