<?php
/*
Template Name: テキストのみ
*/
?>
<?php get_header('meta'); ?>
<?php wp_head(); ?>
</head>
<body class="pg_commerce">
<?php get_header(); ?>

<main class="ly_main">

<div class="ly_pageTtl02">
    <span class="ly_pageTtl02_inner">
        <h1 class="el_pageTtl02_ja"><?php the_title(); ?></h1>
    </span>
</div><!-- /ly_pageTtl -->

<div class="ly_inner un_commerce">
    <div class="el_edit_page">
        <?php the_content(); ?>
    </div>
</div><!-- /ly_inner -->

</main><!-- /ly_main -->

<?php get_footer(); ?>
<?php get_footer('meta'); ?>

</body>
</html>
