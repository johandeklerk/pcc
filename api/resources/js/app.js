require('./bootstrap');

$("#submit").click(function() {
	var jsonStr = $("#json-str").val();

	$.ajax({
	    type: "POST",
	    url: "/api/filter",
	    data: jsonStr,
	    contentType: "application/json; charset=utf-8",
	    dataType: "json",
	    success: function(data){ $("#result").text(JSON.stringify(data)) },
	    failure: function(errMsg) {
	        console.log(data); alert(errMsg);
    	}
	});
});
