<main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="<?=base_url('auth-user');?>" method="post">
                                            <?php if($message = $this->session->flashdata('message')): ?>
                                            <div class="alert alert-<?=$message['class'];?>"><?=$message['message'];?></div>
                                            <?php endif;?>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="email" value="<?=set_value('email');?>" id="inputEmail" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Email address</label>
                                                <?=form_error('email') ? form_error('email') : '';?>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input class="form-control" name="password" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">Password</label>
                                                <?=form_error('password') ? form_error('password') : '';?>
                                            </div>
                                            <div class="form-check mb-3">
                                                <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                                                <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                                            </div>
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                                <a class="small" href="password.html">Forgot Password?</a>
                                                <!-- <a class="btn btn-primary" href="index.html">Login</a> -->
                                                <button type="submit" class="btn btn-primary">Login</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="<?=base_url('register');?>">Need an account? Sign up!</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>