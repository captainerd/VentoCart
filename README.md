<p>&nbsp;</p>
![image](https://github.com/captainerd/VentoCart/assets/58100748/a1312ad4-97b8-4418-b2d0-b6c53b5eb3f2)

![image](https://github.com/captainerd/VentoCart/assets/58100748/54dd0c33-98e8-40b7-8976-d907d158e288)

![image](https://github.com/captainerd/VentoCart/assets/58100748/971ca5c5-d3d5-4ba7-9d57-dba25cd904b5)

<p>Welcome to VentoCart! This ambitious project is a Fork I&rsquo;ve done on the OpenCart version 4.0.2.4, in order to implement the most basic features of a modern and complete e-commerce system, that is production ready of-the-box, adding these features as extensions would be too complicated and troublesome.<br />
While the database scheme has undergone significant alterations, efforts have been made to ensure a level of extension compatibility, event system haven&rsquo;t been altered in any way. I am excited to announce the first set of improvements, Let me break it down for you.</p>

<p><strong>1. Real Variation System: </strong>We&#39;ve replaced the previous pseudo-variation system entirely with a dynamic system that allows you to create unique combinations of options with model numbers, SKU codes, stock, and prices.</p>

<p>All variations stay on the same product page, and all options or variations selected by the client will update the price via JS in real time for an interactive experience.</p>

<p><strong>2. Optimized Options Handling: </strong>We&#39;ve streamlined options handling by reducing the number of related sql tables from 5 or so, down to 2. This means fewer loops, less SQL left joins and queries, and less confusion for developers. &nbsp;</p>

<p><strong>3. Cleaned breadcrumbs:</strong> Repeated template &lt;ul&gt; loops in each template file related to breadcrumbs has been placed&nbsp; into its own template file, making easier to customize the template styling.</p>

<p><strong>4. Bug Fixes and Code Refinement: </strong>We took the time to address bugs found in our forked version, ensuring that your platform is stable and reliable. We also made some code improvements to make everything run smoother.</p>

<p><strong>5. Improved Attribute Management: </strong>Now, you can manage attributes more efficiently with a one-to-one relationship, the attribute groups got nuked. You can even copy-paste temporary sets of mass-attributes for one product, at once, new line each or name:value</p>

<p><strong>6. Switched Template Engine to Plates: </strong>We&#39;re now using Plates template engine for the whole front application template, It offers better performance, it is also secure and has the syntax you already know, native php, with no limits in methods, we kept twig in place so you can use both, no need of any action by your side to switch, either upload a .twig or a .php plates file. Plates are prioritized.</p>

<p><strong>7. Enhanced Image Management: </strong>We&#39;ve added an image cropper that lets you crop and rotate images. If an image is detected that is missing the 1:1 square ratio for the catalog photos, our cropper will automatically pop up asking you if you want to take any action.</p>

<p><br />
<strong>8. Advanced Option Pricing:</strong> Now you can choose &#39;=&#39; for option prices in addition to &#39;+&#39; and &#39;-&#39;.</p>

<p><strong>9. Streamlined CSS and Bootstrap Integration:</strong> We&#39;ve reduced down the number of CSS lines and made it easier to customize your ecommerce with a clean Bootstrap look.</p>

<p><strong>10. Responsive Cart Grid:</strong> We replaced all tables related to the cart with the vanilla Bootstrap &lt;div&gt; grid system for better responsiveness and mobile compatibility, no CSS just boostrap that was already there.</p>

<p><strong>11. Simplified Checkout Process:</strong> Our checkout page has been revamped into an interactive AJAX page, making it easier than ever before to fill out forms and reduce abandoned carts, no pop-up modals or next pages, the options are updated as the client fills the form</p>

<p><strong>12. Address Field and Phone Requirement:</strong> We&#39;ve replaced the Address 2 field with a mandatory phone field, the decision behind of this is because one address and a phone number align better with the real vouchers of Courier/postal services when filling addresses, and the fewer the fields the better.<br />
Plus, The checkout page now includes IP. geolocation from maxmind in order to auto-select the clients country on top of that we&rsquo;ve added an auto-complete for the country phone code (+nn)</p>

<p><strong>13. Enhanced Photo Gallery: </strong>We&#39;ve integrated PhotoSwipe, which is a full featured, responsive photo gallery with smooth swiping functionality on mobile devices.</p>

<p><strong>14. Custom Product Photo Slider: </strong>We&#39;ve also build a custom lightweight JavaScript photo slider that keeps your product pages organized and allows you to handle extensive photo collections efficiently.</p>

<p><strong>15. Most Viewed Module: </strong>Introducing a Most Viewed module, which lets you display top products based on weekly, monthly, yearly, or all-time products with most views.</p>

<p><strong>16. Introduced a Quick View feature: </strong>The client can display a product in a small pop up from anywhere in the website before deciding to view the page product in full.</p>

<p><strong>17. Added video support:</strong> Now you can use a video (mkv, mp4, and avi)&nbsp; for a product main thumbnail or as extra in the photo collection, supported both by the regular media slider or via PhotoSwipe.<br />
Sure I am forgetting few others, but that&#39;s it for now. Lastly, since you can&rsquo;t use the vanilla installation, we&rsquo;ve put in place a small web installer and a terminal one, If you have any questions or issues don&#39;t hesitate to reach out &nbsp;</p>

<p>&nbsp;</p>


![image](https://github.com/captainerd/VentoCart/assets/58100748/e37c7923-4d03-496c-b40c-27587ada0645)

