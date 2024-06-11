<section class="page-row page-row--facts <?php echo ($content['background'])? 'bg-' . $content['background']. ' py-16' : '' ?><?php echo ($content['white_attributes'])? ' white_attributes' : '' ?> <?php echo ($content['delete_margin'])? '' : 'mt-24' ?>" id="<?php echo $content['row_id'] ?>" data-aos="fade-up">

    
      <?php 

        $rows = $content['facts'];
        $number = count($rows);

        echo '<div class="grid grid-' . $number . ' gap-16">';
        
        if ($rows) {

          foreach ($rows as $row) {
            echo '<div class="fact">
            <div class="fact__icon block h-20 w-20 mx-auto"><img src="' . $row['icon']['sizes']['medium'] . '" /></div>
            <div class="fact__text text-center mt-6 font-bold">' . $row['fact'] . '</div>
            </div>';
          }
        }

        echo '</div>';
      
      ?>
   
	
</section>