
$(document).ready(function() {
	loadPickers();
});

function loadPickers(){
	window.prettyPrint && prettyPrint();
	
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	
	 $("#daystart").datepicker({
		format: 'yyyy-mm-dd'
	});
	
	$("#daystart").datepicker('setValue',now);
	
	 $("#dayend").datepicker({
		format: 'yyyy-mm-dd'
	});
	
	$("#dayend").datepicker('setValue',now);
}