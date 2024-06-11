<section class="page-row page-row--images overflow-hidden <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container mb-8 px-8 xl:px-0">

        <?php
            echo '<div class="slider js-slider-images">';


            $count = count($content['images']);

            // echo "<pre>";
            // print_r($count);
            // echo "</pre>";

            foreach ($content['images'] as &$image )  {

                if ($count > 1) {
                    echo '<div class="slide image h-[520px]">
                        <img src="' . $image['sizes']['large'] . '" class="h-full w-full object-cover" />
                    </div>';
                } else {
                    echo '<div class="slide image h-auto">
                        <img src="' . $image['sizes']['large'] . '" class="h-full w-full object-cover" />
                    </div>';
                }
            }
            echo '</div>';
        ?>

    </div>

</section>