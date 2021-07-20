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
                    <button class="dropdownBtn">
                        User <i class="fa fa-caret-down"></i>
                    </button>
                    <div class="dropdown-links">
                        <a href="#">Login</a>
                        <a href="#">Register</a>
                    </div>
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
    <!--Hero Section Begin-->
    <div class="hero-image">
        <div class="container">
            <h1><span>Minist</span></h1>
            <h3>Empowering your gaming experience</h3>
        </div>
    </div>
    <!--Hero Section End-->
    <div class="cards">
        <h1>Newly Added Items</h1>
        <div class="cards__container">
            <div class="cards__wrapper">
                <ul class="cards__items">
                    <li class="cards__item">
                        <div class="cards__item__link">
                            <figure class="cards__item__figure">
                                <img src="./assets/Images/amoled_wallpaper.jpg" alt="Item" class="cards__item__img">
                            </figure>
                            <div class="cards__item__info">
                                <h4 class="cards__item__title">Item Title</h4>
                                <p class="cards__item__price">0.000.000d</p>
                            </div>
                        </div>
                    </li>
                    <li class="cards__item">
                        <div class="cards__item__link">
                            <figure class="cards__item__figure">
                                <img src="./assets/Images/hero-image.jpg" alt="Item" class="cards__item__img">
                            </figure>
                            <div class="cards__item__info">
                                <h4 class="cards__item__title">Item Title</h4>
                                <p class="cards__item__price">0.000.000d</p>
                            </div>
                        </div>
                    </li>
                    <li class="cards__item">
                        <div class="cards__item__link">
                            <figure class="cards__item__figure">
                                <img src="./assets/Images/amoled_wallpaper.jpg" alt="Item" class="cards__item__img">
                            </figure>
                            <div class="cards__item__info">
                                <h4 class="cards__item__title">Item Title</h4>
                                <p class="cards__item__price">0.000.000d</p>
                            </div>
                        </div>
                    </li>
                    <li class="cards__item">
                        <div class="cards__item__link">
                            <figure class="cards__item__figure">
                                <img src="./assets/Images/hero-image.jpg" alt="Item" class="cards__item__img">
                            </figure>
                            <div class="cards__item__info">
                                <h4 class="cards__item__title">Item Title</h4>
                                <p class="cards__item__price">0.000.000d</p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!--Featured Items Begin-->
        <div class="featured__item__container">
            <div class="featured__item__info">
                <h4>Item Info</h4>
            </div>
        </div>
        <!--Featured Items End-->
        <div class="gallery__container">
            <div class="gallery__item">
                <img src="./assets/Images/amoled_wallpaper.jpg" alt="Item" class="gallery__item__img">
            </div>
            <div class="gallery__item">
                <img src="./assets/Images/amoled_wallpaper.jpg" alt="Item" class="gallery__item__img">
            </div>
        </div>
    </div>
    <footer>
        <div class="footer__bottom">
            <h5>Designed by @johnng0805</h5>
        </div>
    </footer>
</div>
<script>
    $(function() {
        $(".burger").click(function() {
            $(".nav-links").toggleClass("nav-active");
            $(".burger").toggleClass("toggle");
        });
    });
</script>