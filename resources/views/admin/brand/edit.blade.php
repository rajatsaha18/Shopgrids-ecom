@extends('admin.master')

@section('title')
    Edit Brand Page
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Brand Form</h4>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                <form action="{{route('brand.update', ['id' => $brand->id])}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Brand name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$brand->name}}" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Brand Description</label>
                        <div class="col-sm-9">
                            <textarea name="description" class="form-control" id="horizontal-email-input">{{$brand->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 ">Brand Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                            <img src="{{asset($brand->image)}}" alt="" height="90" width="60">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="" class="col-sm-3 ">Publication</label>
                        <div class="col-sm-9">
                            <label class="mr-3"><input type="radio" name="status" {{$brand->status == 1 ? 'checked' : ' '}} value="1" >published</label>
                            <label><input type="radio" name="status" {{$brand->status == 0 ? 'checked' : ' '}} value="0">unpublished</label>
                        </div>
                    </div>
                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">


                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update Brand Info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

