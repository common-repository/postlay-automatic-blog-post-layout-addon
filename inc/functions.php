<?php

 /**
 * ncmbp Adds a submenu page under a custom post type parent.
 */

function ncmbp_register_page() {
    add_submenu_page( 
        'edit.php?post_type=ncmbp',
        __( 'Settings', 'ncmbp' ),
        __( 'PostLay Settings', 'ncmbp' ),
        'manage_options',
        'ncmbp-settings-pages',
        'ncmbp_page_callback'
    );
}

add_action('admin_menu', 'ncmbp_register_page');
 
/**
 * Display callback for the submenu page.
 */
function ncmbp_page_callback() { 
    ?>
    <div class="ncmbp__root">
        <div class="ncmbp__header">
            <div class="ncmbp__logo">	
                <img src="<?php echo esc_url( plugins_url( '../img/dasboard-admin-icon.png', __FILE__ ) ) ?>" >
            </div>
            <div class="ncmbp__Rating_button">
                <a href="https://wordpress.org/support/plugin/postlay-automatic-blog-post-layout-addon/reviews/" target="_blank" class="ncmbp__btn">Rate Us <img src="<?php echo esc_url( plugins_url( '../img/dashboard-star.png', __FILE__ ) ) ?>" ></a>
            </div>
        </div>
        <div class="main__section_ncmbpButtons">
            <div class="ncmbp__options_Buttons">
                <h5 class="ncmbp-item">Settings</h5>
                <ul>
                    <li>
                        <button class="ncmbp_button tablink  ncmbp-active" onclick="openLink(event, 'Fade')">General</button>
                    </li>
                    <li>
                        <button class="ncmbp_button tablink" onclick="openLink(event, 'Left')">Color Options</button>
                    </li>
                    <li>
                        <button class="ncmbp_button tablink" onclick="openLink(event, 'Right')">Typography</button>
                    </li>
                    <li>
                        <button class="ncmbp_button tablink" onclick="openLink(event, 'Top')">Blog Options</button>
                    </li>
                    <li>
                        <button class="ncmbp_button tablink" onclick="openLink(event, 'Bottom')">Border Options</button>
                    </li>
                    <li>
                        <button class="ncmbp_button tablink" onclick="openLink(event, 'Zoom')">About Us</button>
                    </li>
                </ul>
                
            </div>

            <div class="ncmbp__options_menu">
                <div class="w3-padding">
                <h1><?php // _e( '<p>🔥 PostLay is an Automatic Blog Post Layout Addon for Wordpress. This plugin gives you more flexibility to handle easily the blog posts with PostLay.</p>', 'ncmbp' ); ?></h1></div>
                <form action="options.php" method="post">
                    <?php wp_nonce_field('update-options');?>
                    
                    <input type="hidden" name="action" value="update"/>
                    <input type="hidden" name="page_options" value="title_color, details_color,title_font_size,paragraph_font_size,ncmbp__blog_column_padding,ncmbp__blog_posts_number,ncmbp__pagination_color,ncmbp__pagination_Hovercolor,ncmbp__pagination_Fontcolor,ncmbp__column_borderRadius,ncmbp__Featureimg_borderRadius,ncmbp__column_shadow,ncmbp__Btn_borderRadius,ncmbp__Pagination_borderRadius,ncmbp_font__family,ncmbp__Btn_bgColor,ncmbp__Btn_hvfontColor,ncmbp__Btn_borderColor,ncmbp__Btn_textColor,ncmbp__Btn_HoverColor,ncmbp__Btn_HoverborderColor"/>

                
                    <div id="Fade" class="w3-container city w3-animate-opacity" style="display:block">
                        <div class="general_options_banner">
                        <a target="__blank" href="https://wordpress.org/support/plugin/postlay-automatic-blog-post-layout-addon/reviews/"><img src="<?php echo esc_url( plugins_url( '../img/general-options-banner.png', __FILE__ ) ) ?>" alt="banner"></a>
                        </div>
                        <h2>How it works?</h2>
                        <p>1. Activate the plugin through the <b>‘Plugins’</b> menu in WordPress.</p>
                        <p>2. Use shortcode from bellow in the “post/page” to display <b>PostLay - Automatic Blog Post Layout!</b></p>
                        <p>3. Copy this Shortcode</p>
                        <p class="shortcode_design"><b>[postlay_posts]</b></p>
                    </div>

                    <div id="Left" class="w3-container city w3-animate-left" style="display:none">
                        <h2>Color Options</h2>
                        <div class="ncmbp__dashboard_options">
                            <label name="title_color" for="title_color"><?php echo esc_attr(__('PostLay Title Color: ')); ?></label>
                            <input type="text" id="color_code" class="my-color-field" name="title_color" value="<?php echo esc_attr(get_option('title_color'));?>">
                        </div>
                        
                        <div class="ncmbp__dashboard_options">
                            <label name="details_color" for="details_color"><?php echo esc_attr(__('PostLay Paragraph Color ')); ?></label>
                            <input type="text" class="my-color-field" name="details_color" value="<?php echo esc_attr(get_option('details_color'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__pagination_color" for="ncmbp__pagination_color"><?php echo esc_attr(__('Pagination Background Color ')); ?></label>
                            <input type="text" class="my-color-field" name="ncmbp__pagination_color" value="<?php echo esc_attr(get_option('ncmbp__pagination_color'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__pagination_Hovercolor" for="ncmbp__pagination_Hovercolor"><?php echo esc_attr(__('Pagination Hover Color ')); ?></label>
                            <input type="text" class="my-color-field" name="ncmbp__pagination_Hovercolor" value="<?php echo esc_attr(get_option('ncmbp__pagination_Hovercolor'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__pagination_Fontcolor" for="ncmbp__pagination_Fontcolor"><?php echo esc_attr(__('Pagination Text Color ')); ?></label>
                            <input type="text" class="my-color-field" name="ncmbp__pagination_Fontcolor" value="<?php echo esc_attr(get_option('ncmbp__pagination_Fontcolor'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_bgColor" for="ncmbp__Btn_bgColor"><?php echo esc_attr(__('Button Background Color ')); ?></label>
                            <input type="text" class="my-color-field" name="ncmbp__Btn_bgColor" placeholder="#01A6FE" value="<?php echo esc_attr(get_option('ncmbp__Btn_bgColor'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_borderColor" for="ncmbp__Btn_borderColor"><?php echo esc_attr(__('Button Border Color ')); ?></label>
                            <input type="text" class="my-color-field" name="ncmbp__Btn_borderColor" placeholder="#01A6FE" value="<?php echo esc_attr(get_option('ncmbp__Btn_borderColor'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_textColor" for="ncmbp__Btn_textColor"><?php echo esc_attr(__('Button Text Color ')); ?></label>
                            <input type="text" class="my-color-field" name="ncmbp__Btn_textColor" placeholder="#01A6FE" value="<?php echo esc_attr(get_option('ncmbp__Btn_textColor'));?>">
                        </div>

                        
                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_hvfontColor" for="ncmbp__Btn_hvfontColor"><?php echo esc_attr(__('Button Hover Text Color ')); ?></label>
                            <input type="text" name="ncmbp__Btn_hvfontColor" class="my-color-field" placeholder="#ffffff" value="<?php echo esc_attr(get_option('ncmbp__Btn_hvfontColor'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_HoverColor" for="ncmbp__Btn_HoverColor"><?php echo esc_attr(__('Button Hover BG Color ')); ?></label>
                            <input type="text" name="ncmbp__Btn_HoverColor" class="my-color-field" placeholder="#333333" value="<?php echo esc_attr(get_option('ncmbp__Btn_HoverColor'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_HoverborderColor" for="ncmbp__Btn_HoverborderColor"><?php echo esc_attr(__('Button Hover Border Color ')); ?></label>
                            <input type="text" name="ncmbp__Btn_HoverborderColor" class="my-color-field" placeholder="#333333" value="<?php echo esc_attr(get_option('ncmbp__Btn_HoverborderColor'));?>">
                        </div>
                        <input type="submit" class="ncmbp__submit_btn" name="submit" value="<?php _e('Save Changes', 'netoricstp')?>">
                    </div>
                
                    <div id="Top" class="w3-container city w3-animate-top" style="display:none">  
                        <h2>Blog Options</h2>
                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__blog_column_padding" for="ncmbp__blog_column_padding"><?php echo esc_attr(__('Blog Column Padding ')); ?></label>
                            <input type="text" name="ncmbp__blog_column_padding" placeholder="15px"  value="<?php echo esc_attr(get_option('ncmbp__blog_column_padding'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__blog_posts_number" for="ncmbp__blog_posts_number"><?php echo esc_attr(__('Blog Posts Show Numbers ')); ?></label>
                            <input type="text" name="ncmbp__blog_posts_number" placeholder="6"  value="<?php echo esc_attr(get_option('ncmbp__blog_posts_number'));?>">
                        </div>

                    
                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__column_shadow" for="ncmbp__column_shadow"><?php echo esc_attr(__('Column Box Shadow: ')); ?></label>
                            <input type="text" name="ncmbp__column_shadow" placeholder="1px 1px 3px 2px #fbfbfb" value="<?php echo esc_attr(get_option('ncmbp__column_shadow'));?>">
                        </div>
                        <input type="submit" class="ncmbp__submit_btn" name="submit" value="<?php _e('Save Changes', 'netoricstp')?>">

                    </div>

                    <div id="Right" class="w3-container city w3-animate-top" style="display:none">
                        <h2>Typography Options</h2>
                        <div class="ncmbp__dashboard_options">
                            <label name="title_font_size" for="title_font_size"><?php echo esc_attr(__('Title Font Size: ')); ?></label>
                            <input type="text" name="title_font_size" placeholder="25px" value="<?php echo esc_attr(get_option('title_font_size'));?>">
                        </div>
                        
                        <div class="ncmbp__dashboard_options">
                            <label name="paragraph_font_size" for="paragraph_font_size"><?php echo esc_attr(__('Paragraph Font Size ')); ?></label>
                            <input type="text" name="paragraph_font_size" placeholder="18px" value="<?php echo esc_attr(get_option('paragraph_font_size'));?>">
                        </div>
                        
                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp_font__family" for="ncmbp_font__family"><?php echo esc_attr(__('Change Font Family ')); ?></label>
                            <input type="text" name="ncmbp_font__family" placeholder="Signika Negative" value="<?php echo esc_attr(get_option('ncmbp_font__family'));?>">
                        </div>
                        <input type="submit" class="ncmbp__submit_btn" name="submit" value="<?php _e('Save Changes', 'netoricstp')?>">

                    </div>
                    <div id="Bottom" class="w3-container city w3-animate-zoom" style="display:none">
                        <h2>Border Options</h2><div class="ncmbp__dashboard_options">
                            <label name="ncmbp__column_borderRadius" for="ncmbp__column_borderRadius"><?php echo esc_attr(__('Column Border Radius ')); ?></label>
                            <input type="text" name="ncmbp__column_borderRadius" placeholder="0px" value="<?php echo esc_attr(get_option('ncmbp__column_borderRadius'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Featureimg_borderRadius" for="ncmbp__Featureimg_borderRadius"><?php echo esc_attr(__('Feature Image Border Radius ')); ?></label>
                            <input type="text" name="ncmbp__Featureimg_borderRadius" placeholder="0px" value="<?php echo esc_attr(get_option('ncmbp__Featureimg_borderRadius'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Btn_borderRadius" for="ncmbp__Btn_borderRadius"><?php echo esc_attr(__('Button Border Radius ')); ?></label>
                            <input type="text" name="ncmbp__Btn_borderRadius" placeholder="0px" value="<?php echo esc_attr(get_option('ncmbp__Btn_borderRadius'));?>">
                        </div>

                        <div class="ncmbp__dashboard_options">
                            <label name="ncmbp__Pagination_borderRadius" for="ncmbp__Pagination_borderRadius"><?php echo esc_attr(__('Pagination Border Radius ')); ?></label>
                            <input type="text" name="ncmbp__Pagination_borderRadius" placeholder="0px" value="<?php echo esc_attr(get_option('ncmbp__Pagination_borderRadius'));?>">
                        </div>
                        <input type="submit" class="ncmbp__submit_btn" name="submit" value="<?php _e('Save Changes', 'netoricstp')?>">

                    </div>

                    <div id="Zoom" class="w3-container city w3-animate-zoom" style="display:none">
                        <h2>About Us</h2>
                        <p>
                            Netro Soft is a end-to-end App and Plugin developer company. We focus on user experience as well as user feasibility. We started from solving a particular problem and we are still continuing our hard work to deliver something better.<br><br>
                            <strong>Email:</strong>  contact@netroics.com<br>
                            <strong>Web:</strong> <a href="https://netroics.com/" target="_blank"><b>www.netroics.com</b></a><br>
                        </p>
                    </div>
                    
                </form>
            </div>
        </div>
    </div>
    
    <?php
}