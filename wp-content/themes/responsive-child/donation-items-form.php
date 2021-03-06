<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<form action="campaigns/donation/" method="POST" class="donation-items-form">
    <?php $campaign_id = $_GET["p"];
        $donation_items_loop = new WP_Query( array( 'post_type' => 'donation-item',
                                              'posts_per_page' => 100,
                                              'meta_key' => 'parent',
                                              'meta_value' => $campaign_id ) );?>

    <?php if( $donation_items_loop->have_posts() ) : ?>
        <ul>
            <?php while( $donation_items_loop->have_posts() ) : $donation_items_loop->the_post(); ?>
                <li class='need-item'>
                    <input type="hidden" class="donation-item-hidden-id" value="<?php the_ID(); ?>"/>
                    <span class='need-title'><?php the_title(); ?></span>
                    <span class='need-desc'><?php the_content( __(  'Read more &#8250;', 'responsive' ) ); ?></span>

                    <span class='need-count'>Необходим брой: </span><span><?php print_custom_field('total_amount'); ?></span>
                    <span class='need-has'>Събрани: </span><span id="current-amount-<?php the_ID(); ?>"><?php print_custom_field('current_amount'); ?></span>
                    <span class='want-to'>Желая да даря:</span>
                    <input class="select-donation-item" name="donate-<?php the_ID(); ?>" type="checkbox" />
                  
                    <div class="donation-item-wrapper" id="donation-item-wrapper-<?php the_ID(); ?>" style="display: none">
                        <label class='amount-label'>Количество </label><input name="amount-item-<?php the_ID(); ?>[]" type="number" class='amount-item-box' value='1'><br />
                    </div>
                </li>
            <?php 
                endwhile;
                wp_reset_postdata();?>
        </ul>
    
        <input type="hidden" value="<?php echo $campaign_id; ?>" name="campaign_id"/>
        <input type="submit" class="submit-donation-button" value="Дари!" >
    <?php else :
            get_template_part( 'loop-no-posts' );
        endif;
        ?>
</form>

<?php add_new_donation_script(); ?>
