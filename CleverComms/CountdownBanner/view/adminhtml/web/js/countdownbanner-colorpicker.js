
require(['jquery'], function($) {
	$(document).ready(function() {
		$('#countdownbanner_general_bgcolor').on('input', function() {
			$('#countdownbanner_general_bgcolor_hexcolor').val(this.value);
		});
		$('#countdownbanner_general_bgcolor_hexcolor').on('input', function() {
			$('#countdownbanner_general_bgcolor').val(this.value);
		});
		
		$('#countdownbanner_general_textcolor').on('input', function() {
			$('#countdownbanner_general_textcolor_hexcolor').val(this.value);
		});
		$('#countdownbanner_general_textcolor_hexcolor').on('input', function() {
			$('#countdownbanner_general_textcolor').val(this.value);
		});
	});
});
