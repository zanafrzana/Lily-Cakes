<?php
include ('header-footer/header.php');
?>

<div class = "main-content">
	<div class = "wrapper">
		<h1>Manage Order</h1>
		<br>

        <div class="cake-search text-center">
                <form action="<?php echo SITEURL; ?>admin/search-order.php" method="POST">
                    <input type="search" name="search" placeholder="Search Order" required>
                    <input type="submit" name="submit" value="Search" class="btn btn-primary">
                </form>
        </div>
        <br><br>

        <?php
        if(isset($_SESSION['update-order']))
        {
            echo $_SESSION['update-order'];
            unset($_SESSION['update-order']);
        }

        if(isset($_SESSION['delete-order']))
        {
            echo $_SESSION['delete-order'];
            unset($_SESSION['delete-order']);
        }
        ?>
        <br>

		<table class ="table-width">
            <tr>
                <th>No</th>
                <th>Cake</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Status</th>
                <th>Customer Name</th>
                <th>NoTel</th>
                <th>Address</th>
                <th>Action</th>
            </tr>

            <?php
            //create query
            $query = "SELECT * FROM table_order ORDER BY ID_order DESC";

            //execute
            $result = mysqli_query($connect, $query);

            $count = mysqli_num_rows($result);

            $no=1;

            if($count > 0)
            {
                //data is in database
                while($row=mysqli_fetch_assoc($result))
                {
                    $ID_order = $row['ID_order'];
                    $cake = $row['cake'];
                    $price = $row['price'];
                    $qty = $row['qty'];
                    $total_price = $row['total_price'];
                    $status = $row['status'];
                    $cust_name = $row['cust_name'];
                    $cust_notel = $row['cust_notel'];
                    $cust_address = $row['cust_address'];
                    ?>

                    <tr>
                        <td><?php echo $no++; ?></td>
                        <td><?php echo $cake; ?></td>
                        <td><?php echo $price; ?></td>
                        <td><?php echo $qty; ?></td>
                        <td><?php echo $total_price; ?></td>
                        <td>
                            <?php 
                            if($status == "Ordered")
                            {
                                echo "<label style = 'color: #E01D20;'>$status</label>";
                            }
                            elseif($status == "On Delivery")
                            {
                                echo "<label style = 'color: #F96815;'>$status</label>";
                            }
                            elseif($status == "Delivered")
                            {
                                echo "<label style = 'color: #33AA67;'>$status</label>";
                            }
                            elseif($status == "Cancelled")
                            {
                                echo "<label style = 'color: #540B0C;'>$status</label>";
                            }
                            ?>
                        </td>
                        <td><?php echo $cust_name; ?></td>
                        <td><?php echo $cust_notel; ?></td>
                        <td><?php echo $cust_address; ?></td>
                        <td>
                            <a href = "<?php echo SITEURL; ?>admin/update-order.php?ID_order=<?php echo $ID_order; ?>" class = "btn-secondary">Update</a>
                            <a href = "<?php echo SITEURL; ?>admin/delete-order.php?ID_order=<?php echo $ID_order; ?>" class = "btn-third">Delete</a>
                        </td>
                    </tr>

                    <?php
                }
            }
            else
            {
                echo "<tr><td colspan = '12' class = 'error'>No order data in database.</td></tr>";
            }
            ?>
        </table>

	</div>
</div>

<?php
include ('header-footer/footer.php');
?>