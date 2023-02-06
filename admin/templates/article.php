<?php getHeader(); ?>

    <div class="container-fluid">
        <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h4 class="text-themecolor">Article</h4>
                </div>
                <div class="col-md-7 align-self-center text-right">
                    <div class="d-flex justify-content-end align-items-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="?page=home">Home</a></li>
                            <li class="breadcrumb-item active">Article</li>
                        </ol>
                    </div>
                </div>
                <div class="message" style="text-align:center; width:100%">
                   
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">all Article </h4>
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

                                    <?php while($all_article_data = $all_article->fetch(PDO::FETCH_OBJ)): ?>
                                    <tr>
                                        <td class=""><?php echo $all_article_data->id ?></td>
                                        <td class="txt-oflo"><?php 
                                        // nous allons creer une coditions pour afficher le point de suspension si la taille du titre de l'article est superieur a 10 caractères

                                        if(strlen($all_article_data->title)>10){
                                            echo substr($all_article_data->title,0,10).'...';
                                        }else{
                                            echo $all_article_data->title;
                                        }
                                        ?></td>
                                        <td class="txt-oflo"><a href="admin.php?page=article&action=edit&name=<?php echo $all_article_data->title ?>&id=<?php echo $all_article_data->id ?>"><i class="fa fa-edit" ></i> Edit</a></td>
                                        <td><span class="text-danger"onclick="event.preventDefault();confirm('are you sure you want to delete this article?')&&window.location.replace('admin.php?page=article&action=delete&id=<?php echo $all_article_data->id?>')" ><i class="fa fa-trash-o"></i> Delete</span></td>
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

                           <?php if (!isset($_GET['action'])){ ?>
                            <h3 class="card-title">add Article</h3><br><br>
                            <form class="form-horizontal form-material" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12 text-left">Title article</label>
                                    <div class="col-md-12">
                                        <input type="text" name="title" placeholder="enter the title of the article"
                                            class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 text-left">category of the article</label>
                                    <div class="col-md-12">
                                       <select class="form-control form-control-line" name="category">
                                       <?php while($datacategory = $allcategory->fetch(PDO::FETCH_OBJ)): ?>

                                        <option value="<?php echo $datacategory->id; ?>" ><?php echo $datacategory->name; ?></option>
                                        
                                        <?php endwhile ?>
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 text-left">content of the article</label>
                                    <div class="col-md-12">
                                        <textarea classe="editor" name="content" class="form-control form-control-line" rows="8" placeholder="..."></textarea>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 text-left">image</label>
                                    <div class="col-md-12 text-left"><br>
                                       <input type="file" name="image">
                                    </div>
                                </div>

                                <div class="form-group text-left">
                                    <div class="col-sm-12">
                                        <button type="submit" name="addarticle" class="btn btn-primary p-l-40 p-r-40" >add article</button>
                                    </div>
                                </div>
                            </form>
                            <?php }else{?>
                            <h3 class="card-title">Edited Article</h3><br><br>
                            <form class="form-horizontal form-material" method="POST" action="" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label class="col-md-12 text-left">Title article</label>
                                    <div class="col-md-12">
                                        <input type="text" name="title" value="<?php echo $single_article_data->title;?>"
                                            class="form-control form-control-line">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 text-left">category of the article</label>
                                    <div class="col-md-12">
                                       <select class="form-control form-control-line" name="category">
                                       <?php while($datacategory = $allcategory->fetch(PDO::FETCH_OBJ)): ?>

                                        <option value="<?php echo $datacategory->id; ?>" ><?php echo $datacategory->name; ?></option>
                                        
                                        <?php endwhile ?>
                                       </select>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-12 text-left" >content of the article</label>
                                    <div class="col-md-12">
                                        <textarea classe="editor" name="content" class="form-control form-control-line" rows="8" ><?php echo $single_article_data->content;?></textarea>
                                    </div>
                                </div>

                               <input type="hidden" name="id" value="<?php echo $_GET['id'] ?>">

                                <div class="form-group text-left">
                                    <div class="col-sm-12">
                                        <button type="submit" name="editarticle" class="btn btn-primary p-l-40 p-r-40" >Edited</button>
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
