<div class="masonry">
    <div class="grid-sizer"></div>
    <?php while($response=$allArticle->fetch(PDO::FETCH_OBJ)): ?>
    <article class="masonry__brick entry format-standard animate-this">
                            
        <div class="entry__thumb">
            <a href="?page=BlogArticle&id=<?php echo $response->id ?>" class="entry__thumb-link">
                <img src="admin/dist/images/<?php echo $response->images ?>" 
                        srcset="admin/dist/images/<?php echo $response->images?>    1x, admin/dist/images/<?php echo $response->images ?> 2x" alt="">
            </a>
        </div>

        <div class="entry__text">
            <div class="entry__header">

                <h2 class="entry__title"><a href="?page=BlogArticle&id=<?php echo $response->id ?>"><?php echo $response->title ?></a></h2>
                <div class="entry__meta">
                    <span class="entry__meta-cat">
                        <a href="category.html">publish the:</a> 
                    </span>
                    <span class="entry__meta-date">
                        <a href="single-standard.html"><?php echo $response->date_published ?></a>
                    </span>
                </div>
                
            </div>
            <div class="entry__excerpt">
                <p>
                <?php 
                if(strlen($response->content)>150){
                    echo strip_tags(substr($response->content,0,150)).'...';
                }else{
                    echo $response->content;
                }
                ?>
                </p>
            </div>
        </div>
        
    </article> <!-- end article -->
    <?php endwhile ?>

</div>