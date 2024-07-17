        <?php
        require('./connection.php');
            $p=crud::Selectdata();
            if (isset($_GET['id'])) {
                $id=$_GET['id'];
                $e=crud::delete($id);
            }
            if (count( $p)>0) {
                for ($i=0; $i < count( $p); $i++) { 
                        if ($value == 'test'){
                        echo '<td>'.$value.'</td>';
                          }
                   echo '<tr>';
                   foreach ( $p[$i] as $key => $value) {
                    }
                    ?>

                    <?php
                    echo '</tr>';
                }
            }


    ?>
    </table>


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
<a href="index.php">Add new image</a>

