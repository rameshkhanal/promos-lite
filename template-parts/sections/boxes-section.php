<?php
/**
 * Promos Promo Unique
 * @since Promos 1.0.0
 *
 * @param null
 * @return void
 *
 */
global $promos_theme_options;
$promo_cat = absint($promos_theme_options['promos-promo-select-category']);
?>
    <section class="promos-promo-section">
            <div class="container">
                <div class="promo-section">
                    <div class="row">
                    <?php
                    $args = array(
                        'cat' => $promo_cat ,
                        'posts_per_page' => 3,
                        'order'=> 'DESC'
                    );
                    
                    $query = new WP_Query($args);
                    
                    if($query->have_posts()):                        
                        while($query->have_posts()):
                            $query->the_post();
                            ?> 
                                                       
                            <div class="col-lg-4 mb-4 mb-lg-0">
                                <?php
                                    if(has_post_thumbnail()){
                                        $image_id  = get_post_thumbnail_id();
                                        $image_url = wp_get_attachment_image_src($image_id,'promos-promo-post',true);
                                    } 
                                ?>
                                <div class="promo-box-item" style="background-image: url(<?php echo esc_url($image_url[0]);?>)">
                                    <a class="link-promobox box-style" href="<?php the_permalink(); ?>">
                                        <?php $posttags = get_the_tags();
                                            if( !empty( $posttags ))
                                            {
                                                ?>
                                                <?php
                                                $count = 0;
                                                if ( $posttags )
                                                {
                                                    foreach( $posttags as $c_tag )
                                                    {
                                                        $count++;
                                                        if ( 1 == $count )
                                                        {
                                                            echo $c_tag->name;
                                                        }
                                                    }
                                                } ?>
                                            <?php  }else{
                                                $categories = get_the_category();
                                                if ( ! empty( $categories ) ) {
                                                    echo esc_html( $categories[0]->name );
                                                }
                                            } ?>
                                        </a>
                                </div>
                            </div>
                            
                        <?php endwhile; endif; wp_reset_postdata(); ?>
                </div>
                </div>
            </div>
    </section>