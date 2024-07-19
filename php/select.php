<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<link rel="stylesheet" href="static/css/select.css">
</head>
<?php
session_start();

          if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
               echo "Welcome to the member's area, " . htmlspecialchars($_SESSION['name']) . "!";
          } else {
              echo "Please log in first to see this page.";
               }
      $url = "index.php";
      echo "<a href='$url'>Add new Image</a>";
    ?>


<?php
include "connect.php";
$select = $con->prepare("SELECT * FROM users ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?>

            <div class="container col-10 offset-1">
                <div class="row">
                     <div class="col-sm-6 col-md-6 col-lg-4 col-xl-4">
                          <div class="card h-100 border-0">
                             <div class="card-body pb-0" style='background-color: #fad3b0'>
				<div class="card-footer pt-0 border-0 text-left" style='background-color: #fad3b0;'>
                                    <div class="row">
                                        <div class="col">
                                            <img class='p-2' src="uploads/<?php echo $data['image']; ?>" width="100" height="100">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                   </div>
               </div>
           </div>

<?php
}?>

