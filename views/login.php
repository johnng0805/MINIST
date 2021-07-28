<div class="login__container">
    <div class="login__wrapper">
        <div class="login__title">
            <a href="/">Minist</a>
            <h4>Login</h4>
        </div>
        <div class="login__input__container">
            <?php $form = app\core\form\Form::begin('/login', 'post') ?>
            <div class="login__input__area">
                <div class="mb-4">
                    <?php echo $form->field($model, 'email')->emailField(); ?>
                </div>
                <?php echo $form->field($model, 'password')->passwordField(); ?>
            </div>
            <div class="login__action__container">
                <div class="login__action__forgot">
                    <a href="#">Forgot Password?</a><br>
                    Don't have account? <a href="/register">Sign-up here</a>
                </div>
                <div class="login__action__submit">
                    <button type="submit" name="loginBtn">Login</button>
                </div>
            </div>
            <?php echo $form::end() ?>
        </div>
    </div>
</div>