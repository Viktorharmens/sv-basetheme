<section class="page-row page-row--image-header relative h-[60vh] grid items-center <?php echo !empty($content['color_overlay']) ?>">

    <div class="container relative z-50 p-8 xl:p-0">
        <div>
            <h1 class="title text-white w-full sm:w-2/3 text-4xl md:text-7xl leading-none"><?php echo $content['title'] ?></h1>
            <?php 
                $buttons = $content['buttons'];

                if( $buttons ) {
                    foreach( $buttons as $button ) {
                        echo '<a href="' . $button['button']['link']['url'] . '" class="btn btn--white text-black mt-16 mr-4 js-modal-' . $button['button']['open_modal'] . '">' . $button['button']['link']['title'] . '</a>';
                    }
                }
            ?>
        </div>
    </div>

  
    <figure class="image absolute top-0 left-0 w-full h-full">
        <img src="<?php echo $content['image']['sizes']['large'] ?>" class="h-full w-full object-cover block" />
    </figure>
 	
</section>