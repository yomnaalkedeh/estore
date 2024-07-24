@extends('Admin.Layouts.main')
@section('content')
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif


    				<!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <form action="{{ route('orders.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                        <div class="container-fluid">
                            <div class="row">


                                    <div class="card">
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
                                <button class="btn btn-primary">Create</button>
                                <a href="{{ route('orders.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.content -->

    @endsection
                <script>

                </script>



                        @section('customJs')
                        @endsection


