
<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Login Form | CodingLab </title>
    <link rel="stylesheet" href="style.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
         <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://code.jquery.com/jquery-2.1.3.js"></script>  
   

<style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins',sans-serif;
}
body{
  height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.container{
  max-width: 700px;
  width: 100%;
  background-color: #fff;
  padding: 25px 30px;
  border-radius: 5px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.15);
}
.container .title{
  font-size: 25px;
  font-weight: 500;
  position: relative;
}
.container .title::before{
  content: "";
  position: absolute;
  left: 0;
  bottom: 0;
  height: 3px;
  width: 30px;
  border-radius: 5px;
  background: linear-gradient(135deg, #71b7e6, #9b59b6);
}
.content form .user-details{
  display: flex;
  flex-wrap: wrap;
  justify-content: space-between;
  margin: 20px 0 12px 0;
}
form .user-details .input-box{
  margin-bottom: 15px;
  width: calc(100% / 2 - 20px);
}
form .input-box span.details{
  display: block;
  font-weight: 500;
  margin-bottom: 5px;
}
.user-details .input-box input{
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
.user-details .input-box input:valid{
  border-color: #9b59b6;
}
 form .gender-details .gender-title{
  font-size: 20px;
  font-weight: 500;
 }
 form .category{
   display: flex;
   width: 80%;
   margin: 14px 0 ;
   justify-content: space-between;
 }
 form .category label{
   display: flex;
   align-items: center;
   cursor: pointer;
 }
 form .category label .dot{
  height: 18px;
  width: 18px;
  border-radius: 50%;
  margin-right: 10px;
  background: #d9d9d9;
  border: 5px solid transparent;
  transition: all 0.3s ease;
}
 #dot-1:checked ~ .category label .one,
 #dot-2:checked ~ .category label .two,
 #dot-3:checked ~ .category label .three{
   background: #9b59b6;
   border-color: #d9d9d9;
 }
 form input[type="radio"]{
   display: none;
 }
 form .button{
   height: 45px;
   margin: 35px 0
 }
 form .button input{
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
 form .button input:hover{
  /* transform: scale(0.99); */
  background: linear-gradient(-135deg, #71b7e6, #9b59b6);
  }
 @media(max-width: 584px){
 .container{
  max-width: 100%;
}
form .user-details .input-box{
    margin-bottom: 15px;
    width: 100%;
  }
  form .category{
    width: 100%;
  }
  .content form .user-details{
    max-height: 300px;
    overflow-y: scroll;
  }
  .user-details::-webkit-scrollbar{
    width: 5px;
  }
  }
  @media(max-width: 459px){
  .container .content .category{
    flex-direction: column;
  }
} 
  </style>
  
   </head>
<body>
  <div class="container">
  <div class="alert alert-danger print-error-msg" style="display:none"></div>
  <!-- resources/views/layouts/app.blade.php -->

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@yield('content')
 

    <div class="title">Dash Bord</div>
    <div class="content">

    <big> <span><a class="red-text" href="login">signout</a></span></big>
    
    <p> {{$webdashbordfirst1[2]}} </p>
    <p> {{$webdashbordfirst2[2]}} </p>

   <p> =======foreach with out key  array=========== </p>  

     @foreach ($webdashbordget1 as $item)
   <p> {{$item}} </p>
    @endforeach

    <p> =======arrays that use named keys that you assign to them=========== </p>  

    @foreach ($dashbordget2 as $item)
   <p> {{$item}} </p> 
    @endforeach

    <p> =======To loop through and print all the values of an associative array, you could use a foreach loop=========== </p>  

    @foreach ($dashbordget2 as $item =>$item_value)
   <p> key is:  {{$item}}  , value is: {{$item_value}} </p> 
    @endforeach
    
  
    </div>
  </div>

</body>
</html>   

<script type="text/javascript">
$("#login_submit").click(function(e){
		e.preventDefault();
		$("#spinner_login").show();
        var credentials = {email :$("input[name='useremail']").val() , password: $("input[name='userpassword']").val(),page :"ifinish" };
		//debugger;
		$.ajax({ 
			url: "/api/auth/userlogin",
			type: "post",
			data: credentials ,
			success: function (response) {
				$("#spinner_login").hide();
				//debugger;
				if(typeof response =='object' && response.Status == 'success') {

					// alert("welcome");
						window.location.href = response.url;
			   } else { 
				// alert("wrong password");
				$('#logerror').html(response.message);
					$('#logerror').show();
					return false; 
			   }
			},
			error: function(jqXHR, textStatus, errorThrown) {
			   console.log(textStatus, errorThrown);
			} 

		});
    });
</script> 

<?php
if (isset($_COOKIE['access_token'])) {
    $token = $_COOKIE['access_token'];
} else {
    $token = "";
}

//$sessionid = auth()->user()->session_id;
?> 