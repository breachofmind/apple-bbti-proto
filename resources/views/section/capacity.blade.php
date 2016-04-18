<section id="capacitySection" class="panel panel-default selection-panel" ng-class="{'not-ready':!model}">
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