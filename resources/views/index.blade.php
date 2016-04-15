@extends('layouts.master')

@section('content')

    <section id="ModelSelection" class="panel panel-default">
        <div class="panel-heading">
            <h2><span class="step-number">1</span>@lang('app.model-select-heading')</h2>
        </div>

        <div class="panel-body">
            <div class="row panel-actions">
                <div class="col-md-6">
                    <p>@lang('app.model-select-help')</p>
                    <input type="text" class="form-control" placeholder="Enter your Model Number (such as A1332)" ng-change="ctrl.modelSearch()" ng-model="modelSearchField">

                </div>
            </div>

            <ul class="model-list object-list row">
                <li class="model-item selection-item col-xs-12 col-sm-4 col-lg-3" ng-repeat="(model,item) in ctrl.models" ng-click="ctrl.selectModel(model)" ng-class="{selected:model==selected.model}">
                    <div class="item-wrapper">
                        <img ng-src="@{{item.image}}" alt="@{{item.name + " image"}}">
                        <h3 class="model-name item-name">@{{item.name}}</h3>
                    </div>
                </li>
            </ul>
        </div>
    </section>



    <section id="CapacitySelection" class="panel panel-default">
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
                <li class="capacity-item selection-item col-xs-12 col-sm-4 col-lg-2" ng-repeat="capacity in capacities" ng-click="ctrl.selectCapacity(capacity)" ng-class="{selected:capacity==selected.capacity}">
                    <div class="item-wrapper">
                        <h3 class="capacity-name item-name">@{{capacity}} GB</h3>
                    </div>
                </li>
            </ul>

            <div class="alert alert-info" ng-hide="selected.model">
                <p>Please choose a device first.</p>
            </div>
        </div>
    </section>


    <section id="ColorSelection" class="panel panel-default">
        <div class="panel-heading">
            <h2><span class="step-number">3</span>@lang('app.color-select-heading')</h2>
        </div>

        <div class="panel-body">

            <ul class="color-list object-list row">
                <li class="color-item selection-item col-xs-12 col-sm-4 col-lg-2" ng-repeat="(className,label) in colors" ng-click="ctrl.selectColor(label)" ng-class="{selected:label==selected.color}">
                    <div class="item-wrapper">
                        <div class="color-swatch @{{className}}"></div>
                        <h3 class="color-name item-name">@{{label}}</h3>
                    </div>
                </li>
            </ul>

            <div class="alert alert-info" ng-hide="selected.capacity && selected.model">
                <p>Please choose a device and capacity first.</p>
            </div>
        </div>
    </section>


    <section id="ReviewSelection" class="panel panel-default">
        <div class="panel-heading">
            <h2><span class="step-number">4</span>@lang('app.review-select-heading')</h2>
        </div>

        <div class="panel-body">
            <div class="selected-device" ng-show="ctrl.isComplete()">
                <p>You selected:</p>

                <img ng-src="@{{ ctrl.models[selected.model].image }}" alt="Selected Device">
                <h4>@{{ctrl.getSelectedDevice()}}</h4>
            </div>

            <button ng-disabled="! ctrl.isComplete()" class="btn btn-success btn-lg center-block" ng-click="ctrl.comingSoon()">Continue</button>
        </div>

    </section>

@endsection