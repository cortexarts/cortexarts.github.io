$(document).ready(function () {
   $('.grid').hide().fadeIn(4000);
   $('button').click(function() {
    	var toAdd = $("input[name=addgrid]").val();
        $('.grid-container').append("<li class='grid'>"+toAdd+"</li>");
    });
});
