$(document).ready(function(){  
                          // the jquery 
ClassicEditor
        .create( document.querySelector( '#body' ) ) <!-- it will select any text area that has an id = body -->
        .catch( error => {
            console.error( error );
        } );
		
		    $(document).ready(function(){
				
				$('#selectAllBoxes').click(function(event){
					if(this.checked){
						$('.checkBoxes').each(function(){
							this.checked = true;
							
						});
						
					}else{
						 $('.checkBoxes').each(function(){
							this.checked = false;
						 });
					}
				});
				
				//    var div_box = "<div id='load-screen'><div id='loading'></div></div> ";
				//	
				//	$("body").prepend(div_box); //prepending the div box to the body .
					
			//		$('#load-screen').delay(700).fadeout(600, function(){$(this).remove();
				//	});
				
				
				
				
				
			});
			 function loadUsersOnline() {
				 //ajax queryCommandEnabled 
				   $.get("functionadm.php?onlineusers=result",function(data){ 
				     
					  $(".usersonline").text(data);
				  //to send a request to functionadm.php
			 }); 
			 
			 }
		         
                    setInterval(function(){				 
						 
						 loadUsersOnline();
						 
					}500);
		//rest of the code 	