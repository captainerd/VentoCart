<?php

return array(
  'Ventocart\Catalog\Model\Account\Customer\AddCustomer\After' =>
    array(
      0 =>
        array(
          'event_id' => '1',
          'code' => 'activity_customer_add',
          'description' => 'Adds new customer entry in the activity log.',
          'trigger' => 'catalog/model/account/customer/addCustomer/after',
          'action' => 'event/activity.addCustomer',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '14',
          'code' => 'mail_customer_add',
          'description' => 'Sends mail to newly registered customers.',
          'trigger' => 'catalog/model/account/customer/addCustomer/after',
          'action' => 'mail/register',
          'status' => '1',
          'sort_order' => '1',
        ),
      2 =>
        array(
          'event_id' => '15',
          'code' => 'mail_customer_alert',
          'description' => 'Sends alert mail to store owner when a new customer registers.',
          'trigger' => 'catalog/model/account/customer/addCustomer/after',
          'action' => 'mail/register.alert',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Customer\EditCustomer\After' =>
    array(
      0 =>
        array(
          'event_id' => '2',
          'code' => 'activity_customer_edit',
          'description' => 'Adds edit customer entry in the activity log.',
          'trigger' => 'catalog/model/account/customer/editCustomer/after',
          'action' => 'event/activity.editCustomer',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Customer\EditPassword\After' =>
    array(
      0 =>
        array(
          'event_id' => '3',
          'code' => 'activity_customer_password',
          'description' => 'Adds edit password entry in the activity log.',
          'trigger' => 'catalog/model/account/customer/editPassword/after',
          'action' => 'event/activity.editPassword',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Customer\EditCode\After' =>
    array(
      0 =>
        array(
          'event_id' => '4',
          'code' => 'activity_customer_forgotten',
          'description' => 'Adds forgotten password entry in the activity log.',
          'trigger' => 'catalog/model/account/customer/editCode/after',
          'action' => 'event/activity.forgotten',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '17',
          'code' => 'mail_customer_forgotten',
          'description' => 'Sends mail to customers who have forgotten their password.',
          'trigger' => 'catalog/model/account/customer/editCode/after',
          'action' => 'mail/forgotten',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Customer\DeleteLoginattempts\After' =>
    array(
      0 =>
        array(
          'event_id' => '5',
          'code' => 'activity_customer_login',
          'description' => 'Adds edit customer entry in the activity log.',
          'trigger' => 'catalog/model/account/customer/deleteLoginAttempts/after',
          'action' => 'event/activity.login',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Customer\AddTransaction\After' =>
    array(
      0 =>
        array(
          'event_id' => '6',
          'code' => 'activity_customer_transaction',
          'description' => 'Adds edit customer entry in the activity log.',
          'trigger' => 'catalog/model/account/customer/addTransaction/after',
          'action' => 'event/activity.addTransaction',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '16',
          'code' => 'mail_customer_transaction',
          'description' => 'Sends mail to the customer when their transaction balance is updated.',
          'trigger' => 'catalog/model/account/customer/addTransaction/after',
          'action' => 'mail/transaction',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Address\AddAddress\After' =>
    array(
      0 =>
        array(
          'event_id' => '7',
          'code' => 'activity_address_add',
          'description' => 'Adds new address entry in the activity log.',
          'trigger' => 'catalog/model/account/address/addAddress/after',
          'action' => 'event/activity.addAddress',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Address\EditAddress\After' =>
    array(
      0 =>
        array(
          'event_id' => '8',
          'code' => 'activity_address_edit',
          'description' => 'Adds edit address entry in the activity log.',
          'trigger' => 'catalog/model/account/address/editAddress/after',
          'action' => 'event/activity.editAddress',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Address\DeleteAddress\After' =>
    array(
      0 =>
        array(
          'event_id' => '9',
          'code' => 'activity_address_delete',
          'description' => 'Adds delete address entry in the activity log.',
          'trigger' => 'catalog/model/account/address/deleteAddress/after',
          'action' => 'event/activity.deleteAddress',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Affiliate\AddAffiliate\After' =>
    array(
      0 =>
        array(
          'event_id' => '10',
          'code' => 'activity_affiliate_add',
          'description' => 'Adds new affiliate entry in the activity log.',
          'trigger' => 'catalog/model/account/affiliate/addAffiliate/after',
          'action' => 'event/activity.addAffiliate',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '18',
          'code' => 'mail_affiliate_add',
          'description' => 'Sends mail to newly registered affiliates.',
          'trigger' => 'catalog/model/account/affiliate/addAffiliate/after',
          'action' => 'mail/affiliate',
          'status' => '1',
          'sort_order' => '1',
        ),
      2 =>
        array(
          'event_id' => '19',
          'code' => 'mail_affiliate_alert',
          'description' => 'Sends mail to new customers.',
          'trigger' => 'catalog/model/account/affiliate/addAffiliate/after',
          'action' => 'mail/affiliate.alert',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Affiliate\EditAffiliate\After' =>
    array(
      0 =>
        array(
          'event_id' => '11',
          'code' => 'activity_affiliate_edit',
          'description' => 'Adds edit affiliate entry in the activity log.',
          'trigger' => 'catalog/model/account/affiliate/editAffiliate/after',
          'action' => 'event/activity.editAffiliate',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Checkout\Order\addHistory\Before' =>
    array(
      0 =>
        array(
          'event_id' => '12',
          'code' => 'activity_order_add',
          'description' => 'Adds new order entry in the activity log.',
          'trigger' => 'catalog/model/checkout/order/addHistory/before',
          'action' => 'event/activity.addHistory',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '20',
          'code' => 'mail_order',
          'description' => 'Sends mail to customer when they make an order.',
          'trigger' => 'catalog/model/checkout/order/addHistory/before',
          'action' => 'mail/order',
          'status' => '1',
          'sort_order' => '1',
        ),
      2 =>
        array(
          'event_id' => '21',
          'code' => 'mail_order_alert',
          'description' => 'Sends alert mail to new store owner when a new order is made.',
          'trigger' => 'catalog/model/checkout/order/addHistory/before',
          'action' => 'mail/order.alert',
          'status' => '1',
          'sort_order' => '1',
        ),
      3 =>
        array(
          'event_id' => '30',
          'code' => 'statistics_order_history',
          'description' => 'Updates order status statistics when a order has been updated.',
          'trigger' => 'catalog/model/checkout/order/addHistory/before',
          'action' => 'event/statistics.addHistory',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Returns\AddReturn\After' =>
    array(
      0 =>
        array(
          'event_id' => '13',
          'code' => 'activity_return_add',
          'description' => 'Adds new return entry in the activity log.',
          'trigger' => 'catalog/model/account/returns/addReturn/after',
          'action' => 'event/activity.addReturn',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '28',
          'code' => 'statistics_return_add',
          'description' => 'Updates return statistics when a new return is added.',
          'trigger' => 'catalog/model/account/returns/addReturn/after',
          'action' => 'event/statistics.addReturn',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Gdpr\AddGdpr\After' =>
    array(
      0 =>
        array(
          'event_id' => '22',
          'code' => 'mail_gdpr',
          'description' => 'Sends mail to customers who have requested their data exported or deleted.',
          'trigger' => 'catalog/model/account/gdpr/addGdpr/after',
          'action' => 'mail/gdpr',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Account\Gdpr\EditStatus\After' =>
    array(
      0 =>
        array(
          'event_id' => '23',
          'code' => 'mail_gdpr_delete',
          'description' => 'Sends mail to customers to let them know their GDPR data has been deleted.',
          'trigger' => 'catalog/model/account/gdpr/editStatus/after',
          'action' => 'mail/gdpr.remove',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Catalog\Review\AddReview\After' =>
    array(
      0 =>
        array(
          'event_id' => '25',
          'code' => 'mail_review',
          'description' => 'Sends mail to store owner that a new review has been submitted.',
          'trigger' => 'catalog/model/catalog/review/addReview/after',
          'action' => 'mail/review',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '27',
          'code' => 'statistics_review_add',
          'description' => 'Updates review statistics when a new review is added.',
          'trigger' => 'catalog/model/catalog/review/addReview/after',
          'action' => 'event/statistics.addReview',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Checkout\Subscription\AddSubscription\After' =>
    array(
      0 =>
        array(
          'event_id' => '26',
          'code' => 'mail_subscription',
          'description' => 'Sends mail to store owner that a new subscription has been created.',
          'trigger' => 'catalog/model/checkout/subscription/addSubscription/after',
          'action' => 'mail/subscription',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Sale\Returns\DeleteReturn\After' =>
    array(
      0 =>
        array(
          'event_id' => '29',
          'code' => 'statistics_return_delete',
          'description' => 'Updates return statistics when a return is deleted.',
          'trigger' => 'admin/model/sale/returns/deleteReturn/after',
          'action' => 'event/statistics.deleteReturn',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Localisation\Currency\AddCurrency\After' =>
    array(
      0 =>
        array(
          'event_id' => '31',
          'code' => 'admin_currency_add',
          'description' => 'Updates currencies when a new currency is added.',
          'trigger' => 'admin/model/localisation/currency/addCurrency/after',
          'action' => 'event/currency',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Localisation\Currency\EditCurrency\After' =>
    array(
      0 =>
        array(
          'event_id' => '32',
          'code' => 'admin_currency_edit',
          'description' => 'Updates currencies when a currency is edited.',
          'trigger' => 'admin/model/localisation/currency/editCurrency/after',
          'action' => 'event/currency',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Setting\Setting\EditSetting\After' =>
    array(
      0 =>
        array(
          'event_id' => '33',
          'code' => 'admin_currency_setting',
          'description' => 'Updates currencies when settings are saved.',
          'trigger' => 'admin/model/setting/setting/editSetting/after',
          'action' => 'event/currency',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Gdpr\EditStatus\After' =>
    array(
      0 =>
        array(
          'event_id' => '34',
          'code' => 'admin_mail_gdpr',
          'description' => 'Sends approval or denial mail to customer who requested GDPR data export or deletion.',
          'trigger' => 'admin/model/customer/gdpr/editStatus/after',
          'action' => 'mail/gdpr',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Customer_approval\ApproveAffiliate\After' =>
    array(
      0 =>
        array(
          'event_id' => '35',
          'code' => 'admin_mail_affiliate_approve',
          'description' => 'Sends mail to the affiliate when their account is approved.',
          'trigger' => 'admin/model/customer/customer_approval/approveAffiliate/after',
          'action' => 'mail/affiliate.approve',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Customer_approval\DenyAffiliate\After' =>
    array(
      0 =>
        array(
          'event_id' => '36',
          'code' => 'admin_mail_affiliate_deny',
          'description' => 'Sends mail to the affiliate when their account is denied.',
          'trigger' => 'admin/model/customer/customer_approval/denyAffiliate/after',
          'action' => 'mail/affiliate.deny',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Customer_approval\ApproveCustomer\After' =>
    array(
      0 =>
        array(
          'event_id' => '37',
          'code' => 'admin_mail_customer_approve',
          'description' => 'Sends mail to the customer when their account is approved.',
          'trigger' => 'admin/model/customer/customer_approval/approveCustomer/after',
          'action' => 'mail/customer.approve',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Customer_approval\DenyCustomer\After' =>
    array(
      0 =>
        array(
          'event_id' => '38',
          'code' => 'admin_mail_customer_deny',
          'description' => 'Sends mail to the customer when their account is denied.',
          'trigger' => 'admin/model/customer/customer_approval/denyCustomer/after',
          'action' => 'mail/customer.deny',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Customer\AddTransaction\After' =>
    array(
      0 =>
        array(
          'event_id' => '39',
          'code' => 'admin_mail_customer_transaction',
          'description' => 'Sends mail to the customer when their transaction balance is updated.',
          'trigger' => 'admin/model/customer/customer/addTransaction/after',
          'action' => 'mail/transaction',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Customer\Customer\AddReward\After' =>
    array(
      0 =>
        array(
          'event_id' => '40',
          'code' => 'admin_mail_reward',
          'description' => 'Sends mail to the customer when their reward balance is updated.',
          'trigger' => 'admin/model/customer/customer/addReward/after',
          'action' => 'mail/reward',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\Sale\Returns\addHistory\After' =>
    array(
      0 =>
        array(
          'event_id' => '41',
          'code' => 'admin_mail_return',
          'description' => 'Sends mail to customer when their return status is changed.',
          'trigger' => 'admin/model/sale/returns/addHistory/after',
          'action' => 'mail/returns',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Model\User\User\EditCode\After' =>
    array(
      0 =>
        array(
          'event_id' => '42',
          'code' => 'admin_mail_user_forgotten',
          'description' => 'Sends mail to users who have forgotten their password.',
          'trigger' => 'admin/model/user/user/editCode/after',
          'action' => 'mail/forgotten',
          'status' => '1',
          'sort_order' => '1',
        ),
      1 =>
        array(
          'event_id' => '44',
          'code' => 'admin_mail_user_authorize_reset',
          'description' => 'Sends reset link to user who`s account is locked out after 3 wrong authorize code login attempts.',
          'trigger' => 'admin/model/user/user/editCode/after',
          'action' => 'mail/authorize.reset',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Admin\Controller\Common\Authorize.send\After' =>
    array(
      0 =>
        array(
          'event_id' => '43',
          'code' => 'admin_mail_user_authorize',
          'description' => 'Sends mail login code to users email to authorize login from a new device.',
          'trigger' => 'admin/controller/common/authorize.send/after',
          'action' => 'mail/authorize',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Guest\Newsletter\Route\After' =>
    array(
      0 =>
        array(
          'event_id' => '50',
          'code' => 'newsletter_notification',
          'description' => 'Sends email notifications when a user subscribes or unsubs',
          'trigger' => 'catalog/model/guest/newsletter/route/after',
          'action' => 'mail/newsletter',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
  'Ventocart\Catalog\Model\Giftcards\Giftcard\processGiftCard\After' =>
    array(
      0 =>
        array(
          'event_id' => '55',
          'code' => 'giftcard_email',
          'description' => 'Sends email notifications when a gift card is processed',
          'trigger' => 'catalog/model/giftcards/giftcard/processGiftCard/after',
          'action' => 'mail/giftcard',
          'status' => '1',
          'sort_order' => '1',
        ),
    ),
);
