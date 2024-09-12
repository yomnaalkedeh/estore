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
                                                <input type="text" name="name" id="name" class="form-control" placeholder="Name" value="{{ $product->name }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="description">Description</label>
                                                <input name="desc" id="desc" class="form-control" placeholder="Description" value="{{ $product->desc }}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="images">Images</label>
                                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                            </div>
                                        </div>
                                        </div>

                                       <!-- Option Values -->
                                        <div class="mb-3">
                                            <label for="option_values" class="form-label">Select Option Values:</label>
                                            @foreach (App\Models\Option::all() as $option)
                                                <div class="mb-4">
                                                    <h5 class="mb-2">{{ $option->name }}</h5>
                                                    <div class="row">
                                                        @foreach ($option->optionValues as $optionValue)
                                                            <div class="col-md-4 col-sm-6">
                                                                <div class="form-check">
                                                                    <input class="form-check-input" type="checkbox" name="option_values[{{ $option->id }}][]"
                                                                        id="option_value_{{ $optionValue->id }}" value="{{ $optionValue->id }}">
                                                                    <label class="form-check-label" for="option_value_{{ $optionValue->id }}">
                                                                        {{ $optionValue->value }}
                                                                    </label>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">

                                        <div class="mb-3">
                                            <label for="category">Category</label>
                                            <select name="category_id" id="category" class="form-control">

                                            @if ($categories->isNotEmpty())
                                            @foreach ($categories as $category )
                                            <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach

                                            @endif
                                            </select>




                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="mb-3">
                                                            <label for="price">Price</label>
                                                            <input type="text" name="price" id="price" class="form-control" placeholder="Price" value="{{ $product->price }}">
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
