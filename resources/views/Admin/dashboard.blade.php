@extends('Template.Dashboard.index')

@section('content')
<div class="main-content-inner">
            <!-- sales report area start -->
            <div class="sales-report-area sales-style-two">
                <div class="row">
                    <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                        <div class="single-report">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Product Sold</h4>
                                    <select class="custome-select border-0 pr-3">
                                        <option selected="">Last 7 Days</option>
                                        <option value="0">Last 7 Days</option>
                                    </select>
                                </div>
                            </div>
                            <canvas id="coin_sales4" height="100"></canvas>
                        </div>
                    </div>
                    <div class="col-xl-3 col-ml-3 col-md-6 mt-5">
                        <div class="single-report">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Total Income</h4>
                                    <select class="custome-select border-0 pr-3">
                                        <option selected="">Last 7 Days</option>
                                        <option value="0">Last 7 Days</option>
                                    </select>
                                </div>
                            </div>
                            <canvas id="coin_sales5" height="100"></canvas>
                        </div>
                    </div>
                    <div class="col-xl-3 col-ml-3 col-md-6  mt-5">
                        <div class="single-report">
                            <div class="s-sale-inner pt--30 mb-3">
                                <div class="s-report-title d-flex justify-content-between">
                                    <h4 class="header-title mb-0">Orders</h4>
                                    <select class="custome-select border-0 pr-3">
                                        <option selected="">Last 7 Days</option>
                                        <option value="0">Last 7 Days</option>
                                    </select>
                                </div>
                            </div>
                            <canvas id="coin_sales6" height="100"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sales report area end -->
        </div>
@endsection