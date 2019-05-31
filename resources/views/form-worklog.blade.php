@extends('layouts.app')
@section('title','Add Work Log')

@section('content')
        
  <!-- <h2>{{$header}}</h2> -->
    <form action="/savelog" method="post">
        <!-- <div class="card"> -->
        <h5 class="card-header">{{$header}}</h5>
        <div class="form-group">
            <input class="form-check-input" type="hidden" name="_token" value="{{ csrf_token()}}" ><br>
            ประเภทงาน:
            @foreach($types as $type)
            <label class="form-check-label">
                <input type="radio" name="type" value="{{$type['id']}}">{{ $type['name']}}
            </label>
            @endforeach
         </div>
        
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">ชื่องาน:</label>
            <div class="col-sm-10">
                  <input type="text" class="form-control" name="name">
            </div>
        </div>
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียดงาน :</label>
            <div class="col-sm-10">
                 <input type="text" class="form-control" name="detail">
             </div>
        </div>

        <div class="form-check form-check-inline">
             <label class="form-check-label" for="exampleRadios1">สถานะงาน:</label>
             <input class="form-check-input" type="radio" name="completed"  value="0" checked>
             <label class="form-check-label" for="exampleRadios1">
                สำเร็จ
            </label>
           
        </div>
        <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="completed"  value="1">
            <label class="form-check-label" for="exampleRadios2">
                ยังไม่สำเร็จ
             </label>
        </div>
    

       
           
        <!-- </div>    -->
        <br>
        <center>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-secondary">Cancel</button>
        </center>
    </form>

@endsection