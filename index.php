<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" xml:lang="en-US" lang="en-US">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title>Jonathan Demelo | CS3336 HW2</title>
		<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="./js/jquery-ui-1.9.0.custom.min.js"></script>
		<link rel="stylesheet" href="./css/hw2.css" type="text/css" media="screen" />
		<link rel="stylesheet" href="./themes/smoothness/jquery-ui-1.9.0.custom.min.css" type="text/css" media="screen" />
	</head>
	<body>
		<div id="mainbody">
			<div class="leftsection">
				Pick Numbers
				<?php
				for ($i=1; $i<10; $i++){
				 echo "<br />" . "<input id='check" . $i ."' type='checkbox'/>" . $i;
				} ?>
			</div>
			<div class="rightsection">
				Pick a Date <br />
				<input type="text" id="datepicker" />
				<img src="./images/calendar.gif" id="calendarIMG" title="Please select your date" alt="Please select your date"></img>
				<div id="result"></div>
				<div id="description">
					This script calculates your lucky number
					<img src="./images/info.jpg" id="infoIMG" title="Based on single-digit summation" alt="Based on single-digit summation"></img>
				</div>
			</div>
		</div>

		<script type="text/javascript">
			$(document).ready(function() {
				$("#datepicker").keyup(sendPHP);
				$("#datepicker").change(sendPHP);
				$("input:checkbox").change(sendPHP);

				function sendPHP(){
			 		$date = $("#datepicker").val().replace(/[^\d]/g, '');
					$checked = '';
					// <![CDATA[
					for (var $i=1; $i < 10; $i++){
				 		if($('#check' + $i).is(':checked')){
				 			$checked = $checked + $i;
				 		}
					}
					// ]]>
				    $.get(
					  	"process.php", 
					  	{date: $date, checked: $checked}, 
					  	function(result){
					    	$("#result").text(result);
				  	});
				}

				$("#calendarIMG,#infoIMG").tooltip();
				$("#datepicker").datepicker({dateFormat:"mm-dd-yy", 
					showOn:"none",
				}).datepicker("setDate", new Date());

				$('#calendarIMG').click(function() {
				      $('#datepicker').datepicker('show');
				});

				sendPHP();
			});
		</script>
	</body>
</html>
