<section class="page-row page-row--content <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>"data-aos="fade-up">

    <div class="content px-8 md:px-0 w-full max-w-[720px] mx-auto">
        <div class="entry"><?php echo $content['content'] ?></div>
        <?php if ($content['button']['link']) {
            echo  '<a href="' . $content['button']['link']['url'] . '" 
            class="btn btn--landing js-modal-' . $content['button']['open_modal'] . ' btn--' . $content['button']['color'] . '">
            ' . $content['button']['link']['title'] . '</a>';
            }
        ?>
    </div>

	
</section>