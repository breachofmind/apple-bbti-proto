@extends('layouts.master')

@section('content')

    <section id="deviceIdSection" class="panel panel-default">

        <div class="panel-heading">
            <h2>Product Validation</h2>
        </div>

        <div class="panel-body">
            <form action="">
                <label for="imei">Device Serial Number (IMEI)</label>

                <div class="form-group form-inline">
                    <input type="text" id="imei" class="form-control" placeholder="Enter your IMEI">
                    <button type="submit" class="btn btn-primary">Validate</button>
                </div>

            </form>
        </div>


    </section>



    <section id="contactInfoSection" class="panel panel-default">

        <div class="panel-heading">
            <h2>Contact Information</h2>
        </div>

        <div class="panel-body">
            <div class="alert alert-warning">
                <p><strong>Note:</strong> P.O. Box addresses are not eligible for shipping.</p>
            </div>

            <form action="" class="form-inline contact-form">

                <div class="form-group">
                    <label for="salutation">Salutation</label>
                    <select name="salutation" id="salutation" class="form-control sm">
                        <option value="Mr">Mr.</option>
                        <option value="Mrs">Mrs.</option>
                        <option value="Ms">Ms.</option>
                        <option value="Dr">Dr.</option>
                        <option value="Rev">Rev.</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="firstname">First Name</label>
                    <input type="text" placeholder="First Name" id="firstname" name="firstname" class="form-control">
                </div>


                <div class="form-group">
                    <label for="lastname">Last Name</label>
                    <input type="text" placeholder="Last Name" id="lastname" name="lastname" class="form-control">
                </div>

                <div class="form-group has-error">
                    <label for="email">Email Address</label>
                    <input type="email" placeholder="me@example.com" id="email" name="email" class="form-control">
                    <small class="error-message">Email isn't valid.</small>
                </div>

                <div class="form-group">
                    <label for="emailr">Repeat Email Address</label>
                    <input type="emailr" placeholder="me@example.com" id="emailr" name="emailr" class="form-control">
                </div>

                <div class="form-group">
                    <label for="phone">Mobile Phone</label>
                    <input type="text" placeholder="xxx-xxx-xxxx" id="phone" name="phone" class="form-control sm">
                </div>

                <div class="form-group">
                    <label for="addr1">Street Address</label>
                    <input type="text" placeholder="Street Address" id="addr" name="addr" class="form-control">
                </div>

                <div class="form-group">
                    <label for="addr2">Apt, Bldg, Ste (optional)</label>
                    <input type="text" placeholder="Apt, Bldg, Ste" id="addr2" name="addr2" class="form-control">
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" placeholder="City" name="city" id="city" class="form-control">
                </div>


            </form>
        </div>

    </section>


    <section class="panel panel-default">
        <div class="panel-heading">
            <h2>Delivery</h2>
        </div>

        <div class="panel-body">

        </div>
    </section>


    <section class="panel panel-default">
        <div class="panel-heading">
            <h2>Final Checks</h2>
        </div>

        <div class="panel-body">

        </div>
    </section>


    <section class="panel panel-default">
        <div class="panel-heading">
            <h2>Confirmation</h2>
        </div>

        <div class="panel-body">

        </div>

        <div class="panel-footer">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <a href="#" class="btn btn-link btn-lg">Back</a>
                </div>

                <div class="col-xs-12 col-md-6 text-right">
                    <a href="#" class="btn btn-success btn-lg">Continue</a>
                </div>
            </div>
        </div>
    </section>
@endsection