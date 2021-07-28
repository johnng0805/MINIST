<div class="register__container">
    <div class="register__wrapper">
        <div class="register__title">
            <a href="/">Minist</a>
            <h4>Register</h4>
        </div>
        <div class="register__input__container">
            <?php $form = app\core\form\Form::begin('/register', 'post') ?>
            <div class="input__area">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'first_name'); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'last_name'); ?>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'email')->emailField(); ?>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating">
                            <select name="gender" id="register__input__gender" class="form-select">
                                <option value="Other">Other</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                            <label for="register__input__gender">Gender:</label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'password')->passwordField(); ?>
                    </div>
                    <div class="col-md-6">
                        <?php echo $form->field($model, 'repassword')->passwordField(); ?>
                    </div>
                </div>
            </div>
            <div class="register__action__container">
                <div class="register__action__forgot">
                    Already have an account? <a href="/login">Login here</a>
                </div>
                <div class="register__action__submit">
                    <button type="submit" name="registerBtn" id="registerBtn">Register</button>
                </div>
            </div>
            <?php $form::end(); ?>
        </div>
    </div>
</div>
<script>
</script>