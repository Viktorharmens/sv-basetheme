<section class="page-row page-row--slider relative overflow-hidden <?php echo !empty($content['delete_margin'])? '' : 'mt-24'; echo ($content['bg_color'])? ' bg_color' : '' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container px-8 xl:px-0 mb-10">
        <div class="mb-12">
            <h2 class="text-left ms:text-center pl-8 sm:pl-0 text-lime leading-none"><?php echo $content['title']; ?></h2>
            <?php if($content['link']['url']) {
                echo '<a href="' . $content['link']['url'] . '" class="btn btn--inline relative sm:absolute pl-8 sm:pl-0 right-0 top-3" target="' . $content['link']['target'] . '">' . $content['link']['title'] . '</a>';

            } 
            ?>
                
        </div>

        <?php 
            echo '<div class="slider js-slider">';
            foreach( getNews($content['type_post']) as &$post)   {

                // echo "<pre>";
                // print_r($post);
                // echo "</pre>";

                $id = $post['image'];
                echo '<div class="slide card h-[420px] border-b-8 border-lime relative shadow-lg">
                        <a href="' . $post['link'] . '">
                            <div class="h-full w-full image"><img src="' . $post['image']. '" class="h-full w-full object-cover" /></div>
                            <div class="title absolute bottom-6 left-6 right-6 text-white text-[20px] font-bold uppercase z-10 pr-6">' . $post['title'] .'</div>
                        </a>
                    </div>';
            }
            echo '</div>';
        ?>

    </div>

</section>