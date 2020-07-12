@extends('layouts.admin')

@section('inpage-css')
    {{-- <link rel="stylesheet" href="https://wenzhixin.github.io/fresh-bootstrap-table/assets/css/fresh-bootstrap-table.css"> --}}
@endsection

@section('content-wrapper')
    <div class="row">
        <div class="col-lg-12">
            <div class="card custom">
                <div class="card-header border-0 p-1 px-4">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="m-0">Product Category Summary</h3>
                        </div>
                        <div class="col text-right">
                            <a href="./add" class="btn btn-sm btn-primary">Create category</a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <!-- Projects table -->
                    <table class="table align-items-center table-flush m-0">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Total Products</th>
                                <th scope="col">Total Subcategory</th>
                                <th scope="col">Total Orders</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($stats as $stat)
                            <tr>
                                <th scope="row">
                                    {{-- <div class="media d-flex align-items-center"><a href="#" class="avatar rounded-circle mr-3"><img alt="Image placeholder" src="https://demos.creative-tim.com/impact-design-system/dashboard/assets/img/theme/bootstrap.jpg"></a><div class="media-body"><span class="name mb-0 text-sm">Impact Design System</span></div></div> --}}
                                    <div class="media align-items-center">
                                        <div class="avatar rounded-circle m-0" style="display: table-cell">
                                            @php
                                                $imgs = json_decode($stat -> pc_images);
                                                $img_src = $imgs[0];
                                            @endphp
                                            <img alt="Image placeholder" src="{{asset('uploads/category/'.$img_src)}}">
                                        </div>
                                        <div class="media-body" style="display: table-cell">
                                            <span class="ml-2 mb-0 text-sm text-capitalize">{{ $stat->pc_name }}</span>
                                        </div>
                                    </div>
                                </th>
                                <td></td>
                                <td>340</td>
                                <td><i class="fas fa-arrow-up text-success mr-3"></i> 46,53%</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="card-header border-0 p-1 px-4">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">Product Category Summary</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">See all</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('inpage-js')
    <script src="https://unpkg.com/bootstrap-table@1.17.1/dist/bootstrap-table.js"></script>
@endsection