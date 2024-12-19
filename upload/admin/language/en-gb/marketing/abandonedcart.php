<?php

$_['heading_title'] = "Abandoned Cart";
$_['entry_cart_memory'] = "Cart Retention Period";
$_['text_cart_memory_help'] = 'Specify the number of months to retain guest cart data.';

$_['entry_abandoned_threshold'] = 'Abandoned Cart Threshold';
$_['text_abandoned_threshold_help'] = 'Time in days when a cart is considered abandonment.';
$_['entry_repeat_frequency'] = 'Repeat Frequency';
$_['text_repeat_frequency_help'] = 'If the cart still exists after x days of notification, another notification will be sent.';
$_['entry_total_notifications'] = 'Total Notifications';
$_['text_total_notifications_help'] = 'How many times the "Repeat Frequency" sends notifications and stops.';
$_['entry_total_carts'] = 'Total Carts';
$_['entry_total_account_carts'] = 'Total Account Carts';
$_['entry_total_guest_carts'] = 'Total Guest Carts';
$_['entry_mail_subject_label'] = "Subject";
$_['template_help'] = 'You can use the following markups in your template:';
$_['template_help_2'] = '[sitename]: Replaced with the name of the site, [siteurl]: Replaced with the URL of the site, [products]: Renders 150x150 image for each product in the customer\'s cart, [name]: With customer name if found or with "Customer" [cart-button]: Inserts a blue button labeled "Return to Cart"';
$_['text_view_more'] = 'View more...';
$_['button_settings'] = 'Settings';
$_['tab_overview'] = 'Overview';
$_['tab_settings'] = 'Settings';
$_['tab_carts'] = 'Carts';
$_['tab_templates'] = 'Mail Templates';
$_['button_save'] = 'Save';
$_['entry_mail_template_placeholder'] = 'Edit your mail template here';
$_['text_cart_total_carts'] = 'All carts that are subscribed to newsletter and abandoned';
$_['text_customer_total_carts'] = 'Carts of subscribed registered customers and abandoned';
$_['text_guests_total_carts'] = 'Carts abandoned by guests who subscribed to newsletter';
$_['text_deleted_product'] = 'Deleted product';
$_['text_customer_name'] = 'Customer Name';
$_['text_products'] = "Products";
$_['text_analytics_30_days'] = 'Carts per Day (Last 30 Days)';
$_['text_analytics_carts_per_day'] = 'Carts per Day';
$_['text_analytics_abandoned_subscribed'] = 'Subscribed cart';
$_['text_analytics_more_than_1_products'] = 'More than 1 Products';
$_['text_analytics_clicked_on_mail'] = 'Clicks on Email Link';
$_['entry_mail_subject_placeholder'] = 'Subject';
$_['button_schedule_notifications'] = 'Schedule Notifications';
$_['text_schedule_warning'] = 'This action will attempt to send emails immediately using Apache-PHP on the browser. You will need to have a stable internet connection and leave the window open until it finish, The recommended approach is to use a cron job. Please refer to the documentation for more details. Are you sure you want to continue?';
$_['text_schedule_processed'] = 'Out of %d processed carts, %d were found eligible and sent.';

// Mail markup
$_['mail_text_customer'] = "Customer";
$_['mail_text_return_to_cart'] = "Return to Cart!";

// Error messages for validation
$_['error_abandoned_threshold'] = 'Abandoned threshold must be a positive number.';
$_['error_repeat_frequency'] = 'Repeat frequency must be a positive number.';
$_['error_total_notifications'] = 'Total notifications must be a non-negative number.';
$_['error_abandonedcart_cart_memory'] = 'Total notifications must be a non-negative number.';

$_['error_noticetemplate'] = 'eMail Notice Template is missing';
$_['error_permission'] = 'Access denied, you don\'t have permission';