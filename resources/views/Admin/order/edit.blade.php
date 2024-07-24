@extends('Admin.Layouts.main')
@section('content')

<form method="POST" action="{{ route('orders.update', $order->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    				<!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-body">
                                        <h2 class="h4  mb-3">Order</h2>
                                        <div class="mb-3">
                                            <label for="user">User</label>
                                            <select name="user_id" id="user" class="form-control">

                                            @if ($users->isNotEmpty())
                                            @foreach ($users as $user )
                                            <option value="{{ $user->id }}">{{ $user->name }}</option>
                                            @endforeach

                                            @endif
                                            </select>
                                        </div>



                                    </div>
                                </div>

                            </div>
                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary">Edit</button>
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->
                </div>
                <!-- /.content-wrapper -->
                <footer class="main-footer">

                    <strong>Copyright &copy; 2014-2022 AmazingShop All rights reserved.
                </footer>

            </div>
            <!-- ./wrapper -->
    </form>
    @endsection
    <script>

            </script>



    @section('customJs')
    @endsection
