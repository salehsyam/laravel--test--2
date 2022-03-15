@extends('layouts.admin.app',['title' =>'Employee'])
@section('breadcrumb')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">{{__('Employee Table')}} </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">{{__('Employee Table')}}</a></li>
                        <li class="breadcrumb-item active">{{__('Employee Table')}}</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
@endsection
@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">{{__('User.create')}}</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form id="create-form">
                            @csrf

                            <div class="card-body">
                                <div class="form-group">
                                    <label for="city_id">{{__('messages.employee')}}</label>
                                </div>


                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.name')}}</label>
                                    <input type="text" name="name" class="form-control" id="name"
                                           placeholder="Enter name " value="{{old('name')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.mobile')}}</label>
                                    <input type="text" name="mobile" class="form-control" id="mobile"
                                           placeholder="Enter name mobile" value="{{old('mobile')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.phone')}}</label>
                                    <input type="text" name="phone" class="form-control" id="phone"
                                           placeholder="Enter name phone" value="{{old('phone')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.identification_number')}}</label>
                                    <input type="text" name="identification_number" class="form-control"
                                           id="identification_number"
                                           placeholder="Enter name identification number"
                                           value="{{old('identification_number')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.work_hour')}}</label>
                                    <input type="text" name="work_hour" class="form-control" id="work_hour"
                                           placeholder="Enter name work hour" value="{{old('work_hour')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.type_job')}}</label>
                                    <input type="text" name="type_job" class="form-control" id="type_job"
                                           placeholder="Enter name type job" value="{{old('type_job')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.date_job')}}</label>
                                    <input type="date" name="date_job" class="form-control" id="date_job"
                                           placeholder="Enter name date job" value="{{old('date_job')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.salary')}}</label>
                                    <input type="text" name="salary" class="form-control" id="salary"
                                           placeholder="Enter name salary" value="{{old('salary')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.living')}}</label>
                                    <input type="text" name="living" class="form-control" id="living"
                                           placeholder="Enter name living" value="{{old('living')}}">
                                </div>
                                <div class="form-group">
                                    <label for="name_en"> {{__('messages.photo')}}</label>
                                    <input type="file" name="photo" class="form-control" id="photo"
                                           placeholder="Enter name photo" value="{{old('photo')}}">
                                </div>


                            </div>

                            <div class="card-footer">
                                <button type="button" onclick="performUpdate()"
                                        class="btn btn-primary">{{__('Add')}}</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
                <!--/.col (left) -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
@endsection
@push('scripts')
    <script>
        function performUpdate() {
            axios.post('/admin/employees', {
                name: document.getElementById('name').value,
                photo: document.getElementById('photo').files[0],
                living: document.getElementById('living').value,
                salary: document.getElementById('salary').value,
                date_job: document.getElementById('date_job').value,
                type_job: document.getElementById('type_job').value,
                work_hour: document.getElementById('work_hour').value,
                identification_number: document.getElementById('identification_number').value,
                phone: document.getElementById('phone').value,
                mobile: document.getElementById('mobile').value,

            })
                .then(function (response) {
                    //2xx
                    console.log(response);
                    toastr.success(response.data.message);
                    document.getElementById('create-form').reset();
                })
                .catch(function (error) {
                    //4xx - 5xx
                    console.log(error.response.data.message);
                    toastr.error(error.response.data.message);
                });
        }
    </script>

@endpush
