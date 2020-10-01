<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">       

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

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
            ul > li {
                font-size: 22px;
            }

            .arrow-down {
                width: 100%;
                margin: 0 auto;
                text-align: center;
            }

            .arrow-down::after {
                content: "";
                width: 40px;
                height: 40px;
                position: absolute;
                margin: auto;
                top: 0;
                right: 0;
                bottom: 0;
                left: 0;
                border-right: 4px solid rgb(52, 144, 220);
                border-bottom: 4px solid rgb(52, 144, 220);
                -webkit-transform: rotate(45deg);
                animation: 3s arrow infinite ease;
                
            }

            @-webkit-keyframes arrow {
                0%, 100% {
                    top: 50px;
                }
                50% {
                    top: 80px;
                }
            }
            @keyframes arrow {
                0%, 100% {
                    top: 50px;
                }
                50% {
                    top: 80px;
                }
            }

            img {
                border-radius: 8px;
            }

        </style>
        
    </head>
    <body>
    <div class="content" style="padding: 0 20px;">
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="https://upisi.fpmoz.sum.ba/img/fpmoz.8412a0f7.png" width="170" height="60" class="d-inline-block align-top" alt="" loading="lazy">
        </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav ml-auto">
                   
                    <li class="nav-item">
                        <a class="nav-link" href="#">Blog</a>
                    </li> 
                    
                    @if (Route::has('login'))
                    <li class="nav-item">
                        @auth
                            <a class="nav-link" href="{{ url('/home') }}">Home </a>
                            @else
                            <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li>
                            @if (Route::has('register'))
                                <a class="nav-link" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth

                    </li>
                    @endif

                    {{--@auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a class="nav-link" href="{{ route('login') }}">Login</a>
                    </li>
                    <li class="nav-item">
                    @if (Route::has('register'))
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>
                    @endif
                    @endauth --}}
                </ul>
            </div>
            </nav>

            <div class="row">
                <div class="col" style="min-height:250px;">
                    <h4>Lorem ipsum</h4>
                    <h1 style="color:rgb(52, 144, 220)">Welcome to Web Page </h1>
                    <div class="arrow-down">

                    </div>
                </div>
            </div>        

            <div class="row">
                <div class="col-sm">
                    <div class="card mb-3" style="border: 1px solid rgb(52, 144, 220)">
                        <h3 class="card-header">Card header</h3>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                        </div>
                        <img style="height: 250px; width: 85%; margin:0 auto; display: block;" src="https://www.unhcr.org/thumb1/5a1e75d74.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                        
                        
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                    
                </div>
                <div class="col-sm">
                    <div class="card mb-3" style="border: 1px solid rgb(52, 144, 220)">
                            <h3 class="card-header">Card header</h3>
                            <div class="card-body">
                                <h5 class="card-title">Special title treatment</h5>
                                <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                            </div>
                            <img style="height: 250px; width: 85%; margin:0 auto; display: block;" src="https://etimg.etb2bimg.com/photo/75729614.cms" alt="Card image">
                            <div class="card-body">
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                            
                            
                            <div class="card-footer text-muted">
                                2 days ago
                            </div>
                        </div>
                    </div>

                <div class="col-sm">
                    <div class="card mb-3" style="border: 1px solid rgb(52, 144, 220)">
                        <h3 class="card-header">Card header</h3>
                        <div class="card-body">
                            <h5 class="card-title">Special title treatment</h5>
                            <h6 class="card-subtitle text-muted">Support card subtitle</h6>
                        </div>
                        <img style="height: 250px; width: 85%; margin:0 auto; display: block;" src="https://iufost.org/wp-content/uploads/2020/05/student-education.jpg" alt="Card image">
                        <div class="card-body">
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                        </div>
                     
                        
                        <div class="card-footer text-muted">
                            2 days ago
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </body>
</html>


