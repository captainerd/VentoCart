<!-- CREDIT CARD FORM STARTS HERE -->

<link rel="stylesheet" type="text/css" href="<?= $store_url ?>extension/stripe/catalog/view/stylesheet/stripe.css">

<div class="panel panel-default credit-card-box">
	<div class="panel-heading display-table">
		<div class="row display-tr">
			<h3 class="fh3 panel-title display-td">
				<?= $text_title ?>
			</h3>
		</div>
	</div>
	<?php if ($test_mode): ?>
		<small class="text-info">
			<?= $text_debug ?>
		</small>
	<?php endif; ?>

	<div class="panel-body">
		<div class="row">
			<div class="col-xs-12">

				<p id="card-errors" class="payment-errors"></p>

			</div>
		</div>
		<form role="form" id="payment-form" method="POST">
			<?php if (!empty($saved_methods)): ?>
				<select class="form-select" id="payment-method-select" name="payment-method">
					<option value="new">Add New</option>
						<?php foreach ($saved_methods as $key => $method): ?>
							<option value="<?php echo $method['id']; ?>" <?php if ($key === 0): ?>selected<?php endif; ?>>
								<?php echo $method['name'] . " " . $method['description']; ?>
							</option>
						<?php endforeach; ?>
					</select>

				</select>
			<?php endif; ?>
			<div class="collapse" id="collapseExample">
  <div  >
			<div class="row">
				<div class="col-xs-12">
					<div class="form-group">
						<label for="cardNumber">CARD NUMBER</label>
						<div class="input-group">
							<div id="card-number" class="form-control"></div>
							<span class="input-group-addon"><i class="fa fa-credit-card"></i></span>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="col-xs-7 col-md-7">
					<div class="form-group">
						<label for="cardExpiry"> <span class="visible-xs-inline">EXPIRY </span> DATE</label>
						<div id="card-expiry" class="form-control"></div>
					</div>
				</div>
				<div class="col-xs-5 col-md-5 pull-right">
					<div class="form-group">
						<label for="cardCVC">CV CODE</label>
						<div id="card-cvc" class="form-control"></div>
					</div>
				</div>
			</div>
			</div>
</div>

			<div class="row">
				<div class="col-xs-12">
					<button class="subscribe btn btn-success btn-lg btn-block" id="stripeSubmit"
						type="button">  <?=$button_purchase?></button>
				</div>
			</div>

		</form>
	</div>
</div>
<!-- CREDIT CARD FORM ENDS HERE -->

<!-- Include the Stripe.js library script here -->
<script src="https://js.stripe.com/v3/"></script>
<!-- Include the jQuery payment library script here -->



<script>


$(document).ready(function() {
    // Initially check if the select has anything selected other than "new"
    checkSelect();
    
    // Enable/disable stripeSubmit when select changes
	if ($('#payment-method-select').length) {
    $('#payment-method-select').change(function() {
        checkSelect();
    });
} else {
	$('#collapseExample').collapse('show');

}
});

