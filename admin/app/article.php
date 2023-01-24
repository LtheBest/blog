<?php
if ((isset($_GET['page']))&&($_GET['page']=='article')){
    
    require_once('config/database.php');

    $allcategory = $db->prepare("SELECT *FROM category");
    $allcategory->execute();

    if(isset($_POST['addarticle'])){
        extract($_POST);
        if(!empty($title) and !empty($category) and !empty($content) and ($_FILES['image']['name']!='')){
           
            $image_save = 'dist/images/';

            $tmp_file = $_FILES["image"]["tmp_name"]; // destination temporaire de nos images 
            $types_file = $_FILES['image']['type']; 

            if(!strstr($types_file, 'jpeg') && !strstr($types_file, 'png') && !strstr($types_file, 'JPEG') && !strstr($types_file, 'PNG')){

                exit("only JPEG and PNG files are accepted");
            }
            $name_images = time(). '.jpg';

            if(!move_uploaded_file($tmp_file,$image_save.$name_images)){
                exit('unable to copy the image to the directory');
            }
            $insert_article = $db->prepare("INSERT INTO article(title,id_category,content,images,created_At) VALUES(?,?,?,?,NOW())");
            $insert_article->execute(array($title,$category,$content,$name_images));

            $alert= array('alert-success',"Your article has been published successfully");

        }else{
            $alert= array('alert-error',"the field must not be empty");
        }
    }

    // afficher les articles contenu dans la base de  donnée
    $all_article = $db->prepare('SELECT *FROM article');
    $all_article->execute();

    //suppression
    if((isset($_GET['action'])) and ($_GET['action']=='delete')){
        $delete_article = $db->prepare('DELETE FROM article WHERE id=?');
        $delete_article->execute(array($_GET['id']));

        header('location:admin.php?page=article');

    }
    // modification
    if(isset($_GET['action'])){

        if((isset($_GET['action'])) and ($_GET['action']=='edit')){
            $single_article = $db->prepare('SELECT *FROM article WHERE id=?');
            $single_article->execute(array($_GET['id']));
    
            $single_article_data = $single_article->fetch(PDO::FETCH_OBJ);
            if(isset($_POST['editarticle'])){
                extract($_POST);
                if(!empty($title) and !empty($category) and !empty($content) and !empty($id)){
                    $edit_article = $db->prepare('UPDATE article set title=?, id_category=?, content=? WHERE id=?');
                    $edit_article->execute(array($title,$category,$content,$id));
    
                    header('location:admin.php?page=article');
    
                }else{
                    $alert= array('alert-error',"the field must not be empty");
                }
            }
    
        }
    }

}else{
    getTemplate('pages-error-404');
}






?>
