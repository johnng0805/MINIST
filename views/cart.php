<?php
echo "<pre>";
var_dump($cartItems[0]["id"]);
echo "</pre>";
exit();
?>
<div class="cart__container">
    <h4>Your Cart</h4>
    <div class="cart__table">
        <table>
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
        </table>
    </div>
</div>