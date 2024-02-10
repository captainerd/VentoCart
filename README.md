# Welcome to VentoCart

VentoCart is a robust fork of OpenCart version 4, meticulously crafted to offer a seamless e-commerce experience while prioritizing bug-free functionality. Our mission is to provide a comprehensive e-commerce solution out of the box, enhancing both functionality and user experience to meet modern standards.

## Key Features:

- **Variation System:** Easily set price differences based on option combinations like color and size.
- **Drag and Drop Functionality:** Effortlessly organize elements such as pictures, categories, and more with intuitive drag-and-drop capabilities.
- **Mass Image Management:** Streamline the process of adding and managing product images efficiently.
- **Image Cropper:** Crop and customize images directly within the platform for a polished look.
- **One-Page Interactive Ajax Checkout:** Simplify the checkout process with a seamless, interactive one-page checkout system.
- **Plates Template Engine:** Utilize the Plates template engine, offering flexibility and ease of use in place of Twig.
- **Preinstalled Vital Extensions:** Benefit from essential extensions preinstalled to enhance your store's functionality.
- **Video Support:** Now products can also display videos for enhanced product showcasing.
- **Much more:** Visit our project website to learn more about VentoCart and try out our demo. Experience the future of e-commerce with VentoCart.

## Screen-shots:

![screen1](https://github.com/captainerd/VentoCart/assets/58100748/a8b1eb21-3e8a-4107-82ff-9936cc0cc0f0)


![screen2](https://github.com/captainerd/VentoCart/assets/58100748/c2f19fde-eef2-42ac-aa33-aa359de6c86f)



## Why Choose VentoCart?

VentoCart not only offers a feature-rich e-commerce solution but also prioritizes modernization and ease of use. With VentoCart, configuring and managing your store is faster and more straightforward than ever before.

# Ventocart Change-log v4.5.5.1

## Features & Enhancements

- **Revamped Captcha:**
  - Combined JavaScript checks with a more scrambled font and a refresh captcha button.
  
- **Revamped Attributes:**
  - Attributes can now have one-to-one or one-to-many listings. One-to-one listings automatically fall under a "General" listing, Attributes are now sortable via drag-and-drop.

- **Admin Enhancements:**
  - **CKEditor Upgrade:** CKEditor 4 stopped receiving updates since its End of Life in June 2023. Due to this, we upgraded from CKEditor 4 to TinyMCE 6. Enhanced functionality includes automatic picture uploads to the server during paste or drag and drop into the editor.
  - **Image Manager:** Improved to allow multiple image selections for products at once. Ordering is now done via drag and drop images to positions. Single click for multiselections, double click for single image select.
  - **Crop And Rotate:** Access the crop and rotate tool at any time via a dedicated button.
  - **Further Auto-organize:** Automatically organize images in their respective directories (products, blog, banners, etc.) for better organization.
  - **Internal Model Enhancement:** Restructured the internal model responsible for filtering products for better readability and organization.
  - **Database Scheme Changes:** Note that if you are upgrading from the previous VentoCart version, you will need to make adjustments:
    - `category_filter` table: Added a new 'type' column.
    - `options` table: Added a new 'image' column.
    - `product_attribute` table: Added 'value_text' and  'attribute_n' columns.

- **Revamped Blog Module:**
  -  Preview now displays a thumbnail picture of the post and the date posted.

- **New Modules:**
  - Added Google Analytics tag module, general tag JS module for hosting necessary third-party tags, and category filters.

- **Admin Categories Enhancement:**
  - Admin categories now support filter module installation for specific categories in the "data" tab. Filters are available based on product options, attributes, manufacturers-brands, and availability.

## Bug Fixes

- Fixed numerous bugs found in both front-end and admin sections since the last version.

## Versioning Changes

- Versioning changed to start from 4.5.5.1. with an online check in the administration to notify you when there is a new version available.


## Template Modifications

- Added a side menu for the sidebar on mobile screens in the default template.

- Removed unnecessary escapes.

- Preload to memory product images for faster display on hover.


![image](https://github.com/captainerd/VentoCart/assets/58100748/e37c7923-4d03-496c-b40c-27587ada0645)


## Installation

1. Create a MySQL database on your host. Note the database name, database user, and password.

2. Upload the contents of the `upload` directory into the `www/public` root folder of your host.

3. Visit `(Your site URL)/install` in your web browser and fill out the installation forms.

 
## Requirements


| PHP Settings               | Current Setting | Required Setting |
|---------------------------|-----------------|------------------|
| PHP Version               | On              | 8.1+             |
| File Uploads              | On              | On               |
| Session Auto Start        | Off             | Off              |
| Restrict Storage Dir Access | On           | 1                |

| PHP Extensions            | Current Setting | Required Setting |
|---------------------------|-----------------|------------------|
| Database                  | On              | mysqli           |
| GD                        | On              | gd               |
| cURL                      | On              | curl             |
| OpenSSL                   | On              | openssl          |
| ZLIB                      | On              | zlib             |
| ZIP                       | On              | zip              |
| WebP Support              | On              | WebP             |