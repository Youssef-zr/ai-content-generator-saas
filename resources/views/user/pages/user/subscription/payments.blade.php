@extends('user.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-shopping-cart"></i> Subscriptions</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <a href="{{ route('user.show_profile') }}"><i class="fa fa-th-list"></i>
                                Subscriptions
                            </a>
                        </li>
                        <li class="breadcrumb-item active"><i class="fa fa-eye"></i> show</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
@endsection

<!-- content -->
@section('content')

    <!-- user subscriptinos -->
    <div class="card card-outline card-primary">
        <div class="card-header">
            <div class="card-title">
                <h3 class="mb-0"><i class="fa fa-shopping-cart mr-1"></i> Your Subscriptions</h3>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover w-100 text-capitalize text-center w-100">
                <thead>
                    <tr>
                        <th>Plan Name</th>
                        <th>Price</th>
                        <th>Billing Interval</th>
                        <th>Trial Start At</th>
                        <th>Trial Ends At</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($subscriptions as $subscription)
                        <tr>
                            <td>{{ $subscription->plan->name }}</td>
                            <td>{{ $subscription->plan->price."".$subscription->plan->currency }}</td>
                            <td>{{ plans_belling_interval()[$subscription->plan->billing_interval] }}</td>
                            <td>{{ $subscription->created_at->format('Y-m-d H:i') }}</td>
                            <td>{{ date("Y-m-d H:i",$subscription->asStripeSubscription()->current_period_end) }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection

@push('javascript')
    <script>
        $(()=>{
            let datatable = window.dt_table;
            setTimeout(() => {
                datatable.buttons('.buttons-select-all,.buttons-select-none,.delete-all').remove();
            }, 1000);
        })
    </script>
@endpush

