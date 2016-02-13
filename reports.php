<?php require_once "header.php"; ?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">REPORTS</span>
	</div><!--end container-->	
	<div class="container">
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form id="report_form">
					<div class="align_height align_margin">					
						<label>Select Schedule</label><br>
						<div class="area_scroll">
							<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox" value="" data-validation-error-msg="Please Choose atleast one Schedule" data-validation="required">Schedule1</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Schedule2</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Schedule3</label>
					    	</div>
					    	<div class="checkbox align_check">
					      		<label class="remember_txt"><input type="checkbox">Schedule4</label>
					    	</div>
						</div>
					</div>
					<div class="col-md-9 schedule_btn">					
						<input type="submit" class="btn btn-primary align_right clear" value="Submit">
						<input type="submit" class="btn btn-primary align_right clear" value="Clear">
					</div>			
				</form>
			</div>			
			<div class="container">           
			  <table class="table state_table">
			    <thead style="border: 1px solid;">
			      <tr class="row_color">
			        <th class="align_center report_head">Athletes Names</th>
			        <th class="align_center report_head">D.O.B</th>
			        <th class="align_center report_head">Age</th>
			        <th class="align_center report_head">30 M</th>
			        <th class="align_center report_head">Result</th>
			        <th class="align_center report_head">S.B Jump</th>
			        <th class="align_center report_head">Result</th>
			        <th class="align_center report_head">Medicine</th>
			        <th class="align_center report_head">Result</th>
			        <th class="align_center report_head">Shuttle</th>
			        <th class="align_center report_head">Result</th>
			      </tr>
			    </thead>
			    <tbody>
			      <tr class="align_center delete_color">
			        <td>Suresh</td>
			        <td>DD/MM/YY</td>
			        <td>14</td>
			        <td>5.15</td>
			        <td>3</td>
			        <td>200</td>
			        <td>3</td>
			        <td>2.9</td>
			        <td>3</td>
			        <td>18.14</td>
			        <td>3</td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>Suresh</td>
			        <td>DD/MM/YY</td>
			        <td>14</td>
			        <td>5.15</td>
			        <td>3</td>
			        <td>200</td>
			        <td>3</td>
			        <td>2.9</td>
			        <td>3</td>
			        <td>18.14</td>
			        <td>3</td>
			      </tr>
			      <tr class="align_center delete_color">
			        <td>Suresh</td>
			        <td>DD/MM/YY</td>
			        <td>14</td>
			        <td>5.15</td>
			        <td>3</td>
			        <td>200</td>
			        <td>3</td>
			        <td>2.9</td>
			        <td>3</td>
			        <td>18.14</td>
			        <td>3</td>
			      </tr>						   
			    </tbody>
			  </table>
			</div>			
		</div>
	</div><!-- end  container-->
	<div class="container align_center">		          
	  	<ul class="pagination">
	  		<li><a href="#" class="align_left_icon"><i class="fa fa-angle-double-left"></i></a></li>    	
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li><a href="#" class="align_right_icon"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>		   
	</div><!-- end  container-->
</div><!-- end  container-->
<?php require_once "footer.php" ?>