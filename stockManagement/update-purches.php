
<?php 
include 'databaseFile/dbContext.php';
	if (isset($_POST['submit'])) {

      $i = $_POST['purches_id'];
      $purches_id = $_POST['purches_id'];
      $item_id = $_POST['item_id'];
      $quantity = $_POST['quantity'];
      $purches_date = $_POST['purches_date'];


      $sql = "UPDATE purches SET 
	      purches_id = '$purches_id',
	      item_id = '$item_id',
	      quantity = '$quantity',
	      purches_date = '$purches_date'
	      
	       WHERE purches_id = '$i'";
     
      $data = mysqli_query($db,$sql);

       if ($data) {
       		$successmessage= "Purhes Update";
       }else{
       		$successmessage= "Purhes Update Fail..";
       }

         
}
 ?>

<?php include'header.php'; ?>
	<div class="body">
		<div class="form_body">
			<h2>Purches Item</h2>

			<?php 
              if (isset($_GET['edit'])) {
                $i = $_GET['edit'];

                $sql2 = "SELECT * FROM purches WHERE purches_id = '$i'";
                $run2 = mysqli_query($db,$sql2);
                $row = mysqli_fetch_array($run2);
          	?>

			<form action="" method="POST" enctype="multipart/form-data">
					<h4 style="text-align: center;" id="message">
    					<?php if (isset($successmessage)) {
        					echo $successmessage;
       						} 
       					?>
  					</h4>
					<div class="form_field">
						<div class="input_group">
							<label>Purhes ID:</label><br>									
							<input type="hidden" name="purches_id"  value="<?php echo $_GET['edit']; ?>">
							<input type="text" disabled="" name="purches_id" value="<?php echo $row['purches_id']; ?>">
						</div>
						<div class="input_group">
							<label>Item ID:</label><br>											
							<select name="item_id">
                              <option selected  value="<?php echo $row['item_id']; ?>"><?php echo $row['item_id']; ?></option>
                              <?php 
                                $sql1  = "SELECT * from item";

                                $result = mysqli_query($db, $sql1);

                                while ($row1 = mysqli_fetch_array($result)) {
                                ?>
                                
                                <option value="<?php echo $row1['item_id']; ?>"><?php echo $row1['item_name']; ?></option>
                                <?php } ?>
                            </select>
						</div>

						


						<div class="input_group">
							<label>Quantity:</label><br>											
							<input type="text" name="quantity" required="" value="<?php echo $row['quantity']; ?>">
						</div>
						<div class="input_group">
							<label>Purches Date:</label><br>											
							<input type="date" name="purches_date" required=""  value="<?php echo $row['purches_date']; ?>">
						</div>
						<div class="input_group">											
							<input type="submit" name="submit" value="Update">
						</div>
					</div>
			</form>
		<?php } ?>
		</div>
	</div><!-- close Body -->


	<div class="footer">
		<h2>Copy Right All RIght Reversed</h2>
	</div> <!-- close footer -->
	</div>
</body>
</html>