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
    <!-- <div class="collapse" id="collapseExample">555</div> -->
    @if (isset($task))
        <form action="{{url('/edit',$task->id)}}" method="post" enctype="multipart/form-data" class="{{ isset($task) ? '' : 'collapse' }}" id="collapseExample">    
        <input type="hidden" name="_method" value="PUT">
    @else
        <form action="{{url('/savelog')}}" method="post" enctype="multipart/form-data" class="{{ isset($task) ? '' : 'collapse' }}" id="collapseExample">
    @endif
  <!-- <h2>{{$header}}</h2> -->
    <!-- <form action="{{url('/savelog')}}" method="post" class="was-validated"> -->
        <!-- <div class="card"> -->
        <h2 class="card-header">{{$header}}</h2>
       
        <div class="form-group">
            <input class="form-check-input @error('type') is-invalid @enderror" type="hidden" name="_token" value="{{ csrf_token()}}" ><br>
            *ประเภทงาน:
            @foreach($types as $type)
                <label class="form-check-label">
                     <!-- <input type="radio" name="type" value="{{$type['id']}}" required>{{ $type['name']}} -->
                       <!-- <input type="radio" name="type" value="{{$type['id']}}" {{old('type', isset($task)? :'')  == $type['id'] ? 'checked':''  }}>{{ $type['name']}} -->
                    @if( old('type',isset($task) ? $task->type_id : '') == $type['id'])
                       <input type="radio" name="type_id" value="{{$type['id']}}" checked>{{ $type['name']}}
                    @else
                         <input type="radio" name="type_id" value="{{$type['id']}}">{{ $type['name']}}
                    @endif
                
                </label>
            @endforeach
            @error('type')
                <small class="form-text text-danger">{{$message}}</small>
            @enderror
            <!-- <div class="valid-feedback">Valid.</div>
            <div class="invalid-feedback">กรุณาระบุประเภทงาน</div> -->
         </div>
        
        <div class="form-group row">
            <label for="inputPassword" class="col-sm-2 col-form-label">*ชื่องาน:</label>
            <div class="col-sm-10">
                  <!-- <input type="text" class="form-control" name="name" value="{{old('name')}}" maxlength="100" required> -->
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{old('name' , isset($task) ? $task->name : '' )}}" maxlength="100">
                  <!-- <div class="valid-feedback">Valid.</div>
                  <div class="invalid-feedback">Please fill out this field.</div> -->
                  @error('name')
                     <small class="form-text text-danger">{{$message}}</small>
                     @enderror
            </div>
          
        </div>
        <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">รายละเอียดงาน :</label>
            <div class="col-sm-10">
                 <input type="text" class="form-control" name="detail" value="{{old('detail' , isset($task) ? $task->detail : '')}}">
             </div>
        </div>

        <div class="form-check form-check-inline">
             <label class="form-check-label" for="exampleRadios1">สถานะงาน:</label>
                
               <input class="form-check-input" type="radio" name="completed"  value="0" {{old('completed',isset($task) ? $task->completed:'')== 0 ? 'checked':''  }}>
  
             <label class="form-check-label" for="exampleRadios1">
                สำเร็จ
            </label>
           
        </div>
        <div class="form-check form-check-inline">
             <input class="form-check-input" type="radio" name="completed"  value="1" {{old('completed',isset($task) ? $task->completed:'')== 1 ? 'checked':''  }}>
            <label class="form-check-label" for="exampleRadios2">
                ยังไม่สำเร็จ
             </label>
        </div>
    
        <div class="form-group">
            <label>file:</label>
            <input type="file" name="file_upload">

        </div>
       
           
        <!-- </div>    -->
        <br>
        <center>
        <button type="submit" class="btn btn-primary">Submit</button>
        <button type="submit" class="btn btn-secondary">Cancel</button>
       
        </center>
    </form>

    <a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
                กดเพื่อบันทึกการทำงาน!!
        </a>

    <br><br>

    <!-- <form action="{{url('/showlog')}}" method="get" class="was-validated">
      <button type="submit" class="btn btn-primary">แสดงข้อมูล Work Log</button>
    </form> -->
