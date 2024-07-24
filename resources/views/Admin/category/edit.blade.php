@extends('Admin.Layouts.main')
@section('content')

<form method="POST" action="{{ route('categories.update', $categories->id)}}" enctype="multipart/form-data">
    @csrf
    @method('PATCH')
    				<!-- Main content -->
                    <section class="content">
                        <!-- Default box -->
                        <div class="container-fluid">
                            <div class="card">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $categories?->name }}" >
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary">Edit</button>
                                <a href="{{ route('categories.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
