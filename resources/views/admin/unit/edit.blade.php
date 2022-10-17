@extends('admin.master')

@section('title')
    Edit Unit Page
@endsection

@section('body')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title mb-4">Edit Unit Form</h4>
                <h4 class="text-success text-center">{{Session::get('message')}}</h4>

                <form action="{{route('unit.update', ['id' => $unit->id])}}" method="post">
                    @csrf
                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit name</label>
                        <div class="col-sm-9">
                            <input type="text" name="name" value="{{$unit->name}}" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-firstname-input" class="col-sm-3 col-form-label">Unit Code</label>
                        <div class="col-sm-9">
                            <input type="text" name="code" value="{{$unit->code}}" class="form-control" id="horizontal-firstname-input">
                        </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label for="horizontal-email-input" class="col-sm-3 col-form-label">Unit Description</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="description" id="horizontal-email-input">{{$unit->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group row mb-4">
                        <label for="horizontal-password-input" class="col-sm-3 col-form-label">Publication</label>
                        <div class="col-sm-9">
                            <label><input type="radio" {{$unit->status == 1 ? 'checked' : '' }} name="status" value="1">published</label>
                            <label><input type="radio" {{$unit->status == 0 ? 'checked' : '' }} name="status" value="0">unpublished</label>
                        </div>
                    </div>

                    <div class="form-group row justify-content-end">
                        <div class="col-sm-9">
                            <div>
                                <button type="submit" class="btn btn-primary w-md">Update Unit Info</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

