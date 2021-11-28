@extends('admin.layouts.main')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->has('message'))
         <div class="alert {{session()->get('type')}}">
         {{ session()->get('message') }}
         </div>
         
        @endif
            <div class="card">
                <div class="card-header">{{ __('Employees_index1') }}

                <div class="float-right">
                    <form action="" method="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="{{request()->get('keyword')}}"/>
                            <div class="input-group-append">
                                <button class= "btn btn-primary" type="submit">Search</button>
</div>
</div>
</form>
</div>


                </div>

                <div class="card-body">
                <table class="table">
                <thead>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Department</th>
                    <th>Created</th>
                    <th>Creator</th>
                    <th>Show</th>
                    <th>Edit</th>
                    <th>Delete</th>
                   
                  
                </thead>
                <tbody>
                @foreach ($employees as $employee)
                <tr>
                    <td>{{ $employee -> id}}</td>
                    <td>{{ $employee -> Name}}</td>
                    <td>{{ $employee -> Department}}</td>
                    <td>{{ $employee -> created_at->diffforhumans() }}</td>
                    <td>{{ $employee -> user->name}}</td>
                    <td>
                        <a class="btn btn-primary" href="/Employees/{{$employee->id}}">Show</a>
                        
                    </td>
                    <td>
                       
                        <a class="btn btn-success"  href="/Employees/{{$employee->id}}/edit">Edit</a>
                    </td>
                    <td>
                       
                       <a onclick="return confirm('Are you sure?')" class="btn btn-danger"  href="/Employees/{{$employee->id}}/delete">Delete</a>
                   </td>
                   
                    
                </tr>
                @endforeach
              
                </tbody>
                
                </table>
                {{$employees->links()}}
                <tr>
                <a class="btn btn-primary"  href="/Employees/create">Create</a>
                </tr> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection