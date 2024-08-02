<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page 505 AksesKu</title>
    <!-- Style -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/505.css">
    <!-- fontawesome -->
    <script src="https://kit.fontawesome.com/2eac411ba8.js" crossorigin="anonymous"></script>


</head>
<body>
<!-- stars -->
<div class="star position-absolute d-flex flex-column">
    <i class="fa fa-star fa-2x"></i>
    <i class="fa fa-star fa-2x"></i>
    <i class="fa fa-star fa-2x"></i>
    <i class="fa fa-star fa-2x"></i>
    <i class="fa fa-star fa-2x"></i>
</div>
<main class="main">
    <!-- 404 text -->
    <div class="text-404 d-inline-flex">
        <h1>5</h1>
        <h1 class="Earth"></h1>
        <h1>5</h1>
    </div>
    <!-- Description and timer -->
    <span class="description d-block my-1">We are lost in space!</span>
    <!-- Back button -->
    <a href="../../index.html" onclick="launch()" class="btn btn-outline-light my-3">Back to earth <i class="fa fa-rocket"></i></a>
    <!-- rocket -->
    <span id="rocket" class="rocket position-absolute"></span>
</main>
<!-- Astronauts -->
<span class="Astronaut position-absolute"></span>
<span class="Astronaut2 position-absolute"></span>
<!-- Meteorite -->
<span class="Meteorite position-absolute"></span>
<!-- launch rocket script -->
<script>
    function launch() {
        let rocket = document.getElementById("rocket");
        rocket.classList.add("launch");
    }
</script>
</body>
</html>