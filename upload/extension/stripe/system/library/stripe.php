<?php
// Stripe singleton
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Stripe.php');

// Utilities
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/AutoPagingIterator.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/CaseInsensitiveArray.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/LoggerInterface.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/DefaultLogger.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/RandomGenerator.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/RequestOptions.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/Set.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Util/Util.php');

// HttpClient
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/HttpClient/ClientInterface.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/HttpClient/CurlClient.php');

// Errors
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/Base.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/Api.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/ApiConnection.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/Authentication.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/Card.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/Idempotency.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/InvalidRequest.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/Permission.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/RateLimit.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/SignatureVerification.php');

// OAuth errors
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/OAuthBase.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/InvalidClient.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/InvalidGrant.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/InvalidRequest.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/InvalidScope.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/UnsupportedGrantType.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Error/OAuth/UnsupportedResponseType.php');

// API operations
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/All.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/Create.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/Delete.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/NestedResource.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/Request.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/Retrieve.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiOperations/Update.php');

// Plumbing
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiResponse.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/StripeObject.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiRequestor.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApiResource.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/SingletonApiResource.php');

// Stripe API Resources
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Account.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/AlipayAccount.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApplePayDomain.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApplicationFee.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ApplicationFeeRefund.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Balance.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/BalanceTransaction.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/BankAccount.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/BitcoinReceiver.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/BitcoinTransaction.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Card.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Charge.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Collection.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/CountrySpec.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Coupon.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Customer.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Discount.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Dispute.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/EphemeralKey.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Event.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ExchangeRate.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/File.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/FileLink.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/FileUpload.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Invoice.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/InvoiceItem.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/InvoiceLineItem.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/IssuerFraudRecord.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Issuing/Authorization.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Issuing/Card.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Issuing/CardDetails.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Issuing/Cardholder.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Issuing/Dispute.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Issuing/Transaction.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/LoginLink.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Order.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/OrderItem.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/OrderReturn.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/PaymentIntent.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Payout.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Plan.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Product.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Recipient.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/RecipientTransfer.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Refund.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Reporting/ReportRun.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Reporting/ReportType.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/SKU.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Sigma/ScheduledQueryRun.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Source.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/SourceTransaction.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Subscription.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/SubscriptionItem.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Terminal/ConnectionToken.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Terminal/Location.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Terminal/Reader.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/ThreeDSecure.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Token.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Topup.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Transfer.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/TransferReversal.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/UsageRecord.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/UsageRecordSummary.php');

// OAuth
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/OAuth.php');

// Webhooks
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/Webhook.php');
require(DIR_EXTENSION  . "stripe/system/" . 'library/stripe/WebhookSignature.php');


class Stripe {
    
}
