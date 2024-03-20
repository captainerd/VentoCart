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

# Ventocart Change-log v4.5.5.2

## Added
- Full example theme added to the marketplace.
- Ajaxified the categories/filters, and pagination is now fully in AJAX.
- Added an infinite scroll toggle in the Admin System/Settings/Edit Store/Option tab at the product, which enables or disables infinite scroll vs pagination.


## Template Modifications

- Added a side menu for the sidebar on mobile screens in the default template.

- Removed unnecessary escapes.

- Preload to memory product images for faster display on hover.

# Ventocart Change-log v4.5.5.3
Features & Enhancements

  -  Admin Product List Page Revamp:
        Mobile-friendly design implemented, replacing <table> with a responsive Bootstrap grid system using cards for better display.

  -  Revamped Customer Section for Stored Payment Methods:
        Enhanced control for customers in managing stored payment methods, including the ability to add new payment methods.

  -  Revamped Cart/Library Class to Support Virtual Products:
        Added support for virtual products with product ID "-1" for various uses such as existing subscription payments.
        You can post to route checkout/cart.add  product_id: -1,quantity: 1, virual_product_name: x, virual_product_info: x(for internal use) 
        and access the information in $this->session->data['virtual_product']  durring checkout.

  -  Revamped Stripe Extension:
        Now saves customer cards for registered users during checkout for easier reuse without re-entering card details.
        Automatically creates a mirrored plan-subscription in Stripe and subscribes the customer to the Ventocart plan during checkout of a subscription.

  -  Enhanced Customer Subscription Section:
        Customers gain more control over their subscriptions, including options to cancel, resume, or repay any dues for expired subscriptions and restart them
        and change their selected payment method for the particular subscription.

  -  Security and Stability Improvements:
        Language and customer tokens in the front store are now stored in cookies instead of being passed in the URL for enhanced security and stability, only need to be setup once durring log in and no more needed in urls after.

## Bug Fixes

   - Fixed bugs related to customer payment methods and subscription functionality.
   - Corrected plates template engine path so it can be used with admin section too.


# Ventocart Change-log v4.5.5.4

## Template enhancements

- Stripped tables in customer account sections orders, downloads, payment methods, subscriptions for a mobile-first approach

## Bug Fixes

- Fixed bug in Stripe extension for 3DS card confirmation

## Admin Panel Enhancements

- Added stripe tab information and refund option into admin individual orders
- Added cron job for stripe subscriptions to synch subscription status and run methods based on status changes
- Added stripe tab for subscriptions in admin

# Ventocart Change-log v4.5.5.5

- Various bug fixes and refinements

