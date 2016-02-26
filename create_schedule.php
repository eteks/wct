<?php require_once "session.php";
	  require_once "header.php";
	  require_once "functions/create_schedule_function.php";
	  require_once 'functions/test_battery_functions.php';
	  $createscheduleFunction = new createscheduleFunction();
	  $testbattery = new testbatteryfunction();
?>
<div class="container">
	<div class="container align_center align_height">
		<span class="sports">CREATE SCHEDULE</span>
	</div><!--end container-->
		<div class="col-xs-12 col-md-11">
			<div class="col-md-4 hidden-xs"></div>
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="create_schedule_form" id="createschedule_form">
				<input type="hidden" class="statesid" name="edit_schedule_id">
					<div class="form-group">
						<label>Schedule Name</label><br>
						<input type="text" class="adjust_width" name="schedule_name" data-validation-error-msg="Please Enter the name of the Schedule" data-validation="required">
					</div>
					<div class="form-group">
					  <label for="battey_name">Select Test Battery Name</label>
					  <select class="form-control classic adjust_width" id="battey_name" name="schedule_testbattery" data-validation-error-msg="Please Select the name of the Test Battery Name" data-validation="required">
					  	<option value="">Test Battery Name</option>
					    <?php
	                        $query = $testbattery->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>
	                      <?php } ?>
					  </select>
					</div>
					<div class="form-group">
					  <label for="date" class="fl">Select date</label><br>
				    	<input class="date_pick" type="text">
					</div>
					<div class="form-group col-md-12">
					  <label for="date" class="fl" style="position: relative; left: -10px;">Select Time</label><br>
					  	<div class="form-group align-time col-md-3">
							<select class="form-control classic adjust_tiny fl" id="hour" name="schedule_hour" data-validation-error-msg="Please Select the Hour" data-validation="required">
							  	<option value="">Hour</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
							    <option value="13">13</option>
							    <option value="14">14</option>
							    <option value="15">15</option>
							    <option value="16">16</option>
							    <option value="17">17</option>
							    <option value="18">18</option>
							    <option value="19">19</option>
							    <option value="20">20</option>
							    <option value="21">21</option>
							    <option value="22">22</option>
							    <option value="23">23</option>
							    <option value="24">24</option>							  
							</select>
						</div>
						<div class="form-group align-time col-md-3">
							<select class="form-control classic adjust_tiny fl" id="minute" name="schedule_minute" data-validation-error-msg="Please Select the Minute" data-validation="required">
							  	<option value="">Minute</option>
							   	<option value="00">00</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
						      	<option value="13">13</option>
							    <option value="14">14</option>
							    <option value="15">15</option>
							    <option value="16">16</option>
							    <option value="17">17</option>
							    <option value="18">18</option>
							    <option value="19">19</option>
							    <option value="20">20</option>
							    <option value="21">21</option>
							    <option value="22">22</option>
							    <option value="23">23</option>
							    <option value="24">24</option>
							    <option value="25">25</option>
							    <option value="26">26</option>
							    <option value="27">27</option>
							    <option value="28">28</option>
							    <option value="29">29</option>
							    <option value="30">30</option>
							    <option value="31">31</option>
							    <option value="32">32</option>
							    <option value="33">33</option>
							    <option value="34">34</option>
							    <option value="35">35</option>
							    <option value="36">36</option>
							    <option value="37">37</option>
							    <option value="38">38</option>
							    <option value="39">39</option>
							    <option value="40">40</option>
							    <option value="41">41</option>
							    <option value="42">42</option>
							    <option value="43">43</option>
							    <option value="44">44</option>
					            <option value="45">45</option>
				             	<option value="46">46</option>
				                <option value="47">47</option>
				                <option value="48">48</option>
				                <option value="49">49</option>
				                <option value="50">50</option>
				                <option value="51">51</option>
				                <option value="52">52</option>
				                <option value="53">53</option>
				                <option value="54">54</option>
				                <option value="55">55</option>
				                <option value="56">56</option>
				                <option value="57">57</option>
				                <option value="58">58</option>
				                <option value="59">59</option>
							</select>
					  	</div>
					  	<div class="form-group align-time col-md-3">
							<select class="form-control classic adjust_tiny fl" id="seconds" name="schedule_seconds" data-validation-error-msg="Please Select the Seconds" data-validation="required">
							  	<option value="">Seconds</option>
							   	<option value="00">00</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
						      	<option value="13">13</option>
							    <option value="14">14</option>
							    <option value="15">15</option>
							    <option value="16">16</option>
							    <option value="17">17</option>
							    <option value="18">18</option>
							    <option value="19">19</option>
							    <option value="20">20</option>
							    <option value="21">21</option>
							    <option value="22">22</option>
							    <option value="23">23</option>
							    <option value="24">24</option>
							    <option value="25">25</option>
							    <option value="26">26</option>
							    <option value="27">27</option>
							    <option value="28">28</option>
							    <option value="29">29</option>
							    <option value="30">30</option>
							    <option value="31">31</option>
							    <option value="32">32</option>
							    <option value="33">33</option>
							    <option value="34">34</option>
							    <option value="35">35</option>
							    <option value="36">36</option>
							    <option value="37">37</option>
							    <option value="38">38</option>
							    <option value="39">39</option>
							    <option value="40">40</option>
							    <option value="41">41</option>
							    <option value="42">42</option>
							    <option value="43">43</option>
							    <option value="44">44</option>
					            <option value="45">45</option>
				             	<option value="46">46</option>
				                <option value="47">47</option>
				                <option value="48">48</option>
				                <option value="49">49</option>
				                <option value="50">50</option>
				                <option value="51">51</option>
				                <option value="52">52</option>
				                <option value="53">53</option>
				                <option value="54">54</option>
				                <option value="55">55</option>
				                <option value="56">56</option>
				                <option value="57">57</option>
				                <option value="58">58</option>
				                <option value="59">59</option>
							</select>
						</div>
					</div>
					<div class="align_height align_margin">
						<label>Venue</label><br>
						<textarea class="area_width" name="schedule_venue" data-validation-error-msg="please Enter the name of the Venue" data-validation="required"></textarea>
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="reset" class="btn btn-primary align_right clear" value="Clear">
						<input type="submit" class="btn btn-primary align_right test-submit clear add_createschedule_act" value="Submit">
					</div>
				</form>
			</div>
			<div class="container table-position">
			  <table class="table createschedule_table">
			    <thead>
			      <tr class="row_color">
			        <th class="align_center">SLNO</th>
			        <th class="align_center">Schedule Name</th>
			        <th class="align_center">Test Battery Name</th>
			        <th class="align_center">Date</th>
			        <th class="align_center">Time</th>
			        <th class="align_center">Venue</th>
			        <th class="align_center">Action</th>
			      </tr>
			    </thead>
			    <tbody>
			     <?php
                    $query = $createscheduleFunction->createscheduleSelect();
                    $i=1;
                    while ($row = mysql_fetch_array($query)) {
                        ?>
                        <tr class="align_center delete_color">
                        <input type="hidden" class="t_createschedule_id" name="createschedule_id" value="<?php echo $row['createschedule_id']; ?>">
					        <td class="t_createschedule_s_id"><?php echo $i; ?></td>
					        <td class="t_createschedule_name"><?php echo $row['createschedule_name']; ?></td>
					        <td class="t_testbattery_name"><?php echo $row['testbattery_name']; ?></td>
					        <td class="t_createschedule_date"><?php echo date("d/m/Y", strtotime($row['createschedule_date'])); ?></td>
					        <td class="t_createschedule_time"><?php echo date("H:i:s", strtotime($row['createschedule_time'])); ?></td>
					        <td class="t_createschedule_venue"><?php echo $row['createschedule_venue']; ?></td>
					        <td>
					        	<span class="edit_state" onclick="editfunction(<?php echo $row['createschedule_id'] ?>)">Edit</span>
					        	<span class="delete_state" data-value="<?php echo $row['createschedule_id'] ?>">Delete</span>
					        </td>
			        </tr>
                 <?php $i++;} ?>
		    </tbody>
		  </table>
		</div>
	</div>
	<!-- <div class="container align_center">
	  	<ul class="pagination">
	  		<li><a href="#" class="align_left_icon"><i class="fa fa-angle-double-left"></i></a></li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li><a href="#" class="align_right_icon"><i class="fa fa-angle-double-right"></i></a></li>
		</ul>
	</div> --><!-- end  container-->
