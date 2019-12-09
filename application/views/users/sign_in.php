<?php ?>
<div class="col-md-9 col-sm-9">
    <h1>Login</h1>
    <div class="content-form-page">
        <div class="row">
            <div class="col-md-7 col-sm-7">                
                <div class="row">
                    <div class="col-lg-8 col-md-offset-4 padding-left-0" style="color: red;">
                        <?php
                        if ($this->session->flashdata('error')) {
                            echo $this->session->flashdata('error');
                        } else {
                            echo validation_errors();
                        }
                        ?>
                    </div>
                </div>
                <form class="form-horizontal form-without-legend" role="form" action="<?= base_url('users/sign_in'); ?>" method="post" id="sign_in" name="sign_in">
                    <div class="form-group">
                        <label for="email" class="col-lg-5 control-label">Email/Registration No. <span class="require">*</span></label>
                        <div class="col-lg-7">
                            <input type="text" class="form-control" id="user_email" name="user_email" value="<?= set_value('user_email') ?>">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="password" class="col-lg-5 control-label">Password <span class="require">*</span></label>
                        <div class="col-lg-7">
                            <input type="password" class="form-control" id="password" name="user_pass">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-5 col-md-offset-5 padding-left-0">
                            <a href="#" id="reset_password">Reset Password</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-2 padding-top-20 pull-right" style="margin-right:27px;">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </div>                    
                </form>
            </div>
            <div class="col-md-4 col-sm-4 pull-right">
                <div class="form-info">
                    <h2><em>Important</em> Information</h2>
                    <div id="container">
                        <!-- slider text article start -->
                        <div class="freshdesignweb">
                            <article class="grid_3  carousel-article">
                                <div style="display: block; text-align: start; position: relative; top: auto; right: auto; bottom: auto; left: auto; width: 220px; height: 90px; margin: 0px; overflow: hidden;" class="caroufredsel_wrapper">
                                    <ul style="text-align: left; float: none; position: absolute; top: 0px; right: auto; bottom: auto; left: 0px; margin: 0px; width: 1540px; height: 90px;" id="foo3" class="carousel-li">
                                        <li><p>First time @Balugaon Software Training and Development center.</p></li>
                                        <li><p>Admissions Now Open! Limited seats only. Register today for good offer. </p></li>
                                        <li><p>Get training from Software Engineers.</p></li>                                        
                                        <li><p>Learn software development using PHP MVC.</p></li>
                                        <li><p>Get opportunity to work on Live projects </p></li>                                        
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                                <div style="display: block;" class="carousel-pagination" id="foo3_pag"><a class="selected" href="#"><span>1</span></a><a class="" href="#"><span>2</span></a><a class="" href="#"><span>3</span></a></div>
                            </article><!-- slider text article end -->            
                        </div>  
                    </div>
                </div>
            </div>
        </div>
    </div>    
</div>
<script>
    $(document).ready(function () {
        $('#reset_password').on('click', function () {
            var msg = {
                'type': 'default',
                title: 'Information!',
                message: 'Please contact admin department to reset your password.'
            }
            myApp.modal.alert(msg);
        });

    });
    $("#foo3").carouFredSel({
        items: 1,
        auto: true,
        scroll: 1,
        pagination: "#foo3_pag"
    });
</script>