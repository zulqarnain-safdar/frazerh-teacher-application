@include('layouts.frontend.head')
<style>
    .card-body {
        text-align: left !important;
    }

    #createForm label {
        color: black !important;
        font-weight: 600;
        text-align: left !important;
    }

    #card-element {
        margin: 0 16px;
    }

    #card-errors {
        margin: 15px 16px;
        color: #e35555;
    }
    @media (max-width: 576px) {
        .card-body {
        text-align: center !important;
        }
    }
</style>
<div class="banner">
    <section class="home-section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="home-div mt-4">
                        <img src="{{ URL::asset('frontend/image/image1.png') }}" width="150"
                             alt="">
                    </div>

                </div>
            </div>
            <div class="row" id="createForm" style="margin-top:90px;margin-bottom:50px;">
                <div class="col-lg-6 offset-lg-3">
                    <div class="card">
                        <form action="{{ route('subscription.create') }}" method="post" id="payment-form"
                            data-secret="{{ $intent->client_secret }}">
                            @csrf
                            <div class="form-group">
                                <div class="card-header">
                                    <label for="card-element">
                                        Enter your credit card information
                                    </label>
                                </div>
                                <div class="card-body">
                                    <label for="">Card Holder Name</label>
                                    <input type="text" name="" id="cardholder-name" class="mb-5">
                                    <div id="card-element">
                                        <!-- A Stripe Element will be inserted here. -->
                                    </div>
                                    <!-- Used to display form errors. -->
                                    <div id="card-errors" role="alert"></div>
                                    <input type="hidden" name="plan"
                                        value="{{ $plan_type == 'Yearly' ? 'price_1LuHIiId16wd4cjLPxpuPHfi' : 'price_1LuHCJId16wd4cjLgmIqOkve' }}" />
                                </div>
                            </div>
                            <div class="card-footer">
                                <button class="btn btn-dark" type="submit">Pay</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>

<!-- General JS Scripts -->
<script src="{{ URL::asset('theme-assets/js/app.min.js') }}"></script>
<script src="https://js.stripe.com/v3/"></script>
<script>
    // Create a Stripe client.
    var stripe = Stripe('{{ env('STRIPE_KEY') }}');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
    var style = {
        base: {
            color: '#32325d',
            lineHeight: '18px',
            fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
            fontSmoothing: 'antialiased',
            fontSize: '16px',
            '::placeholder': {
                color: '#aab7c4'
            }
        },
        invalid: {
            color: '#fa755a',
            iconColor: '#fa755a'
        }
    };

    // Create an instance of the card Element.
    var card = elements.create('card', {
        style: style
    });

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form')
    var cardHolderName = document.getElementById('cardholder-name')
    var clientSecret = form.dataset.secret;

    var setupIntent1;


    form.addEventListener('submit', async function(event) {
        event.preventDefault();

        const {
            setupIntent,
            error
        } = await stripe.confirmCardSetup(
            clientSecret, {
                payment_method: {
                    card: card,
                    billing_details: {
                        name: cardHolderName.value
                    }
                }
            }
        );

        if (error) {
            var errorElement = document.getElementById('card-errors');
            errorElement.textContent = error.message;
        } else {
            console.log(setupIntent)
            setupIntent1 = setupIntent
            stripeTokenHandler(setupIntent);
        }

        //   stripe.createToken(card).then(function(result) {
        //     if (result.error) {
        //       // Inform the user if there was an error.
        //       var errorElement = document.getElementById('card-errors');
        //       errorElement.textContent = result.error.message;
        //     } else {
        //       // Send the token to your server.
        //       stripeTokenHandler(result.token);
        //     }
        //   });
    });

    $('#teacherProfileSearch').keypress(function (e) {
    var key = e.which;
    var value = e.value
    if(key == 13) // the enter key code
    {
    let href = '/search-teacher-by-username'
    $('#teacherProfileSearchForm').attr('action', href);
    }
    });

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
        // Insert the token ID into the form so it gets submitted to the server
        var form = document.getElementById('payment-form');
        var hiddenInput = document.createElement('input');
        hiddenInput.setAttribute('type', 'hidden');
        hiddenInput.setAttribute('name', 'payment_method');
        hiddenInput.setAttribute('value', setupIntent1.payment_method);
        form.appendChild(hiddenInput);

        // Submit the form
        form.submit();
    }
</script>


</body>

</html>
