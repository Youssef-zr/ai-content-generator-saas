@extends('user.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-shopping-cart"></i> Subscription</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.subscription') }}"><i class="fa fa-shopping-cart"></i>
                                Subscription
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-eye"></i> Overview</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')
    <!-- start user subscription overview -->
    <section class="subscription-overview">
        <div class="card card-dark">
            <div class="card-header">
                <div class="card-title">
                    <h3 class="mb-0"><i class="fa fa-info-circle mr-1" aria-hidden="true"></i> Overview</h3>
                </div>
                <div class="status float-right">
                    <span class="badge text-md bg-success">
                        Active
                    </span>
                </div>
            </div>

            <div class="card-body">
                <!-- subscription info -->
                <div class="user-subscription d-flex justify-content-between">
                    <div class="form-group">
                        <label class="form-label mb-0">Your Plan:</label>
                        <h4>
                            {{ $userPlan->name }} -
                            {{ $user->invoices()->first()->date()->toFormattedDateString() }}
                        </h4>
                    </div>
                    <div class="upgrade-btn">
                        <button class="btn btn-primary update-plan">
                            Update Plan
                        </button>
                    </div>
                </div>
                <hr>

                <!-- subscription text usage progress -->
                <div class="subscription-usage mt-4">
                    <div class="usage-title d-flex justify-content-between">
                        <h5 class="text-black">Content usage</h5>
                        <h5 class="usage">
                            <strong>8 words</strong> used of {{ $userPlan->word_limit }} words
                        </h5>
                    </div>

                    <div class="usage-progress mt-2">
                        @php
                            $wordsUsedPercent = (8 * 100) / $userPlan->word_limit;
                        @endphp

                        <div class="progress rounded">
                            <div class="progress-bar bg-primary progress-bar-striped  progress-bar-animated"
                                role="progressbar" aria-valuenow="8" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $wordsUsedPercent }}%">
                                <span class="sr-only">{{ $wordsUsedPercent }}% Complete (success)</span>
                            </div>
                        </div>
                        <div class="values-map mt-2 d-flex">
                            <p class="mx-1">
                                <i class="fa fa-circle text-primary"></i>
                                Words generated
                            </p>
                            <p class="mx-1">
                                <i class="fa fa-circle text-secondary"></i>
                                Available words
                            </p>
                        </div>
                    </div>
                </div>

                <!-- subscription image usage progress -->
                <div class="subscription-usage mt-3">
                    <div class="usage-title d-flex justify-content-between">
                        <h5 class="text-black">Images usage</h5>
                        <h5 class="usage">
                            <strong>12 images</strong> used of {{ $userPlan->image_limit }} images
                        </h5>
                    </div>

                    <div class="usage-progress mt-2">
                        @php
                            $imagesUsedPercent = (12 * 100) / $userPlan->image_limit;
                        @endphp

                        <div class="progress rounded">
                            <div class="progress-bar bg-primary progress-bar-striped  progress-bar-animated"
                                role="progressbar" aria-valuenow="12" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $imagesUsedPercent }}%">
                                <span class="sr-only">{{ $imagesUsedPercent }} % Complete (success)</span>
                            </div>
                        </div>
                        <div class="values-map mt-2 d-flex">
                            <p class="mx-1">
                                <i class="fa fa-circle text-primary"></i>
                                Images generated
                            </p>
                            <p class="mx-1">
                                <i class="fa fa-circle text-secondary"></i>
                                Available images
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <hr class="mt-4">

    <!-- upgrade plans section -->
    <section class="plans mt-4 mb-5">
        <div class="card card-dark">
            <div class="card-header">
                <div class="card-title d-flex">
                    <div class="icon">
                        <i class="fa fa-arrow-circle-up fa-2x mr-2"></i>
                    </div>
                    <div class="text">
                        <h3 class="mb-0"> Upgrade</h3>
                        <p class="mt-2 mb-0">Get more words per month by upgrading today!</p>
                    </div>
                </div>
            </div>
            <div class="card-body plans-container">
                <div class="plans-title">
                    <h2 class="my-4 text-center text-capitalize">
                        <i class="fa fa-grav"></i>
                        Flexible and transparent pricing
                    </h2>
                </div>
                <div class="row">
                    @foreach ($plans as $index => $plan)
                        <div class="col-lg-4 col-md-4 col-sm-12">
                            <div class="plan-card plan-one">
                                <div class="pricing-header {{ $index == 1 ? 'green' : '' }}">
                                    <h4 class="plan-title border-bottom"><i class="fa fa-star"></i>
                                        {{ $plan->name }}</h4>
                                    <div class="plan-cost">
                                        {{ $plan->price }}
                                        <span class="currency text-lg">{{ $plan->currency }}</span>
                                    </div>
                                </div>
                                <ul class="plan-features">
                                    <li class="py-3">
                                        <i class="fa fa-check-square mr-1"></i>
                                        Monthly words limit
                                        <strong class="ml-2">
                                            {{ $plan->word_limit }}
                                            words
                                        </strong>
                                    </li>
                                    <li class="py-3">
                                        <i class="fa fa-check-square mr-1"></i>
                                        Monthly images limit
                                        <strong class="ml-2">{{ $plan->image_limit }}
                                            images
                                        </strong>
                                    </li>
                                    <li class=" py-3text-muted">
                                        <i class="fa fa-check-square mr-1"></i>
                                        ACCESS TOOL (ALL)
                                    </li>
                                    <li class=" py-3text-muted">
                                        <i class="fa fa-check-square mr-1"></i>
                                        24/7 Tech Support
                                    </li>
                                    <li class=" py-3text-muted">
                                        <i class="fa fa-check-square mr-1"></i>
                                        Cancel Anytime
                                    </li>
                                </ul>
                                <div class="plan-footer py-3">
                                    <a href="#" data-toggle="modal" data-target="#checkout"
                                        data-plan='{{ $plan }}'
                                        class="btn btn-{{ $index == 1 ? 'primary' : 'dark' }} mx-3 btn-lg btn-rounded d-block btn-open-checkout">
                                        <i class="fa fa-shopping-cart mr-1"></i> Select Plan
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- The Modal checkout -->
    <div class="modal" id="checkout">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">
                        <i class="fa fa-info-circle"></i>
                        Plan
                        <span class="plan-name"></span>
                        <span class="plan-info"></span>
                    </h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    {!! Form::open(['url' => route('user.subscription.payment'), 'method' => 'post', 'id' => 'subscribe-form']) !!}

                    <!-- stripe plan id -->
                    {!! Form::hidden('plan_id', old('plan_id'), ['id' => 'plan_id']) !!}
                    <!-- card holder name field -->
                    <div class="form-group">
                        {!! Form::label('card-holder-name', 'Card Holder Name', ['class' => 'form-label']) !!}
                        {!! Form::text('card-holder-name', old('card-holder-name'), [
                            'class' => 'form-control',
                            'required' => true,
                            'placeholder' => 'your card holder name',
                        ]) !!}
                        <!-- Used to display form errors. -->
                        <div id="name-errors" role="alert">card holder name is required.</div>
                    </div>

                    <!-- Credit or debit card field -->
                    <div class="form-group">
                        {!! Form::label('card-element', 'Credit or debit card', ['class' => 'form-label']) !!}
                        <div id="card-element" class="form-control">
                        </div>
                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>

                    <div class="stripe-errors"></div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            @foreach ($errors->all() as $error)
                                {{ $error }}<br>
                            @endforeach
                        </div>
                    @endif
                    <div class="form-group text-center">
                        <button id="card-button" data-secret="{{ $intent->client_secret }}"
                            class="btn btn-lg btn-success btn-block">
                            <i class="fa fa-send"></i> SUBMIT
                        </button>
                    </div>
                    {!! Form::close() !!}

                    <!-- stripe image -->
                    <div class="stripe-image mt-4">
                        <img src="{{ url('assets/site/images/stripe.jpg') }}" class="img-responsive" alt="">
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">
                        <i class="fa fa-times"></i> Close
                    </button>
                </div>


            </div>
        </div>
    </div>
