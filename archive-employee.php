<?php
    get_header();
    get_template_part( 'parts/preloader' );
?>

<div class="employees">
    <div class="container">
            <?php $loop = get_transient( 'employee_query' );
            while ($loop->have_posts()) : $loop->the_post();?>
<!--                --><?php //var_dump($post);?>
                <div class="employee" data-id="<?= $post->ID ?>">
                    <div class="employee_img">
                        <img src="<?= get_the_post_thumbnail_url($post->ID) ?>" alt="">
                        <div class="employee_view">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="white" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg>
                        </div>
                    </div>
                    <div class="employee_container">
                        <div class="employee_title">
                            <h2><?= $post->post_title ?></h2>
                            <p><?= $post->post_excerpt ?></p>
                        </div>
                        <div class="employee_subtitle">
                            <?= $post->post_content ?>
                        </div>
                    </div>
                </div>

            <?php endwhile;
            wp_reset_query();?>
        </div>
    </div>
</div>
<div class="popup">
    <div class="container">
        <div class="popup_items">
            <div class="popup_left">
                <div class="popup_img">
                    <img src="" alt="">
                </div>
                <div class="popup_content">
                    <div class="popup_contact">
                        <a href="" class="phone"></a>
                        <a href="" class="mail"></a>
                    </div>
                    <a href="" class="linkedin"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="25.315" height="25.316" viewBox="0 0 25.315 25.316"><defs><style>.a{fill:none;}.b{clip-path:url(#a);}.c{fill:#008c95;}</style><clipPath id="a"><rect class="a" width="25.315" height="25.316"/></clipPath></defs><g class="b"><path class="c" d="M23.443,0H1.867A1.847,1.847,0,0,0,0,1.826V23.489a1.848,1.848,0,0,0,1.867,1.827H23.443a1.852,1.852,0,0,0,1.873-1.827V1.826A1.851,1.851,0,0,0,23.443,0ZM7.51,21.572H3.751V9.491H7.51ZM5.631,7.84A2.178,2.178,0,1,1,7.807,5.662,2.177,2.177,0,0,1,5.631,7.84ZM21.573,21.572H17.818V15.7c0-1.4-.024-3.2-1.951-3.2-1.954,0-2.252,1.527-2.252,3.1v5.975H9.865V9.491h3.6v1.652h.052a3.944,3.944,0,0,1,3.553-1.951c3.8,0,4.5,2.5,4.5,5.755Z"/></g></svg></a>
                </div>
            </div>
            <div class="popup_right">
                <div class="popup_title">
                    <h3></h3>
                    <p></p>
                    <span></span>
                </div>
                <div class="popup_text">

                </div>
            </div>
            <div class="popup_exit">
                <svg xmlns="http://www.w3.org/2000/svg" fill="black" width="24" height="24" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.597 17.954l-4.591-4.55-4.555 4.596-1.405-1.405 4.547-4.592-4.593-4.552 1.405-1.405 4.588 4.543 4.545-4.589 1.416 1.403-4.546 4.587 4.592 4.548-1.403 1.416z"/></svg>
            </div>
    </div>
</div>
<?php get_footer();



