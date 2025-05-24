<?php 
	  if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     } 
?>
	<div class="row">
       	 <div class="col-lg-12">
            <h1 class="page-header">List of Customers</h1>
       		</div>
        	<!-- /.col-lg-12 -->
   		 </div>
	 		    <form action="controller.php?action=delete" Method="POST">  	
			     <div class="table-responsive">					
				<table id="dash-table" class="table table-striped table-bordered table-hover"  style="font-size:12px" cellspacing="0">
				
				  <thead>
				  	<tr>
				  		<th>First Name</th> 
				  		<th>Last Name</th>	 
				  		<th>Gender</th>	 
				  		<th>Address</th>	 
				  		<th>Phone Number</th>	 
				  		<th>Email Address</th>	 
				  		<th>Reg Date</th>	 
				  	</tr>	
				  </thead> 
				  <tbody>
				  	<?php 
				  		$mydb->setQuery("SELECT * FROM `tblcustomer` ORDER BY `CUSTOMERID` desc");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  			echo '<td>' . $result->FNAME.'</td>';
				  			echo '<td>' . $result->LNAME.'</td>';
				  			echo '<td>' . $result->GENDER.'</td>';
				  			echo '<td>' . $result->CITYADD.'</td>';
				  			echo '<td>' . $result->PHONE.'</td>';
				  			echo '<td>' . $result->EMAILADD.'</td>';
				  			echo '<td>' . $result->DATEJOIN.'</td>';
				  		echo '</tr>';
				  	} 
				  	?>
				  </tbody>
					
				</table>
						<div class="btn-group">
				 <!--  <a href="index.php?view=add" class="btn btn-default">New</a> -->
					<?php
					if($_SESSION['U_ROLE']=='Administrator'){
					// echo '<button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button'
					; }?>
				</div>
			
			
				</form> 