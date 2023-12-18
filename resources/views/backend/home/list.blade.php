   @extends('backend.layouts.app')
   @section('style')
   @endsection
   @section('content')

    <section class="section">
      @include('layouts._message')
      <div class="row">
        <div class="col-lg-12">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Home</h5>
              <form class="row g-3" action="{{ url('panel/home/post') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="col-12">
                  <label for="inputNanme4" class="form-label">Profile Image</label>
                  <input type="file" class="form-control" name="profile"><br>
                   @if(@$getRecord[0]->profile)
                    <img src="{{ url('public/img/' .@$getRecord[0]->profile) }}" width="100" height="100" />
                  @endif
                </div>
                <div class="col-12">
                  <label class="form-label">Your Name</label>
                  <input type="text" class="form-control" value="{{ @$getRecord[0]->your_name }}" name="your_name" placeholder="enter your name">
                  <div style="color: red">{{ $errors->first('your_name') }}</div>
                </div>
                <div class="col-12">
                  <label class="form-label">Work Experience</label>
                  <input type="text" class="form-control" value="{{ @$getRecord[0]->work_experience }}" name="work_experience" placeholder="enter your work experience">
                  <div style="color: red">{{ $errors->first('work_experience') }}</div>
                </div>
                <div class="col-12">
                  <label class="form-label">Description </label>
                  <textarea class="form-control" name="description" placeholder="enter description">{{ @$getRecord[0]->description }}</textarea>
                  <div style="color: red">{{ $errors->first('description') }}</div>
                </div>

                <input type="text" name="id" value="{{ @$getRecord[0]->id }}">

                <div class="card-footer">
                  <button type="submit" name="add_to_update" id="add_to_update" class="btn btn-info" value="@if(count($getRecord)-0) edit @else add @endif" class="btn btn-info">@if(count($getRecord)>0) edit @else add @endif</button>
                  <a href="" class="btn btn-info float-left">cancel
                  </a>
                  

                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
    
    @endsection

    @section('script')
    @endsection