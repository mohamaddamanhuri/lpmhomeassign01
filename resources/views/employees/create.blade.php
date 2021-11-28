@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees Create') }}</div>

                <div class="card-body">
                    <form action ="" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class="form-control" placeholder="Please fill your Name">
                    </div>
                    <div class="form-group">
                    <label>Department</label>
                    <textarea type="text" name="department" class="form-control" placeholder="Add your Department"></textarea>
                    </div>
                    <div class="form-group">
                    <label>Attachment</label>
                    <input type="file" name="attachment" class="form-control" >
                    </div>
                    <div class="form-group">
                    <button type="submit" class="btn btn-primary">Add new Employees</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