@endsection

@push('css')
    <style>
        .img-responsive {
            max-width: 100%
        }

        /* plans */
        .plan-one {
            margin: 0 0 20px 0;
            width: 100%;
            position: relative;
        }

        .plan-card {
            background: #fff;
            margin-bottom: 30px;
            transition: .5s;
            border: 0;
            border-radius: .55rem;
            position: relative;
            width: 100%;
            box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.5);
        }

        .plan-one .pricing-header {
            padding: 0;
            margin-bottom: 0;
            text-align: center;
        }

        .plan-one .pricing-header .plan-title {
            -webkit-border-radius: 10px 10px 0px 0px;
            -moz-border-radius: 10px 10px 0px 0px;
            border-radius: 10px 10px 0px 0px;
            font-size: 1.2rem;
            color: #ffffff;
            padding: 10px 0;
            font-weight: 600;
            background: #2a2f38;
            margin: 0;
        }

        .plan-one .pricing-header .plan-cost {
            color: #ffffff;
            background: #1b222c;
            padding: 15px 0;
            font-size: 2.5rem;
            font-weight: 700;
        }

        .plan-one .pricing-header .plan-save {
            color: #ffffff;
            background: #74b9ff;
            padding: 10px 0;
            font-size: 1rem;
            font-weight: 700;
        }

        .plan-one .pricing-header.green .plan-title {
            background: #00a1ff;
        }

        .plan-one .pricing-header.green .plan-cost {
            background: #0984e3;
        }

        .plan-one .plan-features {
            border: 1px solid #e6ecf3;
            border-top: 0;
            border-bottom: 0;
            padding: 0;
            margin: 0;
            text-align: left;
        }

        .plan-one .plan-features li {
            padding: 10px 15px 10px 22px;
            margin: 5px 0;
            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
            position: relative;
            border-bottom: 1px solid #e6ecf3;
            line-height: 100%;
        }

        .plan-one .plan-footer {
            border: 1px solid #e6ecf3;
            border-top: 0;
            background: #ffffff;
            -webkit-border-radius: 0 0 10px 10px;
            -moz-border-radius: 0 0 10px 10px;
            border-radius: 0 0 10px 10px;
            text-align: center;
            padding: 10px 0 30px 0;
        }

        @media (max-width: 767px) {
            .plan-one .pricing-header {
                text-align: center;
            }

            .plan-one .pricing-header i {
                display: block;
                float: none;
                margin-bottom: 20px;
            }
        }

        @media (min-width:1400px) {
            .plans-container {
                width: calc(100% - 25%)
            }

            .plan-one .plan-features li {
                padding-left: 40px
            }
        }

        /* stripe  */
        .StripeElement {
            background-color: white;
            padding: 8px 12px;
            border-radius: 4px;
            border: 1px solid transparent;
            box-shadow: 0 1px 3px 0 #e6ebf1;
            -webkit-transition: box-shadow 150ms ease;
            transition: box-shadow 150ms ease;
        }

        .StripeElement--focus {
            box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: red
        }

        #name-errors {
            display: none;
            color: red
        }
    </style>
