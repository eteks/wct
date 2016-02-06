<?php require_once "header.php" ?>		
		<div class="container align_center">
			<span class="sports">STATE</span>
		</div><!--end container-->

		<div class="align_margin"></div>
		<div class="container">
			<div class="col-md-8">
				<div class="col-md-6"></div>
				<div class="col-md-6">
					<form>
						<div class="align_margin">					
							<label>Enter the State</label><br>
							<input type="text" class="sportsname">
						</div>
						<button type="button" class="btn btn-primary align_right submit">Submit</button>			
					</form>
				</div>
				<div class="container">           
				  <table class="table">
				    <thead>
				      <tr>
				        <th class="align_center">SLNO</th>
				        <th class="align_center">District/Taluka</th>
				        <th class="align_center">Action</th>
				      </tr>
				    </thead>
				    <tbody>
				      <tr class="align_center">
				        <td>01</td>
				        <td>Virudhunagar</td>
				        <td class="edit_state">Edit</td> 
				        <td class="delete_state">Delete</td>
				      </tr>
				      <tr class="align_center">
				        <td>02</td>
				        <td>Vilupuram</td>
				       	<td class="edit_state">Edit</td> 
				        <td class="delete_state">Delete</td>
				      </tr>				   
				    </tbody>
				  </table>
				</div>
			</div>
		</div><!-- end  container-->
		<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="state_div">
          		<code class="close_btn cancel_btn"> </code>
          			<div class="container state-content col-md-12">		
	          			<form>
							<div class="align_margin">	
								<label>Enter the State</label><br>
								<input type="text" class="sportsname">
							</div><!--align_margin-->
							<button type="button" class="btn btn-primary align_right submit">Submit</button>			
						</form>
					</div><!--tate-content-->
			</div><!--state_div-->
		</div><!--container-->

<?php require_once "footer.php" ?>