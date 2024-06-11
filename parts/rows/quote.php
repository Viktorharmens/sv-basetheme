<section class="page-row page-row--quote <?php echo !empty($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    <div class="w-full xl:w-1/2 px-8 xl:px-0 mx-auto quote relative">
        <div class="content text-xl xl:text-2xl leading-normal xl:leading-loose"><?php echo $content['content'] ?></div>
        <div class="meta mt-6 pl-4 border-l-4 border-black">
            <span class="meta__info meta__info--name block font-bold"><?php echo $content['name'] ?></span>
            <span class="meta__info meta__info--function block"><?php echo $content['function'] ?></span>
        </div>

    </div>
	
</section>