function checkSelect() {
    var selectedValue = $('#payment-method-select').val();
    if (selectedValue !== 'new') {
		$('#collapseExample').collapse('hide');
        document.getElementById('stripeSubmit').disabled = false;
 
    } else {
		$('#collapseExample').collapse('show');
        document.getElementById('stripeSubmit').disabled = true;
    }
}


	$('#button-confirm').hide();
	var cardButton = document.getElementById('stripeSubmit');
	cardButton.disabled = true;
	var completed = {
		cardNumber: false,
		cardExpiry: false,
		cardCvc: false,
	};

	function setupCardElement(elementType, mountSelector, elements) {
		var cardElement = elements.create(elementType);
		cardElement.mount(mountSelector);

		cardElement.addEventListener('change', function (event) {
			// Update the completion status based on the element type
			completed[elementType] = event.complete;

			// Check if all elements are complete
			var allElementsComplete = Object.values(completed).every(function (status) {
				return status;
			});

			// Enable or disable the submit button based on all elements' completion
			cardButton.disabled = !allElementsComplete;
		});

		return cardElement;
	}

	function initStripe() {


		if (window.Stripe) {

			var stripe = Stripe('<?= $payment_stripe_public_key; ?>');
			var elements = stripe.elements({ <?php if ($locale): ?>"locale": "<?= $locale; ?>"<?php endif; ?> });


			var cardNumber = setupCardElement('cardNumber', '#card-number', elements);
			var cardExpiry = setupCardElement('cardExpiry', '#card-expiry', elements);
			var cardCvc = setupCardElement('cardCvc', '#card-cvc', elements);





			var style = {
				base: {
					color: "#32325D",
					fontWeight: 500,
					fontFamily: "Inter UI, Open Sans, Segoe UI, sans-serif",
					fontSize: "15px",
					fontSmoothing: "antialiased",
					":-webkit-autofill": {
						color: "#fce883",
					},
				},
				invalid: {
					color: "#E25950"
				}
			};



			var billing_details = <?php echo json_encode($billing_details); ?>;



			cardButton.addEventListener('click', function (ev) {
				$("#stripeSubmit").html('Processing <i class="fa fa-spinner fa-pulse"></i>');
				if ($('#payment-method-select').length && $('#payment-method-select').val() != "new") {
				 
					$.ajax({
							url: '<?= $action ?>',
							method: 'POST',
							data: JSON.stringify({ payment_method_id: $('#payment-method-select').val() }),
							success: function (response) {
								handleServerResponse(response);
							},
							error: function (jqXHR, textStatus, errorThrown) {
								console.error(jqXHR.responseText);
								console.error(textStatus, errorThrown);
							}
						});

					return;
				}

			 
				stripe.createPaymentMethod({
					type: 'card',
					card: cardNumber,
					billing_details: billing_details
				}).then(function (result) {
					if (result.error) {
						// Show error in payment form
						$("#stripeSubmit").html('  <?=$button_purchase?>');
						showErrorMessage(result.error.message);
					} else {

					 

						// Send paymentMethod.id to your server (see Step 2)
						$.ajax({
							url: '<?= $action ?>',
							method: 'POST',
							data: JSON.stringify({ payment_method_id: result.paymentMethod.id }),
							success: function (response) {
								handleServerResponse(response);
								$("#stripeSubmit").html('  <?=$button_purchase?>');
							},
							error: function (jqXHR, textStatus, errorThrown) {
								console.warn("Stripe App have encountered with some error.");
								console.warn("Please see below the response your server sent.");
								console.error(jqXHR.responseText);
								console.error(textStatus, errorThrown);
								$("#stripeSubmit").html('  <?=$button_purchase?>');
							}
						});
					}
				}).catch(function (e) {
					logServerError(e);
				});
			});


			var handleServerResponse = function (response) {

				if (typeof response === "undefined") {
					console.warn("Stripe App have encountered with some error. This error might not be caused by Stripe App. Such errors come when Stripe App receive unexpected JSON response from your server.");
					console.warn("Please see below the response your server sent, whereas JSON was expected by Stripe App.");
					console.error(response);
					return;
				}

				if (response.error) {
					// Show error from server on payment form
					showErrorMessage(response.error);
				} else if (response.requires_action) {
					// Use Stripe.js to handle the required card action
					stripe.handleCardAction(response.payment_intent_client_secret).then(function (result) {
						if (result.error) {
							// Show error from Stripe.js in payment form
							showErrorMessage(result.error.message);
						} else {
							// The card action has been handled
							// The PaymentIntent can be confirmed again on the server
							// Send paymentMethod.id to your server (see Step 2)
							$.ajax({
								url: '<?= $action ?>',
								method: 'POST',
								data: JSON.stringify({ payment_intent_id: result.paymentIntent.id }),
								success: function (response) {
									handleServerResponse(response);
								},
								error: function (jqXHR, textStatus, errorThrown) {
									console.warn("Stripe App have encountered with some error.");
									console.warn("Please see below the response your server sent.");
									console.error(jqXHR.responseText);
									console.error(textStatus, errorThrown);
								}
							});
						}
					}).catch(function (e) {
						logServerError(e);
					});
				} else {
					// Show success message
					window.location = response.success;
				}
			}

			var showErrorMessage = function (error) {
				$("#card-errors").text(error);

			}

			var logServerError = function (error) {
				console.warn("Stripe App have encountered with some error.");

			}
		} else {
			setTimeout(function () { initStripe(); }, 50);
		}
	}


	initStripe();

</script>