<!DOCTYPE html>
<html>
<head>
	<title>Simple Calculator in Javascript</title>
	<style type="text/css">
		body {
			margin: 0;
			padding: 0;
			font-family: 'Open Sans', sans-serif;
		}

		h1 {
			text-align: center;
			font-weight: 100;
		}

		.holder {
				width: 66%;
				margin: 0 auto;
				font-weight: 100;
			}

		form {
				width: 50%;
				margin: 0 auto;
				margin-top: 5em;
				border: 1px solid black;
				padding: 20px 10px;
			}
		form p {
				margin-top: 0;
				padding-top: 0;
			}
		form .button {
			border: 1px solid #000000;
			padding: 5px;
		}

		form .highlighted {
				border: 1px solid red;
			}

		form .text-thing {
				border: 1px solid #000000;
			}
	</style>
</head>
<body>
<div class="holder">
	<h1>Simple Interest Calculator</h1>
	<?php
	//Setting the variables that will determine the highlights for the missing inputs
	$class_name_1 ='text-thing';
	$class_name_2 ='text-thing'; 
	$class_name_3 ='text-thing';
			if (isset($_POST['submit'])) {
				if ($_POST['principal'] == "" || $_POST['rate'] == "" || $_POST['time'] == "") {
					$answer = "All Fields are Required";
					//check the principal field is empty
					if ($_POST['principal'] == "") {
						$class_name_1 = 'highlighted';
					}
					else {
						$class_name_1 = 'text-thing';
					}
					//check the rate field is empty
					if ($_POST['rate'] == "") {
						$class_name_2 = 'highlighted';
					}
					else {
						$class_name_2 = 'text-thing';
					}
					//check the time field is empty
					if ($_POST['time'] == "") {
						$class_name_3 = 'highlighted';
					}
					else {
						$class_name_3 = 'text-thing';
					}
				}
				else {
					$principal = $_POST['principal'];
					$rate = $_POST['rate'];
					$time = $_POST['time'];
					$answer = "Your Overall Payment is: " . $principal * $rate * $time;
					unset($_POST['principal'], $_POST['rate'], $_POST['time']);
				}
			}
	?>
	<form id="calc-form" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<p>Principal: <input type="text" value="<?php echo $_POST['principal'] ?>" name="principal" class="<?php echo $class_name_1; ?>"></p>
		<p>Rate: <input type="text" value="<?php echo $_POST['rate'] ?>" name="rate" class="<?php echo $class_name_2; ?>"></p>
		<p>Time: <input type="text" value="<?php echo $_POST['time'] ?>" name="time" class="<?php echo $class_name_3; ?>"></p>
		<p> 
			<?php
				echo $answer; // Display the answer here ...
			?>
		</p>
		<input class="button" type="submit" name="submit" value="CALCULATE">
		<input class="button" type="reset" onclick="resetForm()" value="CLEAR FORM">

		<script>
			document.getElementById("calc-form").reset();
		</script>
	</form>
</div>

</body>
</html>