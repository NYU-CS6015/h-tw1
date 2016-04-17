<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TweetBud</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100,200,300,500,600,700,800,900|Montserrat:400,700' rel='stylesheet' type='text/css'>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet">
</head>
<body id="landing">
    <nav class="navbar navbar-default fixed-top-navbar">
        <div class="container">
            <div class="navbar-header">                
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>                
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fa fa-twitter fa-1x" aria-hidden="true"></i>&nbsp;TweetBud
                </a>
            </div>
            <div class="collapse navbar-collapse" id="app-navbar-collapse">                
                <ul class="nav navbar-nav navbar-right">
                    <li><a class="interaction" href="#" data-toggle="modal" data-target="#login">Login</a></li>
                    <li><a class="interaction" href="/register">Register</a></li>                    
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-md-10 col-md-offset-1">  
                <div class="jumbotron jumbo-trans">
                    <p class="text-center">
                        <i class="fa fa-twitter fa-5x" aria-hidden="true"></i> 
                    </p>
                    <p class="text-center">Find</p>
                    <p class="text-center" id="ticker">
                        
                    </p>
                </div>                          
            </div>
        </div>
    </div>

    @include('includes.loginmodal')

    <!-- JavaScripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="{{asset('assets/js/tickerscrambler.js')}}"></script>
    <script type="text/javascript">
        var el = document.getElementById('ticker');
        var ticker = new TickerScrambler(el, {list: ['community','conversation','inspiration']});                        
    </script>
    <script type="text/javascript">
        @if (count($errors) > 0)
            $('#login').modal('show');
        @endif
    </script>
</body>
</html>
