@extends('admin.master')

@section('title')
    Manage Product Page
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Product Info</h4>
                    <p class="card-title-desc">DataTables has most features enabled by
                        default, so all you need to do to use it with your own tables is to call
                        the construction function: <code>$().DataTable();</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Category Name</th>
                            <th>SubCategory Name</th>
                            <th>Brand Name</th>
                            <th>Product Name</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{$product->category->name ?? 'None'}}</td>
                                <td>{{$product->subCategory->name ?? 'None'}}</td>
                                <td>{{$product->brand->name ?? 'None'}}</td>
                                <td>{{$product->name}}</td>
                                <td>{{$product->status == 1 ? 'published' : 'unpublished'}}</td>
                                <td>
                                    <a href="{{route('product.detail', ['id' => $product->id])}}" class="btn btn-primary btn-sm" title = "View Product Detail">
                                        <i class="fa fa-book-open"></i>
                                    </a>

                                    <a href="{{route('product.edit', ['id' => $product->id])}}" class="btn btn-success btn-sm" title = "Edit Product">
                                        <i class="fa fa-edit"></i>
                                    </a>

                                    <a href="{{route('product.delete', ['id' => $product->id])}}" class="btn btn-danger btn-sm" onclick="confirm('are you sure delete this')" title="Delete Product">
                                        <i class="fa fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>
            </div>
        </div> <!-- end col -->
    </div>
@endsection

