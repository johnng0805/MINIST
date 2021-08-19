    <div class="content__wrap">
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
                                    <h4 class="cards__item__title"><a href="#">Item Title</a></h4>
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
    </div>
    <script>
        $(function() {
            $(".burger").click(function() {
                $(".nav-links").toggleClass("nav-active");
                $(".burger").toggleClass("toggle");
            });
            $.get("/test", function(data) {
                $.each(JSON.parse(data), function(key, value) {
                    var id = value.id;
                    var name = value.name;
                    var price = value.price;

                    $.get(`/image?id=${id}`, function(data) {
                        var images = JSON.parse(data);
                        var firstImg = images[0].image;

                        $(".cards__items").append(`
                        <li class="cards__item">
                            <div class="cards__item__link">
                                <figure class="cards__item__figure">
                                    <img src="./assets/upload/${firstImg}" alt="Item" class="cards__item__img">
                                </figure>
                                <div class="cards__item__info">
                                    <h4 class="cards__item__title"><a href="/product?id=${id}">${name}</a></h4>
                                    <p class="cards__item__price">$${price}</p>
                                </div>
                            </div>
                        </li>
                        `);
                    });
                });
            });
        });
    </script>