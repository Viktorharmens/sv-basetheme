<section class="page-row page-row--cta <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container flex py-16 items-start place-items-start <?php echo $content['bg_color']; ?>">

        <div class="box block md:flex items-center place-items-center w-4/5 mx-auto">

            <div class="text w-full md:w-3/4 text-3xl pr-0 md:pr-16">
                <?php echo $content['content']; ?>
            </div>
            <?php if ($content['button']['link']['url']) {
                echo  '<a href="' . $content['button']['link']['url'] . '" 
                class="btn btn--landing js-modal-' . $content['button']['open_modal'] . ' btn--' . $content['button']['color'] . ' mt-6 md:mt-0">
                ' . $content['button']['link']['title'] . '</a>';
                }
            ?>

        </div>

    </div>
	
</section>