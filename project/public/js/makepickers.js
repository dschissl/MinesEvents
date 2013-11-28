$(document).ready(function() {
	loadPickers();
});

function loadPickers(){
	window.prettyPrint && prettyPrint();
	
    $("#daystart").datepicker({
		format: 'mm/dd/yyyy'
	});
	
    $("#dayend").datepicker({
		format: 'mm/dd/yyyy'
	});
}
