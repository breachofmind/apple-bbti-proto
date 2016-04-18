<section id="brandSection" class="panel panel-default selection-panel">
    <div class="panel-heading">
        <h2><span class="step-number">0</span>Select OEM</h2>
    </div>

    <div class="panel-body">

        <ul class="oem-list object-list row">
            <li class="oem-item selection-item col-xs-12 col-sm-4 col-lg-2" ng-repeat="device in options_brand" ng-click="select_brand(device)" ng-class="{selected:device.id == brand}">
                <div class="item-wrapper">
                    <h3 class="oem-name item-name">@{{device.brand}}</h3>
                </div>
            </li>
        </ul>
    </div>
</section>