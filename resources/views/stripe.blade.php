<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Payments') }}
        </h2>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-0">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-plantilla>

                        <div class="container">

                            <div class="row">
                                <div class="col-md-6 col-md-offset-3 border">
                                    <div class="panel panel-default credit-card-box">
                                        <div class="panel-heading display-table " >
                                            <div class="row display-tr" >
                                                <h3 class="text-center text-2xl text-black " >Payment Details</h3>
                                                <div class="display-td" >
                                                    <img class="img-responsive pull-center" src="http://i76.imgup.net/accepted_c22e0.png">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="panel-body">

                                            @if (Session::has('success'))
                                                <div class="alert alert-success text-center">
                                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                                                    <p>{{ Session::get('success') }}</p>
                                                </div>
                                            @endif

                                            <form
                                                    role="form"
                                                    action="{{ route('stripe.post') }}"
                                                    method="post"
                                                    class="require-validation"
                                                    data-cc-on-file="false"
                                                    data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                                                    id="payment-form">
                                                @csrf

                                                <div class='form-row row'>
                                                    <div class='col-xs-12 form-group required'>
                                                        <label class="text-black">Name on Card</label> <input
                                                            class='form-control' size='4' type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-xs-12 form-group card required'>
                                                        <label class='control-label'>Card Number</label> <input
                                                            autocomplete='off' class="border border-red-400" size='20'
                                                            type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-xs-12 col-md-4 form-group cvc required'>
                                                        <label class='control-label'>CVC</label> <input autocomplete='off'
                                                            class='form-control card-cvc' placeholder='ex. 311' size='4'
                                                            type='text'>
                                                    </div>
                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Month</label> <input
                                                            class='form-control card-expiry-month' placeholder='MM' size='2'
                                                            type='text'>
                                                    </div>
                                                    <div class='col-xs-12 col-md-4 form-group expiration required'>
                                                        <label class='control-label'>Expiration Year</label> <input
                                                            class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                                            type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-md-12 error form-group hide'>
                                                        <div class='alert-danger alert'>Please correct the errors and try
                                                            again.</div>
                                                    </div>
                                                </div>
                                                {{-- @foreach ($carritos as $carrito)
                                                @php
                                                $precio = 0;
                                                @endphp
                                                @php
                                                $precio += $carrito->producto->precio * $carrito->cantidad;
                                                @endphp --}}
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="justify-center btn btn-primary btn-lg bg-slate-500 btn-block" type="submit">Pay Now  "" &euro;</button>
                                                    </div>
                                                </div>
                                                {{-- @endforeach --}}
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </x-plantilla>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>

<script type="text/javascript" src="https://js.stripe.com/v2/"></script>

<script type="text/javascript">
$(function() {

    var $form         = $(".require-validation");

    $('form.require-validation').bind('submit', function(e) {
        var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');

        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });

        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }

  });

  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            /* token contains id, last4, and card type */
            var token = response['id'];

            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }

});
</script>
