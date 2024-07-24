@extends('Admin.Layouts.main')
@section('content')

    <form method="POST" action="{{ route('payments.update', $payments->id)}}" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

     <div>
         <div>
				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
                            <div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('payments.index') }}" class="btn btn-primary">Back</a>
                            </div>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->

					<div class="container-fluid">
                        <form action="{{ route('payments.store') }}" method="POST" enctype="multipart/form-data">

						<div class="card">
							<div class="card-body">
								<div class="row">
									<div class="col-md-6">
										<div class="mb-3">
											<label for="payment">Name</label>

                                            <input type="text" name="payment_method" id="payment" class="form-control"  value="{{ $payments?->payment_method }}">
										</div>
									</div>


								</div>

                            </div>
							</div>
						</div>
						<div class="pb-5 pt-3">
							<button type="submit" class="btn btn-primary">Edit</button>
							<a href="{{ route('payments.index') }}"  class="btn btn-outline-dark ml-3">Cancel</a>
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


