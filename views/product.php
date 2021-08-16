<div class="item__container">
    <div class="item__img__container">
        <div id="item__img__slider" class="carousel slide" data-ride="carousel">
            <div class="carousel-indicators">
                <button type="button" data-bs-target="#item__img__slider" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                <button type="button" data-bs-target="#item__img__slider" data-bs-slide-to="1" aria-label="Slide 2"></button>
            </div>
            <div class="carousel-inner">
                <?php
                foreach ($image as $key => $item) {
                    if ($key == 0) {
                        echo '<div class="carousel-item active">';
                        echo '<img src="./assets/upload/' . $item["image"] . '"' . ' alt="Item" class="">';
                        echo '</div>';
                    } else {
                        echo '<div class="carousel-item">';
                        echo '<img src="./assets/upload/' . $item["image"] . '"' . ' alt="Item" class="">';
                        echo '</div>';
                    }
                }
                ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#item__img__slider" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#item__img__slider" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <div class="item__info__container">
        <h2><?php echo $product[0]["name"]; ?></h2>
        <h5>Price: <span>$<?php echo $product[0]["price"]; ?></span></h5>
        <div class="item__detail__container">
            <h4>Detail:</h4>
            <p><?php echo $product[0]["description"]; ?></p>
        </div>
        <div class="item__btn__container">
            <button class="addBtn">Add to Cart</button>
            <button class="commentBtn">Write a review</button>
        </div>
    </div>
</div>
<div class="related__item__container">
    <h2>You might also like...</h2>
    <div class="related__item__slider">
        <ul class="related__items">

        </ul>
    </div>
</div>
<script>
    $(function() {
        $.get("/test", function(data) {
            $.each(JSON.parse(data), function(key, value) {
                var id = value.id;
                var name = value.name;
                var price = value.price;

                $.get(`/image?id=${id}`, function(data) {
                    var images = JSON.parse(data);
                    var firstImage = images[0].image;

                    $(".related__items").append(`
                    <li class="related__item">
                        <div class="related__item__link">
                        <figure class="related__item__figure">
                            <img src="./assets/upload/${firstImage}" alt="Item" class="related__item__img">
                        </figure>
                        <div class="related__item__info">
                            <a href="/product?id=${id}">${name}</a>
                            <p>$${price}</p>
                        </div>
                        </div>
                    </li>
                    `)
                })
            })
        })
    })
</script>