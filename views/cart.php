<div class="cart__container">
    <h4>Your Cart</h4>
    <div class="cart__table">
        <table id="cartTable">
            <tr>
                <th></th>
                <th>Product</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>

            <tr>
                <td class="cart__item__remove">
                    <i class="far fa-trash-alt"></i>
                </td>
                <td>
                    <img src="./assets/Images/background.jpg" alt="">
                    Product 1
                </td>
                <td>000.000.000</td>
                <td class="cart__item__quantity">
                    <input type="number" value="1" step="1" min="1" max="100" class="input-group">
                </td>
                <td class="cart__item__total">000.000.000</td>
            </tr>
            <tr>
                <td class="cart__item__remove">
                    <i class="far fa-trash-alt"></i>
                </td>
                <td>
                    <img src="./assets/Images/background.jpg" alt="">
                    Product 1
                </td>
                <td>000.000.000</td>
                <td class="cart__item__quantity">
                    <input type="number" value="1" step="1" min="1" max="100" class="input-group">
                </td>
                <td class="cart__item__total">000.000.000</td>
            </tr>
            <tr>
                <td class="cart__item__remove">
                    <i class="far fa-trash-alt"></i>
                </td>
                <td class="cart__item__name">
                    <img src="./assets/Images/background.jpg" alt="">
                    Product 1
                </td>
                <td>000.000.000</td>
                <td class="cart__item__quantity">
                    <input type="number" value="1" step="1" min="1" max="100" class="input-group">
                </td>
                <td class="cart__item__total">000.000.000</td>
            </tr>
        </table>
    </div>
</div>
<script>
    $(function() {
        $.get("/cartItems", function(data) {
            var itemsArray = JSON.parse(data);
            $.each(itemsArray, function(key, value) {
                var cart_item_id = value.id;
                var product_id = value.product_id;
                var product_quantity = value.quantity;

                $.get(`/productInfo?id=${product_id}`, function(data) {
                    var product = JSON.parse(data);
                    $.each(product, function(key, value) {
                        var product_name = value.name;
                        var product_price = value.price;
                        var product_total = product_price * product_quantity;

                        $.get(`/productImages?product_id=${product_id}`, function(data) {
                            var images = JSON.parse(data);
                            var product_img = images[0].image;

                            $("#cartTable").append(`
                            <tr>
                                <td class="cart__item__remove">
                                    <i class="far fa-trash-alt"></i>
                                    <div class="cart__item__id d-none">
                                        ${cart_item_id}
                                    </div>
                                </td>
                                <td class="cart__item__name">
                                    <img src="./assets/upload/${product_img}" alt="">
                                    ${product_name}
                                </td>
                                <td>${product_price}</td>
                                <td class="cart__item__quantity">
                                    <input type="number" value="${product_quantity}" step="1" min="1" max="100" class="input-group">
                                </td>
                                <td class="cart__item__total">${product_total}</td>
                            </tr>
                            `);
                        });
                    });
                });
            });
        });

        $(document).on('click', ".fa-trash-alt", function() {
            var item_id = $(this).closest("td").find(".cart__item__id").text().trim();
            console.log(item_id);

            $.ajax({
                method: "DELETE",
                url: `/cartItems?id=${item_id}`
            }).done(function(data) {
                location.reload();
            });
        });
    });
</script>