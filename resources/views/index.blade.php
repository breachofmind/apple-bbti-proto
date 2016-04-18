@extends('layouts.master')

@section('content')

    <section id="ModelSelection" class="panel panel-default selection-panel" ng-class="{processing:isLoading}">
        <div class="panel-heading">
            <h2><span class="step-number">1</span>@lang('app.model-select-heading')</h2>
        </div>

        <div class="panel-body">
            <div class="row panel-actions">
                <div class="col-md-6" ng-class="{'has-error':modelSearchError}">
                    <p>@lang('app.model-select-help')</p>
                    <input id="modelSearchInput" type="text" class="form-control" placeholder="Enter your Model Number (such as A1332)" ng-change="modelSearch()" ng-model="modelSearchField">

                </div>
            </div>

            <ul class="model-list object-list row">
                <li class="model-item selection-item col-xs-12 col-sm-4 col-lg-3" ng-repeat="device in options_model" ng-click="select_model(device)" ng-class="{selected:device.id == model}">
                    <div class="item-wrapper">
                        <img ng-src="@{{device.image}}" alt="@{{device.name + " image"}}">
                        <h3 class="model-name item-name">@{{device.name}}</h3>
                    </div>
                </li>
            </ul>
        </div>
    </section>



    <section id="capacitySection" class="panel panel-default selection-panel">
        <div class="panel-heading">
            <h2><span class="step-number">2</span>@lang('app.capacity-select-heading')</h2>
        </div>

        <div class="panel-body">
            <div class="row panel-actions">
                <div class="col-md-6">
                    <p>@lang('app.capacity-select-help')</p>
                </div>
            </div>

            <ul class="capacity-list object-list row">
                <li class="capacity-item selection-item col-xs-12 col-sm-4 col-lg-2" ng-repeat="device in options_capacity" ng-click="select_capacity(device)" ng-class="{selected:device.id == capacity}">
                    <div class="item-wrapper">
                        <h3 class="capacity-name item-name">@{{device.capacity}} GB</h3>
                    </div>
                </li>
            </ul>

            <div class="alert alert-info" ng-hide="model">
                <p>Please choose a device first.</p>
            </div>
        </div>
    </section>



    <section id="colorSection" class="panel panel-default selection-panel">
        <div class="panel-heading">
            <h2><span class="step-number">3</span>@lang('app.color-select-heading')</h2>
        </div>

        <div class="panel-body">

            <ul class="color-list object-list row">
                <li class="color-item selection-item col-xs-12 col-sm-4 col-lg-2" ng-repeat="device in options_color" ng-click="select_color(device)" ng-class="{selected:device.id == color}">
                    <div class="item-wrapper">
                        <div class="color-swatch @{{device.colorClass}}"></div>
                        <h3 class="color-name item-name">@{{device.color}}</h3>
                    </div>
                </li>
            </ul>

            <div class="alert alert-info" ng-hide="capacity && model">
                <p>Please choose a device and capacity first.</p>
            </div>
        </div>
    </section>



    <form id="inspectionForm" name="inspectionForm" ng-controller="FormController">
    <section id="reviewSection" class="panel panel-default selection-panel">

        <div class="panel-heading">
            <h2><span class="step-number">4</span>@lang('app.review-select-heading')</h2>
        </div>

        <div class="panel-body">

            <div class="row" ng-show="selected">
                <div class="selected-device col-md-4">
                    <img ng-src="@{{ selected.get('image') }}" alt="Selected Device">
                    <p>Your device:</p>
                    <h4>@{{ selected.getName() }}</h4>
                </div>

                <div class="question-section col-md-8">


                    <ul class="question-list object-list row">


                        <li class="question-item col-sm-12 col-md-6">
                            <div class="question-wrapper">
                                <div class="question-content">
                                    <h4 class="question-title">Power</h4>
                                    <p>Does your device power up and function normally?</p>
                                </div>

                                <div class="question-response">
                                    <input type="radio" name="question_power" id="q1_y" value="1" required ng-model="q1"><label for="q1_y" class="yay">Yes</label>
                                    <input type="radio" name="question_power" id="q1_n" value="0" required ng-model="q1"><label for="q1_n" class="nay">No</label>
                                </div>
                            </div>
                        </li>


                        <li class="question-item col-sm-12 col-md-6">
                            <div class="question-wrapper">
                                <div class="question-content">
                                    <h4 class="question-title">Enclosure</h4>
                                    <p>Is the enclosure in good condition? (Normal wear and tear is okay)</p>
                                </div>

                                <div class="question-response">
                                    <input type="radio" name="question_enclosure" id="q2_y" value="1" required ng-model="q2"><label for="q2_y" class="yay">Yes</label>
                                    <input type="radio" name="question_enclosure" id="q2_n" value="0" required ng-model="q2"><label for="q2_n" class="nay">No</label>
                                </div>
                            </div>
                        </li>


                        <li class="question-item col-sm-12 col-md-6">
                            <div class="question-wrapper">
                                <div class="question-content">
                                    <h4 class="question-title">Free from Liquid Damage</h4>
                                    <p>Is the device free from obvious signs of liquid contact?</p>
                                </div>

                                <div class="question-response">
                                    <input type="radio" name="question_liquid" id="q3_y" value="1" required ng-model="q3"><label for="q3_y" class="yay">Yes</label>
                                    <input type="radio" name="question_liquid" id="q3_n" value="0" required ng-model="q3"><label for="q3_n" class="nay">No</label>
                                </div>
                            </div>
                        </li>


                        <li class="question-item col-sm-12 col-md-6">
                            <div class="question-wrapper">
                                <div class="question-content">
                                    <h4 class="question-title">Display</h4>
                                    <p>Is the display in good condition? (Normal wear and tear is okay)</p>
                                </div>

                                <div class="question-response">
                                    <input type="radio" name="question_display" id="q4_y" value="1" required ng-model="q4"><label for="q4_y" class="yay">Yes</label>
                                    <input type="radio" name="question_display" id="q4_n" value="0" required ng-model="q4"><label for="q4_n" class="nay">No</label>
                                </div>
                            </div>
                        </li>


                        <li class="question-item col-sm-12 col-md-6">
                            <div class="question-wrapper">
                                <div class="question-content">
                                    <h4 class="question-title">Buttons</h4>
                                    <p>Are the buttons in good working condition?</p>
                                </div>

                                <div class="question-response">
                                    <input type="radio" name="question_buttons" id="q5_y" value="1" required ng-model="q5"><label for="q5_y" class="yay">Yes</label>
                                    <input type="radio" name="question_buttons" id="q5_n" value="0" required ng-model="q5"><label for="q5_n" class="nay">No</label>
                                </div>
                            </div>
                        </li>


                        <li class="question-item col-sm-12 col-md-6">
                            <div class="question-wrapper">
                                <div class="question-content">
                                    <h4 class="question-title">Carrier Locked</h4>
                                    <p>Please select the appropriate carrier associated with your device.</p>
                                </div>

                                <div class="question-response">
                                    <select name="question_carrier" id="q6" class="form-control" required ng-model="carrier">
                                        <option>Unlocked</option>
                                        <option>Other</option>
                                        <option>AT&T</option>
                                        <option>Verizon</option>
                                        <option>Sprint</option>
                                        <option>T-Mobile</option>
                                    </select>
                                </div>
                            </div>

                        </li>
                    </ul>


                </div>
            </div>

        </div>

        <div class="panel-footer">
            <button ng-disabled="! selected || inspectionForm.$invalid" class="btn btn-success btn-lg center-block" ng-click="submit()">Continue</button>
        </div>


    </section>
    </form>

@endsection