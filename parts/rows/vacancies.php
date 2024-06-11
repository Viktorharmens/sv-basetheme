<section class="page-row page-row--vacancies overflow-hidden <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container px-8 xl:px-0">
    <div class="mb-12">
            <h2 class="text-left ms:text-center pl-8 sm:pl-0 text-lime leading-none block max-w-full sm:max-w-[70%]"><?php echo $content['title']; ?></h2>
            <?php if($content['link']) {
                echo '<a href="' . $content['link']['url'] . '" class="btn btn--inline relative  ml-6 ms:ml-0 cursor-pointer sm:absolute pl-8 md:pl-0 right-6 top-3" target="' . $content['link']['target'] . '">' . $content['link']['title'] . '</a>';
            } 
            ?>
                
        </div>
        <?php

        foreach($content['vacancies'] as &$vacancy) {

            $originalDate = $vacancy->post_date;
            $newDate = date("d F Y", strtotime($originalDate));
            echo '<div class="vacancy bg-white shadow-md block md:flex w-full mb-8">
            <figure class="h-52 md:h-40 w-full md:w-52">
                <img src="' . get_the_post_thumbnail_url($vacancy->ID, 'large') . '" class="h-full w-full object-cover object-top" />
            </figure>
            <div class="content p-6 block md:flex items-center relative w-full">

                <h3 class="text-2xl md:text-4xl text-darkgrey w-full md:w-2/3">'
                 . $vacancy->post_title . 
                 '</h3>
                <a href="' . get_permalink($vacancy->ID) . '" class="btn btn--green relative md:absolute md:right-6 mt-6 md:mt-0">Bekijk de vacature</a>
            </div>
            </div>';
        }

        ?>


    </div>

</section>