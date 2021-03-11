<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="animate form login_form">

                <section class="login_content">
                    <?= $this->session->flashdata('message'); ?>
                    <?php if ($this->session->flashdata('pass') == TRUE) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <?= $this->session->flashdata('pass') ?>.
                        </div>
                    <?php elseif ($this->session->flashdata('belum') == TRUE) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <?= $this->session->flashdata('belum') ?>.
                        </div>
                    <?php elseif ($this->session->flashdata('tdk') == TRUE) : ?>
                        <div class="alert alert-danger alert-dismissible">
                            <?= $this->session->flashdata('tdk') ?>.
                        </div>
                    <?php endif; ?>
                    <form action="<?= base_url('auth'); ?>" method="POST">
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">
                        <h1>Login User</h1>
                        <div>
                            <input type="text" class="form-control" name="login-username" placeholder="Username" required />
                        </div>
                        <div>
                            <input type="password" class="form-control" name="login-password" placeholder="Password" required="" />
                        </div>
                        <div>
                            <button type="submit" class="btn btn-default submit">Log in</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">

                            <div class="clearfix"></div>
                            <br />

                            <div>
                                <h1><i class="fa fa-paw"></i> Mitra Abadi Sejahtera</h1>
                                <p>©2021 All Rights Reserved. Mitra Abadi Sejahtera</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
</body>