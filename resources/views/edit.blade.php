
@extends('layouts.app')
@section('content')
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<style>
      .error {
        color: red;  
         }
        h2 {
            font-family: Sans-serif;
            font-size: 24px;
            font-style: normal;
            font-weight: bold;
            color: blue;
            text-align: center;
            text-decoration: underline
        }

        table {
            font-family: verdana;
            color: white;
            font-size: 16px;
            font-style: normal;
            font-weight: bold;
            /* background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%); */
            background: #3b4548;
            border-collapse: collapse;
            border: 4px solid #000000;
            border-style: dashed;
            width: 1000px;

        }

        table.inner {
            border: 10px
        }

        input[type=text],
        input[type=email],
        input[type=number] {
            width: 50%;
            padding: 6px 12px;
            margin: 5px 0;
            box-sizing: border-box;
        }

        input[type=submit],
        input[type=reset] {
            width: 15%;
            padding: 8px 12px;
            margin: 5px 0;
            box-sizing: border-box;
        }
    </style>
<h2>Edit Student Registration Form</h3>




@if (session()->has('success'))
    <div class="alert alert-dismissable alert-success">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        <strong>
            {!! session()->get('success') !!}
        </strong>
    </div>
@endif
    <form action="{{route('student.update')}}" method="POST" enctype="multipart/form-data" id="student_from_edit">
                @csrf
                @if(@$student->id)
                <input type="hidden" name="id" value="{{$student->id}}" />
                @endif
        <table align="center" cellpadding="10">
            <!--------------------- Name ------------------------------------------>
            <tr>
                <td>Name</td>
                <td><input type="text" name="name" maxlength="50" placeholder="Student Name" value="{{@$student->name}}"/>
                   
                </td>
            </tr>
            <!------------------------ age --------------------------------------->
            <tr>
                <td>Student Age</td>
                <td><input type="number" name="age" placeholder="Age" value="{{@$student->age}}"/>
                  
                </td>
            </tr>
    
            <!---------------------- Gender ------------------------------------->
            <tr>
                <td>Gender</td>
                <td>
                    <input type="radio" name="gender" value="1" @if($student->gender==1) checked @endif />
                    Male
                    <input type="radio" name="gender" value="2" @if($student->gender==2) checked @endif/>
                    Female
                </td>
            </tr>
            <!--------------------------Teacher----------------------------------->
            <tr>
                <td>Select Teacher</td>
                <td>
                    <select name="teacher_id" id="teacher_id">
                        <option value="-1">Select Teacher</option>
                        @foreach($teacher as $teach)
                        <option value="{{ $teach->id}}" @if($teach->id==$student->teacher_id) selected @endif>{{ $teach->teacher_name}}</option>
                        @endforeach
                    </select> 
                </td>
            </tr>
 

      
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Update">
                </td>
            </tr>
        </table>
        </form>
  
@stop
@section('js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
  $(document).ready(function () {
    $("#student_from_edit").validate({
      ignore: "",
      rules: {
        name: {
          required: true,
        },
        age: {
          required: true,
        },
        gender: {
          required: true,
        },
      }
    });
  });
</script>
@stop