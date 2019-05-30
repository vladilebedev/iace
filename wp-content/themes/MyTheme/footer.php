    <footer class="footer">
        <div class="footer_wrap">
            <div class="footer_text">
                <?php 
                    $idObj = get_category_by_slug('footer');
                    $id = $idObj->term_id;
                    if ( have_posts() ) : query_posts('cat=' . $id);
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    wp_reset_query();
                ?>
            </div>
            <div class="socials">
                <ul>
                    <?php 
                        $idObj = get_category_by_slug('socials');
                        $id = $idObj->term_id;
                        if ( have_posts() ) : query_posts('cat=' . $id);
                        while (have_posts()) : the_post(); ?>
                            <li>
                                <a href="<?php echo get_post_meta($post->ID, 'soc_url', true); ?>" target="_blank" title="<?php the_title(); ?>">
                                    <i class="fa <?php echo get_post_meta($post->ID, 'fonts_awesome', true); ?>"></i>
                                </a>
                            </li>
                    <?php endwhile; endif; wp_reset_query(); ?>
                </ul>
            </div>
        </div>
    </footer>
</body>

<?php wp_footer(); ?>

</html>