<section class="page-row page-row--projects <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container px-8 xl:px-0">
        <div class="mb-12">
            <h2 class="text-left ms:text-center pl-8 sm:pl-0 text-blue leading-none block max-w-full sm:max-w-[70%]"><?php echo $content['title']; ?></h2>
            <?php if($content['link']['url']) {
                echo '<a href="' . $content['link']['url'] . '" class="btn btn--inline relative cursor-pointer sm:absolute pl-8 sm:pl-0 right-0 top-3" target="' . $content['link']['target'] . '">' . $content['link']['title'] . '</a>';

            } 
            ?>
                
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-[2rem]">
            <?php 
                foreach( $content['projects'] as &$project ) {
                    $id = $project;

                    echo '<div class="h-[420px] card card--project relative shadow-lg border-b-8 border-darkblue">
                    <img src="' . get_the_post_thumbnail_url($id, 'full') . '" class="h-full w-full object-cover" />
                    <div class="title absolute bottom-6 left-6 right-6 text-white font-bold text-3xl z-10 pr-6">' . get_the_title($id) . '
                        <span class="block text-xl mt-2">' . get_field('location', $id) . '</span>
                    </div>
                    <div class="absolute invisible top-0 left-0 info bg-lightblue h-full opacity-0 w-full grid grid-cols-2 z-30 content-center font-bold px-6">
                        <span class="px-4 py-4 info__client relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . get_field('client', $id) . '</span>
                        <span class="px-4 py-4 info__work relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . get_field('work', $id) . '</span>
                        <span class="px-4 py-4 info__size relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . get_field('size', $id) . '</span>
                        <span class="px-4 py-4 info__budget relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . get_field('budget', $id) . '</span>
                    </div>
                </div>';

                }
            
            ?>
        </div>
        
    </div>

	
</section>