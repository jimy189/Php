<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Bootstrap Navbar Dropdown Login and Signup Form with Social Buttons</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <style>
        body {
            font-family: 'Varela Round', sans-serif;
        }
        
        .form-control {
            box-shadow: none;
            font-weight: normal;
            font-size: 13px;
        }
        
        .navbar {
            background: #fff;
            padding-left: 16px;
            padding-right: 16px;
            border-bottom: 1px solid #dfe3e8;
            border-radius: 0;
        }
        
        .nav-link img {
            border-radius: 50%;
            width: 36px;
            height: 36px;
            margin: -8px 0;
            float: left;
            margin-right: 10px;
        }
        
        .navbar .navbar-brand {
            padding-left: 0;
            font-size: 20px;
            padding-right: 50px;
        }
        
        .navbar .navbar-brand b {
            color: #33cabb;
        }
        
        .navbar .form-inline {
            display: inline-block;
        }
        
        .navbar a {
            color: #888;
            font-size: 15px;
        }
        
  

        
        .navbar .sign-up-btn {
            min-width: 110px;
            max-height: 36px;
        }
        
        .navbar .dropdown-menu {
            color: #999;
            font-weight: normal;
            border-radius: 1px;
            border-color: #e5e5e5;
            box-shadow: 0 2px 8px rgba(0, 0, 0, .05);
        }
        
        .navbar a,
        .navbar a:active {
            color: #888;
            padding: 8px 20px;
            background: transparent;
            line-height: normal;
        }
        
        .navbar .navbar-form {
            border: none;
        }
        
        .navbar .action-form {
            width: 280px;
            padding: 20px;
            left: auto;
            right: 0;
            font-size: 14px;
        }
        
        .navbar .action-form a {
            color: #33cabb;
            padding: 0 !important;
            font-size: 14px;
        }
        
        .navbar .action-form .hint-text {
            text-align: center;
            margin-bottom: 15px;
            font-size: 13px;
        }
        
        .navbar .btn-primary,
        .navbar .btn-primary:active {
            color: #fff;
            background: #33cabb !important;
            border: none;
        }
        
        .navbar .btn-primary:hover,
        .navbar .btn-primary:focus {
            color: #fff;
            background: #31bfb1 !important;
        }
        
        .navbar .social-btn .btn,
        .navbar .social-btn .btn:hover {
            color: #fff;
            margin: 0;
            padding: 0 !important;
            font-size: 13px;
            border: none;
            transition: all 0.4s;
            text-align: center;
            line-height: 34px;
            width: 47%;
            text-decoration: none;
        }
        
        .navbar .social-btn .facebook-btn {
            background: #507cc0;
        }
        
        .navbar .social-btn .facebook-btn:hover {
            background: #4676bd;
        }
        
        .navbar .social-btn .twitter-btn {
            background: #64ccf1;
        }
        
        .navbar .social-btn .twitter-btn:hover {
            background: #4ec7ef;
        }
        
        .navbar .social-btn .btn i {
            margin-right: 5px;
            font-size: 16px;
            position: relative;
            top: 2px;
        }
        
        .or-seperator {
            margin-top: 32px;
            text-align: center;
            border-top: 1px solid #e0e0e0;
        }
        
        .or-seperator b {
            color: #666;
            padding: 0 8px;
            width: 30px;
            height: 30px;
            font-size: 13px;
            text-align: center;
            line-height: 26px;
            background: #fff;
            display: inline-block;
            border: 1px solid #e0e0e0;
            border-radius: 50%;
            position: relative;
            top: -15px;
            z-index: 1;
        }
        
        .navbar .action-buttons .dropdown-toggle::after {
            display: none;
        }
        
        .form-check-label input {
            position: relative;
            top: 1px;
        }
        
        @media (min-width: 1200px) {
            .form-inline .input-group {
                width: 300px;
                margin-left: 30px;
            }
        }
        
        @media (max-width: 768px) {
            .navbar .dropdown-menu.action-form {
                width: 100%;
                padding: 10px 15px;
                background: transparent;
                border: none;
            }
            .navbar .form-inline {
                display: block;
            }
            .navbar .input-group {
                width: 100%;
            }
        }
    </style>
    <script>
        // Prevent dropdown menu from closing when click inside the form
        $(document).on("click", ".action-buttons .dropdown-menu", function(e) {
            e.stopPropagation();
        });
    </script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-dark navbar-inverse navbar-fixed-top">
        <a href="#" class="navbar-brand text-white">Hotel<b>Premium</b></a>
        <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
		<span class="navbar-toggler-icon"></span>
	</button>
        <!-- Collection of nav links, forms, and other content for toggling -->
        <div id="navbarCollapse" class="collapse navbar-collapse justify-content-start">
            <div class="navbar-nav">
                <li><a href="index.php">Reserva</a></li>
                <li><a href="cliente.php">Cliente</a></li>
                <li><a href="funcionario.php">Funcionario</a></li>
                <li><a href="quarto.php">Quarto</a></li>             
            </div>

            <div class="navbar-nav ml-auto action-buttons">
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle mr-4 text-white" >Login</a>
                    <div class="dropdown-menu action-form">
                        <form action="/examples/actions/confirmation.php" method="post">
                            <p class="hint-text">Sign in with your social media account</p>
                            <div class="form-group social-btn clearfix">
                                <a href="#" class="btn btn-secondary facebook-btn float-left"><i class="fa fa-facebook"></i> Facebook</a>
                                <a href="#" class="btn btn-secondary twitter-btn float-right"><i class="fa fa-twitter"></i> Twitter</a>
                            </div>
                            <div class="or-seperator"><b>or</b></div>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required="required">
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Login">
                            <div class="text-center mt-2">
                                <a href="#">Forgot Your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="nav-item dropdown">
                    <a href="#" data-toggle="dropdown" class="btn btn-primary dropdown-toggle sign-up-btn">Sign up</a>
                    <div class="dropdown-menu action-form">
                        <form action="/examples/actions/confirmation.php" method="post">
                            <p class="hint-text">Fill in this form to create your account!</p>
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Password" required="required">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Confirm Password" required="required">
                            </div>
                            <div class="form-group">
                                <label class="form-check-label"><input type="checkbox" required="required"> I accept the <a href="#">Terms &amp; Conditions</a></label>
                            </div>
                            <input type="submit" class="btn btn-primary btn-block" value="Sign up">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</body>

</html>





</body>
</html>