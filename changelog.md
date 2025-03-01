### **What's New in VentoCart v7.0.0.1** 🚀  

#### **Theme**  
- Fixed various language inconsistencies 🗣️  
- Added eye toggle to password input for the registration form with a single password field 👀🔒  
- Added an extra product thumbnail for the categories list-view mode 🖼️  
- Adjusted banner module heights for improved consistency 📏  
- Removed language code occurrences from URLs for cleaner structure 🌍  

#### **Admin**  
- Introduced a **"Features" tab** in settings to enable/disable various system-wide features such as reviews, gift cards, etc. ⚙️  
- Redesigned the catalog/product list to be more condensed in list view, ensuring a mobile-first experience. Also redesigned the filter placement in a tabular format for improved mobile accessibility 📱  
- Added a **category filter** to the product list for better navigation 🛒  

#### **Bug Fixes**  
- Fixed the SEO URL bug that was breaking functionality 🐞🔧  
- Resolved the issue where `$poster` was undefined when no poster was set for videos 🎥  
- Fixed a broken affiliate link in the footer 🔗  
- Fixed the loader issue for controllers that were running only the index method when stored in the registry 🛠️  

### **Installer**
- Added a one-file installer.php to the "releases" section of the repo. This file automates the download and extraction of VentoCart files for fresh installations.
---
 
#### **What's New in VentoCart v7.0.0.0** 🚀  

**Breaking Changes (Major Removals)** 

This release **removes** support for: 
- **Multi-Store Feature** 🏪❌ – Due to minimal usage and unnecessary complexity, multi-store functionality has been completely removed, improving performance by eliminating extra left joins.
- **Layout Overrides** 🛠️❌ – This feature saw little to no adoption and introduced performance overhead. It has now been removed for a cleaner and more efficient system.

**If you rely on these features, we recommend sticking to v6.1.0.7** 

### **New Features & Enhancements**  

- **💰 Price Filter Module** – Added a new **price filter** module, allowing users to refine products by price range.
- **📱 Mobile Menu Improvements** – Fixed dropdowns on mobile for a smoother navigation experience.
- **🔎 Search Enhancement** – Added **autocomplete** functionality to the search bar for faster product discovery.
- **🖊️ Theme Editor Fix** – Non-editable file types are now properly excluded from the theme editor.
- **📌 Wishlist Count Fix** – The wishlist count in the "My Account" icon now updates correctly.
- **🔗 Navigation Fix** – Prevented unnecessary tab-following in certain link structures.

### **Bug Fixes & Maintenance**  

- **⚙️ Admin Language Fix** – Resolved inconsistencies in admin panel language strings caused by the extension list.
- **↩️ Back Button Fix** – `$this->e()` was breaking URLs in the admin topic module, affecting the back button functionality—now fixed.
- **💲 Price Filter Null Fields** – Allowed **null** values in the price filter module, to work with min or max only prices.
- **🔧 Config Fixes** – Adjusted configurations to ensure stability and proper loading.
- **🔄 SEO & Menu Adjustments** – Fixed issues with links and dropdowns in mobile menu

### **Upgrade Instructions**  
Upgrade Instructions

    Database Cleanup (For Multi-Store Users)
        If you previously used multi-store, use phpMyAdmin or a similar tool to clean your database.
        Remove all store_id references in tables like category, product, etc., keeping only the main store’s data.
        Export the cleaned tables and import them into the new installation.

    Fresh Install Recommended
        Since this version removes multi-store and layout overrides, a fresh install is recommended for best performance.
---
This release focuses on **performance, usability, and cleaning up unnecessary features**. VentoCart is now **leaner, faster, and more efficient!** 🚀 
 
## What's New in VentoCart v6.1.0.7

**Upgrade Instructions:** 
To upgrade from version 6.1.0.6 to 6.1.0.7, you need to manually edit the `admin/config.php` file. Update the constant for the view directory to:

```php
define('DIR_TEMPLATE', DIR_APPLICATION . 'view/default/');
```

### Key Changes:

- **Theme Enhancements:**
  - Fixed issue where top menu links were unclickable when they had no child/submenus.
  - Improved the desktop menu, making it tappable on touchscreens to expand submenus.
  - Corrected the currency menu functionality to ensure the selected currency switches properly.
  - Resolved issues with repeated heading titles and language mix-ups when modules were attached.
  - Added phone country code autocomplete functionality to **My Account/Add Address** to improve user experience.
 
