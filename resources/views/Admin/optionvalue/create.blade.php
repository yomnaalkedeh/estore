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
                        <form action="{{ route('optionvalues.store') }}" method="POST" enctype="multipart/form-data">
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
                                                            <label for="value">Value</label>
                                                            <input type="text" name="value" id="value" class="form-control" placeholder="value">
                                                        </div>
                                                    </div>

                                                </div>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="card">
                                        <div class="card-body">
                                            <h2 class="h4  mb-3">Option </h2>
                                            <div class="mb-3">
                                                <label for="option">Option</label>
                                                <select name="option_id" id="option" class="form-control">

                                                @if ($options->isNotEmpty())
                                                @foreach ($options as $option )
                                                <option value="{{ $option->id }}">{{ $option->name }}</option>
                                                @endforeach

                                                @endif
                                                </select>
                                            </div>



                                        </div>


                                </div>




                                </div>
                            </div>

                            <div class="pb-5 pt-3">
                                <button class="btn btn-primary">Create</button>
                                <a href="{{ route('optionvalues.index') }}" class="btn btn-outline-dark ml-3">Cancel</a>
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


