<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use DataTables;
class StudentController extends Controller
{
    public function index()
    {
       
        return view('welcome');
    }

    public function list()
    { 
        return view('list');
    }
    public function getStudents(Request $request)
    {
        if ($request->ajax()) {
            $data = Student::join('teacher', 'students.teacher_id', '=', 'teacher.id')
               ->get(['students.*', 'teacher.teacher_name']);

            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('gender', function ($data) {
                    if($data->gender==1){
                        $value="Male";
                    }elseif($data->gender==2){
                        $value="Female";
                    }   
                    return  $value;
                })
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="'.url('edit_student/'.$data->id.'/edit').'" id="edit_stud" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="'.url('delete_student/'.$data->id.'/delete').'" id="delete_stud" class="delete btn btn-danger btn-sm">Delete</a>
                    <script>
                    $("#delete_stud").on("click", function (e) {
                        e.preventDefault();
                        Swal.fire({
                            title: "Are you sure?",
                            text: "You wont be able to revert this!",
                            icon: "warning",
                            showCancelButton: true,
                            confirmButtonColor: "#3085d6",
                            cancelButtonColor: "#d33",
                            confirmButtonText: "Confirm"
                        }).then((result) => {
                            if (result.value) {
                                window.location.href = $(this).attr("href");
                            }
                        });
                    })
                    </script>';
                    return $actionBtn;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }
    public function student_create()
    {
        $teacher=Teacher::get();
        return view('create',array('teacher'=>$teacher));
    }
    public function create(Request $request)
    {
        $data=$request->all();
        $cbvcmandate= new Student;
        $cbvcmandate->fill($data);
        $cbvcmandate->save();
        return back()->with('success','Successfully Created!');
    }
    public function edit($id)
    {
        $teacher=Teacher::get();
        $student=Student::where('id',$id)->first();
        return view('edit',array('student'=>$student,'teacher'=>$teacher));
    }
    public function update(Request $request)
    {
        $data = request()->except(['_token']);
        $student_Update = Student::where("id",$data['id'])->update($data);
        return back()->with('success','Successfully Updated!');

    } 
    public function delete($id)
    {
        Student::where('id',$id)->delete();
        return redirect()->back()->with([
            'success' => 'Successfully Deleted!'
         ]);
        
    }   
     
}
