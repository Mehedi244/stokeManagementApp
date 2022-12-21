
<?php 
include 'databaseFile/dbContext.php';
	if(isset($_GET['delete'])){
    $i = $_GET['delete'];

    if ($i) {
    	$sql = "DELETE FROM purches WHERE purches_id = '$i'";
    	mysqli_query($db, $sql);
    }

    
  }

        
 ?>

<?php include'header.php'; ?>
	<div class="body">
		<div class="form_body">
			<h2>Search Stock</h2>
			<form action="" method="POST">
					<div class="form_field">
						<div id="search" class="input_group">									
							<input id="search" type="text" name="purches_id" placeholder="Enter Purches Id">
							<input type="submit" name="searchbtn" value="Search Item">
						</div>
					</div>
			</form>

			<div class="searchItemList">
				<table id="searchItemtable">
					<?php 
						if (isset($_POST['searchbtn'])) {
		                       $i = $_POST['purches_id'];
				
		                        $sql4 = "SELECT * FROM purches WHERE purches_id = '$i'";
		                        $run4 = mysqli_query($db,$sql4);
		                        $row4 = mysqli_fetch_array($run4);

		                        if ($row4) {
						 ?>
						<thead>
							<tr>
								<th>Purches Id</th>
								<th>Item Id</th>
								<th>Quantity</th>
								<th>Purches Date</th>
							</tr>
						</thead>
						<tbody>
						
	                       <tr>
	                          <td ><?php echo $row4['purches_id']; ?></td>
	                          <td ><?php echo $row4['item_id']; ?></td>
	                          <td ><?php echo $row4['quantity']; ?></td>
	                          <td ><?php echo $row4['purches_date']; ?></td>
	                         

	                          <?php }
												else{
													echo "Item Not found";
												}
											?>
	                          
	                          <?php } ?>
		                    </tr>
						</tbody>
					</table>
			</div>


			<div class="itemlist">
				<h2>Stock List</h2>
				<div class="item-data">
					<table>
						<thead>
							<tr>
								<th>Sl</th>
								<th>Purches Id</th>
								<th>Item Id</th>
								<th>Quantity</th>
								<th>Purches Date</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
	                          $sql2  = "SELECT * from purches";
	                            $i = 0;
	                            $result1 = mysqli_query($db, $sql2);

	                              while ($row = mysqli_fetch_array($result1)) {
	                              $i++;

	                          ?>
	                       <tr>
	                          <td ><?php echo $i ?></td>
	                          <td ><?php echo $row['purches_id']; ?></td>
	                          <td ><?php echo $row['item_id']; ?></td>
	                          <td ><?php echo $row['quantity']; ?></td>
	                          <td ><?php echo $row['purches_date']; ?></td>
	                          <td>
	                          	<a id="editbutton" href="update-purches.php?edit=<?php echo $row['purches_id']; ?>">Update</a>

	                          	<a id="deletebutton" href="stock.php?delete=<?php echo $row['purches_id']; ?>">Delete</a>
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
		<h2>Copy Right All RIght Reversed</h2>
	</div> <!-- close footer -->
	</div>
</body>
</html>