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
                                <div class="min-h-screen flex justify-center items-center bg-blue-500">
                                    <div class=" card rounded-lg h-auto w-3/4 bg-white">
                                        <div class="flex h-full w-full ">

                                            <div class="left_side truncate relative rounded-l-lg h-auto w-full truncate">
                                                <img class="h-full w-full" src="https://imgur.com/cOwXXFq.jpg">
                                                <div class="h-48 w-72 opacity-70 rounded-lg  bg-blue-300 absolute top-28 left-8 ">
                                                    <div class="p-2 mt-3 text-black font-semibold">
                                                        <p >Card Number</p>
                                                        <p class="border-b-2 text-white shown_number">0000 0000 0000 0000</p>
                                                    </div>
                                                    <div class="flex gap-3 mt-3">
                                                        <div class="p-2 mt-2 text-black font-semibold">
                                                            <p >Expiry Date</p>
                                                            <p class="border-b-2 text-white shown_expiry">mm/yyyy</p>
                                                        </div>
                                                        <div class="p-2 mt-2 text-black font-semibold">
                                                            <p >CVV</p>
                                                            <p class="border-b-2 text-white shown_cvv">000</p>
                                                        </div>
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

                                                <div class="p-3 right_side truncate h-auto w-full bg-gray-300 rounded-r-lg">
                                                    <p class="mt-3 text-xl font-semibold text-center">Payment Details</p>
                                                        <div class="mt-5 relative">
                                                        <label class="control-label text-xs absolute -top-4 left-0">Name on Card</label> <input
                                                            class='form-control h-12 w-full border border-white transition-all rounded-lg px-2 outline-none focus:border-blue-900' placeholder='ex. Juan' size='20' type='text'>
                                                        </div>



                                                        <div class="mt-7 w-full flex gap-3">
                                                            <div class=" relative w-full">
                                                        <label class='control-label text-xs absolute -top-4 left-0'>Card Number</label> <input
                                                            autocomplete='off' placeholder='0000 0000 0000 0000' class="form-control card-number h-12 w-full border border-white transition-all rounded-lg px-2 outline-none focus:border-blue-900" size='20'
                                                            type='text'>
                                                        </div>


                                                        <div class=" relative w-full">
                                                        <label class='control-label text-xs absolute -top-4 left-0'>CVC</label> <input autocomplete='off'
                                                            class='form-control card-cvc h-12 w-full border border-white transition-all rounded-lg px-2 outline-none focus:border-blue-900' placeholder='ex. 311' size='4'
                                                            type='text'>
                                                        </div>
                                                        </div>
                                                        <div class="mt-7 relative">
                                                        <label class='control-label text-xs absolute -top-4 left-0'>Expiration Month</label> <input
                                                            class='form-control card-expiry-month h-12 w-full border border-white transition-all rounded-lg px-2 outline-none focus:border-blue-900' placeholder='MM' size='2'
                                                            type='text'>
                                                    </div>
                                                    <div class="mt-7 relative">
                                                        <label class='control-label text-xs absolute -top-4 left-0'>Expiration Year</label> <input
                                                            class='form-control card-expiry-year h-12 w-full border border-white transition-all rounded-lg px-2 outline-none focus:border-blue-900' placeholder='YYYY' size='4'
                                                            type='text'>
                                                    </div>
                                                </div>

                                                <div class='form-row row'>
                                                    <div class='col-md-12 error form-group hide'>
                                                        <div class='alert-danger alert'>Please correct the errors and try
                                                            again.</div>
                                                    </div>
                                                </div>
                                                 @foreach ($carritos as $carrito)
                                                @php
                                                $precio = 0;

                                                $precio += $carrito->producto->precio * $carrito->cantidad;
                                                @endphp
                                                <div class="row">
                                                    <div class="col-xs-12">
                                                        <button class="mt-4 outline-none rounded-lg text-white h-12 w-full bg-green-500 text-sm cursor-pointer transition-all hover:bg-green-800" type="submit">Pay Now  ({{$precio}}&euro;)</button>
                                                    </div>
                                                </div>
                                                @endforeach
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
    @include('components.footer')
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
