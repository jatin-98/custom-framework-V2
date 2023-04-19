<style>
    .sign-up-form .form-group .input-group span {
        border-right: none;
        border-radius: 10px;
        color: #878787;
        font-size: 15px;
        font-weight: 500;
    }
</style>

<section class="category-course-list-area">
    <div class="container">
        <div class="row mb-5 mt-3">
            <div class="col-md-12 text-center">
                <h1 class="fw-700">Login</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img class="mt-4" width="60%" src="<?= asset('uploads/system/sign_up.png') ?>">
            </div>
            <div class="col-lg-6">
                <div class="sign-up-form">
                    <form action="login_validate" method="post">
                        <div class="form-group">
                            <label for="login-email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" id="login-email" required>
                        </div>

                        <div class="form-group">
                            <label for="login-password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" id="login-password" required>
                            <a class="text-muted text-12px fw-500 float-end" href="forgot_password">Forgot password?</a>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary radius-10 mt-4 w-100">Login</button>
                        </div>

                        <div class="form-group mt-4 mb-0 text-center"> Do not have an account? <a class="text-15px fw-700" href="register">Sign up</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>