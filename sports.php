<?php require_once "header.php" ?>
	<div class="row">		
		<div class="container align_center">
			<span class="sports">SPORTS</span>
		</div><!--end container-->

		<div class="align_margin"></div>
		<div class="container">
			<div class="col-md-8">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<form>
						<div class="align_margin">					
							<label>Enter the name of the Sports</label><br>
							<input type="text" class="sportsname" name="sports_name">
						</div>
						<button type="button" class="btn btn-primary align_right submit">Submit</button>			
					</form>
				</div>
			</div>
		</div><!-- end  container-->
		<div class="align_margin"></div>
		<div class="container container_holder">
		<div class="table-responsive">			
			<table class="table">
		        <thead>
		            <tr>
		                <th>SLNO</th>
		                <th>Sport Name</th>
		                <th>Action</th>                
		            </tr>
		        </thead>
		        <tbody>
		            <tr>
		                <td>01</td>
		                <td>Hockey</td>
		                <td>Edit Delete</td>
		                
		            </tr>
		            <tr>
		            	<td>02</td>
		                <td>Foot Ball</td>
		                <td>Edit Delete</td>
		            </tr>
		            <tr>
		                <td>03</td>
		                <td>Cricket</td>
		                <td>Edit Delete</td>
		            </tr>
		        </tbody>
		    </table>
		    </div>
		</div>
	</div>
<?php require_once "footer.php" ?>

