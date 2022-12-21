
<?php 
include 'databaseFile/dbContext.php';
	if (isset($_POST['submit'])) {

      $i = $_POST['id'];
      $item_id = $_POST['item_id'];
      $item_name = $_POST['item_name'];
      $price = $_POST['price'];
     

      $sql = "UPDATE item SET
      item_id = '$item_id',item_name = '$item_name',price = '$price' WHERE item_id = '$i'";
      $data = mysqli_query($db,$sql);

       if ($data) {
       		$successmessage= "Item Update Success";
       }else{
       		$successmessage= "Item Update Fail..";
       }

         
}

 ?>

<?php include'header.php'; ?>
	<div class="body">
		<div class="form_body">
			<h2>Update Item</h2>
			<form action="" method="post" enctype="multipart/form-data">
					<h4 style="text-align: center;" id="message">
    					<?php if (isset($successmessage)) {
        					echo $successmessage;
       						} 
       					?>
  					</h4>

  					<?php 
		              if (isset($_GET['edit'])) {
		                $i = $_GET['edit'];

		                $sql2 = "SELECT * FROM item WHERE item_id = '$i'";
		                $run2 = mysqli_query($db,$sql2);
		                $row = mysqli_fetch_array($run2);
		          	?>
					<div class="form_field">
						<div class="input_group">
							<label>Item ID:</label><br>											
							<input type="hidden" name="id"  value="<?php echo $_GET['edit']; ?>">
							<input type="text" name="item_id" value="<?php echo @$row['item_id']; ?>">
						</div>
						<div class="input_group">
							<label>Item Name:</label><br>											
							<input type="text" name="item_name" required="" value="<?php echo @$row['item_name']; ?>">
						</div>
						<div class="input_group">
							<label>Price:</label><br>											
							<input type="text" name="price" required="" value="<?php echo @$row['price']; ?>">
						</div>
						<div class="input_group">											
							<input type="submit" name="submit" value="Save">
						</div>
					</div>
			</form>
		<?php } ?>
		</div>
	</div><!-- close Body -->


	<div class="footer">
		<h2>Copyright all rights reserved</h2>
	</div> <!-- close footer -->
	</div>
</body>
</html>