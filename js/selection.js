$(document).ready( function ()
{

    var teamID;  
    var stateName; 
    var teamName;

       
    $(document.body).on('click', '.dropdown-menu li a', function (e) {
	    var selText = $(this).text(); 
	  
	    var tsID=$(this).data("ddid");
	   
	    var sID = $(this).data("value");
	    
	    if (sID) {
	    	teamID=sID;
	    }
	    
	    
	    
	    $('#result').append(selText);
	    $(this).parents('.dropdown').find('.dropdown-toggle').html(selText+' <span class="caret"></span>');
	    $('#state').show();
	   
	    
	    if(tsID=="teamSelect"){
	    $('#StateDropDown').html("Select State" + ' <span class="caret"></span>');
	    getState(sID);
	    $('#tableBody').hide();
	  
		if ($('#desktopTest').is(':hidden')) {
		    var h = $("#pan").height(); 
			    window.scrollBy(0, h);
		   
		}
		teamName = $('#dropdownMenu1').text();
		$('#ybyc').html("Bars");

	    } else{
	         stateName = $('#StateDropDown').text();
	   	 loadTable(teamID,stateName);
	   	 $('#tableBody').show();
	   	     
	   	 $('#ybyc').html(teamName+" bars in "+stateName);
   		}
    
  
    
	  });
  
  	//Fixes bug on some mobile browsers*
  	//*Background resizes when URL bar hides/shows on Android Chrome, causes a jump at stop scrolling point
        var bg = jQuery("body");
	jQuery(window).resize("resizeBackground");
	function resizeBackground() {
	    bg.height(jQuery(window).height());
	}
	resizeBackground();
	
	
	
   
       
});