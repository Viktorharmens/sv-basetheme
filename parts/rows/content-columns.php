<section class="page-row page-row--content-columns <?php echo $content['bg_color'] ?> <?php echo ($content['bg_color'] != 'bg-none' )? 'py-20' : '' ?> <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container grid grid-cols-1 md:grid-cols-2 px-8 lg:px-0 gap-16 
            <?php if ($content['bg_color'] == 'bg-none') {
                echo ' text-blue';
            } elseif ($content['bg_color'] == 'bg-lightblue') {
                echo ' text-black';
            } else {
                echo ' text-white';
            } ?>">
  
        <div class="column order-1">
            <h2 class="title text-4xl 
            <?php if ($content['bg_color'] == 'bg-none') {
                echo ' text-blue';
            } elseif ($content['bg_color'] == 'bg-lightblue') {
                echo ' text-black';
            } else {
                echo ' text-white';
            } ?> mb-4">
            <?php echo $content['column_left']['title'] ?></h2>
            <div class="entry"><?php echo $content['column_left']['content'] ?></div>
            <?php 

                $buttons = $content['column_left']['buttons'];

                if( $buttons ) {
                    foreach( $buttons as $button ) {
                        echo  '<a href="' . $button['button']['link']['url'] . '" 
                        class="btn btn--landing mr-4 js-modal-' . $button['button']['open_modal'] . ' btn--' . $button['button']['color'] . '">
                        ' . $button['button']['link']['title'] . '</a>';
                    }
                }
            ?>
        </div>

        <div class="column order-2">
            <h2 class="title text-4xl 
            <?php if ($content['bg_color'] == 'bg-none') {
                echo ' text-blue';
            } elseif ($content['bg_color'] == 'bg-lightblue') {
                echo ' text-black';
            } else {
                echo ' text-white';
            } ?> mb-4">
            <?php echo $content['column_right']['title'] ?></h2>
            <div class="entry"><?php echo $content['column_right']['content'] ?></div>
            <?php 

                $buttons = $content['column_right']['buttons'];

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