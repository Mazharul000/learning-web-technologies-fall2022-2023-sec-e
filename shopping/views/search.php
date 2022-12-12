<?php

if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
    $query = "SELECT * FROM `products` WHERE CONCAT(`id`, `name`, `price`) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    $query = "SELECT * FROM `products`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
    $connect = mysqli_connect("localhost", "root", "", "shop_db");
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>
<?php include '../views/hd.php'; ?>
<!-- font awesome cdn link  -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

<!-- custom css file link  -->
<link rel="stylesheet" href="../css/style.css">


<!DOCTYPE html>
<html>
    <head>
        <title>Product SEARCH</title>
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
    <section> 
        <form action="search.php" method="post" class="add-product-form" enctype="multipart/form-data">
            <input type="text" name="valueToSearch" placeholder="Value To Search" class="box" required><br><br>
            <input type="submit" name="search" value="Filter" class="btn"><br><br>
        </section>
    
        <section class="display-product-table">        
            <table>
            <thead>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Price</th>
            
        </thead>
        </section>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['price'];?></td>
                </tr>
                
                <?php endwhile;?>
            </table>
        </form>
    </body>
</html>