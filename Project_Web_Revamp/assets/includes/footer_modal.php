    <!-- Modal Login Start -->
    <div class="modal fade" id="modalLogin" tabindex="-1" role="dialog" aria-labelledby="modalLoginTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLoginTitle"> Login </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="assets/includes/login_plg.php" id="formLoginPelanggan">
                        <div class="form-group">
                            <label for="emailLogin" class="col-form-label"> Email : </label>
                            <input type="email" name="emailLogin" id="emailLogin" class="form-control" placeholder="Enter your e-mail ...">
                            <div class="valid-feedback" id="validEmailLogin"> Bagus! </div>
                            <div class="invalid-feedback" id="invalidEmailLogin"></div>
                        </div>
                        <div class="form-group">
                            <label for="passwordLogin" class="col-form-label"> Password : </label>
                            <input type="password" name="passwordLogin" id="passwordLogin" class="form-control" placeholder="Enter your password ...">
                            <div class="valid-feedback" id="validPasswordLogin"> Bagus! </div>
                            <div class="invalid-feedback" id="invalidPasswordLogin"></div>
                        </div>
                        <div class="form-group form-check">
                            <input type="checkbox" name="checkRememberMe" id="checkRememberMe" class="form-check-input">
                            <label for="checkRememberMe" class="form-check-label"> Remember Me </label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block" name="loginPelanggan"> Login </button>
                    </form>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <a href="register.php" class="text-decoration-none"> Belum punya akun ? Daftar disini. </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="#modalLupaPassword" class="text-decoration-none" data-toggle="modal" role="button" data-dismiss="modal"> Lupa password ? Klik disini. </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- Modal Login End -->

    <!-- Modal Login Start -->
    <div class="modal fade" id="modalLupaPassword" tabindex="-1" role="dialog" aria-labelledby="modalLupaPasswordTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalLupaPasswordTitle"> Forgot Password </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="post" action="assets/includes/forgot_pass.php" id="formLupaPassword">
                        <div class="form-group">
                            <label for=""> Email : </label>
                            <div class="input-group">
                                <input type="email" name="lupaPasswordUser" id="lupaPasswordUser" class="form-control" placeholder="Enter your email ....">
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-block btn-outline-primary" name="lupaPassword"> Kirim </button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row my-2">
                        <div class="col-lg-12">
                            <a href="register.php" class="text-decoration-none"> Belum punya akun ? Daftar disini. </a>
                        </div>
                        <div class="col-lg-12">
                            <a href="#modalLogin" class="text-decoration-none" role="button" data-toggle="modal" data-dismiss="modal"> Sudah punya akun ? Klik disini. </a>
                        </div>
                    </div>
                </div>
                <div class="modal-footer"></div>
            </div>
        </div>
    </div>
    <!-- Modal Login End -->

    <!-- Modal Warning Login Start -->
    <div class="modal fade" id="modalWarning" tabindex="-1" role="dialog" aria-labelledby="modalWarningLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalWarningLabel"> Peringatan </h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="lead text-justify" id="modalWarningMessage"></p>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-outline-info" type="button"data-dismiss="modal"> Ya, Saya mengerti </button>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Warning Login End -->  

