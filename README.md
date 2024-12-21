# Welcome to VentoCart
 
VentoCart is a modern and feature-rich fork of OpenCart version 4, crafted to revolutionize the e-commerce landscape. Designed with developers and store owners in mind, VentoCart v5 introduces a **headless architecture**, a **dedicated Web API**, and countless other improvements to simplify building and managing online stores.

Our mission is to deliver an all-in-one e-commerce solution that's fast, secure, and easy to extend—perfect for modern web and mobile applications.

 
## Key Features:
- **Product Modules::** Includes features like "Usually Bought Together With...", "More in that Category..", "Most Popular Products", Product Lists and more.
- **Headless Architecture:** Build modern frontends or mobile apps using our robust Web API and ReactJS app-template with TailwindCSS. [Visit here the ReactJS front Repo](https://github.com/captainerd/ReactVento)
- **Variation System:** Easily manage product options and set price differences for combinations like color and size.
- **Abandoned Carts and Gift Cards:** Retain customers with detailed cart analytics and offer gift cards for flexible payments.
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
- **Video Support:** Now products can also display videos for enhanced product showcasing.
- **Much more:** Visit our project website to learn more about VentoCart and try out our demo. Experience the future of e-commerce with VentoCart.

## Screen-shots:

- **Abandoned Carts ** Provides detailed analytics on cart activity and allows you to browse and review customer carts with a tracking system for cart recoveries via mail

![Screenshot from 2024-12-11 09-39-04](https://github.com/user-attachments/assets/d9832de9-b4a4-4ac0-a244-f8d716a8d43f)



![screen1](https://github.com/captainerd/VentoCart/assets/58100748/a8b1eb21-3e8a-4107-82ff-9936cc0cc0f0)


![screen2](https://github.com/captainerd/VentoCart/assets/58100748/c2f19fde-eef2-42ac-aa33-aa359de6c86f)


# [For Change Log click here](https://github.com/captainerd/VentoCart/blob/main/changelog.md)

## Why Choose VentoCart?

VentoCart not only offers a feature-rich e-commerce solution but also prioritizes modernization and ease of use. With VentoCart, configuring and managing your store is faster and more straightforward than ever before.

 
![image](https://github.com/captainerd/VentoCart/assets/58100748/e37c7923-4d03-496c-b40c-27587ada0645)


## Installation

1. Create a MySQL database on your host. Note the database name, database user, and password.

2. Upload the contents of the `upload` directory into the `www/public` root folder of your host.

3. Visit `(Your site URL)/install` in your web browser and fill out the installation forms.

 
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

