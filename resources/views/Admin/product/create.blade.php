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

                                                <!-- Default box -->
                                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="card mb-3">
                                                                <div class="card-body">


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
                                                                                <label for="images">Images</label>
                                                                                <input type="file" name="images[]" id="images" class="form-control" multiple>
                                                                            </div>
                                                                        </div>

                                                                        {{-- <h2 class="h4 mb-3">Product Options</h2>
                                                                        <div class="mb-3">
                                                                            <label for="options" class="form-label">Select Options:</label>
                                                                            <select name="option_ids[]" id="options" class="form-control" multiple>
                                                                                @foreach (App\Models\Option::all() as $option)
                                                                                    <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div> --}}


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
                                                                    <h2 class="h4  mb-3">Product category</h2>
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



                                                                </div>


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
                                                        <button class="btn btn-primary">Create</button>
                                                        <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
                                                    </div>
                                                </div>
                                                <!-- /.card -->

                                            <!-- /.content -->

                            @endsection



