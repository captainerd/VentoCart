Features added from v1.0.5 up to v1.0.9:
    **Revamped further checkout page:**
        Fixed various bugs, removed doublicated code.

    **Mouse Drag And Drop Categories:**
        Sort categories with mouse drag and drop instead of decimal inputs.

    **Up And Down Photos Sort:**
        Sort product images with up and down controls instead of decimal inputs.

    **Drag And Drop Options:**
        Options can now be arranged using drag and drop.

    **Revamped Options UI:**
        Options redesigned to accordion UI for improved usability.

    **Add New Option Group:**
        New option groups can be added from the same page of the options tab of a product.

    **Easier full language translations:** 
        All language files/structure created automatically 
        All flag images available from select; auto-detects locale and language code by country.
        New language file editor and language exporter for easy translation, 
        export one big .txt, translated it and import it back. 


**Changelog from Genesis fork up to v1.0.5:**

    Real Variation System:
        Replaced pseudo-variation system with dynamic system for unique combinations.
        All variations on same product page; options update price in real time via JS.

    Optimized Options Handling:
        Reduced related SQL tables from 5 to 2 for streamlined handling.
        Fewer loops, less SQL joins, and queries for developers.

    Cleaned Breadcrumbs:
        Template ul loops for breadcrumbs now in a separate file for easier styling customization.

    Bug Fixes and Code Refinement:
        Addressed bugs, ensuring stability.
        Code improvements for smoother performance.

    Improved Attribute Management:
        One-to-one relationship for efficient attribute management.
        Attribute groups eliminated; copy-paste mass-attributes for one product.

    Switched Template Engine to Plates:
        Moved to Plates template engine for better performance and security.
        Allows use of both Plates and Twig templates.

    Enhanced Image Management:
        Added image cropper for cropping and rotating images.
        Cropper prompts action for images missing 1:1 square ratio for catalog photos.

    Advanced Option Pricing:
        Option prices can now use '=' in addition to '+' and '-'.

    Streamlined CSS and Bootstrap Integration:
        Reduced CSS lines for easier customization with clean Bootstrap look.

    Responsive Cart Grid:
        Replaced cart tables with Bootstrap <div> grid for improved responsiveness.

    Simplified Checkout Process:
        Revamped checkout into interactive AJAX page for easier form filling.
        Real-time options update as client fills the form.

    Address Field and Phone Requirement:
        Replaced Address 2 with mandatory phone field for better alignment with courier/postal services.
        Added IP geolocation for auto-selecting client's country.

    Enhanced Photo Gallery:
        Integrated PhotoSwipe for responsive, swipe-enabled photo gallery.

    Custom Product Photo Slider:
        Built lightweight JavaScript photo slider for organized product pages.

    Most Viewed Module:
        Introduced module to display top products based on views over time.

    Quick View Feature:
        Clients can view product in small pop-up before deciding to go to full page.

    Added Video Support:
        Supports video (mkv, mp4, avi) for product thumbnails or in photo collections.

    Improved Image Organization:
        Each product has its own directory using product ID for better organization.


 ![image](https://github.com/captainerd/VentoCart/assets/58100748/a1312ad4-97b8-4418-b2d0-b6c53b5eb3f2)

![image](https://github.com/captainerd/VentoCart/assets/58100748/54dd0c33-98e8-40b7-8976-d907d158e288)

![image](https://github.com/captainerd/VentoCart/assets/58100748/971ca5c5-d3d5-4ba7-9d57-dba25cd904b5)


 ![image](https://github.com/captainerd/VentoCart/assets/58100748/e37c7923-4d03-496c-b40c-27587ada0645)