$(document).ready(function() {

	// add email address dynamically
	
	$('#file_upload').uploadify({
 	
    'uploader'  	: 'uploadify/uploadify.swf',
    'script'    	: 'process.php',
    'cancelImg' 	: 'uploadify/cancel.png',
    'folder'    	: 'uploads',
	  'auto'      	: true,
		'hideButton'	: true,
		'queueID'     : 'fileQueue',
		'width'				: 296,
		'height'			: 68,
		'wmode'				: 'transparent',
		'removeCompleted' : false,
		'fileExt'     : '*.html;*.htm;',
 		'fileDesc'    : 'HTML Files',
		
		'onSelect' : function(event, ID, fileObj, data){

			// when file is selected - animate container box to allow for progress bar
	  	$("#instructions").css({ height: "+=65px" });

		},
	   
	  'onComplete' : function(event, ID, fileObj, response, data){
	  
	  	// position filequeue at bottom of div
	  	$("#fileQueue").css({ position: "absolute", bottom: "20px" });
	 
	  	// remove upload button & add download
	  	$("#uploadWrapper").empty().prepend("<a id='download-btn' href='" + response + "'>Download CSS</a>");
	  	
	  	// change colour of progress box to green
	  	$(".uploadifyQueueItem").css({ background: "#dee9c1", border: "2px solid #eaf2d5" });

	  	// update button rollovers for download buttn
	  	//$("#uploadWrapper").hover(downloadBtnRollIn, downloadBtnRollOut);
	  		   	
	   }
	   
  	});

});

function uploadBtnRollIn(){

	$("#upload-btn").css({ background: "#e75b23", cursor: "pointer" });
	
}

function uploadBtnRollOut(){

	$("#upload-btn").css({ 
	
		background: "#fb9268",
		background: "-moz-linear-gradient(top, #fb9268 0%, #e75b23 100%)",
		background: "-o-linear-gradient(top, #fb9268 0%, #e75b23 100%)",
		background: "-ms-linear-gradient(top, #fb9268 0%, #e75b23 100%)", 
		background: "linear-gradient(top, #fb9268 0%, #e75b23 100%)",
		background: "-webkit-linear-gradient(top, #fb9268 0%, #e75b23 100%)",
		
	});

}

function downloadBtnRollIn(){

	$("#download-btn").css({ background: "#4895cb" });

}

function downloadBtnRollOut(){

	$("#download-btn").css({
	
		borderTop: "2px solid #c9e1f0",
		borderRight: "2px solid #5889ac",
		borderBottom: "2px solid #5c7485",
		borderLeft: "2px solid #5889ac",
	
		background: "#4895cb",
		background: "-moz-linear-gradient(top, #91c8e8 0%, #4895cb 100%)",
		background: "-o-linear-gradient(top, #91c8e8 0%, #4895cb 100%)",
		background: "-ms-linear-gradient(top, #91c8e8 0%, #4895cb 100%)", 
		background: "linear-gradient(top, #91c8e8 0%, #4895cb 100%)",
		background: "-webkit-linear-gradient(top, #91c8e8 0%, #4895cb 100%)" 
	
	});
}

