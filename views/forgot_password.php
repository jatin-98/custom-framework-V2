<section class="category-course-list-area">
    <div class="container">
        <div class="row mb-5 mt-3">
            <div class="col-md-12 text-center">
                <h1 class="fw-700">Forgot password</h1>
                <p class="text-14px">Provide your valid email address</p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img class="mt-4" width="55%" src="<?= asset('uploads/system/forgot_password.png') ?>">
            </div>
            <div class="col-lg-6">
                <div class="sign-up-form">
                    <form action="#" method="post" id="forgot_password">
                        <div class="form-group">
                            <label for="login-email">Your email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" id="forgot-password-email" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary radius-10 mt-4 w-100">Reset password</button>
                        </div>

                        <div class="form-group mt-4 mb-0 text-center">
                            Want to go back?
                            <a class="text-15px fw-700" href="login">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>