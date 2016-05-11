@extends('layouts.master')

@section('content')

    <section class="panel panel-default table-panel">
        <div class="panel-heading">
            <h2>My Trades</h2>
        </div>

        <div class="panel-body">

            <div id="TradeList" class="flex-table clickable" ng-controller="TradeController as tradeCtrl">
                <header>
                    <div data-col="1">Image</div>
                    <div data-col="2">Date</div>
                    <div data-col="3">Device</div>
                    <div data-col="4">ID</div>
                    <div data-col="5">Type</div>
                    <div data-col="6">Status</div>
                </header>

                <ol>

                    <li class="trade-item" ng-repeat="trade in tradeCtrl.trades">
                        <div class="trade-image no-pad" data-col="1">
                            <img ng-src="@{{ trade.img }}" alt="Trade image">
                        </div>

                        <div class="trade-date" data-col="2">
                            @{{ trade.date }}
                        </div>

                        <div class="trade-device highlight" data-col="3">
                            @{{ trade.device }}
                        </div>

                        <div class="trade-id" data-col="4">
                            @{{ trade.id }}
                        </div>

                        <div class="trade-type" data-col="5">
                            @{{ trade.type }}
                        </div>

                        <div class="trade-status" data-col="6">
                            @{{ trade.status }}
                        </div>
                    </li>
                </ol>
            </div>
        </div>
    </section>


@endsection