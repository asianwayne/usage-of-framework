function abt_sliders($data=NULL) {

	 if (tie_get_option('slides_check') == 'slides'): ?>
	<section class="style-one slide-container">
		 <!-- Slider main container -->
        <div class="swiper-container">
         <!-- Additional required wrapper -->
         <div class="swiper-wrapper">
         	<?php 
				$query = new WP_Query(
					array(
						'post_type'  => 'tie_slider',
					)
				);
				while ($query->have_posts()) {
					$query->the_post();
					$custom = get_post_custom( $post_id );
					$slider = unserialize( $custom["custom_slider"][0] );
					$i = 0;
					if( !empty( $slider ) ) {
						foreach($slider as $slide) {
							$i++;
							$image = wp_get_attachment_image_url( $slide['id'] , 'large' ); ?>
								 <div class="swiper-slide" style="background-image: url(<?php echo $image; ?>);"></div>
							<?php
							
						}}} wp_reset_postdata();
				 ?>
             <!-- Slides -->
            
         </div>
         <!-- If we need pagination -->
         <div class="swiper-pagination"></div>
     
         <!-- If we need navigation buttons -->
         <div class="swiper-button-prev"></div>
         <div class="swiper-button-next"></div>
     
         <!-- If we need scrollbar -->
         <div class="swiper-scrollbar"></div>
     </div>
		
	</section>

	<?php endif;
	
}
