## What's New in VentoCart v5.1.0.0

1. **Swiper Replaced with Slide:**
   - The default template now uses **Slide** instead of Swiper. This change reduces complexity and improves performance, making it better suited for eCommerce sites.

2. **Refined Topics & Product Listings Modules:**
   - **Topics** module has been improved and now features a carousel layout.
   - **All product listing modules** have been converted to carousels, with configurable settings for **interval** and **autoplay**.
   - The **vertical axis** has been removed, as it requires special handling in carousels when theming.

3. **New Module - Category List:**
   - A **Category List** module has been added, allowing admins to promote selected special categories from the admin panel
   - From admin/extensions/modules **Category List**

4. **Newsletter Module Improvements:**
   - The **Newsletter** module has been refined and now works on the **home route** as well.
   - It detects if it’s mounted on the homepage, and if so, it displays as a **modal**. Once the modal is closed, it will not appear again, thanks to **localStorage** detection.

5. **Quick Thumb Module Refinements:**
   - **Quick Thumb**, the small product thumbnail used in various listings (like the "Others buy this too" section), has been enhanced.
   - **Add-to-cart button** has been added for **desktop** users to increase ease of access and improve user experience.

6. **Theme & CSS Work:**
   - Extensive **theme and CSS** improvements have been made.
   - Theme developers now have enough tools and **CSS examples** to start building custom themes with minimal effort.

7. **AutoVideo Thumb - Poster Attribute to Videos:**
   - On upload, if a video file is detected, it will automatically upload a snapshot image of the 20%'th frame of the video (close to the middle).
   - Deleting the video file it will automatically delete the snapshot image too.
   - This image will then be resized and used as a 'poster' on all video thumbnails.
   - The poster attribute specifies an image to be shown while the video is downloading or until the user hits the play button.

8. **Web API Refactoring:**
   - Cleared all the logic of the web API and created a dedicated controller/namespace, in order to avoid polluting the codebase and to keep it maintainable.
   - The API now has its own logic in most cases and will reuse controllers from the web version part.
   - The ReactJS app is being rewritten to follow the new end points and structure.

9. **SEO Enhancement - Category Path Logic Rewriting:**
   - To improve SEO, the category path logic has been completely re-written due to issues with the OC legacy implementation, which was often failing.
   - category_path tabe has been dropped.
   - Added default SEO routes for various sections

10. **SEO Enhancement Added Image Settings, setting in Admin/Settings:**
    - Added an option in Admin/Settings/Image to select SEO-friendly image formats for the frontend, such as WebP. Once set, all images will be converted to the selected format, regardless of the format uploaded initially.
    - An input field to specify the desired image quality.

11. **AVIF Image Format Support:**
    - Added **AVIF** support. You can now upload images in AVIF format, (provided your PHP GD is installed with AVIF support.)

12. **Bug Fixes**
   - Resolved an issue with the **Availability Filter**: The product counter now includes only products belonging to the selected category, ensuring more accurate filtering and counts.

13. **Improved Installer**
   - Enhanced the installer with an **error-return section**: In case of an error during finalization, the server's output will now be displayed directly in the HTML for easier troubleshooting and debugging.
 

Versioning Update: We have updated our versioning to align more closely with the versioning scheme used by OpenCart. Going forward, we will be incrementing the version numbers based on the following structure:

    MAJOR: For breaking changes or significant rewrites.
    MINOR: For core structure changes that affect compatibility but do not break existing functionality.
    FEATURE: For the addition of new features or extensions, without breaking backward compatibility.
    PATCH: For bug fixes and small tweaks.
---

## What's New in VentoCart v5.0.0.2

### 1. **New Features**

- **Customers Who Bought That Also Bought These**:  
  On product pages, displays a swipe carousel of products commonly bought together with the viewed product.  

- **More in the Category**:  
  On product pages, shows a swipe carousel of product thumbnails from the same category.  

---

### 2. **Bug Fixes**

- **Admin Panel Fixes**:  
  - Fixed issue where products weren’t displayed on the first admin login for orders.  
  - Resolved abandoned cart statistics inaccuracies in the admin dashboard.  

- **Checkout Process**:  
  - Curated JS for a smoother checkout experience.  

---

### 3. **New Enhancements**

- **Autocomplete on Checkout**:  
  - Country/Zone dropdowns now have autocomplete functionality, making the selection process faster.  

- **Advanced Shipping Updates**:  
  - Updated weight selection from whole numbers (1, 2, 3) to whole-and-half values (1, 1.5, 2, 2.5) for better compatibility with UPS and other shipping services.  

---

### 4. **Template Improvements**

- **Modularization**:  
  - Deleted the custom swiper and replaced it with Swiper.js for product thumbnails, improving code reusability across modules.  

- **Guest Order Tracking**:  
  - The tracking code for guest orders is now shown immediately on the order confirmation page.  

---
## What's New in VentoCart v5.0.0.1

### 1. **API Overhaul**
- **Dropped "Pseudo-API":** Replaced with:
  - **Bridge Class:** For internal instances.
  - **Real Web API:**
    - Admin API: Connect third-party ERPs or CRMs to retrieve client and order data with ease.
    - Headless Customer API: Supports building modern frontends and mobile apps.
- **New App Template:** A Vite project written in ReactJS with TailwindCSS, Shadcn/UI, Redux, and cookie-less sessions. This template is:
  - Ideal for Flutter, Cordova, or other mobile apps.
  - Secure: Utilizes nonce-based validation and signed tokens with public-key verification.
  - [Access the project here](#).

**Outcome:** Enable modern e-commerce apps with less effort.

### 2. **Bug Fixes and Core Improvements**
- Fixed numerous lingering bugs from v4.
- Enhanced reliability across all critical features.

### 3. **Marketing Enhancements**
- **Abandoned Carts:**
  - Built-in feature with detailed analytics.
  - Access customer carts for review.
  - Notify abandoned carts to increase customer retention.
- **Gift Cards:**
  - Sell gift cards that customers can redeem to top up their accounts.
- **Guest Order Status:**
  - Guests receive a secret code via email to track order status.
- **Guest Newsletter Subscriptions:**
  - Allow guests to subscribe/unsubscribe without placing an order.
- **Email Enhancements:**
  - Revamped templates with modern, sleek designs.
  - Mandatory unsubscribe links included in all marketing emails to ensure compliance with laws.
  - Option to download all email addresses.

### 4. **Spam Bot Defense**
- Introduced advanced anti-spam techniques:
  - **Zero-Named Inputs:** Dynamically named form fields.
  - Honeypots and session tokens for added protection.

### 5. **Premium Default Template**
- Redesigned with a real-world use case in mind.
- Features:
  - User-friendly menus supporting 3-level categories.
  - Mobile-first design using Bootstrap classes.
  - A solid foundation for building custom themes.

### 6. **Installer Upgrade**
- Optimized database installation process:
  - Loads in memory in smaller chunks.
  - Progress bar updates dynamically.
  - Uses binary serialization with indexed data for faster processing.

### 7. **Additional Updates and Fixes**
- **Sale/Admin Area:**
  - Fixed all critical bugs.
- **Tax Calculation and Checkout:**
  - Resolved incorrect tax and cart issues.
- **Shipping Module:**
  - Updated price lists in the advanced shipping module.
- **Newsletter Module:**
  - Synced with the new guest newsletter system.
- **Hero Banners:**
  - Added description fields.
- **Filter System:**
  - Fixed bugs in option and attribute filters.
- **Frontend Framework:**
  - Updated to Bootstrap 5.3.


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

