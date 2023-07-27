@extends('adminlte::page')

@section('title', 'Product Add')

@section('content_header')
    <h1>Product Add</h1>
@stop

@section('content')
  <div class="row">
    <div class="col-lg-12">
      <div class="card border-0 shadow rounded">
          <div class="card-body">
              <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
              
                  @csrf
  
                  <div class="d-flex">
  
                    <!-- Rest of the left column form fields -->
                    <div class="col-md-6">
                      <div class="form-group">
                          <label class="font-weight-bold">Select Category</label>
                            <select type="text" class="form-control @error('category') is-invalid @enderror" name="category_id" class="custom-select form-control-border" id="category_id" >
                            <option value="" hidden> -- Select Category --</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                          </select>
                          
                            <!-- error message untuk title -->
                            @error('category_id')
                            <div class="alert alert-danger mt-2">
                                {{ $message }}
                            </div>
                            @enderror
                      </div>
  
                      <div class="form-group">
                          <label class="font-weight-bold">Name</label>
                          <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Insert name">
                      
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
                          <img id="preview" src="#" alt="your image" class="rounded" style="width: 150px"/>
                      </div>
  
                      <!-- Rest of the left column form fields -->
  
                      <div class="form-group">
                        <label class="font-weight-bold">Price</label>
                            <input type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" placeholder="Insert price">
                        
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
                            <input type="number" class="form-control @error('stock') is-invalid @enderror" name="stock" value="{{ old('stock') }}" placeholder="Insert stock">
                        
                            <!-- error message untuk title -->
                            @error('stock')
                                <div class="alert alert-danger mt-2">
                                    {{ $message }}
                                </div>
                            @enderror
                      </div>
  
                      <div class="form-group">
                          <label class="font-weight-bold">Discount</label>
                              <input type="number" class="form-control @error('discount') is-invalid @enderror" name="discount" value="{{ old('discount') }}" placeholder="Insert discount">
                          
                              <!-- error message untuk title -->
                              @error('discount')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                      </div>
  
                      <div class="form-group">
                          <label class="font-weight-bold">Select Status</label>
                                                        <select type="text" class="form-control @error('status') is-invalid @enderror" name="status" class="custom-select form-control-border" id="status" >
                                  <option value="" hidden> -- Select Status --</option>
                                  <option value="on-sale">On Sale</option>
                                  <option value="sold-out">Sold Out</option>
                                  <option value="pre-order">Pre Order</option>
                                  <option value="limited-stock">Limited Stock</option>
                                  <option value="back-order">Back Order</option>
                                  <option value="clearance">Clearance</option>
                                  <option value="" style="background-color:indigo;color:white;" > <button>New Status ?</button> </option>
                                </select>
                          
                              <!-- error message untuk title -->
                              @error('status')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                      </div>
  
                      {{-- <div class="form-group">
                          <label class="font-weight-bold">Rating</label>
                              <input type="integer" value="0" readonly class="form-control @error('rating') is-invalid @enderror" name="rating"  placeholder="0">
                          
                              <!-- error message untuk title -->
                              @error('rating')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                      </div> --}}
  
                      <div class="form-group">
                          <label class="font-weight-bold">Slug</label>
                              <input type="text" class="form-control @error('slug') is-invalid @enderror" name="slug" value="{{ old('slug') }}" placeholder="Insert slug">
                          
                              <!-- error message untuk title -->
                              @error('slug')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                      </div>
  
                      <div class="form-group">
                          <label class="font-weight-bold">Description</label>
                              <input type="text" class="form-control @error('description') is-invalid @enderror" name="description" value="{{ old('description') }}" placeholder="Insert description">
                          
                              <!-- error message untuk title -->
                              @error('description')
                                  <div class="alert alert-danger mt-2">
                                      {{ $message }}
                                  </div>
                              @enderror
                      </div>
      
                      <button type="submit" class="btn btn-md btn-primary">Save</button>
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

    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    // show hide new Color
    // $(document).ready(function() {
    // $('#color_new').change(function() {
    //     $('.input_color_new').show();
    // });
    // });

    // show hide new Status
    // $(document).ready(function() {
    // $('#status_new').change(function() {
    //     $('.input_status_new').show();
    // });
    // });
</script>
<script>
    selectImage.onchange = evt => {
        preview = document.getElementById('preview');
        preview.style.display = 'block';
        const [file] = selectImage.files
        if (file) {
            preview.src = URL.createObjectURL(file)
        }
    }
</script>

<script>
  $(document).ready(function() {
      // Function to clear the form inputs
      function clearFormInputs() {
          // Get all form elements by their names
          const formElements = ['category_id', 'name', 'image', 'price', 'stock', 'discount', 'status', 'rating', 'slug', 'description'];

          // Loop through each form element and set their values to empty
          formElements.forEach(function(elementName) {
              $(`[name="${elementName}"]`).val('');
          });

          // Reset the preview image
          $('#preview').attr('src', '#');
      }

      // Call the clearFormInputs function on page load or refresh
      clearFormInputs();
  });
</script>

<!-- Add this to your existing JavaScript section -->
<script>
  $(document).ready(function() {
      // Initialize the input mask for the price input
      $('[name="price"]').inputmask();
  });
</script>

@stop