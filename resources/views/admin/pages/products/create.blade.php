@extends('admin.layouts.app')

@section('title')
    @parent | {{ 'Create New Product' }}
@endsection

@section('content')

    <div class="container-fluid p-0">
        <div class="d-flex align-items-center gap-3 mb-3">
            <h2 class="text-white">Create New Product</h2>
            <a class="btn btn-success" href="{{ route('products.index') }}">
                <i class="fa-solid fa-arrow-left-long"></i>
                Back
            </a>
        </div>

        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" data-bs-theme="dark">
            @csrf
            <hr class="text-white">
            <div class="row">
                <h3 class="text-white">Product Metadata</h3>

                <div class="mb-3 col-12 col-lg-6">
                    <div class="form-group">
                        <label for="primary_price" class="form-label text-white">Primary Price</label>
                        <input type="text" name="primary_price" class="form-control" value="{{ old('primary_price') }}">
                    </div>
                </div>
                <div class="mb-3 col-12 col-lg-6">
                    <div class="form-group">
                        <label for="product_link" class="form-label text-white">Product Link</label>
                        <input type="url" name="product_link" class="form-control" value="{{ old('product_link') }}">
                    </div>
                </div>
            </div>
            <hr class="text-white">
            <div class="row">
                <h3 class="text-white">Product Info</h3>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="name_am" class="form-label text-white">
                        Name AM
                        <span class="text-danger"> *</span>
                    </label>
                    <input type="text" name="name_am" id="name_am" value="{{old('name_am')}}" class="form-control"
                           placeholder="Name AM" required>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="name_ru" class="form-label text-white">
                        Name RU
                        <span class="text-danger"> *</span>
                    </label>
                    <input type="text" name="name_ru" id="name_ru" value="{{old('name_ru')}}" class="form-control"
                           placeholder="Name RU" required>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="name_en" class="form-label text-white">
                        Name EN
                        <span class="text-danger"> *</span>
                    </label>
                    <input type="text" name="name_en" id="name_en" value="{{old('name_en')}}" class="form-control"
                           placeholder="Name EN" required>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="description_am" class="form-label text-white">
                        Description AM
                        <span class="text-danger"> *</span>
                    </label>
                    <textarea class="form-control" style="height:150px" name="description_am" id="description_am"
                              placeholder="Description AM">{{old('description_am')}}</textarea>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="description_ru" class="form-label text-white">
                        Description RU
                        <span class="text-danger"> *</span>
                    </label>
                    <textarea class="form-control" style="height:150px" name="description_ru" id="description_ru"
                              placeholder="Description RU">{{old('description_ru')}}</textarea>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="description_en" class="form-label text-white">
                        Description EN
                        <span class="text-danger"> *</span>
                    </label>
                    <textarea class="form-control" style="height:150px" name="description_en" id="description_en"
                              placeholder="Description EN">{{old('description_en')}}</textarea>
                </div>
                <div class="mb-3 col-12">
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="price" class="form-label text-white">
                                Price:
                                <span class="text-danger">*</span>
                            </label>
                            <input type="number" name="price" id="price" class="form-control" placeholder="Price"
                                   min="0" value="{{old('price')}}" required>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="discount_percent" class="form-label text-white">Discount Percent:</label>
                            <input type="number" name="discount" id="discount_percent" class="form-control" min="0"
                                   placeholder="Discount Percent" value="{{old('discount')}}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="discount" class="form-label text-white">Discount Price:</label>
                            <input type="number" id="discount" class="form-control" placeholder="Discount Price"
                                   disabled>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="category_id" class="form-label text-white">
                        Category:
                        <span class="text-danger">*</span>
                    </label>
                    <select name="category_id" id="category_id" class="form-control" required>
                        <option value="">Select a category</option>
                        @foreach($categories as $category)
                            <option
                                value="{{ $category->id }}" {{ (old('category_id') == $category->id) ? 'selected' : '' }}>
                                {{ $category->name_ru }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label class="form-label text-white">
                        Sizes:
                        <span class="text-danger">*</span>
                    </label>
                    <div id="sizes-container" class="d-flex">
                        <div class="d-grid size-group">
                            <label for="size-0-3" class="form-check-label text-white">0-3</label>
                            <input type="number" id="size-0-3" name="size[0-3][quantity]" class="form-control"
                                   placeholder="Quantity" min="0">
                        </div>
                        <div class="d-grid size-group">
                            <label for="size-3-6" class="form-check-label text-white">3-6</label>
                            <input type="number" id="size-3-6" name="size[3-6][quantity]" class="form-control"
                                   placeholder="Quantity" min="0">
                        </div>
                        <div class="d-grid size-group">
                            <label for="size-6-12" class="form-check-label text-white">6-12</label>
                            <input type="number" id="size-6-12" name="size[6-12][quantity]" class="form-control"
                                   placeholder="Quantity" min="0">
                        </div>
                        <div class="d-grid size-group">
                            <label for="size-12-18" class="form-check-label text-white">12-18</label>
                            <input type="number" id="size-12-18" name="size[12-18][quantity]" class="form-control"
                                   placeholder="Quantity" min="0">
                        </div>
                        <div class="d-grid size-group">
                            <label for="size-18-24" class="form-check-label text-white">18-24</label>
                            <input type="number" id="size-18-24" name="size[18-24][quantity]" class="form-control"
                                   placeholder="Quantity" min="0">
                        </div>
                    </div>
                </div>

                <div class="mb-3 col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <label class="form-label text-white">
                                Gender:
                                <span class="text-danger">*</span>
                            </label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" name="gender[]" value="boy"
                                           id="boy" <?php echo (in_array('boy', old('gender', []))) ? 'checked' : ''; ?>>
                                    <label class="form-check-label text-white" for="boy">Boy</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" name="gender[]" value="girl"
                                           id="girl" <?php echo (in_array('girl', old('gender', []))) ? 'checked' : ''; ?>>
                                    <label class="form-check-label text-white" for="girl">Girl</label>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-lg-6">
                            <label class="form-label text-white">
                                Status:
                            </label>
                            <div class="d-flex">
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" name="status[]" value="new"
                                           id="new" <?php echo (in_array('new', old('status', []))) ? 'checked' : ''; ?>>
                                    <label class="form-check-label text-white" for="new">New</label>
                                </div>
                                <div class="form-check me-3">
                                    <input class="form-check-input" type="checkbox" name="status[]" value="top"
                                           id="top" <?php echo (in_array('top', old('status', []))) ? 'checked' : ''; ?>>
                                    <label class="form-check-label text-white" for="top">Top</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="color" class="form-label text-white">
                        Color:
                    </label>
                    <input type="text" name="color" id="color" class="form-control" placeholder="Color"
                           value="{{old('color')}}">
                </div>
                <div class="mb-3 col-12 col-lg-4">
                    <label for="images" class="form-label text-white">
                        Images:
                        <span class="text-danger">*</span>
                    </label>
                    <input type="file" name="images[]" id="images" class="form-control" multiple required>
                </div>
            </div>

            <button type="submit" class="btn btn-success">
                <i class="fa-solid fa-plus"></i>
                Add
            </button>
        </form>

    </div>

@endsection
