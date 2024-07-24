<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Image Gallery</title>
<link rel="stylesheet" href="./static/css/bootstrap.min.css">
<link rel="stylesheet" href="./static/css/style.css">
</head>
<body class='bg-light'>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="/nags-with-notions4">Nags With Notions</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="/nags-with-notions4/">Home</a>
        </li>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="#">Action</a></li>
            <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>

<!-- Image upload modal start -->

      <div class="modal fade" id="upload_image_modal">
           <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                       <h5 class='modal-title'>Upload New Image</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='close'></button>
                   </div>
                   <div class="modal-body p-4">
                        <div id="message_alert"></div>
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
                             <input id="image_upload" class='form-control' type="file" name="image"/>
			</div>
			 
                        <div class="mb-3" id='preview_image'></div>
			
                        <div class="mb-3 d-grid">
                             <input value="Upload" class='btn btn-primary' type="submit" id="upload_btn">
			</div>
                        

                     </form>
                   </div>
              </div>
           </div>
      </div>
<!-- Image upload modal end -->

<!-- Change image modal start -->


      <div class="modal fade" id="edit_image_modal">
           <div class="modal-dialog modal-dialog-centered">
              <div class="modal-content">
                  <div class="modal-header">
                       <h5 class='modal-title'>Change Image</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='close'></button>
                   </div>
                   <div class="modal-body p-4">
                        <div id="edit_message_alert"></div>
                        <div class="progress mb-3" style='height:25px; display:none;'>
			   <div class="progress-bar progress-bar-striped progress-bar-animated" role='progressbar' 
                           aria-valuemin='0' aria-valuemax='100'>
                           </div>
                        </div>
		     <form action="#" method='POST' enctype='multipart/form-data' id='image_edit_form'>
                        
                        <input type="hidden" name="edit_image_id" id="edit_image_id">                        
                        <input type="hidden" name="old_image" id="old_image">                        
 
                        <div class="mb-3">
                            <input id="edit_alt_text" class='form-control' type="text" name="altText" placeholder='Image Alternate Text' required />
                        </div>
			
                        <div class="mb-3">
                             <input id="edit_image_upload" class='form-control' type="file" name="image"/>
			</div>
			 
                        <div class="mb-3" id='edit_preview_image'></div>
			
                        <div class="mb-3 d-grid">
                             <input value="Update" class='btn btn-success' type="submit" id="change_btn"/>
			</div>
                        

                     </form>
                   </div>
              </div>
           </div>
      </div>
<!-- Change image modal end -->

  <!-- Display Full Image Preview Modal Start -->

    <div class="modal fade" id="image_preview_modal">
       <div class="modal-dialog modal-dialog-centered modal-lg">
           <div class="modal-content">
              <div class="modal-header">
                 <h5 class="modal-title" id="image_alt_text"></h5>
                 <button type="button" class="btn-close" data-bs-dismiss="modal" aira-label="Close"></button>
              </div>
                 <div class="modal-body">
                   <img class="img-fluid" id="set_image">   
                   
                   <div class="mt-2 float-end">
		     <a href="#" class="text-primary me-2 change_image" title="Change Image"
                     data-bs-toggle="modal" data-bs-target="#edit_image_modal">
		     <i class="fas fa-edit fa-lg"></i>
                     </a>  
                      <a href="#" class="text-danger me-2 remove_image" title="Remove Image">
                        <i class="fas fa-trash-alt fa-lg"></i>
                      </a>
                   </div>
                </div>
          </div>
       </div>
    </div>

  <!-- Display Full Image Preview Modal End -->


<div class='container'>
  <div class="row mt-4">
    <div class="col-lg-12 d-flex justify-content-between align-items-center">
        <h4>Image Gallery</h4>
      <button class='btn btn-primary rounded-0' data-bs-toggle='modal' data-bs-target='#upload_image_modal'>
       <i class='fas fa-image me-2'></i>Upload New Image</button>
  </div>
</div>
<hr />
<div class="row g-4" id="show_all_images">
   <h1 class="text-center text-secondary p-5">Loading Please Wait...</h1>
</div>

</div>
<script src='./static/js/bootstrap.bundle.min.js'></script>
<script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU=" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/d1664b4588.js" crossorigin="anonymous"></script>
<script src="main.js" crossorigin="anonymous"></script>
</body>
</html>

