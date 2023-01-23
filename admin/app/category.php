<?php
    if ($_GET['page']=='category'){

        // AJOUT DE CATEGORIES
        if(isset($_POST['addcategory'])){
            if(!empty($_POST['category'])){

                require_once('config/database.php');
                

                $addcategory =$db->prepare('INSERT INTO category(name) VALUES(?)');

                $addcategory->execute(array($_POST['category']));

                $alert = array('alert-success',"the category has been added successfully");

            }else{
                $alert= array('alert-error',"the field must not be empty");
                
            }
        }
        // TOUTES LES CATEGORIES
        require_once('config/database.php');

        $allcategory = $db->prepare("SELECT *FROM category");
        $allcategory->execute();

        //  SUPPRESSION

        if(isset($_GET['action'])){

            if($_GET['action']=='delete'){

                $deletecategory=$db->prepare("DELETE from category WHERE id=?");

                $deletecategory->execute(array($_GET['id']));

                header('location:admin.php?page=category');


                //MODIFICATION
            }elseif($_GET['action']=='edit'){

               if(isset($_POST['editcategory'])){
                    if(!empty($_POST['newcategory']) and !empty($_POST['id'])){

                        $updatedcategory= $db->prepare("UPDATE category set name=? WHERE id=?");

                        $updatedcategory->execute(array($_POST['newcategory'], $_POST['id']));

                        header('location:admin.php?page=category');

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