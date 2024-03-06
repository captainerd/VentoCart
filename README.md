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
