<?php 
// start all dynamic css from here

function ncmbp_dynamic_css()
{ ?>


<style type="text/css">
    .feature__single h3 {
        color: <?php $title_color = get_option('title_color');
         if(!empty($title_color)){
                echo esc_attr( $title_color );
            }else{
                echo '#01a6fe';
            }
         ?>;

        font-size: <?php $title_font_size = get_option('title_font_size');
             if(!empty($title_font_size)){
                echo esc_attr( $title_font_size );
            }else{
                echo '24px';
            }
        ?>;

        font-family: <?php $ncmbp_font__family = get_option('ncmbp_font__family');
                    if(!empty($ncmbp_font__family)){
                        echo esc_attr( $ncmbp_font__family );
                    }else{
                        echo 'Signika Negative';
                    }
                ?>;
    }

    
.feature__single p,
.other__resources_single p {
    color: <?php $details_color = get_option('details_color');
        if(!empty($details_color)){
            echo esc_attr( $details_color );
        }else{
            echo '#646464';
        }
    ?>;
      font-size: <?php $paragraph_font_size = get_option('paragraph_font_size');
             if(!empty($paragraph_font_size)){
                echo esc_attr( $paragraph_font_size );
            }else{
                echo '16px';
            }
        ?>;
        
    font-family: <?php $ncmbp_font__family = get_option('ncmbp_font__family');
             if(!empty($ncmbp_font__family)){
                echo esc_attr( $ncmbp_font__family );
            }else{
                echo 'Signika Negative';
            }
        ?>;
}

.feature__single {
    padding: <?php echo get_option('ncmbp__blog_column_padding');?>;
    box-shadow:  <?php $ncmbp__column_shadow = get_option('ncmbp__column_shadow');
         if(!empty($ncmbp__column_shadow)){
            echo esc_attr( $ncmbp__column_shadow );
            }else{
                echo '1px 1px 3px 2px #f4f5f6';
            }
         ?>;
    border-radius: <?php $ncmbp__column_borderRadius = get_option('ncmbp__column_borderRadius');
         if(!empty($ncmbp__column_borderRadius)){
            echo esc_attr( $ncmbp__column_borderRadius );
            }else{
                echo '0px';
            }
         ?>;

}


a.page-numbers {
    background-color:  <?php $ncmbp__pagination_color = get_option('ncmbp__pagination_color');
         if(!empty($ncmbp__pagination_color)){
            echo esc_attr( $ncmbp__pagination_color );
            }else{
                echo 'transparent';
            }
         ?>;
         
    color: <?php $ncmbp__pagination_Fontcolor = get_option('ncmbp__pagination_Fontcolor');
         if(!empty($ncmbp__pagination_Fontcolor)){
                echo esc_attr( $ncmbp__pagination_Fontcolor );
            }else{
                echo '#464646';
            }
         ?>;
         
    border-radius: <?php $ncmbp__Pagination_borderRadius = get_option('ncmbp__Pagination_borderRadius');
         if(!empty($ncmbp__Pagination_borderRadius)){
                echo esc_attr( $ncmbp__Pagination_borderRadius );
            }else{
                echo '0';
            }
         ?>;
}



span.page-numbers.current {
    border-radius: <?php $ncmbp__Pagination_borderRadius = get_option('ncmbp__Pagination_borderRadius');
         if(!empty($ncmbp__Pagination_borderRadius)){
                echo esc_attr( $ncmbp__Pagination_borderRadius );
            }else{
                echo '0';
            }
         ?>;
}


span.page-numbers.current {
    background-color: <?php $ncmbp__pagination_Hovercolor = get_option('ncmbp__pagination_Hovercolor');
         if(!empty($ncmbp__pagination_Hovercolor)){
                echo esc_attr( $ncmbp__pagination_Hovercolor );
            }else{
                echo '#01A6FE';
            }
         ?>;
    color: <?php $ncmbp__pagination_Fontcolor = get_option('ncmbp__pagination_Fontcolor');
         if(!empty($ncmbp__pagination_Fontcolor)){
                echo esc_attr( $ncmbp__pagination_Fontcolor);
            }else{
                echo '#fff';
            }
         ?>;
}

.feature__single img {
    border-top-right-radius:  <?php $ncmbp__Featureimg_borderRadius = get_option('ncmbp__Featureimg_borderRadius');
         if(!empty($ncmbp__Featureimg_borderRadius)){
                echo esc_attr( $ncmbp__Featureimg_borderRadius);
            }else{
                echo '0px';
            }
         ?>;
    border-top-left-radius:  <?php $ncmbp__Featureimg_borderRadius = get_option('ncmbp__Featureimg_borderRadius');
         if(!empty($ncmbp__Featureimg_borderRadius)){
                echo esc_attr( $ncmbp__Featureimg_borderRadius);
            }else{
                echo '0px';
            }
         ?>;
}


a.ncmbp_read_btn {
    border-radius: <?php $ncmbp__Btn_borderRadius = get_option('ncmbp__Btn_borderRadius');
         if(!empty($ncmbp__Btn_borderRadius)){
                echo esc_attr( $ncmbp__Btn_borderRadius);
            }else{
                echo '0px';
            }
         ?>;

         
    background-color: <?php $ncmbp__Btn_bgColor = get_option('ncmbp__Btn_bgColor');
         if(!empty($ncmbp__Btn_bgColor)){
                echo esc_attr( $ncmbp__Btn_bgColor);
            }else{
                echo '#01A6FE';
            }
         ?>; 

    color: <?php $ncmbp__Btn_textColor = get_option('ncmbp__Btn_textColor');
         if(!empty($ncmbp__Btn_textColor)){
                echo esc_attr( $ncmbp__Btn_textColor);
            }else{
                echo '#fff';
            }
         ?>;
    
    border: 2px solid <?php $ncmbp__Btn_borderColor = get_option('ncmbp__Btn_borderColor');
         if(!empty($ncmbp__Btn_borderColor)){
                echo esc_attr( $ncmbp__Btn_borderColor);
            }else{
                echo '#01A6FE';
            }
         ?>;
}

a.ncmbp_read_btn:hover {
    background-color: <?php $ncmbp__Btn_HoverColor = get_option('ncmbp__Btn_HoverColor');
         if(!empty($ncmbp__Btn_HoverColor)){
                echo esc_attr( $ncmbp__Btn_HoverColor);
            }else{
                echo 'transparent';
            }
         ?>;
    border: 2px solid <?php $ncmbp__Btn_HoverborderColor = get_option('ncmbp__Btn_HoverborderColor');
         if(!empty($ncmbp__Btn_HoverborderColor)){
                echo esc_attr( $ncmbp__Btn_HoverborderColor);
            }else{
                echo '#01A6FE';
            }
         ?>;
    color: <?php $ncmbp__Btn_hvfontColor = get_option('ncmbp__Btn_hvfontColor');
         if(!empty($ncmbp__Btn_hvfontColor)){
                echo esc_attr( $ncmbp__Btn_hvfontColor);
            }else{
                echo '#fff';
            }
         ?>;
}

</style>



<?php 
}
add_action('wp_footer','ncmbp_dynamic_css', 100);
?>