@endpush

@push('javascript')
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        $(() => {
            // scroll to plans
            $('.update-plan').on('click', function() {
                $('html,budy').animate({
                    scrollTop: $('.plans').offset().top
                })
            })

            // btn open checkout modal
            $('.btn-open-checkout').on('click', function() {
                let plan = $(this).data('plan');

                $('.plan-name').text(plan.name);
                $('#plan_id').val(plan.stripe_plan_id);

                let planInfo = `(${plan.price}${plan.currency}/${plan.billing_interval})`;
                $('.plan-info').text(planInfo);

            })
        })


        // continuer checkout
        var stripe = Stripe("{{ config('services.stripe.key') }}");
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
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
        var card = elements.create('card', {
            hidePostalCode: true,
            style: style
        });
        card.mount('#card-element');
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });


        const cardHolderName = document.getElementById('card-holder-name');
        const cardButton = document.getElementById('card-button');
        const clientSecret = cardButton.dataset.secret;
        cardButton.addEventListener('click', async (e) => {
            e.preventDefault();

            if (cardHolderName.value == "") {
                $('#name-errors').show();
            } else {

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
                    paymentMethodHandler(setupIntent.payment_method);
                }
            }
        });

        function paymentMethodHandler(payment_method) {
            var form = document.getElementById('subscribe-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'payment_method');
            hiddenInput.setAttribute('value', payment_method);
            form.appendChild(hiddenInput);
            form.submit();
        }

        cardHolderName.addEventListener('keyup', function() {
            if (this.value !== "") {
                $('#name-errors').hide();
            }
        });
    </script>
@endpush
