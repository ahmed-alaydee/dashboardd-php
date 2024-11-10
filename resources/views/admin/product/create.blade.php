@extends('layout.main')


@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{asset('plugins/summernote/summernote-bs4.min.css')}}">

@endpush

{{-- import content in main page  --}}
@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>add new product</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">add new product</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
             <!-- add new product elements -->
             <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Product Create</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('storproduct')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="card-body">

             <div class="form-group">

                    <label for="title">Title</label>
                    <input  name="title" type="text" class="form-control" id="title"
                     placeholder="Enter title">
                                 @error('title')
                       <p class="text-danger">{{$message}}</p>
                     @enderror
                  </div>

                  <div class="form-group">
                    <label for="description">Description</label>
               <textarea name="discription" id="summernote">{{old('discription')}}</textarea>
                    @error('discription')
                       <p class="text-danger">{{$message}}</p>
                     @enderror
              </div>

                      <div class="form-group">
                    <label for="Price">Price</label>
                    <input name="price" value="{{old('price')}}" type="number" class="form-control" id="Price" placeholder="Enter Price">
                                   @error('price')
                       <p class="text-danger">{{$message}}</p>
                     @enderror
                  </div>

                       <div class="form-group">
                    <label for="Qty">Qty</label>
                    <input name="qty" value="{{old('qty')}}" type="number" class="form-control" id="Qty" placeholder="Enter Qty">
                  </div>

                       <div class="form-group">
                    <label for="Discount">Discount</label>
                    <input name="discount" value="{{old('discount')}}" step="0.1" name="" type="number" class="form-control" id="Discount" placeholder="Enter Discount">
                  </div>

                  <div class="form-group">
                     <label for="category_id">Category</label>
                     <Select class="form-control" name="category_id" id="">
                        <option value="" selected disabled>Select Category</option>
                        @foreach ($categores as $category )
                        <option value="{{$category->id}}">{{$category->name}}</option>

                        @endforeach
                     </Select>
                  </div>

                  <div class="form-group">
                    <label for="exampleInputFile">image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input name="image" type="file" class="custom-file-input" id="exampleInputFile">

                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>

                      </div>

                    </div>
                  </div>




                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->
          </div>

        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->



  <!-- Enb  Content Wrapper. Contains page content -->
  {{-- --------------------------------------------------- --}}

@endsection






@push('js')
<!-- Summernote -->
<script src="{{asset('plugins/summernote/summernote-bs4.min.js')}}"></script>

<script>
  $(function () {
    // Summernote
    $('#summernote').summernote()

    });
</script>
@endpush
