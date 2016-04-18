<section id="colorSection" class="panel panel-default selection-panel" ng-class="{'not-ready':!model || !capacity}">
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