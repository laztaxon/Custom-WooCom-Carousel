<?php
/*
Plugin Name: Custom WooCom Carousel
Description: A custom carousel plugin for WooCommerce products that allows you to filter by category, tag, new products, and hot sellers. This version uses dot pagination to identify the number of items in the carousel and is limited to 10 items per carousel. Check out the <a href="https://github.com/laztaxon/Custom-WooCom-Carousel">README</a> for more information.
Version: 2.1
Author: Cello Rondon (LazTaxon)
Author URI: https://www.cello.design
*/

// Add the [product_carousel] shortcode
function product_carousel_shortcode($atts) {
    // Extract the attributes from the shortcode
    $atts = shortcode_atts(array(
        'category' => '',
        'tag' => '',
        'new_products' => false,
        'hot_sellers' => false,
    ), $atts);

    // Set up the product query
    $args = array(
        'orderby' => 'date',
        'order' => 'ASC',
        'limit' => 10,
        'post_status' => 'publish', // Exclude drafts and private pages
    );

    // Add filters for new and hot seller products
    if ($atts['new_products']) {
        $args['date_query'] = array(
            array(
                'after' => '2 weeks ago',
            ),
        );
    }
    if ($atts['hot_sellers']) {
        $args['meta_key'] = 'total_sales';
        $args['orderby'] = 'meta_value_num';
    }

    // Add filters for category and tag
    if ($atts['category']) {
    $args['category'] = array_map('trim', explode(',', $atts['category'])); // Pass category IDs correctly
    }
    if ($atts['tag']) {
    $args['tag'] = $atts['tag'];
    }

    // Fetch WooCommerce product data
    $products = wc_get_products($args);

    // Check if there are no products
    if (empty($products)) {
    return '<h4 style="text-align: center;">Sorry, we are out of stock for this category.</h4>';
}

    // Start the carousel
    $output = '<div class="carousel-container"><div class="my-carousel">';
    // Loop through the products
    foreach ($products as $product) {
        if ($product->is_in_stock()) { // Check if the product is in stock before outputting it
            $image_id = $product->get_image_id();
            $image_url_full = wp_get_attachment_image_src($image_id, 'full')[0];
            $image_url_medium = wp_get_attachment_image_src($image_id, 'medium')[0];
            $product_url = get_permalink($product->get_id());
            $output .= '<div class="my-carousel-item">'; 
            $output .= '<a href="' . $product_url . '">';
            $output .= '<div class="item-container" style="width: ' . $image_url_medium[1] . 'px; height: ' . $image_url_medium[2] . 'px;">'; // Output the product image
            $output .= '<img src="' . $image_url_full . '" alt="' . $product->get_name() . '" title="' . $product->get_name() . '" style="max-width:100%; height:auto;">';
            $output .= '<h4>' . $product->get_name() . '</h4>'; // Output the product title
            $output .= '</div>';
            $output .= '</a>';
            $output .= '</div>';
        }
    }

    // End the carousel
    $output .= '</div></div>';


    // Return the carousel
    return $output;
    }
add_shortcode('product_carousel', 'product_carousel_shortcode');

function enqueue_carousel_assets() {
    // Enqueue jQuery
    wp_enqueue_script('jquery');

    // Enqueue the polyfill
    wp_enqueue_script('smoothscroll-polyfill', plugins_url('smoothscroll-polyfill.min.js', __FILE__), array(), '1.0', true);

    // Enqueue the Slick carousel library
    wp_enqueue_script('slick-carousel', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '1.8.1', true);

    // Enqueue the carousel script
    wp_enqueue_script('my-carousel-script', plugins_url('my-carousel-script.js', __FILE__), array('jquery', 'smoothscroll-polyfill', 'slick-carousel'), '1.0', true);

    // Enqueue the Slick carousel style
    wp_enqueue_style('slick-carousel-style', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css', array(), '1.8.1');
    // Enqueue your custom CSS
    wp_enqueue_style('my-carousel-style', plugins_url('my-carousel-style.css', __FILE__), array('slick-carousel-style'), '1.0');
}
add_action('wp_enqueue_scripts', 'enqueue_carousel_assets');