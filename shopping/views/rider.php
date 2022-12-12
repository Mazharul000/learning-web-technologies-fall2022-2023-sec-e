<?php

include '../models/config.php';

if(isset($_POST['add_rider'])){
   $r_name = $_POST['r_name'];
   $r_email = $_POST['r_email'];
   $r_pass = $_POST['r_pass'];
   $r_image = $_FILES['r_image']['name'];
   $r_image_tmp_name = $_FILES['r_image']['tmp_name'];
   $r_image_folder = '../uploaded_img/'.$r_image;

   $insert_query = mysqli_query($conn, "INSERT INTO `rider`(name, email, password, image) VALUES('$r_name', '$r_email', '$r_pass', '$r_image')") or die('query failed');

   if($insert_query){
      move_uploaded_file($r_image_tmp_name, $r_image_folder);
      $message[] = 'rider add succesfully';
   }else{
      $message[] = 'could not add the rider';
   }
};

if(isset($_GET['delete'])){
   $delete_id = $_GET['delete'];
   $delete_query = mysqli_query($conn, "DELETE FROM `rider` WHERE id = $delete_id ") or die('query failed');
   if($delete_query){
      header('location: ../views/rider.php');
      $message[] = 'cupon has been deleted';
   }else{
      header('location: ../views/rider.php');
      $message[] = 'cupon could not be deleted';
   };
};

if(isset($_POST['update_rider'])){
   $update_r_id = $_POST['update_r_id'];
   $update_r_name = $_POST['update_r_name'];
   $update_r_email = $_POST['update_r_email'];
   $update_r_pass = $_POST['update_r_pass'];
   $update_r_image = $_FILES['update_r_image']['name'];
   $update_r_image_tmp_name = $_FILES['update_r_image']['tmp_name'];
   $update_r_image_folder = '../uploaded_img/'.$update_r_image;

   $update_query = mysqli_query($conn, "UPDATE `rider` SET name = '$update_r_name', email = '$update_r_email', password = '$update_r_pass', image = '$update_r_image' WHERE id = '$update_r_id'");

   if($update_query){
      move_uploaded_file($update_r_image_tmp_name, $update_r_image_folder);
      $message[] = 'rider updated succesfully';
      header('location: ../views/rider.php');
   }else{
      $message[] = 'cupon could not be updated';
      header('location: ../views/rider.php');
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>staff panel</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">

</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>

<?php include '../views/header.php'; ?>

<div class="container">

<section>

<form action="" method="post" class="add-product-form" enctype="multipart/form-data">
   <h3>add a rider</h3>
   <input type="text" name="r_name" placeholder="enter rider name" class="box" required>
   <input type="text" name="r_email" placeholder="enter rider email" class="box" required>
   <input type="text" name="r_pass" placeholder="enter rider password" class="box" required>
   <input type="file" name="r_image" accept="image/png, image/jpg, image/jpeg" class="box" required>
   <input type="submit" value="add the rider" name="add_rider" class="btn">
</form>

</section>

<section class="display-product-table">

   <table>

      <thead>
         <th>Rider CV Attach</th>
         <th>cupon name</th>
         <th>cupon email</th>
         <th>cupon password</th>
         <th>action</th>
      </thead>

      <tbody>
         <?php
         
            $select_cupons = mysqli_query($conn, "SELECT * FROM `rider`");
            if(mysqli_num_rows($select_cupons) > 0){
               while($row = mysqli_fetch_assoc($select_cupons)){
         ?>

         <tr>
            <td><img src="../uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?>/-</td>
            <td><?php echo $row['password']; ?>/-</td>
            <td>
               <a href="../views/rider.php?delete=<?php echo $row['id']; ?>" class="delete-btn" onclick="return confirm('are your sure you want to delete this?');"> <i class="fas fa-trash"></i> delete </a>
               <a href="../views/rider.php?edit=<?php echo $row['id']; ?>" class="option-btn"> <i class="fas fa-edit"></i> update </a>
            </td>
         </tr>

         <?php
            };    
            }else{
               echo "<div class='empty'>no rider added</div>";
            };
         ?>
      </tbody>
   </table>

</section>

<section class="edit-form-container">

   <?php
   
   if(isset($_GET['edit'])){
      $edit_id = $_GET['edit'];
      $edit_query = mysqli_query($conn, "SELECT * FROM `rider` WHERE id = $edit_id");
      if(mysqli_num_rows($edit_query) > 0){
         while($fetch_edit = mysqli_fetch_assoc($edit_query)){
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="../uploaded_img/<?php echo $fetch_edit['image']; ?>" height="200" alt="">
      <input type="hidden" name="update_r_id" value="<?php echo $fetch_edit['id']; ?>">
      <input type="text" class="box" required name="update_r_name" value="<?php echo $fetch_edit['name']; ?>">
      <input type="text" class="box" required name="update_r_email" value="<?php echo $fetch_edit['email']; ?>">
      <input type="text" class="box" required name="update_r_pass" value="<?php echo $fetch_edit['password']; ?>">
      <input type="file" class="box" required name="update_r_image" accept="image/png, image/jpg, image/jpeg">
      <input type="submit" value="update the rider" name="update_rider" class="btn">
      <input type="reset" value="cancel" id="close-edit" class="option-btn">
   </form>

   <?php
            };
         };
         echo "<script>document.querySelector('.edit-form-container').style.display = 'flex';</script>";
      };
   ?>

</section>

</div>

<!-- custom js file link  -->
<script src="../js/script.js"></script>

</body>
</html>