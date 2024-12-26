<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="icon" href="../public/image/icons/title-icon.png" type="image/png">
    <title>Login Form</title>
    <link rel="stylesheet" href="../public/css/login-page.css">
</head>
<body>

<div class="container">
	<div class="screen">
		<div class="screen__content">
			<form class="login" action="../app/login/action-login.php" method="post">
                  <!-- <?php
                    session_start();
                    if (isset($_SESSION['error_message'])) {
                        echo $_SESSION['error_message'] ;
                        unset($_SESSION['error_message']);
                    }
                   ?>	 -->
				<div class="login__field">
					<i class="login__icon fas fa-user"></i>
					<input type="text" class="login__input" placeholder="User" name="username">
				</div>
				<div class="login__field">
						<i class="login__icon fas fa-lock"></i>
						<input type="password" class="login__input" placeholder="Password" name="password">
				</div>
				 <button class="button login__submit" type="submit">
					<span class="button__text">Log In</span>
					<i class="button__icon fas fa-chevron-right"></i>
				</button>	
			 </form>
		</div>
			<div class="screen__background">
				<span class="screen__background__shape screen__background__shape4"></span>
				<span class="screen__background__shape screen__background__shape3"></span>		
				<span class="screen__background__shape screen__background__shape2"></span>
				<span class="screen__background__shape screen__background__shape1"></span>
		    </div>		
	</div>
</div>
</body>