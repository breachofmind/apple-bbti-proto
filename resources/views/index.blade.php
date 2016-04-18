@extends('layouts.master')

@section('content')

    <section id="ModelSelection" class="panel panel-default">
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



    <section id="capacitySection" class="panel panel-default">
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



    <section id="colorSection" class="panel panel-default">
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




    <section id="reviewSection" class="panel panel-default">
        <div class="panel-heading">
            <h2><span class="step-number">4</span>@lang('app.review-select-heading')</h2>
        </div>

        <div class="panel-body">
            <div class="selected-device" ng-show="selected">
                <p>You selected:</p>

                <img ng-src="@{{ selected.get('image') }}" alt="Selected Device">
                <h4>@{{ selected.getName() }}</h4>
            </div>

            <button ng-disabled="! selected" class="btn btn-success btn-lg center-block" ng-click="ctrl.comingSoon()">Continue</button>
        </div>

    </section>

@endsection