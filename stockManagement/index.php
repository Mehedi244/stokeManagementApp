
<?php 
include 'databaseFile/dbContext.php';
	if (isset($_POST['submit'])) {

      $item_id = $_POST['item_id'];
      $item_name = $_POST['item_name'];
      $price = $_POST['price'];
     

      $sql = "INSERT INTO item(item_id,item_name,price)

      values('$item_id','$item_name','$price')";
      $data = mysqli_query($db,$sql);

       if ($data) {
       		$successmessage= "Item Inserted Success";
       }else{
       		$successmessage= "Item Inserted Fail..";
       }

         
}

if(isset($_GET['delete'])){
    $i = $_GET['delete'];

    if ($i) {
    	$sql2 = "DELETE FROM item WHERE item_id = '$i'";
    	mysqli_query($db, $sql2);
    }

    
  }

 ?>

<?php include'header.php'; ?>
	<div class="body">
		<div class="form_body">
			<h2>Add Item</h2>
			<form action="" method="post" enctype="multipart/form-data">
					<h4 style="text-align: center;" id="message">
    					<?php if (isset($successmessage)) {
        					echo $successmessage;
       						} 
       					?>
  					</h4>
					<div class="form_field">
						<div class="input_group">
							<label>Item ID:</label><br>											
							<input type="text" name="item_id" required="">
						</div>
						<div class="input_group">
							<label>Item Name:</label><br>											
							<input type="text" name="item_name" required="">
						</div>
						<div class="input_group">
							<label>Price:</label><br>											
							<input type="text" name="price" required="">
						</div>
						<div class="input_group">											
							<input type="submit" name="submit" value="Save">
						</div>
					</div>
			</form>

			<div class="itemlist">
				<h2>Stock List</h2>
				<div class="item-data">
					<table>
						<thead>
							<tr>
								<th>Sl</th>
								<th>Item Id</th>
								<th>Item_name</th>
								<th>Price</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
	                          $sql2  = "SELECT * from item";
	                            $i = 0;
	                            $result1 = mysqli_query($db, $sql2);

	                              while ($row1 = mysqli_fetch_array($result1)) {
	                              $i++;

	                          ?>
	                       <tr>
	                          <td ><?php echo $i ?></td>
	                          <td ><?php echo $row1['item_id']; ?></td>
	                          <td ><?php echo $row1['item_name']; ?></td>
	                          <td ><?php echo $row1['price']; ?></td>
	                          <td>
	                          	<a id="editbutton" href="update-item.php?edit=<?php echo $row1['item_id']; ?>">Update</a>

	                          	<a id="deletebutton" href="index.php?delete=<?php echo $row1['item_id']; ?>">Delete</a>
	                          </td>


	                          <?php } ?>
		                    </tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div><!-- close Body -->


	<div class="footer">
		<h2>Copyright all rights reserved</h2>
	</div> <!-- close footer -->
	</div>
</body>
</html>