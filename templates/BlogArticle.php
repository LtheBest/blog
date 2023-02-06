<main class="row content_page">
    <article class="column large-full entry format-standard">
        <div class="content__page-header entry__header">
            <h1 class="display-1 entry__title">
            <?php echo $response->title  ?>
            </h1>
            <ul class="entry__header-meta">
                <!--<li class="author">By <a href="#0">Jonathan Doe</a></li>-->
                <li class="date">Published the: <?php echo $response->date_published ?></li><br><br>
                <img src="admin/dist/images/<?php echo $response->images ?>" 
                        srcset="admin/dist/images/<?php echo $response->images?>   
                         1x, admin/dist/images/<?php echo $response->images ?> 2x" alt="">
               <!-- <li class="cat-links">
                    <a href="#0">Marketing</a><a href="#0">Management</a>
                </li>-->
            </ul>
        </div> <!-- end entry__header -->


        <div class="entry_content">
            <?php echo $response->content  ?>
        </div>
    </article>
</main>