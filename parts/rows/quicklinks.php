<section class="page-row page-row--quicklinks h-auto w-full relative overflow-hidden mt-24" data-aos="fade-up">
    <div class="container grid grid-cols-1 lg:grid-cols-3 px-8 xl:px-0  gap-14 h-auto z-30">
        
        <?php
        // echo "<pre>";
        // print_r($content);
        // echo "</pre>";

            foreach( $content['quicklinks'] as &$quicklink ) {

                echo '<div class="quicklink h-60 xl:h-80 text-white p-10 relative shadow-lg bg-' . $quicklink['background_color'] . '">
                <h2 class="text-4xl xl:text-[52px] leading-none">' . $quicklink['title'] . '
                <span class="text-2xl xl:text-3xl font-normal">' . $quicklink['subtitle'] . '</span></h2>
                <a href="' . $quicklink['button']['url'] . '" class="btn btn--white text-' . $quicklink['background_color'] . '  absolute left-10 bottom-10">' . $quicklink['button']['title'] . '</a></div>';
            }

        ?>

    </div>
</section>