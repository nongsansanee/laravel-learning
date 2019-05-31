@extends('layouts.app')
@section('title','Save Log')

@section('content')

<!-- {{$tasks}} -->

<div class="container">
  <h2>My Work Log</h2>
  <!-- <p>The .table-striped class adds zebra-stripes to a table:</p>  -->
  <form action="/form-worklog">
    <div class="form-group">
        <label for="email">บันทึกสำเร็จ</label>
        <button type="submit" class="btn btn-primary">กลับไปหน้าปันทึกงาน</button>
    </div>
  </form>  
  <input class="form-control" id="myInput" type="text" placeholder="Search..">
  <br>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>#</th>
        <th>ประเภทงาน</th>
        <th>ชื่องาน</th>
        <th>รายละเอียดงาน</th>
        <th>สถานะงาน</th>
        <th>วันที่บันทึก</th>
      </tr>
    </thead>
    <tbody id="myTable">
    @foreach($tasks as $task)
      <tr class=" @if($task['completed']===1) table-danger @else table-success @endif">
        <td>{{$task['id']}}</td>
        <td>
          <!-- {{$task['type']}} -->
        @switch($task['type'])
                @case(1)
                    Programing
                    @break
                @case(2)
                     Change Request
                     @break
                @case(3)
                     Bug
                     @break
                @case(4)
                     Meeting
                     @break
                @case(5)
                     Learning
                     @break
                @case(6)
                     Other
                     @break
                @default
                    Opps....
            @endswitch

        </td>
        <td>{{$task['name']}}</td>
        <td>{{$task['detail']}}</td>
        <td>
           <!-- {{ $task['completed']}} -->
           <!-- $status = $task['completed'] -->
           <div>
             @if($task['completed']===0)
                 
                 <label >สำเร็จ</label>
             @else
               
                <!-- <label >ยังไม่สำเร็จ</label> -->
                <label class="form-check-label">
                     <input type="checkbox" class="form-check-input" value="0"> click เมื่องานนี้สำเร็จ    
                </label>
               
             @endif
             </div>
      
         </td>
         <td>{{$task['created_at']}}</td>
      </tr>
      @endforeach
      <!-- <tr>
        <td>2</td>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>3</td>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
        <td>john@example.com</td>
      </tr> -->
    </tbody>
  </table>
</div>
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>

@endsection