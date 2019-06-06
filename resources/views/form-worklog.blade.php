@extends('layouts.app')
@section('title','Add Work Log')

@section('content')

    @if($message = Session::get('success'))
        <div class="alert alert-success">
            {{$message}}
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger">
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>

                @endforeach
        </div>
    @endif
        
  <!-- <h2>{{$header}}</h2> -->
    <form action="{{url('/savelog')}}" method="post" class="was-validated">
        <!-- <div class="card"> -->
        <h2 class="card-header">{{$header}}</h2>
        <div class="form-group">
            <input class="form-check-input" type="hidden" name="_token" value="{{ csrf_token()}}" ><br>
            *ประเภทงาน:
            @foreach($types as $type)
                <label class="form-check-label">
                     <!-- <input type="radio" name="type" value="{{$type['id']}}" required>{{ $type['name']}} -->
                       <input type="radio" name="type" value="{{$type['id']}}" {{old('type')== $type['id'] ? 'checked':''  }}>{{ $type['name']}}
                </label>
            @endforeach
            <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">กรุณาระบุประเภทงาน</div>
         </div>
        
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">*ชื่องาน:</label>
            <div class="col-sm-10">
                  <!-- <input type="text" class="form-control" name="name" value="{{old('name')}}" maxlength="100" required> -->
                    <input type="text" class="form-control" name="name" value="{{old('name')}}" maxlength="100">
                  <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div>
            </div>
        </div>
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียดงาน :</label>
            <div class="col-sm-10">
                 <input type="text" class="form-control" name="detail" value="{{old('detail')}}">
             </div>
        </div>

        <div class="form-check form-check-inline">
             <label class="form-check-label" for="exampleRadios1">สถานะงาน:</label>
              <input class="form-check-input" type="radio" name="completed"  value="0" >
  
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

    <form action="{{url('/savelog')}}" method="get" class="was-validated">
      <button type="submit" class="btn btn-primary">แสดงข้อมูล Work Log</button>
    </form>

    

@endsection