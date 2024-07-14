<x-adminheader  />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">My Profile</p>


           
          </div>
        </div>
      </div>
    </div>


        <div classs='contact_form'>

        @if(session()->has ('success'))
        <div class="alert alert-success">
            <p>{{ session()->get('success')}}</p>
        </div>
        @endif
            <img src="{{URL::asset('images/'.$user->picture)}}" class="mx-auto d-block" width="150px" alt="">
        <form action="{{URL::to('registerUser'}}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-lg-6">
                    <input type="text" name="fullname" placeholder="Name"  value=" {{$user->fullname}}" required>
                </div>
                <div class="col-lg-6">
                    <input type="email" name="email" placeholder="Email" value=" {{$user->email}}" required>
                </div>
                <div class="col-lg-6">
                    <input type="file" name= required>
                </div>
                <div class="col-lg-6">
                    <input type="password" name="password" placeholder="Password" value=" {{$user->password}}"required>
                </div>
                <div class="col-lg-6">
                    <button type="submit" name="register" class="site-button">Sign Up required</button>
                </div>

            </div>

        </form>

  </div>
  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->

  <x-adminfooter />