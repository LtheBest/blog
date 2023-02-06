<!DOCTYPE html>

<html class="no-js" lang="en">
<head>
    <base href="/blog/"> 
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>My Blog</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/css/base.css">
    <link rel="stylesheet" href="assets/css/vendor.css">
    <link rel="stylesheet" href="assets/css/main.css">

    <!-- script
    ================================================== -->
    <script src="assets/js/modernizr.js"></script>

    <!-- favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="favicon-16x16.png">
    <link rel="manifest" href="site.webmanifest">

</head>

<body>

    <!-- preloader
    ================================================== -->
    <div id="preloader">
        <div id="loader" class="dots-fade">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>

    <div id="top" class="s-wrap site-wrapper">

        <!-- site header
        ================================================== -->
        <header class="s-header">

            <div class="header__top">
                <div class="header__logo">
                    <a class="site-logo" href="index.html">
                        <img src="assets/images/logo.svg" alt="Homepage">
                    </a>
                </div>
            </div> <!-- end header__top -->

            <nav class="header__nav-wrap">

                <ul class="header__nav">
                    <li class="current"><a href="index.html" title="">Home</a></li>
                    <li class="has-children">
                        <a href="#0" title="">Categories</a>
                        <ul class="sub-menu">
                        <?php 
                            include('admin/config/database.php');
                            
                            $selt = $db->prepare("SELECT *FROM category ");
                            $selt->execute();
                            while($list=$selt->fetch(PDO::FETCH_OBJ)):
                                
                            
                        ?>
                            <li><a href="filter/category/<?php echo $list->id?>/<?php echo slug($list->name) ?>/"><?php echo $list->name ?></a></li>

                        <?php endwhile ?>
                        
                        </ul>
                    </li>
                    
                </ul> <!-- end header__nav -->

                <ul class="header__social">
                    <li class="ss-facebook">
                        <a href="https://facebook.com/">
                            <span class="screen-reader-text">Facebook</span>
                        </a>
                    </li>
                    <li class="ss-twitter">
                        <a href="#0">
                            <span class="screen-reader-text">Twitter</span>
                        </a>
                    </li>
                    <li class="ss-dribbble">
                        <a href="#0">
                            <span class="screen-reader-text">Dribbble</span>
                        </a>
                    </li>
                    <li class="ss-pinterest">
                        <a href="#0">
                            <span class="screen-reader-text">Behance</span>
                        </a>
                    </li>
                </ul>

            </nav> <!-- end header__nav-wrap -->

            <!-- menu toggle -->
            <a href="#0" class="header__menu-toggle">
                <span>Menu</span>
            </a>

        </header> <!-- end s-header -->


        <!-- search
        ================================================== -->
        <div class="s-search">

            <div class="search-block">
    
                <form role="search" method="get" class="search-form" action="#">
                    <label>
                        <span class="hide-content">Search for:</span>
                        <input type="search" class="search-field" placeholder="Type Keywords" value="" name="s" title="Search for:" autocomplete="off">
                    </label>
                    <input type="submit" class="search-submit" value="Search">
                </form>
    
                <a href="#0" title="Close Search" class="search-close">Close</a>
    
            </div>  <!-- end search-block -->

            <!-- search modal trigger -->
            <a href="#0" class="search-trigger">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" style="fill:rgba(0, 0, 0, 1);transform:;-ms-filter:"><path d="M10,18c1.846,0,3.543-0.635,4.897-1.688l4.396,4.396l1.414-1.414l-4.396-4.396C17.365,13.543,18,11.846,18,10 c0-4.411-3.589-8-8-8s-8,3.589-8,8S5.589,18,10,18z M10,4c3.309,0,6,2.691,6,6s-2.691,6-6,6s-6-2.691-6-6S6.691,4,10,4z"></path></svg>
                <span>Search</span>
            </a>
            <span class="search-line"></span>

        </div> <!-- end s-search -->


        <!-- site content
        ================================================== -->
    <div class="s-content">
