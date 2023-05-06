<?php 
    if(isset($_POST["submit"])) {
		echo "<script> </script>";
        $name = htmlspecialchars($_POST["name"]);
        $nationality = htmlspecialchars($_POST["nationality"]);
        $phone = $_POST["phone"];
        $email = $_POST["email"];
        $hotel = $_POST["hotel"];
        $pickup = $_POST["pickup"];
        $date = $_POST["date"];
        $group = $_POST["group"];
        $tour = $_POST["tour"];
        $info = $_POST["info"];
        
        $data = "Name : " . $name . PHP_EOL . "Nationality : " . $nationality . PHP_EOL . "Phone Number: " . $phone . PHP_EOL . "Email Address : " . $email . PHP_EOL . "Hotel Name & Address : " . $hotel . PHP_EOL . "Pick-up time : " . $pickup . PHP_EOL . "Date of Tour : " . $date . PHP_EOL . "Number of Group : " . $group . PHP_EOL . "Name of Tour/Activity : " . $tour . PHP_EOL . "Notes : " . $info;
        
        $curl = curl_init();

        $curl1 = curl_setopt_array($curl, array(
            CURLOPT_URL => 'https://api.fonnte.com/send',
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'POST',
            CURLOPT_POSTFIELDS => array(
            'target' => '08123659210',
            'message' => $data, 
            'countryCode' => '', //optional
            ),
            CURLOPT_HTTPHEADER => array(
                'Authorization: 5cqQNH13J7+aW9fo#Ncd' 
                //token
            ),
        ));
		if ($curl1){
			echo "<script> alert('Booking has been successful'); </script>";
		}
		else {
			echo "<script> alert('Booking failed'); </script>";
		}

        $response = curl_exec($curl);

        curl_close($curl);
    }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Ragane Bali Tour Booking Form</title>
	<style>
		body {
			background-color: rgba(0, 128, 128, 0.1);
			font-family: Arial, sans-serif;
			font-size: 16px;
			line-height: 1.5;
			padding: 20px;
		}

		h1 {
			background-color: rgba(25, 25, 112, 0.5);
			color: #fff;
			padding: 12px;
			text-align: center;
		}

		form {
			background-color: #fff;
			border: 2px solid #ccc;
			border-radius: 10px;
			padding: 20px;
		}

		label {
			display: block;
			font-weight: bold;
			margin-bottom: 10px;
		}

		input[type=text], input[type=email], input[type=tel], select, textarea {
			border: 1px solid #ccc;
			border-radius: 4px;
			box-sizing: border-box;
			margin-bottom: 20px;
			padding: 12px;
			width: 100%;
		}

		input[type=submit] {
			background-color: #4CAF50;
			border: none;
			border-radius: 4px;
			color: #fff;
			cursor: pointer;
			font-size: 16px;
			padding: 12px 20px;
		}

		input[type=submit]:hover {
			background-color: #45a049;
		}
	</style>
</head>
<body>
	<h1>Ragane Bali Tour Booking Form</h1>
	<form action="" method="POST">
		<label for="name">Name:</label>
		<input type="text" id="name" name="name" >

		<label for="nationality">Nationality:</label>
		<input type="text" id="nationality" name="nationality" >

		<label for="phone">Phone Number:</label>
		<input type="tel" id="phone" name="phone" >

		<label for="email">Email Address:</label>
		<input type="email" id="email" name="email" >

		<label for="hotel">Hotel Name & Address:</label>
		<textarea id="hotel" name="hotel" rows="4" ></textarea>

		<label for="pickup">Pick-up Time:</label>
		<input type="time" id="pickup" name="pickup" >

		<label for="date">Date of Tour:</label>
		<input type="date" id="date" name="date" >

		<label for="group">Number of Group (Adult and Children):</label>
		<input type="number" id="group" name="group" >

		<label for="tour">Name of Tour/Activity:</label>
                <select id="tour" name="tour" >
                <option value="">-- Please select --</option>
                <option value="tour1">Tour 1</option>
                <option value="tour2">Tour 2</option>
                <option value="tour3">Tour 3</option>

		<label for="info">Additional Information:</label>
		<textarea id="info" name="info" rows="4"></textarea>

		
		<input type="submit" value="Submit" name="submit">
	</form>

	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>