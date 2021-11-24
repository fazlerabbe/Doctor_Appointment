<!DOCTYPE html>
<html lang="en">

<head>
    <style type="text/css">
    label {
        display: inline-block;
        width: 200px;

    }
    </style>
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
                <form action="{{url('upload_doctor')}}" method="POST" enctype="multipart/form-data">

                    @csrf
                    <div style="padding:15px;">
                        <label>
                            Doctor Name
                        </label>
                        <input style="color:black" type="text" name="name" placeholder="doctor name" required="">

                    </div>

                    <div style="padding:15px;">
                        <label>
                            Number
                        </label>
                        <input style="color:black" type="number" name="number" placeholder="number" required="">

                    </div>

                    <div style="padding:15px;">
                        <label>
                            Speciality
                        </label>
                        <select name="speciality" style="color:black;width:200px;" required="">
                            <option>select</option>
                            <option value="skin">skin</option>
                            <option value="brain">brain</option>
                            <option value="nose">nose</option>
                            <option value="eye">eye</option>

                        </select>

                    </div>



                    <div style="padding:15px;">
                        <label>
                            Room No
                        </label>
                        <input style="color:black" type="text" name="room" placeholder="Write the room no" required="">

                    </div>
                    <div style="padding:15px;">
                        <label>
                            Doctor Image
                        </label>
                        <input type="file" name="file" required="">

                    </div>
                    <div style="padding:15px;">

                        <input type="submit" class="btn btn-success">

                    </div>


                </form>


            </div>
        </div>
        <!-- container-scroller -->
        <!-- plugins:js -->
        @include('admin.script')
</body>

</html>