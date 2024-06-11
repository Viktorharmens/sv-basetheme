<section class="page-row page-row--color-header relative -mt-40 mb-44 ">

    <div class="container relative z-30 flex gap-16 items-center pt-40 px-8 xl:px-0">

        <figure class="image relative -bottom-14 left-0 h-full max-w-[400px]">
            <img src="<?php echo $content['image']['sizes']['bigthumb'] ?>" class="h-full w-full object-cover block z-50" />
        </figure>

        <div class="">
            <h1 class="title text-white w-full text-5xl md:text-7xl leading-none"><?php echo $content['title'] ?></h1>
            <?php 
                $buttons = $content['buttons'];

                if( $buttons ) {
                    foreach( $buttons as $button ) {
                        echo '<a href="' . $button['button']['link']['url'] . '" class="btn btn--white text-black mt-16 mr-4 js-modal-' . $button['button']['open_modal'] . '">' . $button['button']['link']['title'] . '</a>';
                    }
                }
            ?>
        </div>
    </div>

</section>