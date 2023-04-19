<section class="category-course-list-area">
    <div class="container">
        <div class="row mb-5 mt-3">
            <div class="col-md-12 text-center">
                <h1 class="fw-700">Register</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 d-none d-lg-block text-center">
                <img class="mt-5" width="80%" src="<?= asset('uploads/system/sign_up.png') ?>">
            </div>
            <div class="col-lg-6">
                <div class="sign-up-form">
                    <form action="user_register" method="post">
                        <div class="form-group">
                            <label for="first_name">First name</label>
                            <input type="text" name="first_name" class="form-control" placeholder="First name" aria-label="First name" aria-describedby="First name" id="first_name" required>
                        </div>

                        <div class="form-group">
                            <label for="last_name">Last name</label>
                            <input type="text" name="last_name" class="form-control" placeholder="Last name" aria-label="Last name" aria-describedby="Last name" id="last_name" required>
                        </div>

                        <div class="form-group">
                            <label for="registration-email">Email</label>
                            <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" aria-describedby="Email" id="registration-email" required>
                        </div>

                        <div class="form-group">
                            <label for="registration-password">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password" aria-describedby="Password" id="registration-password" required>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary radius-10 mt-4 w-100">Register</button>
                        </div>

                        <div class="form-group mt-4 mb-0 text-center">
                            Already have an account?
                            <a class="text-15px fw-700" href="login">Login</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>