- **Maintenance Mode:**
  - Fixed bug preventing the proper activation and usage of maintenance mode.

- **Fresh Install Fixes:**
  - Resolved blank index page issue on fresh installations by clearing the opcache and adjusting permissions for the newly moved `index.php`.

- **Admin:**
  - Corrected the issue when switching themes back and forth, ensuring settings are retained properly.

- **Image Library:**
  - Fixed issue where images were missing on the first load due to caching problems, particularly observed in CMS articles.

- **SEO URL:**
  - Resolved an issue with SEO URL processing that was preventing redirection on login when SEO URLs were enabled.

- **Captcha:**
  - Fixed the captcha display issue that was mixing the "checkout" and "register" pages.
  - Ensured captcha font loads correctly.

- **New Feature - Footer Links Management:**
  - Added a new admin feature to manage footer links easily via drag-and-drop. Navigate to **Admin > Design > Footer Links** to reorganize links.

---

### Additional Notes:

- **Bug Reporting:** 
  If you encounter any bugs, please report them on our [GitHub Issues page](https://github.com/captainerd/VentoCart/issues), or contact support via email at **support@ventocart.com**, or post a thread in the forums.

- **Multi-store Feature:** 
  Please note that the multi-store feature will be fully deprecated in future releases.

- **Acknowledgements:** 
  Special thanks to **David Brook's** for feature requests, testing, and bug reporting.

---
 
## What's New in VentoCart v6.1.0.6

- **BugFix Ext Permissions** 
  Fixed extension category permissions getting lost after saving them in User Group, ~ Another quick fix thanks to David Brook's testing


## What's New in VentoCart v6.1.0.5

- **GDPR Module Integration** 
  Replaced the legacy OpenCart simple cookie notice, which had no functionality regarding cookie management, with an advanced GDPR module. This new module provides full user control over cookie acceptance and allows admins to configure options and customize messages via **Admin > Extensions > Modules > GDPR Notice**. it affects setting cookies from "Google Analytics" and "JavaScript Tags" modules as well for abandoned cart guest tracking

  To ensure your own custom code is also legally compliant, you can check if `$this->request->cookie['accept-tracking']` is set and verify that the module is enabled by checking if `$this->config->get('module_gdpr_status')` is set to `true`.

- **Code Refinements** 
  Removed unused variables in `marketplace/loadlists` and converted the `option_filter` from Twig to Plates for better performance and maintainability.

- **Bug Fixes** 
  Added exception handling to the loader/controller, allowing parent classes to decide whether to throw an error or handle non-existent methods silently. This fix improves the handling of `install()`/`uninstall()` methods when not required or missing in modules and extensions.

---
 
## What's New in VentoCart v6.1.0.4  

- **Theme Editor** The minus icon `[ - ]` in **Admin → Theme Editor** now actually closes tabs instead of just looking pretty. 
- **Theme Editor Bugfix** Fixed a bug where it wouldn't allow a custom them to get saved by the editor. 
- **Menu in Cart page** The front/cart menu no longer appears twice.
- **Upgrade Tool Improvement!** It now **auto-sets `index.php.bak` as `index.php`**, saving you from an extra step, (one last time to replace it manually) 
- **Removed Design/Translation** The sql-based OC legacy way of replacing language keys has been removed in favor of the new language tools at system/localization/languages

---
Again thanks to **David Brooks** for providing testing and suggestions. 

---
## What's New in VentoCart v6.1.0.3

- **Extension Installer**:
   - Fixed a bug in sanitizeExtension() at installer, that was replacing class name casing in extension leading to wrong class names with newly installed exts.

- **Wallet Integration**:
   - Added button rendering for Apple Pay, Google Pay, and other wallets supported by Stripe.

- **Admin Panel**:
   - Fixed HTML installation error in the admin/module section.
   - Fixed 'back' button functionality in admin/modules due to incorrect application of `e->escape()` added during the Twig to Plates conversion.

- **CMS & Template Fixes**:
   - Fixed Template/Default/CMS Carousel module, which was causing posts to break underneath each other.

- **User Interface**:
   - Fixed links for forum/documentation in the Admin/Dashboard/Profile dropdown menu.

- **Installation Issues**:
   - Fixed installation block when MySQL strict mode was enabled due to the 00-00-00 date format in product specials.

---

**Special Thanks**:  
Many of these fixes were reported and tested by **David Brooks**, whose contributions helped improve the stability and functionality of this release.

---
## What's New in VentoCart v6.1.0.2

- **Marketplace Refinements**:
  - **Backward Compatibility**: For OpenCart extensions for OC4, OC3, and OC2 versions.
  - Extensions are automatically installed into the correct VentoCart file structure. Additionally, the installer modifies or adds class namespaces where necessary, 
    adjusts loading paths, and applies other small tweaks when dealing with older extension versions. That update cuts the porting time down by a lot.
  - OC4 extensions should work out of the box, OC3 and OC2 would still require some manual work to fully port.

- **Various bug fixes**:
  - Added to the loader not found page when a route is unknown.

---

## What's New in VentoCart v6.0.0.2
- **Installer bug fix**:
   Fixed bug that didn't allow installation of extensions

- **Event bug fix**:
   Fixed bug that didn't allow event deactivation
   Switched events to be route-key based

## What's New in VentoCart v6.0.0.1

### ***v6 Major Release***
- **Core Refactor and Structure Overhaul**: 
  The VentoCart platform undergoes significant improvements, leading to a version jump to 6.0. This release involves extensive refactoring, streamlining the internal structure for better performance and scalability.
  
- **New Event System**:
  The event system has been redesigned and optimized, enhancing the overall speed 

- **Removal of /Extension Directory**: 
  The `/Extension` directory has been removed to allow for PSR-4 path matching and to reduce string processing overhead. This change reverts the system to an OpenCart 3-style structure.

- **Extension 'Extract/Download' Buttons**:
  New functionality has been added, allowing developers and users to easily extract and download extension files as zip archives. This makes updating, testing, and extracting files much more straightforward.

- **Theme Management Overhaul**:
  - **New Theme Location**: Themes are now located in `/themes/name`, making it simpler to manage.
  - **Decoupling of Themes from Extensions**: Themes no longer need to be bundled with extensions. Now, custom themes can be standalone and only contain the necessary files (no classes, extensions, or install.json required in the zip).
  
- **Theme Management Interface**:
  Themes now have their own menu in the Admin panel under **/Admin/Design/Theme**, giving administrators more control over theme customization.

- **Theme Editor**:
  The new Theme Editor allows for editing of assets, including `.css` and `.js` files directly from the Admin panel. This feature enhances flexibility and ease of use for front-end adjustments.

- **Core Framework Optimization**:
  Continued work on debugging and optimizing the core framework, improving the loading of controllers, models, and event handling.

- **Performance Improvements**:
  This version focuses on boosting performance, optimizing web vitals, and improving SEO.

---

## What's New in VentoCart v5.1.2.2

### **1. Major Code Refactor**
  
- **Event System Overhaul**:  
  Events are now stored as a flat PHP array, eliminating loops and unnecessary processing and db query.  
  Key changes:
  - **Priorities and Wildcards Removed**: Events are now case-sensitive.
  - **Optimized Execution**: No processing occurs if an event doesn’t match the scope.
  - Removed looping through extensions—autoload, extension paths are now **lazy-loaded** when needed.
  - Loader class for handling models and controllers has been refactored.

### **2. Performance Gains**
  
- Removed the need for two startup controllers: `event.php` and `extension.php`.  
- Estimated performance gain: **20-30%** 

### **3. Cautionary Note**
  
This version focuses entirely on internal refactoring and requires further testing.  
⚠️ **Upgrade carefully**: No new functionality is introduced in this release.


## What's New in VentoCart v5.1.2.1

1   **Minfiy Assets - SEO improvement**
    - Introduces a "Minify All" setting/switch under Admin/System/Settings on the "Server" tab. Enabling this feature allows the minification of all assets, improving the site's speed performance and SEO

## What's New in VentoCart v5.1.1.1
 
1.  **Bug Fixes**
    - Autoplay Input Handling: Added default zero (`0`) inputs for autoplay on modules to ensure "off" values are saved correctly in the database.
    - Cache Preloading: Introduced a cache folder and an installation preloader to suppress initial warnings on fresh installations.
    - Updated version upgrade logic to use version_compare() for accurate detection of patch-level updates.

---
## What's New in VentoCart v5.1.1.0

1.  **Bug fixes**
    - Fixed template bug re-printing the price on option click for the QuickView Feature 
    - Fixed admin/localisation/language bug where it wasn't notifying 'Added successful' after add.
    - Fixed front end password recovery template bugs

2.  **Refactory**
    - Removed url parameters for language, customer token, as they where legacy/uneeded
    - Improved front end account template designs

3.  **Features**
    - Enabled the functionality to upgrade via the button in admin/maintenance/upgrade

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

