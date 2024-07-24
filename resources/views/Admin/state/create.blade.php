@extends('Admin.Layouts.main')
@section('content')
    @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
    @endif
<form action="{{ route('states.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

     <div>
         <div>
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1>Create State</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('states.index') }}" class="btn btn-primary">Back</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->

					<div class="container-fluid">
                        <form action="{{ route('states.store') }}" method="POST" enctype="multipart/form-data">

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="name">Name</label>
											<input type="text" name="name" id="name" class="form-control" placeholder="Name">
										</div>
									</div>

								</div>

                            </div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Create</button>
							<a href="{{ route('states.index') }}"  class="btn btn-outline-dark ml-3">Cancel</a>
						</div>
                        </form>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->
			</div>



    @endsection
                <script>

                </script>



                        @section('customJs')
                        @endsection


