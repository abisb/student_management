
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
<h2>Add Mark</h3>
    <form action="{{route('mark.create')}}" method="POST" enctype="multipart/form-data" id="create_mark">
                @csrf

        <table align="center" cellpadding="10">
               <!--------------------------student----------------------------------->
               <tr>
                <td>Select Student</td>
                <td>
                    <select name="student_id" id="student_id">
                        <option value="-1">Select Student</option>
                        @foreach($student as $stud)
                        <option value="{{@$stud->id}}">{{@$stud->name}}</option>
                        @endforeach
                    </select> 
                </td>
            </tr>

            <!--------------------- maths ------------------------------------------>
            <tr>
                <td>Maths</td>
                <td><input type="text" name="maths" id="maths" placeholder="Enter Maths Mark" />
                   
                </td>
            </tr>
            <!------------------------ science --------------------------------------->
            <tr>
                <td>Science</td>
                <td><input type="text" name="science" id="science" placeholder="Enter Science Mark" />
                  
                </td>
            </tr>
       <!------------------------ History --------------------------------------->
            <tr>
                <td>History</td>
                <td><input type="text" name="history" id="history" placeholder="Enter History Mark" />
                  
                </td>
            </tr>
            
      <!--------------------------terms----------------------------------->
      <tr>
                <td>Select Term</td>
                <td>
                    <select name="term" id="term">
                        <option value="1">Select Term</option>
                        <option value="One">One</option>
                        <option value="Two">Two</option>
                    </select> 
                </td>
            </tr>
         
 
            <tr>
                <td>Total Mark</td>
                <td><input type="text" name="total" id="total" readonly>
                  
                </td>
            </tr>
      
            <tr>
                <td colspan="2" align="center">
                    <input type="submit" value="Submit">
                    <input type="reset" value="Reset">
                </td>
            </tr>
        </table>
        </form>
  
@stop
@section('js')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
$('#maths, #science,#history').on('input',function(){
    var maths= parseFloat($('#maths').val()) || 0;
    var science = parseFloat($('#science').val()) || 0;
    var history = parseFloat($('#history').val()) || 0;

    var value=maths + science + history;
    var output = value.toFixed(2);
    $('#total').val(output); 
});

$(document).ready(function () {
    $("#create_mark").validate({
      ignore: "",
      rules: {
        maths: {
          required: true,
        },
        science: {
          required: true,
        },
        history: {
          required: true,
        },
      }
    });
  });
</script>
@stop

