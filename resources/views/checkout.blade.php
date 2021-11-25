<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- <link rel="stylesheet" href="css/checkout.css"> -->

    <title>Checkout : Cacti Succulent KCH</title>
  </head>
  <body>

    <div class="pos-f-t">
        <nav class="navbar navbar-dark bg-success">
        <a href="cart">
            <button class="navbar-toggler" type="button" >
                <span class="navbar-toggler-icon"></span>
            </button>
        </a>
        </nav>
    </div>

    <div class="row m-5">
        <div class="col-md-4 order-md-2 mb-4">
          <h4 class="d-flex justify-content-between align-items-center mb-3">
            <span class="text-muted">Order Summary</span>
            @if(count((array) session('cart')) != 0)
                <span class="badge badge-success badge-pill">{{ count((array) session('cart')) }}</span>
            @endif
          </h4>
            @if(session('cart'))
                <ul class="list-group mb-3">
                @foreach(session('cart') as $id=>$details)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <div>
                            <h6 class="my-0">{{$details['Product_Name']}}</h6>
                            <small class="text-muted">Quantity : {{$details['Product_Quantity']}}</small>
                        </div>
                        <span class="text-muted">RM {{$details['Product_Price']}}</span>
                    </li>
                @endforeach

                    <?php $total = 0 ?>
                        @foreach((array) session('cart') as $id => $details)
                            <?php $total += $details['Product_Price'] * $details['Product_Quantity'] ?>
                        @endforeach

                    <li class="list-group-item d-flex justify-content-between">
                        <span>Total</span>
                        <strong>RM {{$total}}</strong>
                    </li>
                </ul>
                

            @else
                <div>
                    <h1 class="text-center" style="font-size:30px;color:#808080">Your Cart is Empty!</h1>
                </div>
            @endif

            </div>
            <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate method="HEAD" action="{{ url('checkout/proceedtocheckout') }}">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                        Valid first name is required.
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
                        <div class="invalid-feedback">
                        Valid last name is required.
                        </div>
                    </div>
                </div>


                <div class="mb-3">
                    <label for="email">Email <span class="text-muted">(Optional)</span></label>
                    <input type="email" class="form-control" id="email" placeholder="you@example.com">
                    <div class="invalid-feedback">
                        Please enter a valid email address for delivery updates.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St" required>
                    <div class="invalid-feedback">
                        Please enter your home address.
                    </div>
                </div>

                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite">
                </div>

                <div class="row">
                    <div class="col-md-5 mb-3">
                        <label for="country">Country</label>
                        <select class="custom-select d-block w-100" id="country" required>
                        <option value="">Choose...</option>
                        <option>Malaysia</option>
                        </select>
                        <div class="invalid-feedback">
                        Please select a valid country.
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="state">State</label>
                        <select class="custom-select d-block w-100" id="state" required>
                        <option value="">Choose...</option>
                        <option>Sarawak</option>
                        </select>
                        <div class="invalid-feedback">
                        Please provide a valid state.
                        </div>
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="zip">Zip</label>
                        <input type="text" class="form-control" id="zip" placeholder="" required>
                        <div class="invalid-feedback">
                        Zip code required.
                        </div>
                    </div>
                </div>
                <hr class="mb-4">
                <!-- <a class="btn btn-success btn-lg btn-block" href="{{ url('checkout/proceedtocheckout') }}" role="button" onclick="return confirm('Confirm Checkout?')">Place Order</a> -->
                <button class="btn btn-success btn-lg btn-block" type="submit" >Place Order</button>
                <!-- return confirm('Order request sent. Redirect to home?') -->
            </form>
        </div>
      </div>    

    </div>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
    <script src="../../assets/js/vendor/holder.min.js"></script>
    <script>
      // Example starter JavaScript for disabling form submissions if there are invalid fields
      (function() {
        'use strict';

        window.addEventListener('load', function() {
          // Fetch all the forms we want to apply custom Bootstrap validation styles to
          var forms = document.getElementsByClassName('needs-validation');

          // Loop over them and prevent submission
          var validation = Array.prototype.filter.call(forms, function(form) {
            form.addEventListener('submit', function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }else{
                redirectTo();
              }  
              form.classList.add('was-validated');
            }, false);
          });
        }, false);
      })();
    </script>

    <script>
        function redirectTo(){
            var ask = window.confirm('Order request sent. Redirect to home?');
            if (ask) {
                window.alert("redirecting to product page!");

                //window.location.href = "{{ url('checkout/proceedtocheckout') }}";
            }
        }

    </script>
    
  </body>
</html>