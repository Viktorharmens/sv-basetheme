<?php
echo '<div class="h-[360px] sm:h-[620px] card card--project card--project-archive relative shadow-md border-b-8 border-darkblue">
                        <img src="' . wp_get_attachment_image_src($id, 'full')[0] . '" class="h-full w-full object-cover" />
                        <div class="title absolute bottom-6 left-6 right-6 text-white text-[20px] font-bold text-4xl z-10 pr-6">' . $project['title'] .'
                            <span class="block text-xl mt-2">' . $project['location'] . '</span>
                        </div>
                        <div class="absolute invisible top-0 left-0 info bg-lightblue h-full opacity-0 w-full grid grid-cols-2 md:grid-cols-4 z-30 content-center font-bold text-base px-6">
                            <span class="px-4 py-4 sm:py-0 info__client relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . $project['client'] . '</span>
                            <span class="px-4 py-4 sm:py-0 info__work relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . $project['work'] . '</span>
                            <span class="px-4 py-4 sm:py-0 info__size relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . $project['size'] . '</span>
                            <span class="px-4 py-4 sm:py-0 info__budget relative text-center leading-tight"><i class="h-12 w-12 relative mx-auto block mb-4"></i>' . $project['budget'] . '</span>
                        </div>
                    </div>';