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
	             fetchAllImages();
		   },
	   });	
	});


	// Set image in the modal
	$(document).on('click', '.open_image', function(e){
          e.preventDefault();
		let image_id=$(this).attr("id");

		$.ajax({
                  url: 'action.php',
	          method: 'post',
		  data: { image_id: image_id },
		  dataType: 'json',
		  success: function(response){
		    $("#set_image").attr("src", 'uploads/' + response.image_path);
		    $("#set_iamge").attr("alt", response.alt_text);
		    $("#image_alt_text").text(response.alt_text);
	            $(".change_image, .remove_image").attr("data-id", response.id);
		  }
		});
	});

	// Edit image ajax request
	let image_modal = new bootstrap.Modal(document.getElementById('image_preview_modal'));
	$(".change_image").click(function (e) {
           e.preventDefault();
	   let id = $(this).attr('data-id');
	   image_modal.hide();

	$.ajax({
          url: "action.php",
	  method: "post",
	  data: { id: id, edit_image: 1 },
	  dataType: "json",
	  success: function(response){
            $("#edit_image_id").val(response.id);
            $("#edit_alt_text").val(response.alt_text);
	    $("#old_image").val(response.image_path);
	    $("#edit_preview_image").html(`<img src="uploads/${response.image_path}"
	    class="img-fluid img-thumbnail">`);
	  },
	});
	});

	// Fetch all images ajax request
	fetchAllImages();
	function fetchAllImages(){
          $.ajax({
            url: 'action.php',
            method: 'post',
            data: { fetch_all_images: 1},
	    success:function(response){
	      $("#show_all_images").html(response);
	    }

	  });
	}

    // Method for displaying error message
    function showMessage(type, message){
         return `<div class="alert alert-${type} alert-dismissible fade show" role="alert">
		      <strong>${message}</strong>
		      <button type="button" class="btn-close" data-bs-dismiss="alert"
                      aria-label="Close"></button>
		 </div>`;       
    }

});
