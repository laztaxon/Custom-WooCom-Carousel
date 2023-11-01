# Custom WooCom Carousel

Custom WooCom Carousel is a WordPress plugin that allows you to create a custom carousel of WooCommerce products. This carousel will print the woocommerce product image and title. The plugin includes support for filtering products by category, tag, new products, and hot sellers. This new branched variant focuses on improving UX by changing the navigation from arrows to dots with labeled numbers to let users know how many products there are in the carousel, especially on mobile.

## Installation

To install the plugin, follow these steps:

1. Download the latest release from the [GitHub repository](https://github.com/laztaxon/Custom-WooCom-Carousel)
2. Upload the ZIP file to your WordPress site using the "Add New" plugin page.
3. Activate the plugin.

## Usage

To use the plugin, add the `[product_carousel]` shortcode to any post or page. The shortcode supports the following attributes:

- `category`: Filter products by category.
- `tag`: Filter products by tag. Usually applicable to product brands or any custom tag you want to add.
- `new_products`: Show only new products added within the last week.
- `hot_sellers`: Show only products with the highest number of sales.

Here's an example shortcode:

### By Category
`[product_carousel category="clothing"]`

This will display a carousel of all clothing category products.

### By Brand
`[product_carousel tag="brand_name"]`

This will display all products with the "brand name" tag. Replace "brand_name" with the specific brand and make sure you are tagging it in the WooCommerce product data.

### New Products
`[product_carousel new_products="true"]`

This will display all new products.

### Hot Sellers
`[product_carousel hot_sellers="true"]`

This will display all products sorted by sales.

### Complex
`[product_carousel category="clothing" tag="brand name" new_products="true" hot_sellers="true"]`

This will display a carousel of clothing products with the "brand" tag that were added within the last two weeks and sorted by the number of sales.

## Development

To contribute to the development of the plugin, follow these steps:

1. Clone the repository.
2. Install the required dependencies using `npm install`.
3. Make changes to the code.
4. Build the plugin using `npm run build`.
5. Test the plugin using a local WordPress installation.
6. Submit a pull request with your changes.

## Credits

Custom WooCom Carousel was created by Cello Rondon (laztaxon).

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.