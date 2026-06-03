<div class="row g-3">

    {{-- 1. Kategori Seçimi --}}
    <div class="col-md-6">
        <label class="form-label" for="category_id">Category</label>
        <select name="category_id" id="category_id" class="form-select" required>
            <option value="">Select Category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}"
                    {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                    @if($category->parent_id == 0)
                        {{ $category->title }}
                    @else
                        {{ $category->getParentsTree() }} -> {{ $category->title }}
                    @endif
                </option>
            @endforeach
        </select>
    </div>



    {{-- 3. Title --}}
    <div class="col-md-6">
        <label class="form-label" for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title"
               value="{{ old('title', $product->title ?? '') }}" required>
    </div>

    {{-- 4. Keywords --}}
    <div class="col-md-6">
        <label class="form-label" for="keywords">Keywords</label>
        <input type="text" class="form-control" id="keywords" name="keywords"
               value="{{ old('keywords', $product->keywords ?? '') }}" required>
    </div>

    {{-- 5. Description --}}
    <div class="col-md-12">
        <label class="form-label" for="description">Description</label>
        <textarea class="form-control" id="description" name="description" rows="2" required>{{ old('description', $product->description ?? '') }}</textarea>
    </div>

    {{-- 6. Detail (Hocanın eklediği detaylı açıklama alanı) --}}
    <div class="col-md-12">
        <label class="form-label" for="detail">Detail</label>
        <textarea class="form-control" id="detail" name="detail" rows="5">{{ old('detail', $product->detail ?? '') }}</textarea>
    </div>

    {{-- 7. Image Yükleme Alanı --}}
    <div class="col-md-12">
        <label class="form-label" for="image">Image</label>
        @if(isset($product) && $product->image)
            <div class="mb-2">
                <img src="{{ asset('storage/' . $product->image) }}" alt="Current Image" width="60" height="60" class="rounded border shadow-sm" style="object-fit: cover;">
                <small class="text-muted d-block">Current Image</small>
            </div>
        @endif
        <input type="file" class="form-control" id="image" name="image" accept="image/*">
    </div>

    {{-- 8. Fiyat ve Stok Bilgileri (Yan Yana 4 Kutu) --}}
    <div class="col-md-3">
        <label class="form-label" for="price">Price</label>
        {{-- Fiyat olduğu için ondalıklı sayılara (step="0.01") izin veriyoruz --}}
        <input type="number" step="0.01" class="form-control" id="price" name="price"
               value="{{ old('price', $product->price ?? '') }}" required>
    </div>

    <div class="col-md-3">
        <label class="form-label" for="stock">Stock</label>
        <input type="number" class="form-control" id="stock" name="stock"
               value="{{ old('stock', $product->stock ?? 0) }}" required>
    </div>

    <div class="col-md-3">
        <label class="form-label" for="min_stock">Minimum Stock</label>
        <input type="number" class="form-control" id="min_stock" name="min_stock"
               value="{{ old('min_stock', $product->min_stock ?? 0) }}" required>
    </div>

    <div class="col-md-3">
        <label class="form-label" for="discount">Discount</label>
        <input type="number" step="0.01" class="form-control" id="discount" name="discount"
               value="{{ old('discount', $product->discount ?? 0) }}">
    </div>

    {{-- 9. Status --}}
    <div class="col-md-6">
        <label class="form-label" for="status">Status</label>
        <select class="form-select" id="status" name="status" required>
            <option value="">Choose Status</option>
            <option value="0" {{ old('status', $product->status ?? '') === 0 ? 'selected' : '' }}>False (Passive)</option>
            <option value="1" {{ old('status', $product->status ?? '') == 1 ? 'selected' : '' }}>True (Active)</option>
        </select>
    </div>

</div>
