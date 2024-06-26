<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion
    header('Location: index.php?page=login');
    exit;
}
?>

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
                    <img src="images/canne_carpe.jpg" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Nom : Canne à Carpe</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="images/canne_spinning.jpg" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Nom : Canne Spinning</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4 col-sm-6 col-12">
                <div class="card">
                    <img src="images/canne_coup.jpg" class="card-img-top">
                    <div class="card-body">
                        <p class="card-text">Nom : Canne au Coup</p>
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
