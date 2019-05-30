<?php get_header(); ?>

<section id="s_about" class="s_about">
    <div class="section_content_wrap">
        <div class="section_header">
            <h1>
                <?php $idObj = get_category_by_slug('s_about');
                $id = $idObj->term_id;
                echo get_cat_name($id); ?>             
            </h1>
        </div>
        <div class="section_content">
            <div class="about_text">
                <?php
                    if ( have_posts() ) : query_posts('cat=' . $id);
                        while (have_posts()) : the_post();
                            the_content();
                        endwhile;
                    endif;
                    wp_reset_query();
                ?>
            </div>
        </div>
    </div>
    <div class="section_band"></div>
</section>

<section id="s_news" class="s_news">
    <div class="section_content_wrap">
        <div class="section_header">
            <h1>
                <?php $idObj = get_category_by_slug('s_news');
                $id = $idObj->term_id;
                echo get_cat_name($id); ?>             
            </h1>
        </div>
        <div class="section_content">
            <ul>
                <?php
                    if ( have_posts() ) : query_posts('cat='. $id . '&orderby=ID&order=date&posts_per_page=3');
                    while (have_posts()) : the_post(); ?>
                        <li>
                            <a href="#" class="popup_content" title="<?php the_title(); ?>">
                                <div class="news_cartune">
                                    <?php the_post_thumbnail(array()); ?>
                                </div>
                                <h2><?php the_title(); ?></h2>
                            </a>
                            <div class="date_icon fa fa-clock-o"></div>
                            <div class="date_text"><?php echo get_the_date('j F Y'); ?></div>
                            <div class="hidden">
                                <div class="news_block">
                                    <button class="mfp-close" type="button" title="Закрыть">x</button>
                                    <h2><?php the_title(); ?></h2>
                                    <?php the_content(); ?>
                                    <?php the_post_thumbnail(array()); ?>
                                </div>
                            </div>
                        </li>
                <?php endwhile; endif; wp_reset_query(); ?>
            </ul>
        </div>
    </div>
    <div class="section_band"></div>
</section>

<section id="s_contacts" class="s_contacts">
    <div class="section_content_wrap">
        <div class="section_header">
            <h1>
                <?php $idObj = get_category_by_slug('s_contacts');
                $id = $idObj->term_id;
                echo get_cat_name($id); ?>             
            </h1>
        </div>
        <div class="section_content">
            <div class="form_div">
                <?php $options = get_option('sample_theme_options'); ?>
                <form action="https://formspree.io/<?php echo $options['mailtext']; ?>" class="main_form" novalidate target="_blank" method="post">
                    <div class="form_left">
                        <label class="form-group">
                            <span class="color_element">*</span> Ваше имя:
                            <input type="text" name="name" placeholder="Ваше имя"/>
                        </label>
                        <label class="form-group">
                            <span class="color_element">*</span> Ваш E-Mail:
                            <input type="email" name="email" placeholder="Ваш E-Mail"/>
                        </label>
                    </div>
                    <div class="form_right">
                        <label class="form-group">
                            <span class="color_element">*</span> Ваше сообщение:
                            <textarea name="message" placeholder="Ваше сообщение"></textarea>
                        </label>
                        <div class="div_but">
                            <button>Отправить</button>
                        </div>
                    </div>                        
                </form>
            </div>
        </div>
    </div>
    <div class="section_band"></div>
</section>

<?php get_footer(); ?>