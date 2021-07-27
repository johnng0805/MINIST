<?php

use app\core\Application;

?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/styles/main.css">
</head>

<body>
    <div>
        <!--Navbar Begin-->
        <nav>
            <div class="logo">
                <h4>Minist</h4>
            </div>
            <ul class="nav-links">
                <li>
                    <a href="#">Home</a>
                </li>
                <li>
                    <a href="#">Cart</a>
                </li>
                <li>
                    <a href="#">Categories</a>
                </li>
                <li>
                    <div class="dropdown">
                        <?php if (Application::isGuest()) : ?>
                            <button class="dropdownBtn">
                                User <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-links">
                                <a href="/login">Login</a>
                                <a href="/register">Register</a>
                            </div>
                        <?php else : ?>
                            <button class="dropdownBtn">
                                <?php echo Application::$app->dbModel->getDisplayName(); ?> <i class="fa fa-caret-down"></i>
                            </button>
                            <div class="dropdown-links">
                                <a href="/logout">Logout</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </li>
            </ul>
            <div class="burger">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
        </nav>
        <!--Navbar End-->
        {{content}}
        <footer>
            <div class="footer__bottom">
                <h5>Designed by @johnng0805</h5>
            </div>
        </footer>
    </div>
</body>

</html>