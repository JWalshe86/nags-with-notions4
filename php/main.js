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
	  }

       }
    });
});
