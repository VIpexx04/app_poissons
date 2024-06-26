<html>
<head>
    <style>
        .card {
            margin: 10px;
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        .card img {
            width: 100%;
            height: 300px;
            max-height: 300px;
            object-fit: contain;
        }
        .card-body {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            flex-direction: column;
        }
        .card-text {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="images/categories/cat_appats.jpg" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Catégorie : Appâts</p>
                        <a href="index.php?page=appats" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="images/categories/cat_cannes.jpg" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Catégorie : Cannes</p>
                        <a href="index.php?page=cannes" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="images/categories/cat_poissons.jpg" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Catégorie : Poissons</p>
                        <a href="index.php?page=poissons" class="btn btn-primary">Voir plus</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>