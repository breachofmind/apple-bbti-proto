<section id="modelSection" class="panel panel-default selection-panel" ng-class="{processing:isLoading}">
    <div class="panel-heading">
        <h2><span class="step-number">1</span>@lang('app.model-select-heading')</h2>
    </div>

    <div class="panel-body">
        {{--<div class="row panel-actions">--}}
            {{--<div class="col-md-6" ng-class="{'has-error':modelSearchError}">--}}
                {{--<p>@lang('app.model-select-help')</p>--}}
                {{--<input id="modelSearchInput" type="text" class="form-control" placeholder="Enter your Model Number (such as A1332)" ng-change="modelSearch()" ng-model="modelSearchField">--}}

            {{--</div>--}}
        {{--</div>--}}

        <div class="alert alert-warning">
            <p>iPhone, iPhone 3G, iPhone 3GS devices are no longer included in this program.
                Please <a href="http://www.apple.com/recycling/">click here</a> for information on how to responsibly recycle or reuse your device.</p>
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