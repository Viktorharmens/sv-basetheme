<section class="page-row page-row--video <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container px-8 xl:px-0">

      <div class="video h-0 pb-[56.25%] relative">
        <span class="title text-white absolute left-8 lg:left-12 bottom-8 lg:bottom-12 z-50 font-bold text-2xl xl:text-5xl"><?php echo $content['title'] ?></span>
        <?php if ($content['image']) {
          echo '<div class="image absolute top-0 h-full w-full object-cover z-10"><img src="' . $content['image']['sizes']['large'] . '" class="h-full w-full object-cover" /></div>';
        } ?>
        <?php echo $content['video'] ?>

      </div>

    </div>

</section>