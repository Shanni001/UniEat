<x-adminheader  />
<!-- partial -->
<div class="main-panel">
  <div class="content-wrapper">


    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title mb-0">Our Orders</p>


          

            <div class="table-responsive">
              <table class="table table-striped table-borderless">
                <thead>
                  <tr>
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>bill</th>
                    <th>Phone</th>
                    <th>Comments</th>
                    <th>Collection Time</th>
                    <th>Order Type</th>
                    <th>Order Status</th>
                    <th>Payment Method</th>
                   <th>Order Date</th>
                   <th>
                    Products
                   </th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                  @php
                  $i=0;
                  @endphp

                  @foreach ($orders as $item)

                  @php
                  $i++;
                   @endphp

                  <tr>
                    <td>{{ $item->name}}</td>
                    <td>{{ $item->email}}</td>
                    
                    
                    <td class="font-weight-bold">KES {{ $item -> bill}}</td>
                    <td>{{ $item->phone}}</td>

                   
                    <!-- <td>{{ $item->restaurant_id}}</td> -->

                    <td class="font-weight-medium">
                      <div class="btn btn-light">{{ $item->comments}}</div>
                      </td>

                    <td class="font-weight-medium">
                      <div class="btn btn-warning">{{ $item->collection_time}}</div>
                      </td>
                    
                   
                    <td class="font-weight-medium">
                      <div class="btn btn-primary">{{ $item -> order_type}}</div>
                      </td>

                      <td class="font-weight-medium">
                      <div class="badge-badge-success">{{ $item -> status}}</div>
                      </td>
                     
                      <td class="font-weight-medium">
                      <div class="btn btn-success">{{ $item -> payment_method}}</div>
                      </td>
                      <td class="font-weight-medium">
                      <div class="btn btn-info">{{ $item -> created_at}}</div>
                      </td>

                      <td class="font-weight-medium">
                      <!-- Button to Open the Modal -->
                      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateModal{{ $i}}">
                       Produts
                      </button>


                      <!-- The Modal -->
                      <div class="modal" id="updateModal{{ $i}}">
                        <div class="modal-dialog">
                          <div class="modal-content">

                            <!-- Modal Header -->
                            <div class="modal-header">
                              <h4 class="modal-title">Order Product</h4>
                              <button type="button" class="btn-close" data-dismiss="modal">&times;</button>
                            </div> 

                            <!-- Modal body -->
                           <div class="modal-body">
                            <table class="table table-responsive">
                              <thead>
                                <tr>
                                  <th>
                                    Product
                                  </th>
                                  <th>
                                    Price/Item
                                  </th>
                                  <th>
                                   Quantity
                                  </th>
                                  <th>
                                   Total
                                  </th>
                                  
                                </tr>
                              </thead>
                              <tbody>

                              @foreach($orderItems as $oItem)
                              @if($oItem->order_id==$item->id)

                                <tr>
                                  <td>
                                     {{ $oItem->menu_name}}
                                  </td>

                                  <td>
                                     {{ $oItem->price}}
                                  </td>

                                  <td>
                                     {{ $oItem->quantity}}
                                  </td>

                                  <td>
                                    KES {{ $oItem->quantity*  $oItem->price}}
                                  </td>
                                </tr>
                                @endif
                                @endforeach
                              </tbody>
                            </table>
                             
                            </div>



                          </div>
                        </div> 
                      </div>


                    </td>
                    
                    <td>
                    @if($item->status =='Pending')
                    <a href="{{URL::to('changeOrderStatus/Accepted/' .$item->id)}}" class="btn btn-success">Accept</a>
                    <a href="{{URL::to('changeOrderStatus/Rejected/' .$item->id)}}" class="btn btn-danger">Delete</a>

                     @elseif($item->status=='Accepted')
                     <a href="{{URL::to('changeOrderStatus/Ready/' .$item->id)}}" class="btn btn-success">Ready</a>
                     @elseif($item->status=='Ready')
                     <a href="{{URL::to('changeOrderStatus/Picked/' .$item->id)}}" class="btn btn-success">Picked-Up</a>
                     @elseif($item->status=='Picked')
                     <a href="{{URL::to('changeOrderStatus/Completed/' .$item->id)}}" class="btn btn-success">Completed</a>
                     @elseif($item->status=='Completed')
                     Already Completed
                     @else
                     
                     <a href="{{URL::to('changeOrderStatus/Accepted' .$item->id)}}" class="btn btn-success">Accept</a>
                     <a href="{{URL::to('changeOrderStatus/Rejected/' .$item->id)}}" class="btn btn-danger">Delete</a>
                    @endif
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