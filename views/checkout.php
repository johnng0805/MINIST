<div class="checkout__container">
    <div class="checkout__wrapper">
        <h1>Checkout</h1>
        <div class="checkout__item__table">
            <table>
                <tbody>
                    <tr>
                        <td>Product</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h4>Billing Information</h4>
        <div class="checkout__billing__container">
            <?php $form = \app\core\form\Form::begin('#', 'POST'); ?>
            <div class="row mb-4">
                <div class="col-md-6">
                    <?php echo $form->field($userAddress, 'address_1') ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($userAddress, 'address_2'); ?>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <?php echo $form->field($userAddress, 'city') ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($userAddress, 'postal_code'); ?>
                </div>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <?php echo $form->field($userAddress, 'country') ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($userAddress, 'phone'); ?>
                </div>
            </div>
            <div class="payment__title mb-4">
                <h4>Payment</h4>
            </div>
            <div class="row mb-4">
                <div class="col-md-6">
                    <?php echo $form->field($userPayment, 'payment_type') ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($userPayment, 'provider'); ?>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <?php echo $form->field($userPayment, 'account_number') ?>
                </div>
                <div class="col-md-6">
                    <?php echo $form->field($userPayment, 'expiry'); ?>
                </div>
            </div>
            <?php $form::end(); ?>
        </div>
        <button class="confirmBtn">Confirm</button>
    </div>
</div>