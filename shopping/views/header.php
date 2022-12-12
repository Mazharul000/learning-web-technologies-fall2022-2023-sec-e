<header class="header">

   <div class="flex">

      <a href="#" class="logo">Food Swipe</a>

      <nav class="navbar">
         <a href="../views/staff.php">add products</a>
         <a href="../views/products.php">view products</a>
         <a href="../views/search.php">Search</a>
         <a href="../views/cupon.php">cupons</a>
         <a href="../views/userList.php">User List</a>
         <a href="../views/rider.php">Add Rider</a>
         <a href="../controllers/logout.php">Logout</a>

      </nav>

      <?php
      
      $select_rows = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');
      $row_count = mysqli_num_rows($select_rows);

      ?>

      <a href="../views/cart.php" class="cart">cart <span><?php echo $row_count; ?></span> </a>

      <div id="menu-btn" class="fas fa-bars"></div>

   </div>

</header>