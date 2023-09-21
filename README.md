# Custom WooCom Carousel

Custom WooCom Carousel is a WordPress plugin that allows you to create a custom carousel of WooCommerce products. The plugin includes support for filtering products by category, tag, new products, and hot sellers. This version of the plugin is currently limited to 10 items in a carousel but feel free to branch this project or email me at cello@cello.design requesting that feature!

## Installation

To install the plugin, follow these steps:

1. Download the latest release from the [GitHub repository](https://github.com/<laztaxon>
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
[product_carousel category="clothing" new_products="false" hot_sellers="false"]

This will display a carousel of all clothing category products.

### By Brand
[product_carousel tag="brand name" new_products="false" hot_sellers="false"]

This will display all products with the  "brand name" tag. Replace brand name with the specific brand and make sure you are tagging it in the WooCommerce product data.

### New Products
[product_carousel new_products="true" hot_sellers="false"]

This will display all new products.

### Hot Sellers
[product_carousel new_products="false" hot_sellers="true"]

This will display all products sorted by sales. 

### Complex:
[product_carousel category="clothing" tag="brand name" new_products="true" hot_sellers="true"]

This will display a carousel of clothing products with the "brand" tag that were added within the last week and sorted by the number of sales.


## Development

To contribute to the development of the plugin, follow these steps:

1. Clone the repository.
2. Install the required dependencies using `npm install`.
3. Make changes to the code.
4. Build the plugin using `npm run build`.
5. Test the plugin using a local WordPress installation.
6. Submit a pull request with your changes.

## Credits

Custom WooCom Carousel was created by Marcelo Rondon.
