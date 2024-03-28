<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    
    @include('Template.Home.navbar')
    
    <div class="contanier">
        @yield('content')
    </div>

    <div class="container">
        @yield('content-product')
    </div>

    <footer>
        <style>
            .content-bot{
            color: #f2f2f2;
            display: flex;
            background-color: #668A89;
            width: 100%;
        }
        </style>
        <div class="content-bot mt-3">
            <p class="text-center mt-3" style="font-size: 16px; padding: 0; padding-left: 39.5%; margin-bottom: 20px;">© Copyright Saudagar 2024. All right reserved.</p>
        </div>
    </footer>

    <script>
        let bigImage = document.getElementById('big-img');

        function myTshirt(shirt){
            bigImage.src = shirt
        }
    </script>
</body>
</html>