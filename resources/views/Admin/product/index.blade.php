
@extends('Admin.Layouts.main')


@section('content')

				<!-- Content Header (Page header) -->
				<section class="content-header">
					<div class="container-fluid my-2">
						<div class="row mb-2">
							<div class="col-sm-6">
								<h1> Products</h1>
							</div>
							<div class="col-sm-6 text-right">
								<a href="{{ route('products.create') }}" class="btn btn-primary">New Product</a>
							</div>
						</div>
					</div>
					<!-- /.container-fluid -->
				</section>
				<!-- Main content -->
				<section class="content">
					<!-- Default box -->
					<div class="container-fluid">
						<div class="card">
                            <form action="{{ route('products.index') }}" method="GET">
							<div class="card-header">

								<div class="card-tools">
									<div class="input-group input-group" style="width: 250px;">
										<input type="search" name="search" class="form-control float-right" placeholder="Search">

										<div class="input-group-append">
										  <button type="submit" class="btn btn-default">
											<i class="fas fa-search"></i>
										  </button>
										</div>
									  </div>

								</div>
                            </form>

							<div class="card-body table-responsive p-0">
								<table class="table table-hover text-nowrap">
									<thead>
										<tr>
											<th width="60">ID</th>

											<th>Product</th>
											<th>Price</th>

											<th>description</th>
                                            <th>category</th>

											<th width="100">Action</th>
										</tr>
									</thead>
									<tbody>

                                        <tr>
                                            @if ($products->isNotEmpty())


                                            @foreach ($products as $product)




										<tr>
											<td>{{ $product->id }}</td>
											<td>{{ $product->name }}</td>
                                            <td>{{ $product->price }}</td>
                                            <td>{{ $product->desc }}</td>

                                            <td>{{ $product->category?->name }}</td>



											<td>
												<a href="{{ route('products.edit', ['product' => $product->id]) }}">

													<svg class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
														<path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"></path>
													</svg>
												</a>
                                                <a href="#" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();" class="text-danger">
                                                    <svg wire:loading.remove.delay="" wire:target="" class="filament-link-icon w-4 h-4 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                                        <path fill-rule="evenodd" d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                                    </svg>
                                                </a>

                                                <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', ['product' => $product->id]) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
											</td>
										</tr>
                                        @endforeach

                                        @endif

									</tbody>
								</table>
							</div>
							<div class="card-footer clearfix">
                                {!! $products->links() !!}

							</div>
						</div>
					</div>
					<!-- /.card -->
				</section>
				<!-- /.content -->

@endsection






