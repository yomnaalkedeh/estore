@extends('Admin.Layouts.main')
@section('content')

<form method="POST" action="{{ route('products.update', $product->id)}}" enctype="multipart/form-data">
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
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <input name="desc" id="desc" class="form-control" placeholder="Description">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="img">Img</label>
                                                <input type="file" name="img" id="img" class="form-control" placeholder="choose file">
                                            </div>
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <h2 class="h4  mb-3">Option </h2>
                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="category_id" id="category" class="form-control">

                                            @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category )
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach

                                            @endif
                                            </select>
                                        </div>

                                        <div class="card mb-3">
                                            <div class="card-body">
                                                <h2 class="h4 mb-3">Pricing</h2>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="price">Price</label>
                                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price">
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                    </div>
                            </div>
                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary">Edit</button>
                                <a href="{{ route('optionvalues.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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
