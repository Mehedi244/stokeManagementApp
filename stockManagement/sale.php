
<?php 
error_reporting(0);
include 'databaseFile/dbContext.php';


	if (isset($_POST['salesubmit'])) {

      $invoicenumber = $_POST['invoicenumber'];
      $item_id = $_POST['item_id'];
      $item_name = $_POST['item_name'];
      $totalItems = $_POST['totalItems'];
      $quantity = $_POST['quantity'];
      $price = $_POST['price'];
      $totalPrice = $_POST['totalPrice'];

      $saledate = date("d/m/y");

      $updatequantity = (int)$quantity - (int)$totalItems;

     

      $sql = "INSERT INTO sale(invoicenumber,item_id,item_name,totalItems,unitPrice,totalPrice,saledate)

      values('$invoicenumber','$item_id','$item_name','$totalItems','$price','$totalPrice','$saledate')";
      $data = mysqli_query($db,$sql);



      $sql7 = "UPDATE purches SET quantity = '$updatequantity' WHERE item_id = '$item_id'";
      $data7 = mysqli_query($db,$sql7);

       if ($data && $data7) {
       		$successmessage= "Item Inserted Success";
       }else{
       		$successmessage= "Item Inserted Fail..";
       }

         
}
 ?>

 <?php 

 	if(isset($_GET['del'])){
    $id = $_GET['del'];

    if ($id) {
    	$sql10 = "DELETE FROM sale WHERE invoicenumber = '$id'";
    	mysqli_query($db, $sql10);
    }

    
  }

  ?>

<?php include'header.php'; ?>
		<div class="body">
		<div class="form_body">
			<h2>Search Item</h2>
			<h4 style="text-align: left;" id="message">
    					<?php if (isset($successmessage)) {
        					echo $successmessage;
       						} 
       					?>
  			</h4>
			<form action="" method="POST">
					<div class="form_field">
						<div id="search" class="input_group">									
							<input id="search" type="text" name="item_id" placeholder="Enter purches Id">
							<input type="submit" name="searchbtn" value="Search Item">
						</div>
					</div>
			</form>

			<form action="" name="SumForm" method="POST">

			<div class="searchItemList">
				<table id="searchItemtable">

					<?php 
						if (isset($_POST['searchbtn'])) {
		                       $i = $_POST['item_id'];
				
		                        $sql4 = "SELECT * FROM item t1 inner join purches t2 on t1.item_id = t2.item_id WHERE purches_id = '$i'";
		                        $run4 = mysqli_query($db,$sql4);
		                        $row4 = mysqli_fetch_array($run4);

		                        if ($row4) {
						 ?>
						<thead>
							<tr>
								<th>Invoice Number</th>
								<th>Item Id</th>
								<th>Item Name</th>
								<th>Quantity</th>
								<th>Unit Price</th>
								<th>Items</th>
								<th>Total price</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								$sql5  = "SELECT * from sale ORDER BY invoicenumber DESC LIMIT 1";
	                            $result5 = mysqli_query($db, $sql5);
	                            $row5 = mysqli_fetch_array($result5);

	                            if (is_null($row5)) {
	                            	$invoicenumber = 1001;
	                            }
	                            else{
	                            	$invoicenum = $row5['invoicenumber'];
	                            	$invoicenumber =$invoicenum+1;
	                            }
	                            $price = $row4['price'];
	                            


							 ?>
						
	                       <tr>
	                          <td ><input disabled="" id="itemnum" type="text" name="invoicenumber" value="<?php echo $invoicenumber; ?>"></td>

	                          <td ><input  id="itemnum" type="text" name="item_id" value="<?php echo $row4['item_id']; ?>"></td>

	                           <td ><input  id="itemnum" type="text" name="item_name" value="<?php echo $row4['item_name']; ?>"></td>

	                          <td ><input  id="itemnum" type="text" name="quantity" value="<?php echo $row4['quantity']; ?>"></td>

	                          <td ><input  class="itemnum" type="text" onFocus="startCalc();" 
		onBlur="stopCalc();" name="price" value="<?php echo $price; ?>"></td>

	                          <td ><input  class="itemnum" type="text" onFocus="startCalc();" 
		onBlur="stopCalc();" name="totalItems" placeholder="Total Items"></td>
	                          <td ><input  class="itemnum" type="text" name="totalPrice"></td>
	                         

	                         
		                    </tr>
		                   
						</tbody>
					</table>
					<div class="salebtn">
		                 <input type="submit" name="salesubmit" value="save">
					</div>
		                  <?php 
	                      			}else{
										echo "Item Not found";
									}
							?>
	                          
	                        <?php } ?>
		                  
			</div>
		</form>

		<div class="itemlist">
				<h2>Sales List</h2>
				<div class="item-data">
					<table>
						<thead>
							<tr>
								<th>Sl</th>
								<th>Invoice number</th>
								<th>Item Id</th>
								<th>Item_name</th>
								<th>TotalItems</th>
								<th>UnitPrice</th>
								<th>TotalPrice</th>
								<th>Saledate</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
						<?php 
	                          $sql8  = "SELECT * from sale";
	                            $i = 0;
	                            $result8 = mysqli_query($db, $sql8);

	                              while ($row8 = mysqli_fetch_array($result8)) {
	                              $i++;

	                          ?>
	                       <tr>
	                          <td ><?php echo $i ?></td>
	                          <td ><?php echo $row8['invoicenumber']; ?></td>
	                          <td ><?php echo $row8['item_id']; ?></td>
	                          <td ><?php echo $row8['item_name']; ?></td>
	                          <td ><?php echo $row8['totalItems']; ?></td>
	                          <td ><?php echo $row8['unitPrice']; ?></td>
	                          <td ><?php echo $row8['totalPrice']; ?></td>
	                          <td ><?php echo $row8['saledate']; ?></td>
	                          <td>
	                          	<a id="deletebutton" href="sale.php?del=<?php echo $row8['invoicenumber']; ?>">Delete</a>
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

	<script type="text/javascript">
		function startCalc(){
			interval = setInterval("calc()",1);
			}
			function calc(){
			one = document.SumForm.price.value;
			two = document.SumForm.totalItems.value; 
			document.SumForm.totalPrice.value = (one * 1) * (two * 1);
			}
			function stopCalc(){
			clearInterval(interval);
		}
	</script>

</body>
</html>

