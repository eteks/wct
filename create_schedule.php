<?php require_once "session.php";
	  require_once "header.php";
	  require_once "functions/create_schedule_function.php";
	  require_once 'functions/test_battery_functions.php';
	  $createscheduleFunction = new createscheduleFunction();
	  $testbattery = new testbatteryfunction();
?>
<style type="text/css">
	#ui-id-1{
		width: 152px !important;
	}
	thead, tbody tr {
    display:table;
    width:100%;
    table-layout:fixed;
	}
	.table > tbody tr:last-child{
		border: 0 none !important;
	}
	.table > thead{
		border-bottom: 0 none !important;
	}
	tbody tr {
    border-left: 0 none !important;
    border-right: 0 none !important;
	}
	.paging-nav {
    display: none;
	}
	.table > tbody td{
		height: 12px;
	}
</style>
<script type="text/javascript">	
</script>
<div class="container align_bottom">
	<div class="container left_align_parameter align_height np">
		<span class="sports">CREATE SCHEDULE</span>
	</div><!--end container-->
		<div class="col-xs-12 col-md-12">
		<!--	<div class="col-md-4 hidden-xs"></div> -->
			<div class="col-xs-12 col-md-7 align_margin">
				<form name="create_schedule_form" class="createschedule_form" id="cs_form">
				<input type="hidden" class="statesid" name="edit_schedule_id">
					<div class="form-group">
						<label>Enter Name of Schedule</label>
						<input type="text" class="adjust_width" name="schedule_name" data-validation-error-msg="Please enter name of Schedule" data-validation="required">
					</div>
					<div class="form-group">
					  <label for="battey_name">Select Test Battery</label>
					  <select class="form-control classic adjust_width" id="battey_name" name="schedule_testbattery" autocomplete="off" data-validation-error-msg="Please select Test Battery" data-validation="required">
					  	<option value="">Select Test Battery</option>
					    <?php
	                        $query = $testbattery->testbatterySelect();
	                        while ($row = mysql_fetch_array($query)) {
	                            ?>
	                            <option value="<?php echo $row['testbattery_id']; ?>"><?php echo $row['testbattery_name']; ?></option>
	                      <?php } ?>
					  </select>
					</div>
					<div class="form-group create_date nm">
					  <label for="date" class="date_cre"  style="">Select Date</label>
				    	<input class="date_pick" type="text">
				    	<!-- <div class="date-dropdowns"> 
					    	<select name="dateday" id="day" class="day day_sch classic">
					    	  	<option value="">Day</option>
				    	    </select>
				    	    <select name="datemonth" id="month" class="month classic">
					    	  	<option value="">Month</option>
			    	  		</select>
								<select name="dateyear" id="year" class="year year_sch classic">
								  	<option value="">Year</option>
						    </select>
					    </div> -->
				    	  
					</div>
					<span class="hided empty_check">Please select Date</span>
					<span class="hided">Please select valid Date</span>
					<div class="form-group col-md-12 np" style="margin-top:15px;">
					  <label for="date" class="" style="">Select Time</label>
					  	<div class="form-group fl">
							<select class="form-control classic adjust_tiny fl" id="hour" name="schedule_hour" data-validation-error-msg="Please select Hour" data-validation="required">
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
						<div class="form-group fl">
							<select class="form-control classic adjust_tiny fl" id="minute" name="schedule_minute" data-validation-error-msg="Please select Minute" data-validation="required">
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
					  	<div class="form-group fl">
							<select class="form-control classic adjust_tiny fl" id="seconds" name="schedule_seconds" data-validation-error-msg="Please select Second" data-validation="required">
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
						<div class="clear_both"></div>
					</div>
					<div class="align_height align_margin">
						<label>Venue</label>
						<textarea class="area_width" name="schedule_venue" data-validation-error-msg="Please enter Venue" data-validation="required"></textarea>
					</div>
					<div class="col-md-9 schedule_btn">
						<input type="submit" class="btn btn-primary test-submit clear add_createschedule_act" value="Save">
						<input type="reset" class="btn btn-primary clear reset_form" value="Cancel">
					</div>
				</form>
			</div>
			<div class="col-md-12">
				<div class="col-md-3 search_part" style="padding: 0px;">
					<div class="test_title">
						<span>Schedule Name</span>
					</div><!--test_title-->
					<form>
						<div class="search-content">
							<div class="search__list">
								<input type="text" class="search_box search_text cs_search" placeholder="Search Name">
								<i class="fa fa-search font-search search_button"></i>
							</div><!--search__list-->
								<div class="test-list">
									<?php
				                        $query = $createscheduleFunction->createschedulesearchSelect();
				                        while ($row = mysql_fetch_array($query)) {
			                        ?>
									<span class="test-name cs_namelist">
										<input type="checkbox" name="test" value="test" class="check_test check_createschedule check_list input_wrap" id="check-select">
										<input type="hidden" class="check_scheduleid check_data" name="check_scheduleid" value="<?php echo $row['createschedule_id']; ?>">
										<input type="text" name="check_createschedulename" value="<?php echo $row['createschedule_name']; ?>" class="list_edit check_createschedulename input_wrap">
										<span class="test-alter">
										<?php 
										$check_in_assignschedule = mysql_query("SELECT * FROM wc_assignschedule WHERE assigncreateschedule_id='".$row['createschedule_id']."'")or die(mysql_error());
				       					$check_in_result = mysql_query("SELECT * FROM wc_result WHERE resultcreateschedule_id='".$row['createschedule_id']."'")or die(mysql_error());		
										if(mysql_num_rows($check_in_assignschedule)>0 || mysql_num_rows($check_in_result)>0){ ?>
											<i class="fa fa-floppy-o save_item save_state"></i>
											<i class="fa fa-pencil-square-o side_restrict"><div class="side_restrict_tooltip">Mapping has been already done.<br/>Edit or Delete not possible.</div></i>
											<i class="fa fa-trash-o side_restrict" style="float: none;"></i>
										<?php } else{?>		
											<i class="fa fa-floppy-o save_item save_createschedule"></i>
											<i class="fa fa-pencil-square-o edit_item"></i>
											<i class="fa fa-trash-o delete_item delete_state" data-value="<?php echo $row['createschedule_id']; ?>" style="float: none;"></i>
										<?php }?>
										</span><!--test-alter-->
									</span><!--test-name-->
									<div class="delete_div delete_search">
							            <!-- <code class="close_btn cancel_btn"> </code>  -->
							              <div class="del_title">
							                <span class="del_txt">DELETE</span>
							              </div>
							              <div class="del_content">
							                <span class="del_content_txt">Are you sure want to delete this whole record?</span>
							                 <input type="button" class="btn btn-primary align_right no_btn" value="No">
							                 <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
							                 <input type="hidden" name="delete_id" value="" id="delete_id"/>
							              </div><!--del_content-->
      								</div><!--delete_div-->
      								<?php } ?>
								</div><!--test-list-->
						</div><!--search-content-->
					</form>
				</div>

			<div class="container table-position col-md-9" style="padding: 0px;">
				<table class="table createschedule_table check_table">
					 <thead>
			      <tr class="row_color">


			        <th class="align_center">Test Battery</th>
			        <th class="align_center">Date</th>
			        <th class="align_center">Time</th>
			        <th class="align_center">Venue</th>
			        <th class="action_align">Action</th>
			      </tr>
			    </thead>
				<tbody style="display:block;height:260px;overflow:auto;">
					<?php
	                   $query = $createscheduleFunction->createscheduleSelect();
	                   $i=1;
	                   while ($row = mysql_fetch_array($query)) {
                    ?>
				<tr class="align_center delete_color">
                        <input type="hidden" class="t_createschedule_id check_id hidden_value" name="createschedule_id" value="<?php echo $row['createschedule_id']; ?>">
					 	<input type='hidden' class="t_createschedule_name check_name" name='createschedule_name' value="<?php echo $row['createschedule_name']; ?>">
			    <!--  <?php
                   // $query = $createscheduleFunction->createscheduleSelect();
                   // $i=1;
                   // while ($row = mysql_fetch_array($query)) {
                        ?>
                           <!--    <td class="t_createschedule_s_id"><?php //echo $i; ?></td> -->
					    <!--    <td class="t_createschedule_name"><?php //echo $row['createschedule_name']; ?></td -->
					      <!--  <td class="t_testbattery_name"><?php// echo $row['testbattery_name']; ?></td>
					        <td class="t_createschedule_date"><?php// echo date("d/m/Y", strtotime($row['createschedule_date'])); ?></td>
					        <td class="t_createschedule_time"><?php// echo date("H:i:s", strtotime($row['createschedule_time'])); ?></td>
					        <td class="t_createschedule_venue"><?php// echo $row['createschedule_venue']; ?></td> -->
					        <td><?php echo $row['testbattery_name']; ?></td>
					        <td><?php echo date("d/m/Y", strtotime($row['createschedule_date'])); ?></td>
					        <td><?php echo $row['createschedule_time']; ?></td>
					        <td><?php echo $row['createschedule_venue']; ?></td>
							<td class="popup-edit">
							<?php 
								$check_in_assignschedule = mysql_query("SELECT * FROM wc_assignschedule WHERE assigncreateschedule_id='".$row['createschedule_id']."'")or die(mysql_error());
		       					$check_in_result = mysql_query("SELECT * FROM wc_result WHERE resultcreateschedule_id='".$row['createschedule_id']."'")or die(mysql_error());		
								if(mysql_num_rows($check_in_assignschedule)>0 || mysql_num_rows($check_in_result)>0){ ?>
					        		<span class="restrict">
							        	<i class="fa fa-pencil-square-o">
							        	<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>
							        	</i>
							        </span>
						        	<span class="restrict_del">
							        	<i class="fa fa-trash-o"> 
							        	<div class="restrict_tooltip">Mapping has been already done.Edit or Delete not possible.</div>
							        	</i>
						        	</span>
						        <?php } else{?>	
						        	<span class="edit_state" onclick="editfunction(<?php echo $row['createschedule_id'] ?>,this)"><i class="fa fa-pencil-square-o"></i></span>
						        	<span class="delete_state" data-value="<?php echo $row['createschedule_id'] ?>"><i class="fa fa-trash-o"></i></span>
					            <?php }?>
					                    <div class="createschedule_div popup_hidden">
							          		<code class="close_btn cancel_btn"> </code>
							          		<div class="edit_title">
							                	<span class="del_txt">Edit Schedule Details</span>
							              	</div><!--edit_title-->
							          			<div class="container state-content col-md-12">
							          			<div class="col-xs-12 col-md-12 align_margin">
								          			<form name="edit_createschedule_form" class="edit_create_schedule_form">
								          			<input type="hidden" class="statesid" name="edit_schedule_id">
								          			<input type="hidden" class="edit_schedule_name" name="edit_schedule_name" value="">
								          				
												<div class="form-group fl">
												  <label for="battey_name" class="popup_label">Select Test Battery Name</label>
												  <select class="form-control classic adjust_width box-width width-assign" id="battey_name" name="edit_schedule_testbattery" data-validation-error-msg="Please select Test Battery Name" data-validation="required">
												  	<option value="">Select Test Battery Name</option>
												   <?php
								                        $tb_query = $testbattery->testbatterySelect();
								                        while ($tb_row = mysql_fetch_array($tb_query)) {
								                            ?>
								                            <option value="<?php echo $tb_row['testbattery_id']; ?>"><?php echo $tb_row['testbattery_name']; ?></option>
								                      <?php } ?>
												  </select>
												</div>

												<div class="form-group align-day align-day-popup fl create_date nm">
												  <label for="date" class="popup_label">Select date</label>
												  <input class="popup_date_pick" type="hidden">
												  <!-- <div class="date-dropdowns">
										    	  	<select name="dateday" class="day day_sch classic">
										    	  		<option value="">Day</option>
										    	  	</select>
										    	  	<select name="datemonth" class="month classic">
										    	  		<option value="">Month</option>
										    	  	</select>
						  						  	<select name="dateyear" class="year year_sch classic">
						  						  		<option value="">Year</option>
						  						  	</select>
													</div> -->
												</div>
												<span class="hided empty_check">Please select Date</span>
												<span class="hided">Please select valid Date</span>
												<div class="form-group fl" style="margin-top:15px;">
												  <label for="date" class="popup_label">Select Time</label>
												  	<div class="form-group fl">
												  		<label class="popup_label">Time</label>
														<select class="form-control classic adjust_tiny" id="hour" name="edit_schedule_hour" data-validation-error-msg="Please select the Hour" data-validation="required">
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
													<div class="form-group fl">
														<label class="popup_label">Minute</label>
														<select class="form-control classic adjust_tiny" id="minute" name="edit_schedule_minute" data-validation-error-msg="Please select the Minute" data-validation="required">
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
													<div class="form-group fl">
														<label class="popup_label">Seconds</label>
												  		<select class="form-control classic adjust_tiny" id="seconds" name="edit_schedule_seconds" data-validation-error-msg="Please select Time" data-validation="required">
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
											  	<div class="clear_both"></div>
											</div>

												<div class="align_height align_margin fl">
													<label class="popup_label">Venue</label>
													<textarea class="area_width_create" name="edit_schedule_venue" data-validation-error-msg="Please enter the Venue" data-validation="required"></textarea>
												</div>
												<div class="col-md-10 schedule_btn fl">
													<!-- <button type="button" class="btn btn-primary align_right clear edit_createschedule_act">Submit</button>
													<button type="button" class="btn btn-primary align_right clear">Clear</button> -->
													<!-- <input type="reset" class="btn btn-primary align_right clear reset_form" value="Clear"> -->
													<input type="submit" class="btn btn-primary test-submit clear edit_createschedule_act" value="Save">
													<input type="reset" class="btn btn-primary clear reset_form" value="Cancel">
												</div>
								          	</form>
								          		</div>
										</div><!--state-content-->
								</div><!--test_battery_div-->

								<div class="delete_div delete_test_div">
						            <!-- <code class="close_btn cancel_btn"> </code>  -->
						              <div class="del_title">
						                <span class="del_txt">DELETE</span>
						              </div>
						              <div class="del_content">
						                <span class="del_content_txt">Are you sure you want to delete this record?</span>
						                <input type="button" class="btn btn-primary align_right no_btn" value="No">
						                <input type="button" class="btn btn-primary align_right yes_btn" value="Yes">
						                <input type="hidden" name="delete_id" value="" id="delete_id"/>
						              </div><!--del_content-->
  								</div><!--delete_div-->
							</td>
			        	</tr>
                 	<?php $i++;} ?>
		    	</tbody>
		  	</table>
			</div>
			<div class="createschedule_list">
				<ul>
					<?php
		               $cs_query = $createscheduleFunction->createscheduleSelect();
	                   while ($row1 = mysql_fetch_array($cs_query)) {
                     ?>
                     <li><?php echo $row1['createschedule_name'] ?></li>
                     <?php } ?>
				</ul>
			</div>
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

<!-- <div class="popup_fade cancel_btn"></div><!--popup_fade-->
		<!-- <div class="container">

		</div><!--container-->
<script type="text/javascript">
$(document).ready(function(){
	
	});
</script>
<?php require_once "footer.php" ?>
