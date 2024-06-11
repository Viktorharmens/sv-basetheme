<?php
/**
 * Test Block template.
 *
 * @param array $block The block settings and attributes.
 */

// Load values and assign defaults.
$text              = get_field( 'text' );
$image             = get_field( 'image' );
$background_color  = get_field( 'background_color' ); // ACF's color picker.
$quote_attribution = '';


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}

// Create class attribute allowing for custom "className" and "align" values.
$class_name = 'testimonial';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}
if ( ! empty( $block['align'] ) ) {
    $class_name .= ' align' . $block['align'];
}
if ( $background_color) {
    $class_name .= ' has-custom-acf-color';
}

// Build a valid style attribute for background and text colors.
$styles = array( 'background-color: ' . $background_color);
$style  = implode( '; ', $styles );
?>

<div id="<?php echo esc_attr( $anchor ); ?>" class="<?php echo esc_attr( $class_name ); ?>" style="<?php echo esc_attr( $style ); ?>">
    <div class="grid grid-cols-2 gap-10">
    
        <?php if ( $text ) : ?>
            <?php echo $text ?>
        <?php endif; ?>

        <?php if ( $image ) : ?>
            <figure class="testimonial__image h-auto w-96">
                <?php echo wp_get_attachment_image( $image['ID'], 'full', '', array( 'class' => 'object-cover h-full w-full' ) ); ?>
            </figure>
        <?php endif; ?>
    </div>
</div>