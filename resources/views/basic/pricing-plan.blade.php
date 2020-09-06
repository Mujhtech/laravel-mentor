@extends('laravel-mentor::page')

@section('title', 'Pricing Plan')

@section('breadcrum', 'Pricing Plan')

@section('content')
<div class="row">
    <div class="col-xl-3 col-md-6">
        <div class="card card-statistics text-center py-3">
            <div class="card-body pricing-content">
                <div class="pricing-content-card">
                    <h5>Premium</h5>
                    <h2 class="text-primary pt-3">$150</h2>
                    <p class="text-primary pb-3">/ Monthly</p>
                    <ul class="py-2">
                        <li>post jobs</li>
                        <li>advanced instructors search</li>
                        <li>invite candidates</li>
                        <li>post events</li>
                        <li>cancel any time</li>
                    </ul>
                    <div class="pt-2"><a href="javascript:void(0)" class="btn btn-primary btn-round btn-sm">go premium</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-statistics text-center py-3">
            <div class="card-body pricing-content">
                <div class="pricing-content-card">
                    <h5>basic</h5>
                    <h2 class="text-primary pt-3">$130</h2>
                    <p class="text-primary pb-3">/ Monthly</p>
                    <ul class="py-2">
                        <li>post jobs</li>
                        <li>advanced instructors search</li>
                        <li>invite candidates</li>
                        <li>post events</li>
                        <li>cancel any time</li>
                    </ul>
                    <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-statistics text-center py-3">
            <div class="card-body pricing-content">
                <div class="pricing-content-card">
                    <h5>starter</h5>
                    <h2 class="text-primary pt-3">$100</h2>
                    <p class="text-primary pb-3">/ Monthly</p>
                    <ul class="py-2">
                        <li>post jobs</li>
                        <li>advanced instructors search</li>
                        <li>invite candidates</li>
                        <li>post events</li>
                        <li>cancel any time</li>
                    </ul>
                    <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6">
        <div class="card card-statistics text-center py-3">
            <div class="card-body pricing-content">
                <div class="pricing-content-card">
                    <h5>small</h5>
                    <h2 class="text-primary pt-3">$80</h2>
                    <p class="text-primary pb-3">/ Monthly</p>
                    <ul class="py-2">
                        <li>post jobs</li>
                        <li>advanced instructors search</li>
                        <li>invite candidates</li>
                        <li>post events</li>
                        <li>cancel any time</li>
                    </ul>
                    <div class="pt-2"><a href="javascript:void(0)" class="btn btn-inverse-secondary btn-round btn-sm">go premium</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection