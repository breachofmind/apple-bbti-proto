<form id="inspectionForm" name="inspectionForm" ng-controller="FormController">
    <section id="reviewSection" class="panel panel-default selection-panel" ng-class="{'not-ready':!selected}">

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

                    @include('section.questions')

                </div>
            </div>

        </div>

        <div class="panel-footer">
            <button ng-disabled="! selected || inspectionForm.$invalid" class="btn btn-success btn-lg center-block" ng-click="submit()">Get my Evaluation</button>
        </div>


    </section>


    <div id="valueSection">
    <section ng-show="response" ng-class="{processing:processing}" class="panel panel-success">


        <div class="panel-body">
            <div class="valuation-container alert alert-success">

                <h1 class="valuation-amount">@{{ response.valuation | currency }}</h1>

                <h2 class="valuation-type">@{{ response.valuationType }}</h2>

            </div>
            <p class="valuation-disclaimer">Subject to quality verification by Brightstar, when a final value will be determined.</p>
        </div>


        <div class="panel-footer">
            <a href="/contact" class="btn btn-success btn-lg center-block">Continue</a>
        </div>

    </section>
    </div>
</form>