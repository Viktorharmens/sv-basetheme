<section class="page-row page-row--team-members bg-lightgrey <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="container grid grid-cols-1 lg:grid-cols-3 gap-8 py-12">

        <?php

            foreach ($content['team_members'] as &$member) {

                // echo "<pre>";
                // print_r($member);
                // echo "</pre>";

                echo '<div class="flex gap-6 items-center">
                    <figure class="image relative h-40 w-1/3"><img src="' . get_the_post_thumbnail_url($member->ID) . '" class="h-full w-full object-cover object-top block z-10 relative"/></figure>
                    <div class="w-2/3">
                        <h3 class="text-xl">' . $member->post_title . '</h3>
                        <span>' . get_field('functie', $member->ID) . '</span>
                        <span class="mt-4 block underline"><a href="mailto:' . get_field('mail', $member->ID) . '">' . get_field('mail', $member->ID) . '</a></span>
                    </div>
                </div>';
            }
        ?>

    </div>

</section>