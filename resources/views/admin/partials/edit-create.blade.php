@if ($errors->any())
    <div class="alert alert-danger">
        <h4>Check errors</h4>
    </div>
@endif

<form class="mt-5" action="{{ route($route, $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="title" class="form-label">Book title:</label>
        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
            value="{{ old('title', $book->title) }}">
        @error('title')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Book author:</label>
        <input type="text" class="form-control @error('author') is-invalid @enderror" id="author" name="author"
            value="{{ old('author', $book->author) }}">
        @error('author')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">Book date:</label>
        <input type="date" class="form-control @error('publication_date') is-invalid @enderror" id="publication_date"
            name="publication_date" value="{{ old('publication_date', $book->publication_date) }}">
        @error('publication_date')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Book description:</label>
        <textarea class="form-control @error('description') is-invalid @enderror" id="description" rows="15"
            name="description">{{ old('description', $book->description) }}</textarea>
        @error('description')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Book genre:</label>
        <input type="text" class="form-control @error('genre') is-invalid @enderror" id="genre" name="genre"
            value="{{ old('genre', $book->genre) }}">
        @error('genre')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="cover_image" class="form-label">Book image:</label>
        <input type="url" class="form-control @error('cover_image') is-invalid @enderror" id="cover_image"
            name="cover_image" value="{{ old('cover_image', $book->cover_image) }}">
        @error('cover_image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="ISBN" class="form-label">ISBN:</label>
        <input type="text" class="form-control @error('ISBN') is-invalid @enderror" id="ISBN" name="ISBN"
            value="{{ old('ISBN', $book->ISBN) }}">
        @error('ISBN')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Book Price:</label>
        <input type="float" class="form-control @error('price') is-invalid @enderror" id="price" name="price"
            value="{{ old('price', $book->price) }}">
        @error('price')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="editor" class="form-label">Editor:</label>
        <input type="text" class="form-control @error('editor') is-invalid @enderror" id="editor" name="editor"
            value="{{ old('editor', $book->editor) }}">
        @error('editor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $button }}</button>

</form>
