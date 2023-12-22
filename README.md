# Welcome to VentoCart!

This ambitious project is a Fork I’ve done on the OpenCart version 4.0.2.4, implementing the most basic features of a modern and complete e-commerce system, production-ready out-of-the-box. Adding these features as extensions would be too complicated and troublesome.

While the database scheme has undergone significant alterations, efforts have been made to ensure a level of extension compatibility. The event system hasn't been altered in any way. I am excited to announce the first set of improvements. Let me break it down for you.

![image](https://github.com/captainerd/VentoCart/assets/58100748/a1312ad4-97b8-4418-b2d0-b6c53b5eb3f2)

![image](https://github.com/captainerd/VentoCart/assets/58100748/54dd0c33-98e8-40b7-8976-d907d158e288)

![image](https://github.com/captainerd/VentoCart/assets/58100748/971ca5c5-d3d5-4ba7-9d57-dba25cd904b5)

### 1.*** Real Variation System:
We've replaced the previous pseudo-variation system entirely with a dynamic system that allows you to create unique combinations of options with model numbers, SKU codes, stock, and prices.

All variations stay on the same product page, and all options or variations selected by the client will update the price via JS in real time for an interactive experience.

### 2. Optimized Options Handling:
We've streamlined options handling by reducing the number of related SQL tables from 5 or so, down to 2. This means fewer loops, less SQL left joins and queries, and less confusion for developers.

### 3. Cleaned breadcrumbs:
Repeated template ul loops in each template file related to breadcrumbs have been placed into its own template file, making it easier to customize the template styling.

### 4. Bug Fixes and Code Refinement:
We took the time to address bugs found in our forked version, ensuring that your platform is stable and reliable. We also made some code improvements to make everything run smoother.

### 5. Improved Attribute Management:
Now, you can manage attributes more efficiently with a one-to-one relationship. The attribute groups got nuked. You can even copy-paste temporary sets of mass-attributes for one product, at once, new line each or name:value

### 6. *** Switched Template Engine to Plates:
We're now using Plates template engine for the whole front application template. It offers better performance, is secure, and has the syntax you already know, native PHP. We kept twig in place so you can use both, no need for any action by your side to switch. Either upload a .twig or a .php plates file. Plates are prioritized.

### 7. Enhanced Image Management:
We've added an image cropper that lets you crop and rotate images. If an image is detected that is missing the 1:1 square ratio for the catalog photos, our cropper will automatically pop up asking you if you want to take any action.

### 8. Advanced Option Pricing:
Now you can choose '=' for option prices in addition to '+' and '-'.

### 9. Streamlined CSS and Bootstrap Integration:
We've reduced down the number of CSS lines and made it easier to customize your ecommerce with a clean Bootstrap look.

### 10. Responsive Cart Grid:
We replaced all tables related to the cart with the vanilla Bootstrap <div> grid system for better responsiveness and mobile compatibility, no CSS just Bootstrap that was already there.

### 11. *** Simplified Checkout Process:
Our checkout page has been revamped into an interactive AJAX page, making it easier than ever before to fill out forms and reduce abandoned carts, no pop-up modals or next pages, the options are updated as the client fills the form.

### 12. Address Field and Phone Requirement:
We've replaced the Address 2 field with a mandatory phone field. The decision behind this is because one address and a phone number align better with the real vouchers of Courier/postal services when filling addresses, and the fewer the fields the better. Plus, The checkout page now includes IP. geolocation from maxmind in order to auto-select the client's country. On top of that, we've added an auto-complete for the country phone code (+nn)

### 13. *** Enhanced Photo Gallery:
We've integrated PhotoSwipe, which is a full-featured, responsive photo gallery with smooth swiping functionality on mobile devices.

### 14. Custom Product Photo Slider:
We've also built a custom lightweight JavaScript photo slider that keeps your product pages organized and allows you to handle extensive photo collections efficiently.

### 15. Most Viewed Module:
Introducing a Most Viewed module, which lets you display top products based on weekly, monthly, yearly, or all-time products with most views.

### 16. Introduced a Quick View feature:
The client can display a product in a small pop-up from anywhere on the website before deciding to view the page product in full.

### 17. *** Added video support:
Now you can use a video (mkv, mp4, and avi) for a product main thumbnail or as extra in the photo collection, supported both by the regular media slider or via PhotoSwipe. 
</br></br>
Sure I am forgetting few others, but that's it for now. Lastly, since you can't use the vanilla installation, we've put in place a small web installer and a terminal one. If you have any questions or issues don't hesitate to reach out.

![image](https://github.com/captainerd/VentoCart/assets/58100748/e37c7923-4d03-496c-b40c-27587ada0645)
