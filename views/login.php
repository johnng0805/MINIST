<div class="login__container">
    <div class="login__wrapper">
        <div class="login__title">
            <a href="/">Minist</a>
            <h4>Login</h4>
        </div>
        <div class="login__input__container">
            <form method="POST">
                <div class="login__input__area">
                    <div class="form-floating mb-4">
                        <input id="login__input__email" class="form-control" type="email" name="email" placeholder="name@example.com">
                        <label for="login__input__email">Email:</label>
                    </div>
                    <div class="form-floating">
                        <input id="login__input__password" class="form-control" type="password" name="password" placeholder="Password">
                        <label for="login__input__password">Password:</label>
                    </div>
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
            </form>
        </div>
    </div>
</div>