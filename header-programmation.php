<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Programmation</title>
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/normalize.css">
    <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/assets/css/style.css">
    <?php wp_head(); ?>
  </head>
</head>
<body>
    <div class="wrapper">
        
        <header>
            <nav>
                <h1>Le festival du film Burlesque</h1>
                <div id="burger">
                    <div class="bar"></div>
                    <div class="bar"></div>
                    <div class="bar"></div>
                </div>
                <?php
                    wp_nav_menu([
                        'menu' => 'primary',
                        'container' => false
                    ]) 
                ?>
            </nav>
        </header>