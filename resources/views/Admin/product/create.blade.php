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
                                                <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                <div class="container-fluid">
                                                    <div class="row">
                                                        <div class="col-md-8">
                                                            <div class="card mb-3">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="row">
                                                                            <div class="col-md-6">
                                                                                <div class="mb-3">
                                                                                    <label for="name">Name</label>
                                                                                    <input type="text" name="name" id="name" class="form-control" placeholder="Name">
                                                                                </div>
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
                                                                                <label for="image">Img</label>
                                                                                <input type="file" name="image" id="image" class="form-control" >
                                                                            </div>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="option">Option</label>
                                                                            <select name="option_id" id="option" class="form-control">

                                                                            @if (App\Models\Option::get()->isNotEmpty())
                                                                            @foreach (App\Models\Option::get() as $option )
                                                                            <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                                            @endforeach

                                                                            @endif
                                                                            </select>
                                                                        </div>
                                                                        <div class="mb-3">
                                                                            <label for="optionvalue">Option Vlaue</label>
                                                                            <select name="optionvalue_id" id="optionvalue" class="form-control">

                                                                            @if (App\Models\OptionValue::get()->isNotEmpty())
                                                                            @foreach (App\Models\OptionValue::get() as $optionvalue )
                                                                            <option value="{{ $optionvalue->id }}">{{ $optionvalue->value }}</option>
                                                                            @endforeach

                                                                            @endif
                                                                            </select>
                                                                        </div>
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
                                                    </div>

                                                    <div class="pb-5 pt-3">
                                                        <button class="btn btn-primary">Create</button>
                                                        <a href="{{ route('products.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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


