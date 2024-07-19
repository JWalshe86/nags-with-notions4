<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image Gallery</title>
<link rel="stylesheet" href="./static/css/bootstrap.min.css">
<link rel="stylesheet" href="./static/css/style.css">
</head>
<body class='bg-light'>

      <div class="modal fade" id="upload_image_modal">
           <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                       <h5 class='modal-title'>Upload New Image</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='close'></button>
                   </div>
                   <div class="modal-body p-4">
                        <div class="progress mb-3" style='height:25px; display:none;'>
			   <div class="progress-bar progress-bar-striped progress-bar-animated" role='progressbar' 
                           aria-valuemin='0' aria-valuemax='100'>
                           </div>
                        </div>
		     <form action="#" method='POST' enctype='multipart/form-data' id='image_upload_form'>
                        <div class="mb-3">
                            <input id="alt_text" class='form-control' type="text" name="altText" placeholder='Image Alternate Text' required />
                        </div>
			
                        <div class="mb-3">
                             <input id="upload_image" class='form-control' type="file" name="image">
			</div>
			
                        <div class="mb-3 d-grid">
                             <input value="Upload" class='btn btn-primary' type="submit" id="upload_btn">
			</div>
                        
                         <div class="mb-3" id='preview_image'></div>

                     </form>
                   </div>
              </div>
           </div>
      </div>
	
<div class='container'>
  <div class="row mt-4">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h4>Image Gallery</h4>
      <button class='btn btn-primary rounded-0' data-bs-toggle='modal' data-bs-target='#upload_image_modal'>
       <i class='fas fa-image me-2'></i>Upload New Image</button>
  </div>
</div>
<hr />
<div class="row" id="show_all_images">

</div>
</body>
<script src='./static/js/bootstrap.bundle.min.js'></script>
<script src="jquery-3.7.1.min.js"></script>
<script src="https://kit.fontawesome.com/d1664b4588.js" crossorigin="anonymous"></script>
</html>
