@extends('layouts.main')

@section('content')
    <section class="section">
        <div class="row">
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Registered Users</h6>
                            <h4 class="text-right"><i
                                    class="fas fa-users pull-left bg-indigo c-icon"></i><span>{{ $registered_users }}</span>
                            </h4>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Free Users</h6>
                            <h4 class="text-right"><i class="fas fa-users pull-left bg-cyan c-icon"></i><span>{{ $free_users }}</span>
                            </h4>
                           
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Paid Users</h6>
                            <h4 class="text-right"><i
                                    class="fas fa-users pull-left bg-deep-orange c-icon"></i><span>{{ $paid_users }}</span>
                            </h4>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6">
                <div class="card">
                    <div class="card-statistic-4">
                        <div class="info-box7-block">
                            <h6 class="m-b-20 text-right">Monthly Income</h6>
                            <h4 class="text-right"><i
                                    class="fas fa-dollar-sign pull-left bg-green c-icon"></i><span>${{ $monthly_income }}</span>
                            </h4>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    
@endsection


@push('custom-css')
    <style>
        .main-content::before {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        background-color: #fff;
        height: 100vh;
        clip-path: polygon(0 0, 100% 0, 100% 50%, 0 92%);
        }
    </style>
@endpush
@push('scripts')
@endpush
