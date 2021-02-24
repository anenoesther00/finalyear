<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>HRently</title>

        <?php   
        include "../include/css_template.php";?>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, 

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
    <div class="hero-wrap js-fullheight" style="background-image: url('../img/image 3.jpg');background-repeat:no-repeat; background-size: cover;">

        <div class="flex-center position-ref full-height">
           

            <div class="content">
                <div class="title m-b-md">
                    HRently
                </div>
                
    <div class="container h-100">
      <div class="row h-100 align-items-center justify-content-center text-center">
        <div class="col-lg-10 align-self-end">
          <hr class="divider my-4">
        </div>
        <div class="col-lg-8 align-self-baseline">
        @if (Route::has('login'))
                <div class="links">
                    @auth
                        <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-primary btn-xl js-scroll-trigger" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

      
        </div>
      </div>
    </div>

                
                   
                </div>
            </div>
        </div>
        <?php
	include "../include/footer_templates.php";
?>
    </body>
    
<?php include "../include/js_template.php"?>
    </div>
    


 

</html>
