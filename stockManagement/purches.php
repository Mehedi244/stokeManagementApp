
<?php 
include 'databaseFile/dbContext.php';
	if (isset($_POST['submit'])) {

      $purches_id = $_POST['purches_id'];
      $item_id = $_POST['item_id'];
      $quantity = $_POST['quantity'];
      $purches_date = $_POST['purches_date'];
     

      $sql = "INSERT INTO purches(purches_id,item_id,quantity,purches_date) values('$purches_id','$item_id','$quantity','$purches_date')";
      $data = mysqli_query($db,$sql);

       if ($data) {
       		$successmessage= "Purhes Success";
       }else{
       		$successmessage= "Purhes Fail..";
       }

         
}
 ?>

<?php include'header.php'; ?>
	<div class="body">
		<div class="form_body">
			<h2>Purches Item</h2>
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
							<input type="text" name="purches_id" required="">
						</div>
						<div class="input_group">
							<label>Item ID:</label><br>											
							<select name="item_id">
                              <option selected></option>
                              <?php 
                                $sql1  = "SELECT * from item";

                                $result = mysqli_query($db, $sql1);

                                while ($row = mysqli_fetch_array($result)) {
                                ?>
                                
                                <option value="<?php echo $row['item_id']; ?>"><?php echo $row['item_name']; ?></option>
                                <?php } ?>
                            </select>
						</div>

						


						<div class="input_group">
							<label>Quantity:</label><br>											
							<input type="text" name="quantity" required="">
						</div>
						<div class="input_group">
							<label>Purches Date:</label><br>											
							<input type="date" name="purches_date" required="">
						</div>
						<div class="input_group">											
							<input type="submit" name="submit" value="Save">
						</div>
					</div>
			</form>
		</div>
	</div><!-- close Body -->


	<div class="footer">
		<h2>Copy Right All RIght Reversed</h2>
	</div> <!-- close footer -->
	</div>
</body>
</html>