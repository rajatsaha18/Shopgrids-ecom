@extends('admin.master')

@section('title')
    Manage Unit Page
@endsection

@section('body')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <h4 class="card-title">All Unit Info</h4>
                    <p class="card-title-desc">DataTables has most features enabled by
                        default, so all you need to do to use it with your own tables is to call
                        the construction function: <code>$().DataTable();</code>.
                    </p>

                    <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead>
                        <tr>
                            <th>SL No.</th>
                            <th>Unit Name</th>
                            <th>Unit Code</th>
                            <th>Unit Description</th>
                            <th>Unit Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>


                        <tbody>
                        @foreach($units as $unit)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{$unit->name}}</td>
                            <td>{{$unit->code}}</td>
                            <td>{{$unit->description}}</td>
                            <td>{{$unit->status == 1 ? 'published' : 'unpublished'}}</td>
                            <td>
                                <a href="{{route('unit.edit', ['id' => $unit->id])}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a href="{{route('unit.delete', ['id' => $unit->id])}}" class="btn btn-danger btn-sm">
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
