    @extends('admin.layouts.app')
    @section('content')
        <div class="container mt-5">
            <h2 class="text-center">Payment</h2>
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <form id="payment-form" action="{{ route('payment.process') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label for="card-element" class="form-label">Credit or Debit Card</label>
                    <div id="card-element" class="form-control"></div>
                    <div id="card-errors" class="text-danger mt-2" role="alert"></div>
                </div>

                <button id="submit-button" class="btn btn-primary w-100 mt-3">Pay $10</button>
                <input type="hidden" name="stripeToken" id="stripeToken">
            </form>
        </div>
        <script src="https://js.stripe.com/v3/"></script>

        <script>
            var stripe = Stripe("{{ env('STRIPE_KEY') }}");
            var elements = stripe.elements();
            var card = elements.create("card");
            card.mount("#card-element");

            var form = document.getElementById("payment-form");
            form.addEventListener("submit", function(event) {
                event.preventDefault();
                stripe.createToken(card).then(function(result) {
                    if (result.error) {
                        document.getElementById("card-errors").textContent = result.error.message;
                    } else {
                        document.getElementById("stripeToken").value = result.token.id;
                        form.submit();
                    }
                });
            });
        </script>
    @endsection

    </body>

    </html>
