$(function() {
   
    // Validate image in client side
    $("#image_upload").change(function (e) {
       let file_ext = $(this).val().split(".").pop().toLowerCase();
       let allowed_ext = ["jpg", "jpeg", "png"];
       let file_size = this.files[0].size;

       if(allowed_ext.includes(file_ext)){
          if(file_size <= 1000000){
            let url = window.URL.createObjectURL(this.files[0]);
            $("#preview_image").html(`<img src="${url}" class="img-fluid img-thumbnail">`);
            $("#upload_btn").prop("disabled", false);
             $("#message_alert").html("");
	  }else{
             $("#message_alert").html(showMessage('danger', 'Image size should be less or equal to 1MB!'));
		  //disables the button
             $("#preview_image").html("");
             $("#upload_btn").prop("disabled", true);
	  }

       }else{
             $("#message_alert").html(showMessage('danger', 'Image type not supported! Only JPG, JPEG & PNG are allowed!'));
		  //disables the button
             $("#preview_image").html("");
             $("#upload_btn").prop("disabled", true);
       }
    });

     // Upload image ajax request  // Prevents the form from submitting
 
	$("#image_upload_form").submit(function(e){
           e.preventDefault();
	   const formData = new FormData(this);
	   formData.append("image_upload", 1);
	   $("#upload_btn").val("Please Wait...");
		
	   $.ajax({
                   xhr: function(){
                     let xhr = new window.XMLHttpRequest();
		     xhr.upload.addEventListener('progress', function(evt){
                       if(evt.lengthComputable){
                         $(".progress").show();
			 let percent = Math.round((evt.loaded / evt.total)* 100);
			 $(".progress-bar").width(percent+"%");
			 $(".progress-bar").text(percent+"%");
		       }
		     },
		     false
		   );
		     return xhr;		    
		   },
		   url: 'action.php',
		   method: 'post',
		   data: formData,
		   cache: false,
		   contentType: false,
		   processData: false,
		   success:function(response){
                     $("#message_alert").html(response); 
		     $("#image_upload_form")[0].reset();
		     $("#preview_image").html("");
		     $("#upload_btn").val("Upload");
	             $(".progress").hide();
		   },
	   });	
	});

    // Method for displaying error message
    function showMessage(type, message){
         return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
		      <strong>${message}</strong>
		      <button type="button" class="btn-close" data-bs-dismiss="alert"
                      aria-label="Close"></button>
		 </div>`;       
    }

});
