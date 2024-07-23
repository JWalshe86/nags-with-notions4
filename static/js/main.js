$(function() {
    $("#image_upload").change(function (e) {
        let file_ext = $(this).val().split(".").pop().toLowerCase();
	    alert(file_ext);

    });


});
