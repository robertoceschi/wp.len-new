<?php
    /**
     * The Main Off-Canvas Sidebar containing the primary navigation and the main widget area.
     *
     */
    ?>
    <!--Start OFF-Canvas part left-->
        <nav role="navigation">
            <aside id="main_nav">
                <?php
                    $args = array(
                        'menu' => 'main_menu',
                        'echo' =>  false
                    );

                        echo strip_tags(wp_nav_menu($args), '<a>');
                    ;?>

            </aside>
            <aside id="sociallinks"><h3 class="one"><span>FIND ME ONE</span></h3>
                <ul class="sociallinks">
                    <li><a href="http://www.facebook.com/elmastudio" class="facebook" title="Facebook"
                           target="_blank"><span
                            aria-hidden="true" data-icon="&#xe000;" class="hi-icon icon-facebook"></span></a><a
                            href="http://www.flickr.com/photos/elmastudio" class="twitter" title="Twitter"
                            target="_blank"><span aria-hidden="true" data-icon="&#xe002;"
                                                  class="icon-twitter"></span></a><a
                            href="#" class="instagram" title="Instagram" target="_blank"><span aria-hidden="true"
                                                                                               data-icon="&#xe001;"
                                                                                               class="icon-instagram"></span></a>
                    </li>
                </ul>
                <!-- end .sociallinks -->
            </aside>
            <?php
            $the_query = new WP_Query( array( 'post_type' => 'about' ) );
             while ($the_query->have_posts()) : $the_query->the_post();
                $image = get_field('picture');
                $subtext = get_field('subtext');
                $maintext = get_field('maintext');
                ?>
            <aside id="about_me"><h3 class="one"><span>ABOUT ME</span></h3>
                <div class="about-widget-container">
                    <div class="about-img-wrap">
                        <img src="<?php echo $image; ?>" width="180"
                             height="180"
                             class="about-image" alt="Main Content Picture">
                        <p>"<?php echo $subtext;?>"</p>
                    </div>
                    <!-- end .about-img-wrap -->
                    <div class="about-text-wrap">
                        <p><?php echo $maintext; ?></p>
                    </div>
                    <!-- end .about-text-wrap -->
                </div>

            </aside>
        <?php endwhile; ?>


            <aside id="search" class="search"><h3 class="one"><span>SEARCH</span></h3>
                <?php get_template_part ('content', 'searchform'); ?>
            </aside>

            <aside id="categories" class="categories"><h3 class="one"><span>CATEGORIES</span></h3>
                <ul>
                    <?php
                    $args = array(
                        'oderby' => 'name',
                        'parent'  => 0
                    );
                    $categories = get_categories($args);
                    foreach ($categories as $category) {
                        echo '<li class="cat-item"><a href=" ' . get_category_link($category->term_id) . '" >'
                            . $category->name . '</a></li>';
                    }
                    ?>
                </ul>
            </aside>
        </nav>