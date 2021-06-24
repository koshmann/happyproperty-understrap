jQuery(document).ready(function($){


var eafs = $("#estate-ajax-filter-search");
var eafsForm = eafs.find("form"); 
 
eafsForm.submit(function(e){
    e.preventDefault(); 

	
	$.ajax({
        url : ajax_object.ajax_url,
        data: eafsForm.serialize(),
		type: eafsForm.attr('method'),
        success : function(response) {
			console.log('success');
            $("#ajax_filter_search_results").empty();
            if(response) {
				console.log('response');
                for(var i = 0 ;  i < 1 ; i++) {
                     var html = response;
                     $("#ajax_filter_search_results").append(html);
                }
            } else {
                var html  = "<div class='alert alert-danger mt-4' role='alert'>Ничего не найдено. Попробуйте изменить параметры поиска</div>";
                $("#ajax_filter_search_results").append(html);
            }
        },
		error: function (request, status, error) {
			console.log(request.responseText);
		}
    });

});


});