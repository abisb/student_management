<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Mark;
use DataTables;
use Carbon\Carbon;
class MarkController extends Controller
{
    public function list()
    { 
       
        return view('list_mark');
    }
    public function getmark(Request $request)
    {
        if ($request->ajax()) {
            $data = Mark::join('students', 'mark.student_id', '=', 'students.id')
               ->get(['mark.*', 'students.name']);

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('created_at', function ($data) {
                 $createdAt= Carbon::parse($data['created_at']);
                 $value= $createdAt->format('M d, Y g:i A');
                    return  $value;
                })
                ->addColumn('action', function($data){
                    $actionBtn = '<a href="'.url('edit_mark/'.$data->id.'/edit').'" id="edit_mark" class="edit btn btn-success btn-sm">Edit</a> 
                    <a href="'.url('delete_mark/'.$data->id.'/delete').'" id="delete_mark" class="delete btn btn-danger btn-sm">Delete</a>
                    <script>
                    $("#delete_mark").on("click", function (e) {
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
    public function create_mark()
    {
        $student=Student::get();
        return view('create_mark',array('student'=>$student));
    }
    public function create(Request $request)
    {
        $data=$request->all();
        $cbvcmandate= new Mark;
        $cbvcmandate->fill($data);
        $cbvcmandate->save();
        return back()->with('success','Successfully Created!');
    }  
    public function edit($id)
    {
        $student=Student::get();
        $mark=Mark::where('id',$id)->first();
        return view('edit_mark',array('student'=>$student,'mark'=>$mark));
    }
    public function update(Request $request)
    {
        $data = request()->except(['_token']);
        $mark_Update = Mark::where("id",$data['id'])->update($data);
        return back()->with('success','Successfully Updated!');

    }
    public function delete($id)
    {
        Mark::where('id',$id)->delete();
        return redirect()->back()->with([
            'success' => 'Successfully Deleted!'
         ]);
        
    }  
}
