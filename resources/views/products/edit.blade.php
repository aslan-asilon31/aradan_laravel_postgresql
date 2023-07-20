@extends('adminlte::page')

@section('title', 'Product Add')

@section('content_header')
    <h1>Product Edit</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-0 shadow rounded">
          <div class="card-body">
            
            <form action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="d-flex">

                  <!-- Rest of the left column form fields -->
                  <div class="col-md-6">
                    <div class="form-group">
                        <label class="font-weight-bold">Select Category</label>
                        <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" class="custom-select form-control-border" id="category_id">
                            <option value="" hidden> -- Select Category --</option>
                            @foreach ($categories as $category)
                                @php
                                    $selectedCategory = old('category_id', $product->category_id);
                                @endphp
                                <option value="{{ $category->id }}" @if($category->id == $selectedCategory) selected @endif>{{ $category->name }}</option>
                            @endforeach
                        </select>
                
                        <!-- error message for category_id -->
                        @error('category_id')
                        <div class="alert alert-danger mt-2">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name', $product->name) }}" placeholder="insert name">
                    
                        <!-- error message untuk title -->
                        @error('name')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" name="image" id="selectImage">
                    
                        <!-- error message untuk title -->
                        @error('image')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div class="form-group rounded mx-auto d-block img-fluid" >
                        <img src="{{ asset('/storage/products' . $product->image) }}" id="preview" alt="Product Image" class="rounded" height="150px">
                    </div>



                    <!-- Rest of the left column form fields -->

                    <div class="form-group">
                      <label class="font-weight-bold">Price</label>
                          <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price', $product->price) }}" placeholder="Insert price">
                      
                          <!-- error message untuk title -->
                          @error('price')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                    </div>

                  </div>

                  <div class="col-md-6">
                    
                    <div class="form-group">
                      <label class="font-weight-bold">Stock</label>
                          <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock', $product->stock) }}" placeholder="Insert stock">
                      
                          <!-- error message untuk title -->
                          @error('stock')
                              <div class="alert alert-danger mt-2">
                                  {{ $message }}
                              </div>
                          @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Discount</label>
                            <input type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount', $product->discount) }}" placeholder="Insert discount">
                        
                            <!-- error message untuk title -->
                            @error('discount')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Select Status</label>
                        <select class="form-control @error('status') is-invalid @enderror" name="status" class="custom-select form-control-border" id="status">
                            <option value="" hidden> -- Select Status --</option>
                            @foreach (['on-sale', 'sold-out', 'pre-order', 'limited-edition', 'back-order', 'clearance'] as $status)
                                @php
                                    $selectedStatus = old('status', $product->status);
                                @endphp
                                <option value="{{ $status }}" @if($status === $selectedStatus) selected @endif>{{ ucfirst(str_replace('-', ' ', $status)) }}</option>
                            @endforeach
                        </select>
                        
                            <!-- error message untuk title -->
                            @error('status')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Rating</label>
                            <input type="integer" value="0" readonly class="form-control @error('rating') is-invalid @enderror" name="rating"  placeholder="0">
                        
                            <!-- error message untuk title -->
                            @error('rating')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Slug</label>
                            <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug', $product->slug) }}" placeholder="Insert slug">
                        
                            <!-- error message untuk title -->
                            @error('slug')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>

                    <div class="form-group">
                        <label class="font-weight-bold">Description</label>
                            <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description', $product->description) }}" placeholder="Insert description">
                        
                            <!-- error message untuk title -->
                            @error('description')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
    
                    <button type="update" class="btn btn-md btn-primary">Save</button>
                    <button type="reset" class="btn btn-md btn-warning">Reset</button>
                  </div>
                </div>

            </form>

            </div>
      </div>

    </div>
  </div>
@stop

@section('css')

@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>



@stop