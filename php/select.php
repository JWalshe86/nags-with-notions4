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

<table border="2">
<tr>
<th>ID</th>
<th>Image</th>
</tr>
<?php
include "connect.php";
$select = $con->prepare("SELECT * FROM users ");
$select->setFetchMode(PDO::FETCH_ASSOC);
$select->execute();
while($data=$select->fetch()){
?><tr>
<td><?php echo $data['id']; ?></td>
<td><img src="uploads/<?php echo $data['image']; ?>" width="100" height="100"></td>
<?php
}?>
</tr></table>

