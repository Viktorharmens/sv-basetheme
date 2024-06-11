<section class="page-row page-row--homepage-header h-auto xl:min-h-[80vh] w-full relative -mt-36 overflow-hidden">

    <div class="container grid grid-cols-1 md:grid-cols-3 px-8 xl:px-0  gap-14 h-auto z-30 pt-36 lg:pt-96 pb-12 lg:pb-24">
        <div class="bg-darkblue h-60 xl:h-80 text-white p-10 relative shadow-lg">
            <?php
                echo '<h2 class="text-4xl xl:text-[52px] leading-none">' . $content['cta']['title'] . '
                <span class="text-2xl xl:text-3xl font-normal">' . $content['cta']['subtitle'] . '</span></h2>
                <a href="' . $content['cta']['button']['url'] . '" class="btn btn--white text-darkblue absolute left-10 bottom-10">' . $content['cta']['button']['title'] . '</a>';
            ?>
        </div>
        <div class="bg-blue h-60 xl:h-80 text-white p-10 relative shadow-lg">
            <?php
                echo '<h2 class="text-4xl xl:text-[52px] leading-none">' . $content['cta_2']['title'] . '
                <span class="text-2xl xl:text-3xl font-normal">' . $content['cta_2']['subtitle'] . '</span></h2>
                <a href="' . $content['cta_2']['button']['url'] . '" class="btn btn--white text-blue absolute left-10 bottom-10">' . $content['cta_2']['button']['title'] . '</a>';

            ?>
        </div>
        <div class="bg-lime h-60 xl:h-80 text-white p-10 relative shadow-lg">
            <?php
                echo '<h2 class="text-4xl xl:text-[52px] leading-none">' . $content['cta_3']['title'] . '
                <span class="text-2xl xl:text-3xl font-normal">' . $content['cta_3']['subtitle'] . '</span></h2>
                <a href="' . $content['cta_3']['button']['url'] . '" class="btn btn--white text-lime absolute left-10 bottom-10">' . $content['cta_3']['button']['title'] . '</a>';
            ?>
        </div>
    </div>
    
    <figure class="image w-full h-full absolute top-0 left-0 z-10">
        <?php

            $iframe = $content['video'];

            // Use preg_match to find iframe src.
            preg_match('/src="(.+?)"/', $iframe, $matches);
            $src = $matches[1];

            // Add extra parameters to src and replace HTML.
            $params = array(
                'controls'  => 0,
                'hd'        => 1,
                'autohide'  => 1,
                'autoplay'  => 1,
                'loop'      => 1,
                'mute'      => 1
            );
            $new_src = add_query_arg($params, $src);
            $iframe = str_replace($src, $new_src, $iframe);

            // Add extra attributes to iframe HTML.
            $attributes = 'frameborder="0"';
            $iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);

            // Display customized HTML.
            echo '<div class="embed-container hidden md:block">' . $iframe . '</div>';
        

            echo '<img src="' . $content['image']['sizes']['large'] . '" class="object-cover w-full h-full block md:hidden" />';  
        ?>
    </figure>
 	
</section>