@extends('user.layouts.master')

<!-- breadcrumb -->
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h1 class="m-0"> <i class="fa fa-shopping-cart"></i> Subscription</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="fa fa-dollar"></i>
                            Payments
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
                <h3 class="mb-0"><i class="fa fa-th-list mr-1"></i> Your Payments</h3>
            </div>
        </div>

        <div class="card-body">
            <table class="table table-striped table-hover w-100 text-capitalize text-center w-100">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>paid at</th>
                        <th>Amount</th>
                        <th>Status</th>
                        <th>download</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($invoices as $index => $invoice)
                        <tr>
                            <td>{{ count($invoices) - $index }}</td>
                            <td>{{ $invoice->date()->toFormattedDateString() }}</td>
                            <td>{{ $invoice->total() }}</td>
                            <td>{{ $invoice->status }}</td>
                            <td><a href="{{ route('user.invoice', $invoice->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-download"></i> Download</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('javascript')
    <script>
        $(() => {
            let datatable = window.dt_table;
            setTimeout(() => {
                datatable.buttons('.buttons-select-all,.buttons-select-none,.delete-all').remove();
            }, 1000);
        })
    </script>
@endpush
