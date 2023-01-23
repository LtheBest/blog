<?php getHeader(); ?>
    <div class="container-fluid">
    <div class="row page-titles">
            <div class="col-md-5 align-self-center">
                <h4 class="text-themecolor">Category</h4>
            </div>
            <div class="col-md-7 align-self-center text-right">
                <div class="d-flex justify-content-end align-items-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                        <li class="breadcrumb-item active">Category</li>
                    </ol>
                </div>
            </div>
            <div class="message" style="text-align:center; width:100%">
                <?php if(isset($alert)){echo alertMessage($alert);} ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">all category </h4>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Option 1</th>
                                    <th>Option 2</th>
                                </tr>
                            </thead>
                            <tbody>

                            <?php while($responses = $allcategory->fetch(PDO::FETCH_OBJ)): ?>
                                <tr>
                                    <td class=""><?php echo  $responses->id ; ?></td>
                                    <td class="txt-oflo"><?php echo $responses->name; ?></td>
                                    <td class="txt-oflo"><a href="admin.php?page=category&action=edit&name=<?php echo $responses->name ?>&id=<?php echo $responses->id ?>"><i class="fa fa-edit" ></i> Edit</a></td>
                                    <td><span class="text-danger" onclick="event.preventDefault();confirm('are you sure you want to delete this category?')&&window.location.replace('admin.php?page=category&action=delete&id=<?php echo $responses->id?>')" ><i class="fa fa-times-circle-o"></i> Delete</span></td>
                                </tr>
                                <?php endwhile ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body"><br>

                        <?php if(!isset($_GET['action'])){ ?>

                        <h3 class="card-title">add category</h3><br><br>
                        <form class="form-horizontal form-material" method="POST">
                            <div class="form-group">
                                <label class="col-md-12 text-left">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="category" placeholder="category name"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <div class="form-group text-left  ">
                                <div class="col-sm-12">
                                    <button type="submit" name="addcategory" class="btn btn-primary p-l-40 p-r-40" >add category</button>
                                </div>
                            </div>
                        </form>
                        <?php }else{?>

                            <h3 class="card-title">edited category<?php echo $_GET['name'];?> </h3> <br><br>

                        <form class="form-horizontal form-material" method="POST" action="">
                            <div class="form-group">
                                <label class="col-md-12 text-left">Full Name</label>
                                <div class="col-md-12">
                                    <input type="text" name="newcategory" value="<?php echo $_GET['name'];?>"
                                        class="form-control form-control-line">
                                </div>
                            </div>
                            <input type="hidden" name="id" value="<?php echo $_GET['id'];?>" >
                            <div class="form-group text-left  ">
                                <div class="col-sm-12">
                                    <button type="submit" name="editcategory" class="btn btn-primary p-l-40 p-r-40" >edit category</button>
                                </div>
                            </div>
                        </form>
                        
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php getFooter(); ?>