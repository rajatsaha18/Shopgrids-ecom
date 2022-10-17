@extends('website.master')

@section('title')
    checkout Page
@endsection

@section('body')
    <div class="breadcrumbs">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 col-md-6 col-12">
                    <div class="breadcrumbs-content">
                        <h1 class="page-title">Login Form</h1>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-12">
                    <ul class="breadcrumb-nav">
                        <li><a href="index.html"><i class="lni lni-home"></i> Home</a></li>
                        <li><a href="index.html">Dashboard</a></li>
                        <li>My Dashboard</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <section class="py-5 bg-secondary">
        <div class="container">
            <div class="row">
                <div class="col-md-3">
                    <div class="card card-body">
                        <ul class="list-group list-group-flush">
                            <li class="list-group-item"><a href="customer-profile">My Profile</a></li>
                            <li class="list-group-item"><a href="">My Order</a></li>
                            <li class="list-group-item"><a href="customer-account">My Accounts</a></li>
                            <li class="list-group-item"><a href="">Change Password</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-header">Recent Order</div>
                        <div class="card-body">
                            <h1>This is Customer Account</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection










