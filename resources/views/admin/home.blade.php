@extends('layouts.admin')

@section('content-wrapper')
<div class="row">
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-globe text-warning"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Products</p>
              <p class="card-title">0</p><p>
            </p></div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          Update Now
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-money-coins text-success"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Customers</p>
              <p class="card-title">0</p><p>
            </p></div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-calendar-o"></i>
          Last day
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-vector text-danger"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Orders</p>
              <p class="card-title">0</p><p>
            </p></div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-clock-o"></i>
          In the last hour
        </div>
      </div>
    </div>
  </div>
  <div class="col-lg-3 col-md-6 col-sm-6">
    <div class="card card-stats">
      <div class="card-body ">
        <div class="row">
          <div class="col-5 col-md-4">
            <div class="icon-big text-center icon-warning">
              <i class="nc-icon nc-favourite-28 text-primary"></i>
            </div>
          </div>
          <div class="col-7 col-md-8">
            <div class="numbers">
              <p class="card-category">Delivery</p>
              <p class="card-title">+0</p><p>
            </p></div>
          </div>
        </div>
      </div>
      <div class="card-footer ">
        <hr>
        <div class="stats">
          <i class="fa fa-refresh"></i>
          Update now
        </div>
      </div>
    </div>
  </div>

  <div class="col-lg-12">

    <div class="card">
      <div class="card-header">
        <h4 class="card-title"> Recent Orders </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class="text-primary"> 
              <tr>
                <th> # </th>
                <th> Name </th>
                <th> Item </th>
                <th> Qty </th>
                <th> Price </th>
                <th class="text-right" style="margin-right: 5px;"> Action </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td> 1 </td>
                <td> Sample </td> <td> Sample </td>
                <td> Sample </td>
                <td> NGN 0 </td>
                <td>  </td>
              </tr>
              <tr class="d-none">
                <td> 2 </td>
                <td> Minerva Hooper </td>
                <td> Curaçao </td>
                <td> Sinaai-Waas </td>
                <td> $23,789 </td>
                <td> </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>

    </div>
</div>
@endsection