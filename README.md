# Welcome to VentoCart
 
VentoCart is a high-performance fork of OpenCart 4, featuring extensive optimizations for speed, numerous bug fixes, 
and modern e-commerce capabilities. With a focus on cutting-edge features, VentoCart includes a completely revamped 
architecture, a premium default theme, and integrated PayPal and Stripe support for secure payments, including client card saving 
and subscription payment options.

As of now, it supports importing oc4 and oc3 Extensions, classes, file paths, and load paths are automatically converted, oc3 will need some manual porting.

 
**Contribute to VentoCart!**

Did you find a bug? Don’t just ignore it! Open a bug report on the repo – your feedback keeps this project alive and improving.

Are you a developer who fixed a bug, refactored some messy code, or used the Twig converter tool to switch to Plates? Don't keep those improvements to yourself! Submit a pull request and help make VentoCart even better. Your contributions are incredibly valuable, and together we can make this platform stronger than ever!
 
 
## Key Features:
- **Product Modules::** Includes features like "Usually Bought Together With...", "More in that Category..", "Most Popular Products", Product Lists and more.
- **Headless Architecture:** Build modern frontends or mobile apps using our robust Web API and ReactJS app-template with TailwindCSS. [Visit here the ReactJS front Repo](https://github.com/captainerd/ReactVento)
- **Variation System:** Easily manage product options and set price differences for combinations like color and size.
- **Abandoned Carts and Gift Cards:** Retain customers with detailed cart analytics and offer gift cards for flexible payments, tracks cart recoveries.
- **Modern Marketing Tools:** Enhanced newsletter features, sleek email templates, and legal unsubscribe links.
- **Drag and Drop Functionality:** Effortlessly organize categories, images, and more with intuitive drag-and-drop capabilities.
- **Mass Image Management & Video Support:** Easily add, crop, and manage product media for a polished storefront.
- **Advanced Installer:** Streamlined installation with progress tracking and efficient binary processing.
- **Premium Default Template:** Fully redesigned for real-world use with a mobile-first approach and 3-level category menus.
- **Drag and Drop Functionality:** Effortlessly organize elements such as pictures, categories, and more with intuitive drag-and-drop capabilities.
- **Mass Image Management:** Streamline the process of adding and managing product images efficiently.
- **Image Cropper:** Crop and customize images directly within the platform for a polished look.
- **One-Page Interactive Ajax Checkout:** Simplify the checkout process with a seamless, interactive one-page checkout system.
- **Plates Template Engine:** Utilize the Plates template engine, offering flexibility and ease of use in place of Twig.
- **Preinstalled Vital Extensions:** Benefit from essential extensions preinstalled to enhance your store's functionality.
- **Video Support:** Now products can also display videos for enhanced product showcasing, automatic video snapshot on upload.
- **TinyMC Editor** Drag and drop or copy paste images on the editor, auto-uploaded to your server.
- **Much more:** Visit our project website to learn more about VentoCart and try out our demo. Experience the future of e-commerce with VentoCart.

## Chrome LightHouse:
![image](https://github.com/user-attachments/assets/46187546-caf6-4c7a-ba04-19399a6204f0)


## Screen-shots:

- **Abandoned Carts ** Provides detailed analytics on cart activity and allows you to browse and review customer carts with a tracking system for cart recoveries via mail

![Screenshot from 2024-12-11 09-39-04](https://github.com/user-attachments/assets/d9832de9-b4a4-4ac0-a244-f8d716a8d43f)



![screen1](https://github.com/captainerd/VentoCart/assets/58100748/a8b1eb21-3e8a-4107-82ff-9936cc0cc0f0)


![screen2](https://github.com/captainerd/VentoCart/assets/58100748/c2f19fde-eef2-42ac-aa33-aa359de6c86f)


# [For Change Log click here](https://github.com/captainerd/VentoCart/blob/main/changelog.md)

## Why Choose VentoCart?

VentoCart not only offers a feature-rich e-commerce solution but also prioritizes modernization and ease of use. With VentoCart, configuring and managing your store is faster and more straightforward than ever before.

 
![image](https://github.com/captainerd/VentoCart/assets/58100748/e37c7923-4d03-496c-b40c-27587ada0645)



## Installation Guide

1. **Set Proper Permissions:**
   Ensure that the PHP script has full write permissions. The installer needs these permissions to write configs and delete the `install` directory after the installation process is complete.

2. **Create MySQL Database:**
   On your hosting environment, create a MySQL database. Be sure to take note of the following details:
   - Database name
   - Database user
   - Database password

3. **Upload Files:**
   Upload the contents of the `upload` directory to the `www/public` root directory on your server.

4. **Run the Installer:**
   Open your web browser and visit `(Your site URL)/install`. You’ll be prompted to fill out the necessary installation forms.

---
 
## Requirements


| PHP Settings               | Required Setting |
|---------------------------|------------------|
| PHP Version               | 8.1+             |
| File Uploads              | On               |
| Session Auto Start        | Off              |
| Restrict Storage Dir Access | .htaccess or other block to /system/storage               |

| PHP Extensions            | Required Setting |
|---------------------------|------------------|
| Database                  | mysqli           |
| GD                        | gd               |
| cURL                      | curl             |
| OpenSSL                   | openssl          |
| ZLIB                      | zlib             |
| ZIP                       | zip              |
| WebP Support              | GD with WebP             |

