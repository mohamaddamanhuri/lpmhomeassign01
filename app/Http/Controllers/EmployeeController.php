<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\employee;
use File;
use Storage;
class EmployeeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }
       
    public function index(Request $request)
    {
        //query list of employees from db
        //$employees=employee::all();
        if($request->keyword){
            $user = auth()->user();
        $employees=$user->employees()->where('title','LIKE','%'.$request->keyword.'%')
        ->paginate(2);

        }else{
        $user = auth()->user();
        $employees=$user->employees()->paginate(3);
        //$employees = $user->employees;
        //return to view resources/views/employees
        
        //return 'hello world';

        }return view('employees.index',compact('employees'));
        
    } 
    public function  create()
    {
        //show create form
        return view ('employees.create');
        
    }
    public function  store(Request $request)
    {
    //store employees table usiong model
    $employee = new employee();
    $employee->title = $request->title;
    $employee->description = $request->description;
    $employee->user_id = auth()->user()->id;
    $employee->save();

    if ($request->hasFile('attachment')){
        //rename
        $filename =$employee->id.'-'.date("Y-m-d").'.'.$request->attachment->getClientOriginalExtension();
        
        //store at file storage
        Storage::disk('public')->put($filename, File::get($request->attachment));
        
        //update row on dB
        $employee->attachment = $filename;
        $employee->save();
    }
    
    //return employees index
    return redirect()->to('/employees')->with([
        'type'=>'alert-primary',
        'message'=>'Successfully stored your employee!'
    ]);

    }
    public function show(employee $employee)
    {
        return view('employees.show',compact('employee'));
    }
    public function edit(employee $employee)
    {
        return view('employees.edit',compact('employee'));
    }
    public function update(employee $employee,Request $request)
    {
        
            //store employees table usiong model
            $employee->title = $request->title;
            $employee->description = $request->description;
            $employee->save();

           
            
            //return employees index
            return redirect()->to('/employees');
            
    }
    public function delete(employee $employee)
    {
        if($employee->attachment){
            Storage::disk('public')->delete($employee->attachment);
        }
                
        //delete from table using model
        $employee->delete();
        //return employees index
        return redirect()->to('/employees')->with([
            'type'=>'alert-danger',
            'message'=>'Successfully deleted your employee!'
        ]);
    }

}
