<section class="page-row page-row--newsletter <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container bg-lightblue py-12">
        <div class="box w-full px-8 sm:px-0 lg:w-2/3 mx-auto font-bold text-3xl text-darkgrey relative">
            <?php echo $content['title'] ?>
            <?php echo do_shortcode('[gravityform id="' . $content['number'] . '" title="false" description="false"]');?>
        </div>

    </div>

</section>