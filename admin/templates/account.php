<?php getHeader();?>
    <div class="container-fluid">
        <!-- ============================================================== -->
        <!-- Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Profile</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active">Update profile</li>
                    </ol>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- End Bread crumb and right sidebar toggle -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Start Page Content -->
        <!-- ============================================================== -->
        <!-- Row -->
        <div class="row">
            <!-- Column -->
            <!-- Column -->
            <!-- Column -->
            <div class="col-lg-12 col-xlg-9 col-md-7">
                <div class="card">
                    <!-- Tab panes -->
                    <div class="card-body">
                    <?php if(isset($alert)){echo alertMessage($alert);} ?>
                        <form class="form-horizontal form-material" method="POST" action="">
                            <div class="form-group">
                                <label class="col-md-12 text-left">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="username" value="<?php echo getAdmin(); ?>"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 text-left">Old password</label>
                                <div class="col-md-12">
                                    <input type="password" name="oldpassword" 
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 text-left">New password</label>
                                <div class="col-md-12">
                                    <input type="password" name="newpassword" 
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-md-12 text-left">Confirm new password</label>
                                <div class="col-md-12">
                                    <input type="password" name="confirmnewpassword" 
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group text-left  ">
                                <div class="col-sm-12">
                                    <button type="submit" name="submit" class="btn btn-primary p-l-40 p-r-40" >Update profile</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <!-- Column -->
        </div>
        <!-- Row -->
        <!-- ============================================================== -->
        <!-- End PAge Content -->
        <!-- ============================================================== -->
    </div>
<?php getFooter();?>