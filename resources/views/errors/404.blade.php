<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Page 404 Abstract</title>
    <!--Style-->
    <link rel="stylesheet" href="../../assets/css/404.css">
</head>
<body>

<!--Square-->
<div class="Square404" id="Square">
    <div class="Square">
        <!--404 inside the square-->
        <h1>404</h1>
    </div>
</div>

<!--Texts-->
<div class="texts">
    <h4>Oops! Page not found</h4>
    <p>The page you are looking for does not exist. Go back to the main page or search.</p>
    <button onclick="history.back()" class="btn">Go Back</button>
    <!-- <a href="../../index.html" class="btn" onclick="history.back()" >Back to Home</a> -->
    <label for="search_box"></label><input type="search" name="search" id="search_box" placeholder="Search">
</div>

<script>
    let container1 = document.getElementById('Square');
    <!--The main square movement script when moving the mouse-->
    window.onmousemove = function (e) {
        let x = -e.x / 90,
            y = -e.y / 90;

        container1.style.right = x + 'px';
        container1.style.bottom = y + 'px';
    }
    /* Mobile gyroscope */
    window.addEventListener("deviceorientation", function (e) {
        container1.style.right = e.gamma / 3 + "px";
        container1.style.bottom = e.beta / 3 + "px";
    });
</script>
</body>
</html>
