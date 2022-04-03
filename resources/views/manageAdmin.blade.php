<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Cacti Succulent KCH') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <link href="{{ asset('css/viewProductsAdmin.css') }}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
    



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    

    <!-- Styles -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
  

</head>

<body>
    
@include('admin/adminheader')


<!-- Page Content -->
<div style="margin-left:300px; padding-top:50px;" class="mr container mt-5 mb-5">
    <!-- <div class="d-flex justify-content-center row"> -->
        <div class="col-md-10">
            <div>
                <h2><br> Manage Administrator Accounts </h2>
            </div><!--/.section-header-->
            <hr>
            <br>
        </div>
        
        <table class="table table-hover table-bordered" id="datatable">
            <caption>All administrator users</caption>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>User type</th>
                    <th>Name</th>
                    <th>Email</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($admin as $admin_obj)
                <tr>
                    <td>{{ $admin_obj->id }}</td>
                    <td>{{ $admin_obj->user_type }}</td>
                    <td>{{ $admin_obj->name }}</td>
                    <td>{{ $admin_obj->email }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <button type="button" class="btn btn-success" id="addNewAdminBtn" onclick="showForm()">Add new admin</button>

        <!-- <form style="border: 1px solid #000">
        <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-5">
            <input type="email" class="form-control" id="inputEmail3" placeholder="Email">
            </div>
        </div>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
            <div class="col-sm-5">
            <input type="password" class="form-control" id="inputPassword3" placeholder="Password">
            </div>
        </div>
        
        <div class="form-group row">
            <div class="col-sm-5">
            <button type="submit" class="btn btn-primary">Sign in</button>
            </div>
        </div>
        </form> -->

        <form class="needs-validation" action="/addNewAdmin" id="adminRegisterForm" novalidate style="display: none;">
            <div class="mt-4 mb-3">
                <label for="fullname">Full Name</label>
                <input type="text" class="form-control" name="fullname" id="fullname" placeholder="John Doe"
                    required>
                <div class="invalid-feedback">
                    Please enter a name
                </div>
            </div>

            <div class="mb-3">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="you@example.com" required>
                <div class="invalid-feedback">
                    Please enter a valid email address.
                </div>
            </div>

            <div class="mb-3">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" class="form-control"
                aria-describedby="passwordHelpInline" required>
                <small id="passwordHelpInline" class="text-muted">
                Must be 8-20 characters long.
                </small>
                <div class="invalid-feedback">
                    Please enter a password.
                </div>
            </div>

            <button class="btn btn-success btn" type="submit">Submit form</button>
        </form>

        <!-- Modal -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">System alert</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>New administrator account has been successfully added</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
        </div>

        @if(!empty(Session::get('error_code')) && Session::get('error_code') == 5)
            <script>
                $(function() {
                    $('#exampleModalCenter').modal('show');
                });
            </script>
        @endif

</div>


<!-- jQuery CDN - Slim version (=without AJAX) -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<!-- Popper.JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

<link href="{{ asset('sass/test.css') }}" rel="stylesheet">

<script>
    (function () {
        'use strict';
        window.addEventListener('load', function () {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function (form) {
            form.addEventListener('submit', function (event) {
            if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
            }
            form.classList.add('was-validated');
            }, false);
        });
        }, false);
    })();
</script>

<script type="text/javascript">

    function showForm() {
        var form = document.getElementById('adminRegisterForm');
        
        if (form.style.display === "none") {
            form.style.display = "block";
        }else {
            form.style.display = "none";
        }
    }

</script>

</body>
</html>