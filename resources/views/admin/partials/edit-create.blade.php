<form class="mt-5" action="{{ route($route, $book) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="title" class="form-label">Book title:</label>
        <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $book->title) }}">
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Book author:</label>
        <input type="text" class="form-control" id="author" name="author"
            value="{{ old('author', $book->author) }}">
    </div>
    <div class="mb-3">
        <label for="publication_date" class="form-label">Book date:</label>
        <input type="date" class="form-control" id="publication_date" name="publication_date"
            value="{{ old('publication_date', $book->publication_date) }}">
    </div>
    <div class="mb-3">
        <label for="description" class="form-label">Book description:</label>
        <textarea class="form-control" id="description" rows="15" name="description">{{ old('description', $book->description) }}</textarea>
    </div>
    <div class="mb-3">
        <label for="genre" class="form-label">Book genre:</label>
        <input type="text" class="form-control" id="genre" name="genre"
            value="{{ old('genre', $book->genre) }}">
    </div>

    <div class="mb-3">
        <label for="cover_image" class="form-label">Book image:</label>
        <input type="file" class="form-control" id="cover_image" name="cover_image"
            value="{{ old('cover_image', $book->cover_image) }}">
    </div>

    <div class="mb-3">
        <label for="ISBN" class="form-label">ISBN:</label>
        <input type="text" class="form-control" id="ISBN" name="ISBN" value="{{ old('ISBN', $book->ISBN) }}">
    </div>

    <div class="mb-3">
        <label for="price" class="form-label">Book Price:</label>
        <input type="number" class="form-control" id="price" name="price"
            value="{{ old('price', $book->price) }}">
    </div>

    <div class="mb-3">
        <label for="editor" class="form-label">Editor:</label>
        <input type="text" class="form-control" id="editor" name="editor"
            value="{{ old('editor', $book->editor) }}">
    </div>

    <button type="submit" class="btn btn-primary">{{ $button }}</button>

</form>
