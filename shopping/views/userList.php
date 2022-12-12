<?php include '../views/hd.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>User List</title>
</head>
<body>
  <h1>Users</h1>  
  <section>
    <table>
  <div class="display-product-table" id="users"></div>
  <br><br>
  <button class ="btn" id="button">Get Users</button>
</section>
  <script src="../js/userScript.js"></script>
   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</body>
</html>