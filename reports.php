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
			<div class="container" id="dvData">
			  <table class="table state_table">
			      <tr class="row_color" style="border: 1px solid;">
			        <td class="align_center report_head">Athletes Names</td>
			        <td class="align_center report_head">D.O.B</td>
			        <td class="align_center report_head">Age</td>
			        <td class="align_center report_head">30 M</td>
			        <td class="align_center report_head">Result</td>
			        <td class="align_center report_head">S.B Jump</td>
			        <td class="align_center report_head">Result</td>
			        <td class="align_center report_head">Medicine</td>
			        <td class="align_center report_head">Result</td>
			        <td class="align_center report_head">Shuttle</td>
			        <td class="align_center report_head">Result</td>
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

			  </table>
			</div>
		</div>
	</div><!-- end  container-->
	<a href="#" class="export">Export Table data into Excel</a>
</div><!-- end  container-->
<script type="text/javascript">
$(document).ready(function () {

    function exportTableToCSV($table, filename) {

        var $rows = $table.find('tr:has(td)'),

            // Temporary delimiter characters unlikely to be typed by keyboard
            // This is to avoid accidentally splitting the actual contents
            tmpColDelim = String.fromCharCode(11), // vertical tab character
            tmpRowDelim = String.fromCharCode(0), // null character

            // actual delimiter characters for CSV format
            colDelim = '","',
            rowDelim = '"\r\n"',

            // Grab text from table into CSV formatted string
            csv = '"' + $rows.map(function (i, row) {
                var $row = $(row),
                    $cols = $row.find('td');

                return $cols.map(function (j, col) {
                    var $col = $(col),
                        text = $col.text();

                    return text.replace(/"/g, '""'); // escape double quotes

                }).get().join(tmpColDelim);

            }).get().join(tmpRowDelim)
                .split(tmpRowDelim).join(rowDelim)
                .split(tmpColDelim).join(colDelim) + '"',

            // Data URI
            csvData = 'data:application/csv;charset=utf-8,' + encodeURIComponent(csv);

        $(this)
            .attr({
            'download': filename,
                'href': csvData,
                'target': '_blank'
        });
    }

    // This must be a hyperlink
    $(".export").on('click', function (event) {
        // CSV
        exportTableToCSV.apply(this, [$('#dvData>table'), 'export.csv']);

        // IF CSV, don't do event.preventDefault() or return false
        // We actually need this to be a typical hyperlink
    });
});
</script>
<?php require_once "footer.php" ?>
