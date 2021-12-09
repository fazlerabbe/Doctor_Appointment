<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public">
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">






            <div class="container" align="center" style="padding-top:100px;">


                @if(session()->has('message'))
                <div class="alert alert-success">

                    <button type="button" class="close" data-dismiss="alert"> x </button>

                    {{session()->get('message')}}

                </div>



                @endif

                <form action="{{url('editdoctor',$data->id)}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div style="padding:15px;">
                        <label>
                            Doctor Name
                        </label>
                        <input style="color:black" type="text" name="name" value="{{$data->name}}">

                    </div>

                    <div style="padding:15px;">
                        <label>
                            Number
                        </label>
                        <input style="color:black" type="number" name="number" value="{{$data->number}}">

                    </div>

                    <div style="padding:15px;">
                        <label>
                            Speciality
                        </label>
                        <input style="color:black" type="text" name="speciality" value="{{$data->speciality}}">

                    </div>



                    <div style="padding:15px;">
                        <label>
                            Room No
                        </label>
                        <input style="color:black" type="text" name="room" value="{{$data->room}}">
                    </div>


                    <div style="padding:15px;">
                        <label>
                            Old image
                        </label>
                        <img height="150" width="150" src="doctorimage/{{$data->image}}" alt="">
                    </div>


                    <div>
                        <label for="">Change Image</label>
                        <input type="file" name="file">
                    </div>

                    <div>

                        <input type="submit" class="btn btn-primary">
                    </div>




                </form>


            </div>

        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>