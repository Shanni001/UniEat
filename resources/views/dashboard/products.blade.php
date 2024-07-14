<x-adminheader />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Top Products</p>


            <!-- Button to Open the Modal -->
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addNewModal">
              Add New
            </button>


            <!-- The Modal -->
            <div class="modal" id="addNewModal">
              <div class="modal-dialog">
                <div class="modal-content">

                  <!-- Modal Header -->
                  <div class="modal-header">
                    <h4 class="modal-title">Add New Product</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal">&times;</button>
                  </div>

                  <!-- Modal body -->
                  <div class="modal-body">
                    <form action="{{URL ::to ('AddNewProduct')}}" method="POST" enctype="multipart/form-data">

                      @csrf

                      <label for="">Menu_name</label>
                      <input type="text" name="menu_name" placeholder="Enter menu_name" class="form-control mb-2" id="">

                      <label for="">Price</label>
                      <input type="text" name="price" placeholder="Enter Price ( KES )" class="form-control mb-2" id="">

                      <label for="">Menu_description</label>
                      <input type="text" name="menu_description" placeholder="Enter_description" class="form-control mb-2" id="">

                      <label for="restaurant_id">Restaurant ID:</label>
                      <input type="text" name="restaurant_id" id="restaurant_id" required>

                      <label for="">Image</label>
                      <input type="file" name="image" class="form-control mb-2" id="image">

                      <input type="submit" name="save" class="btn btn-success" value="Save Now" id="">
                    </form>
                  </div>



                </div>
              </div>
            </div>


            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>menu_name</th>
                    <th>image</th>
                    <th>price</th>
                    <th>menu_description</th>
                    <th>restaurant_id</th>
                    <th>status</th>
                    <th>update</th>
                    <th>delete</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                  $i=0;
                  @endphp

                  @foreach ($menus as $item)

                  @php
                  $i++;
                   @endphp

                  <tr>
                    <td>{{ $item->menu_name}}</td>
                    <td><img src="{{URL::asset ('images/'.$item -> image)}}" width="100px"></td>
                    <td class="font-weight-bold">KES {{ $item -> price}}</td>
                    <td>{{ $item->menu_description}}</td>
                    <td>{{ $item->restaurant_id}}</td>
                    <td class="font-weight-medium">
                      <div class="badge-badge-success">Completed</div>

                    <td class="font-weight-medium">

                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $i}}">
                        Update
                      </button>


                      <!-- The Modal -->
                      <div class="modal" id="updateModal{{ $i}}">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Update Product</h4>
                              <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
                            </div>

                            <!-- Modal body -->
                            <div class="modal-body">
                              <form action="{{URL ::to ('UpdateProduct')}}" method="POST" enctype="multipart/form-data">

                                @csrf

                                <label for="">Menu_name</label>
                                <input type="text" name="menu_name" value="{{$item->menu_name}}" placeholder="Enter menu_name" class="form-control mb-2" id="">

                                <label for="">Price</label>
                                <input type="text" name="price" value="{{$item->price}}" placeholder="Enter Price ( KES )" class="form-control mb-2" id="">

                                <label for="">Menu_description</label>
                                <input type="text" name="menu_description" value="{{$item->menu_description}}" placeholder="Enter_description" class="form-control mb-2" id="">

                                <label for="restaurant_id">Restaurant ID:</label>
                                <input type="text" name="restaurant_id" value="{{$item->restaurant_id}}" id="restaurant_id" required>

                                <label for="">Image</label>
                                <input type="file" name="image" class="form-control mb-2" >
                                <!-- id="image" -->

                                <input type= "hidden" name="id" value="{{ $item->id}}" id="">
                                <input type="submit" name="save" class="btn btn-success" value="Save Changes" id="">
                              </form>
                            </div>



                          </div>
                        </div>
                      </div>


                    </td>

                    <td>
                    <a href="{{URL::to('deleteProduct/' .$item->id)}}" class="btn btn-danger">Delete</a>

                    </td>

                
                    </tr>
                    @endforeach


                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-5 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">To Do Lists</h4>
            <div class="list-wrapper pt-2">
              <ul class="d-flex flex-column-reverse todo-list todo-list-custom">
                <li>
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Meeting with Urban Team
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Duplicate a project for new customer
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Project meeting with CEO
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li class="completed">
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox" checked>
                      Follow up of team zilla
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
                <li>
                  <div class="form-check form-check-flat">
                    <label class="form-check-label">
                      <input class="checkbox" type="checkbox">
                      Level up for Antony
                    </label>
                  </div>
                  <i class="remove ti-close"></i>
                </li>
              </ul>
            </div>
            <div class="add-items d-flex mb-0 mt-2">
              <input type="text" class="form-control todo-list-input" placeholder="Add new task">
              <button class="add btn btn-icon text-primary todo-list-add-btn bg-transparent"><i class="icon-circle-plus"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>
  <!-- content-wrapper ends -->
  <!-- partial:partials/_footer.html -->

  <x-adminfooter />