<section class="page-row page-row--content-image <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container grid grid-cols-1 md:grid-cols-2 gap-24 px-8 xl:px-0 relative items-center image--<?php echo $content['image_position'] ?>">
        <figure class="image relative mb-5 md:mb-0 h-full w-full <?php echo ($content['image_position'] == 'right')? 'order-2' : 'order-1' ?>">
            <img src="<?php echo $content['image']['sizes']['large'] ?>" class="relative z-50 h-full w-full object-cover shadow-lg"/>
        </figure>

        <div class="content items-center order-1">
            <h2 class="title title--small leading-none mb-4 text-blue"><?php echo $content['title'] ?></h2>
            <div class="entry"><?php echo $content['content'] ?></div>
            <?php 

                $buttons = $content['buttons'];

                if( $buttons ) {
                    foreach( $buttons as $button ) {
                        echo  '<a href="' . $button['button']['link']['url'] . '" 
                        class="btn btn--landing mr-4 js-modal-' . $button['button']['open_modal'] . ' btn--' . $button['button']['color'] . '">
                        ' . $button['button']['link']['title'] . '</a>';
                    }
                }
            ?>
        </div>
    </div>
	
</section>