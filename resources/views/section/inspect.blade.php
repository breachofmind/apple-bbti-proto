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
</form>