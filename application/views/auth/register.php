<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Create Account</h3></div>
                                    <div class="card-body">
                                        <form action="<?=base_url('register-user');?>" method="post">
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputFirstName" name="first_name" type="text" placeholder="Enter your `first name`" value="<?=set_value('first_name');?>" />
                                                        <label for="inputFirstName">First name</label>
                                                        <?=form_error('first_name') ? form_error('first_name') : ''; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating">
                                                        <input class="form-control" id="inputLastName" type="text" name="last_name" placeholder="Enter your last name" value="<?=set_value('last_name');?>" />
                                                        <label for="inputLastName">Last name</label>
                                                        <?=form_error('last_name') ? form_error('last_name') : ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" id="inputEmail" type="text" name="email" placeholder="name@example.com" value="<?=set_value('email');?>" />
                                                <label for="inputEmail">Email address</label>
                                                <?=form_error('email') ? form_error('email') : ''; ?>
                                            </div>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPassword" name="password" type="password" placeholder="Create a password" />
                                                        <label for="inputPassword">Password</label>
                                                        <?=form_error('password') ? form_error('password') : ''; ?>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-floating mb-3 mb-md-0">
                                                        <input class="form-control" id="inputPasswordConfirm" name="confirm_password" type="password" placeholder="Confirm password" />
                                                        <label for="inputPasswordConfirm">Confirm Password</label>
                                                        <?=form_error('confirm_password') ? form_error('confirm_password') : ''; ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mt-4 mb-0">
                                                <div class="d-grid">
                                                    <!-- <a class="btn btn-primary btn-block" href="login.html">Create Account</a> -->
                                                    <button type="submit"  class="btn btn-primary btn-block">Register</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?=base_url('login');?>">Have an account? Go to login</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>