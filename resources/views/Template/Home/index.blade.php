<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page E-Commerce</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('assets/css/home.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<body>
    
    <div class="contanier">
        @include('Template.Home.navbar')

        <div class="content">
            <div class="div-text">
                <span>outfit of the day</span>
                <h3>all your</h3>
                <h1>styles are here</h1>
                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. <br> 
                    Doloremque unde sunt eum illum ab tempora illo iure sequi <br> minus culpa.</p>
                    <a href="#" class="btn">buy now</a>
            </div>

            <div class="div-img">
                <img id="big-img" src="{{ asset('img/jacket1.png') }}" alt="">
            </div>

            <div class="small-img">
                <img onclick="myTshirt(this.src)" src="{{ asset('img/jacket1.png') }}" alt="">
                <img onclick="myTshirt(this.src)" src="{{ asset('img/jacket2.png') }}" alt="">
                <img onclick="myTshirt(this.src)" src="{{ asset('img/jacket3.png') }}" alt="">
            </div>
        </div>
    </div>
    <div class="row justify-content-center mb-3">
        <h1 class="mt-3 mb-3 text-center">Produk Terbaru</h1>
                <div class="container-produk">
                    <div class="row">
                        <div class="col-md-4" style="width: 1200px">
                            <div class="card">
                                <img src="https://demo.saudagarwp.com/wp-content/uploads/sites/2/2019/01/bag-navy-3-300x300.webp" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Messanger Bag</h5>
                                    <p class="card-text">Rp 10.000</p>
                                    <a href="#" class="btn btn-primary">Read More...</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="https://demo.saudagarwp.com/wp-content/uploads/sites/2/2019/01/ripple-blue-4.webp" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Cuman Baju v1</h5>
                                    <p class="card-text">Rp 10.000</p>
                                    <a href="#" class="btn btn-primary">Read More...</a>
                                </div>
                            </div>
                            <div class="card">
                                <img src="https://demo.saudagarwp.com/wp-content/uploads/sites/2/2019/01/ripple-blue-4.webp" alt="">
                                <div class="card-body">
                                    <h5 class="card-title">Cuman Baju v1</h5>
                                    <p class="card-text">Rp 10.000</p>
                                    <a href="#" class="btn btn-primary">Read More...</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    </div>
    <script>
        let bigImage = document.getElementById('big-img');

        function myTshirt(shirt){
            bigImage.src = shirt
        }
    </script>
</body>
</html>