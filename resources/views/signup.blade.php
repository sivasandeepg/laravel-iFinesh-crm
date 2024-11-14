<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8">
	<title> Responsive Registration Form | CodingLab </title>
	<link rel="stylesheet" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
	<script src="https://code.jquery.com/jquery-2.1.3.js"></script>


	<style>
		@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');

		* {
			margin: 0;
			padding: 0;
			box-sizing: border-box;
			font-family: 'Poppins', sans-serif;
		}

		body {
			height: 100vh;
			display: flex;
			justify-content: center;
			align-items: center;
			padding: 10px;
			background: linear-gradient(135deg, #71b7e6, #9b59b6);
		}

		.container {
			max-width: 700px;
			width: 100%;
			background-color: #fff;
			padding: 25px 30px;
			border-radius: 5px;
			box-shadow: 0 5px 10px rgba(0, 0, 0, 0.15);
		}

		.container .title {
			font-size: 25px;
			font-weight: 500;
			position: relative;
		}

		.container .title::before {
			content: "";
			position: absolute;
			left: 0;
			bottom: 0;
			height: 3px;
			width: 30px;
			border-radius: 5px;
			background: linear-gradient(135deg, #71b7e6, #9b59b6);
		}

		.content form .user-details {
			display: flex;
			flex-wrap: wrap;
			justify-content: space-between;
			margin: 20px 0 12px 0;
		}

		form .user-details .input-box {
			margin-bottom: 15px;
			width: calc(100% / 2 - 20px);
		}

		form .input-box span.details {
			display: block;
			font-weight: 500;
			margin-bottom: 5px;
		}

		.user-details .input-box input {
			height: 45px;
			width: 100%;
			outline: none;
			font-size: 16px;
			border-radius: 5px;
			padding-left: 15px;
			border: 1px solid #ccc;
			border-bottom-width: 2px;
			transition: all 0.3s ease;
		}

		.user-details .input-box input:focus,
		.user-details .input-box input:valid {
			border-color: #9b59b6;
		}

		form .gender-details .gender-title {
			font-size: 20px;
			font-weight: 500;
		}

		form .category {
			display: flex;
			width: 80%;
			margin: 14px 0;
			justify-content: space-between;
		}

		form .category label {
			display: flex;
			align-items: center;
			cursor: pointer;
		}

		form .category label .dot {
			height: 18px;
			width: 18px;
			border-radius: 50%;
			margin-right: 10px;
			background: #d9d9d9;
			border: 5px solid transparent;
			transition: all 0.3s ease;
		}

		#dot-1:checked~.category label .one,
		#dot-2:checked~.category label .two,
		#dot-3:checked~.category label .three {
			background: #9b59b6;
			border-color: #d9d9d9;
		}

		#dot-4:checked~.category label .one,
		#dot-5:checked~.category label .two,
		#dot-6:checked~.category label .three {
			background: #9b59b6;
			border-color: #d9d9d9;
		}

		form input[type="radio"] {
			display: none;
		}

		form input[type="checkbox"] {
			display: none;
		}

		form .button {
			height: 45px;
			margin: 35px 0
		}

		form .button input {
			height: 100%;
			width: 100%;
			border-radius: 5px;
			border: none;
			color: #fff;
			font-size: 18px;
			font-weight: 500;
			letter-spacing: 1px;
			cursor: pointer;
			transition: all 0.3s ease;
			background: linear-gradient(135deg, #71b7e6, #9b59b6);
		}

		form .button input:hover {
			/* transform: scale(0.99); */
			background: linear-gradient(-135deg, #71b7e6, #9b59b6);
		}

		#header {
			display: flex;
			justify-content: space-between;
		}

		@media(max-width: 584px) {
			.container {
				max-width: 100%;
			}

			form .user-details .input-box {
				margin-bottom: 15px;
				width: 100%;
			}

			form .category {
				width: 100%;
			}

			.content form .user-details {
				max-height: 300px;
				overflow-y: scroll;
			}

			.user-details::-webkit-scrollbar {
				width: 5px;
			}
		}

		@media(max-width: 459px) {
			.container .content .category {
				flex-direction: column;
			}
		}
	</style>
</head>


<body>

	<div class="container">

		<div id="header">
			<div class="title">Registration</div>
			<div class="alert alert-danger print-error-msg" style="display:none"></div>
			<div class="alert alert-success print-error-msg1" style="display:none"></div>
		</div>
		<div class="content">
			<!-- <center><span style="color:red" id="logerror"></span></center>  -->

			<form action="" method="POST" id="signup_submit">
				@csrf

				<div class="user-details ">
					<div class="input-box">
						<span class="details">Full Name</span>
						<input type="text" name="name" id="name" placeholder="Enter your name" onkeyup="this.setAttribute('value', this.value);" pattern="[A-Za-z0-9]{1}[ A-Za-z0-9\S]{3,50}">

					</div>

					<div class="input-box">
						<span class="details">Email</span>
						<input type="text" name="email" id="email" placeholder="Enter your email" onkeyup="this.setAttribute('value', this.value);" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,15}$">
					</div>

					<div class="input-box">
						<span class="details">Date Of Birth</span>
						<input type="date" name="dob" id="dob" placeholder="Enter your username">

					</div>

					<!-- <div class="input-box">
						<span class="details">Phone Number</span>
						<input type="text"  placeholder="Enter your number" pattern="[0-9]{10,10}" >
					</div> -->
					<div class="input-box">
						<span class="details">Password</span>
						<input type="text" name="password" id="password" placeholder="Enter your password">
					</div>
					<!-- <div class="input-box">
						<span class="details">Confirm Password</span>
						<input type="text" placeholder="Confirm your password" >
					</div> -->
				</div>

				<div class="gender-details">
					<input type="radio" name="gender" class="gender" id="dot-1" value="male">
					<input type="radio" name="gender" class="gender" id="dot-2" value="femail">
					<input type="radio" name="gender" class="gender" id="dot-3" value="other">
					<span class="gender-title">Gender</span>
					<div class="category">
						<label for="dot-1">
							<span class="dot one"></span>
							<span class="gender">Male</span>
						</label>
						<label for="dot-2">
							<span class="dot two"></span>
							<span class="gender">Female</span>
						</label>
						<label for="dot-3">
							<span class="dot three"></span>
							<span class="gender">Prefer not to say</span>
						</label>
					</div>
				</div>

				<div class="gender-details">
					<input type="checkbox" name="language" id="dot-4" value="english">
					<input type="checkbox" name="language" id="dot-5" value="hindi">
					<input type="checkbox" name="language" id="dot-6" value="telugu">
					<span class="gender-title">Language's</span>
					<div class="category">
						<label for="dot-4">
							<span class="dot one"></span>
							<span class="gender">English</span>
						</label>
						<label for="dot-5">
							<span class="dot two"></span>
							<span class="gender">Hindi</span>
						</label>
						<label for="dot-6">
							<span class="dot three"></span>
							<span class="gender">Telugu</span>
						</label>
					</div>
				</div>

				<input type="hidden" name="hidden_result" value="" />
				<center><i class="fa fa-spinner fa-spin" id="spinner_signup" style="display:none"></i></center>



				<div class="button">
					<input type="submit" id="signup" value="Register">
				</div>
			</form>

			<big>Already have an account? <span><a class="red-text" href="signout">Login</a></span></big>
		</div>
	</div>

</body>

</html>


<script type="text/javascript">
	$(document).ready(function() {

		$("#signup_submit").submit(function(event) {
			event.preventDefault();

			var language = [];
			language = $("input[name='language']:checked").map(function() {
				return this.value;
			}).get().join(', ');

			$.ajax({

				url: "/api/auth/register",
				type: "post",
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}, 
				data: {
					name: $('#name').val(),
					email: $('#email').val(),
					dob: $('#dob').val(),
					gender: $('.gender').val(),
					password: $('#password').val(),
					language: language
				},

				success: function(response) {
					if (response.status === 'error') {
						$('.print-error-msg').css('display', 'block')
						$('.print-error-msg').html(response.error)
						setTimeout(function() {
							$('.print-error-msg').hide()
						}, 2000)
					} else if (response.status === 'success') {
						$('.print-error-msg1').css('display', 'block')
						$('.print-error-msg1').html(response.message)
						setTimeout(function() {
							$('.print-error-msg1').hide()
						}, 2000)
					}
				},
				error: function(jqXHR, textStatus, errorThrown) {
					// debugger;
					event.preventDefault();
				}
			});

		});
	});
</script>