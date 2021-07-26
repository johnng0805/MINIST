<div class="register__container">
    <div class="register__wrapper">
        <div class="register__title">
            <h1>Minist</h1>
            <h4>Register</h4>
        </div>
        <div class="register__input__container">
            <form method="POST" action="/register" id="registerForm">
                <div class="input__area">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input id="register__input__firstname" class="form-control" type="text" name="firstname" placeholder="First Name">
                                <label for="register__input__firstname">First name:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input id="register__input__lastname" class="form-control" type="text" name="lastname" placeholder="Last Name">
                                <label for="register__input__lastname">Last name:</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
                                <input id="register__input__email" class="form-control" type="email" name="email" placeholder="name@example.com">
                                <label for="register__input__email">Email:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-4">
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
                            <div class="form-floating mb-4">
                                <input id="register__input__password" class="form-control" type="password" name="password" placeholder="Password">
                                <label for="register__input__email">Password:</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating">
                                <input id="register__input__repassword" class="form-control" type="password" name="repassword" placeholder="Confirm Password">
                                <label for="register__input__repassword">Confirm password:</label>
                            </div>
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
            </form>
        </div>
    </div>
</div>
<script>
</script>