@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employees Show') }}</div>

                <div class="card-body">
                    <form action ="" method="POST">
                    <div class="form-group">
                    <label>Name</label>
                    <input type="text" value="{{$employee->Name}}" name="name" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                    <label>Department</label>
                    <textarea  name="department" class="form-control" readonly>{{$employee->department}}</textarea>
                    </div>
                    @if($employee->attachment)
                   <a 
                       target="_blank"
                       href="{{$employee->attachment_url}}"
                       class = "btn-btnwarning">
                       Open this attachment:{{$employee->attachment}}
                       </a>
                       @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
