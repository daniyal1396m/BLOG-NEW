@extends('admin.temp')
@section('admin_content')
    <div class="x_panel">
        <div class="x_title">
            <h2>فرم ویرایش</h2>
            <ul class="nav navbar-right panel_toolbox">

            </ul>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <br/>
            <form class="form-horizontal form-label-left" method="post" action="{{route('store.category.edit')}}">
                @csrf
                @foreach($editCat as $edit)
                    <div class="form-group">
                        <label class="control-label col-md-3" for="category">ویرایش نام دسته بندی <span
                                class="required">*</span></label>
                        <div class="col-md-7">
                            <input type="text" value="{{$edit->name}}" name="name"
                                   class="form-control col-md-7 col-xs-12">

                            <input type="hidden" value="{{$edit->id}}" name="id">
                        </div>
                    </div>
                @endforeach
                <button type="submit" class="btn btn-secondary btn-lg btn-block">ویرایش</button>
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <strong>{{ $message }}</strong>
                    </div>
                @endif
            </form>

        </div>
    </div>
@endsection
