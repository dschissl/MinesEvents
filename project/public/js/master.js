$(document).ready(function() {
	$("input[type=number]").bind("change", function(event) {
		fixNumberBox(this, $(this).hasClass("fmt-zero"));
	});
});

function fmtZero(n) { 
	return n > 9 ? "" + n: "0" + n; 
}
                
function fixNumberBox(box, isFmtZero) {
    box = $(box);
    var val = parseInt(box.val());
    
    if (isNaN(val)) {
        val = "";
    }
    else {
        var max = box.attr("max");
        if (max && val > max) {
            val = max;
        }
        
        var min = box.attr("min");
        if (min && val < min) {
            val = min;
        }
    }
    
    if (isFmtZero && isFmtZero === true)
        val = fmtZero(val);
    
    box.val(val);
}