</div><!-- end  container-->

<div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<div class="container">
            <div class="createschedule_div">
          		<code class="close_btn cancel_btn"> </code>
          		<div class="edit_title">
                	<span class="del_txt">EDIT</span>
              	</div><!--edit_title-->
          			<div class="container state-content col-md-12">
          			<div class="col-xs-12 col-md-12 align_margin">
	          			<form name="edit_createschedule_form" id="edit_create_schedule_form">
	          			<input type="hidden" class="statesid" name="edit_schedule_id">
	          				<div class="form-group">
						<label>Enter the schedule Name</label><br>
						<input type="text" class="adjust_width" name="edit_schedule_name" data-validation-error-msg="Please Enter the name of the Schedule" data-validation="required">
					</div>
					<div class="form-group">
					  <label for="battey_name">Select Test Battery Name</label>
					  <select class="form-control classic adjust_width" id="battey_name" name="edit_schedule_testbattery" data-validation-error-msg="Please Select the name of the Test Battery Name" data-validation="required">
					  	<option value=""> Test Battery Name</option>
					   <?php
	                        $query = $testbattery->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>
	                      <?php } ?>
					  </select>
					</div>

					<div class="form-group align-day">
					  <label for="date" class="fl">Select date</label><br>
					  <input class="popup_date_pick" type="text">
					 <!--  <select class="form-control classic create-date1 fl" id="date" name="edit_schedule_day" data-validation-error-msg="Please Select the Date" data-validation="required">
					  	<option value="">Date</option>
					    <option value="1">1</option>
					    <option value="2">2</option>
					    <option value="3">3</option>
					  </select>
					  <select class="form-control classic create-date2 fl" id="month" name="edit_schedule_month" data-validation-error-msg="Please Select the Month" data-validation="required">
					  	<option value="">Month</option>
					    <option value="1">January</option>
					    <option value="2">February</option>
					    <option value="3">March</option>
					  </select>
					  <select class="form-control classic create-date3 fl" id="year" name="edit_schedule_year" data-validation-error-msg="Please Select the Year" data-validation="required">
					  	<option value="">Years</option>
					    <option value="1991">1991</option>
					    <option value="1992">1992</option>
					    <option value="1993">1993</option>
					  </select> -->
					</div>

					<div class="form-group col-md-12">
					  <label for="date" class="fl">Select Time</label><br>
					  	<div class="col-md-3">
							<select class="form-control classic create-time1" id="hour" name="edit_schedule_hour" data-validation-error-msg="Please Select the Hour" data-validation="required">
							  	<option value="">Hour</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
							    <option value="13">13</option>
							    <option value="14">14</option>
							    <option value="15">15</option>
							    <option value="16">16</option>
							    <option value="17">17</option>
							    <option value="18">18</option>
							    <option value="19">19</option>
							    <option value="20">20</option>
							    <option value="21">21</option>
							    <option value="22">22</option>
							    <option value="23">23</option>
							    <option value="24">24</option>	
							</select>
						</div>
						<div class="col-md-3">
							<select class="form-control classic create-time2" id="minute" name="edit_schedule_minute" data-validation-error-msg="Please Select the Minute" data-validation="required">
							  	<option value="">Minute</option>
							  	<option value="00">00</option>
							    <option value="01">01</option>
							    <option value="02">02</option>
							    <option value="03">03</option>
							    <option value="04">04</option>
							    <option value="05">05</option>
							    <option value="06">06</option>
							    <option value="07">07</option>
							    <option value="08">08</option>
							    <option value="09">09</option>
							    <option value="10">10</option>
							    <option value="11">11</option>
							    <option value="12">12</option>
						      	<option value="13">13</option>
							    <option value="14">14</option>
							    <option value="15">15</option>
							    <option value="16">16</option>
							    <option value="17">17</option>
							    <option value="18">18</option>
							    <option value="19">19</option>
							    <option value="20">20</option>
							    <option value="21">21</option>
							    <option value="22">22</option>
							    <option value="23">23</option>
							    <option value="24">24</option>
							    <option value="25">25</option>
							    <option value="26">26</option>
							    <option value="27">27</option>
							    <option value="28">28</option>
							    <option value="29">29</option>
							    <option value="30">30</option>
							    <option value="31">31</option>
							    <option value="32">32</option>
							    <option value="33">33</option>
							    <option value="34">34</option>
							    <option value="35">35</option>
							    <option value="36">36</option>
							    <option value="37">37</option>
							    <option value="38">38</option>
							    <option value="39">39</option>
							    <option value="40">40</option>
							    <option value="41">41</option>
							    <option value="42">42</option>
							    <option value="43">43</option>
							    <option value="44">44</option>
					            <option value="45">45</option>
				             	<option value="46">46</option>
				                <option value="47">47</option>
				                <option value="48">48</option>
				                <option value="49">49</option>
				                <option value="50">50</option>
				                <option value="51">51</option>
				                <option value="52">52</option>
				                <option value="53">53</option>
				                <option value="54">54</option>
				                <option value="55">55</option>
				                <option value="56">56</option>
				                <option value="57">57</option>
				                <option value="58">58</option>
				                <option value="59">59</option>
							</select>
						</div>
						<div class="col-md-3">
					  		<select class="form-control classic create-time3" id="seconds" name="edit_schedule_seconds" data-validation-error-msg="Please Select the Seconds" data-validation="required">
						  	<option value="">Seconds</option>
						    <option value="00">00</option>
						    <option value="01">01</option>
						    <option value="02">02</option>
						    <option value="03">03</option>
						    <option value="04">04</option>
						    <option value="05">05</option>
						    <option value="06">06</option>
						    <option value="07">07</option>
						    <option value="08">08</option>
						    <option value="09">09</option>
						    <option value="10">10</option>
						    <option value="11">11</option>
						    <option value="12">12</option>
					      	<option value="13">13</option>
						    <option value="14">14</option>
						    <option value="15">15</option>
						    <option value="16">16</option>
						    <option value="17">17</option>
						    <option value="18">18</option>
						    <option value="19">19</option>
						    <option value="20">20</option>
						    <option value="21">21</option>
						    <option value="22">22</option>
						    <option value="23">23</option>
						    <option value="24">24</option>
						    <option value="25">25</option>
						    <option value="26">26</option>
						    <option value="27">27</option>
						    <option value="28">28</option>
						    <option value="29">29</option>
						    <option value="30">30</option>
						    <option value="31">31</option>
						    <option value="32">32</option>
						    <option value="33">33</option>
						    <option value="34">34</option>
						    <option value="35">35</option>
						    <option value="36">36</option>
						    <option value="37">37</option>
						    <option value="38">38</option>
						    <option value="39">39</option>
						    <option value="40">40</option>
						    <option value="41">41</option>
						    <option value="42">42</option>
						    <option value="43">43</option>
						    <option value="44">44</option>
				            <option value="45">45</option>
			             	<option value="46">46</option>
			                <option value="47">47</option>
			                <option value="48">48</option>
			                <option value="49">49</option>
			                <option value="50">50</option>
			                <option value="51">51</option>
			                <option value="52">52</option>
			                <option value="53">53</option>
			                <option value="54">54</option>
			                <option value="55">55</option>
			                <option value="56">56</option>
			                <option value="57">57</option>
			                <option value="58">58</option>
			                <option value="59">59</option>
					  	</select>
				  	</div>
				</div>

					<div class="align_height align_margin">
						<label>Venue</label><br>
						<textarea class="area_width_create" name="edit_schedule_venue" data-validation-error-msg="Please Enter the Venue" data-validation="required"></textarea>
					</div>
					<div class="col-md-10 schedule_btn">
						<!-- <button type="button" class="btn btn-primary align_right clear edit_createschedule_act">Submit</button>
						<button type="button" class="btn btn-primary align_right clear">Clear</button> -->
						<input type="reset" class="btn btn-primary align_right clear reset_form" value="Clear">
						<input type="submit" class="btn btn-primary align_right test-submit clear edit_createschedule_act" value="Submit">
					</div>
	          	</form>
	          		</div>
					</div><!--state-content-->
			</div><!--test_battery_div-->
		</div><!--container-->
<?php require_once "footer.php" ?>
