@extends('admin.master')

@section('title')
    Edit Sub-Category Page
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4 text-center">Edit Sub-Category Form</h4>
                <h4 class="text-center text-success">{{Session::get('message')}}</h4>

                <form action="{{route('subcategory.update', ['id' => $category->id])}}" method="post" enctype="multipart/form-data">
                    @csrf

{{--                    <div class="form-group row mb-4">--}}
{{--                        <label for="" class="col-sm-3 col-form-label">Category Name</label>--}}
{{--                        <div class="col-sm-9">--}}
{{--                            <select class="form-control" name="category_id" required>--}}
{{--                                <option value="" disabled selected>-- Select Category Name -- </option>--}}
{{--                                @foreach($categories as $category)--}}
{{--                                    <option value="{{$category->id}}">{{$category->name}}</option>--}}
{{--                                @endforeach--}}

{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Sub Category Name</label>
                        <div class="col-sm-9">
                            <input type="text" value="{{$category->name}}" name="name" class="form-control" id="horizontal-firstname-input">
                            <span class="text-danger">{{$errors->has('name') ? $errors->first('name') : ''}}</span>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Category Description</label>
                        <div class="col-sm-9">
                            <textarea type="description" name="description" class="form-control" id="horizontal-email-input">{{$category->description}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 ">Category Image</label>
                        <div class="col-sm-9">
                            <input type="file" name="image" class="form-control-file" id="horizontal-password-input">
                            <img src="{{asset($category->image)}}" alt="" height="90" width="60">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="" class="col-sm-3 ">Publication</label>
                        <div class="col-sm-9">
                            <label class="mr-3"><input type="radio" {{$category->status == 1 ? 'checked' : ''}} name="status" value="1" />published</label>
                            <label><input type="radio" {{$category->status == 0 ? 'checked' : ''}} name="status" value="0" />unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">


                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update Sub-Category Info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


