@if ($errors->any())
    <div class="alert alert-danger">
        <h4>Check errors</h4>
    </div>
@endif

<form class="mt-5" action="{{ route($route, $author) }}" method="POST">
    @csrf
    @method($method)

    <div class="mb-3">
        <label for="first_name" class="form-label">Author first name:</label>
        <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name"
            name="first_name" value="{{ old('first_name', $author->first_name) }}">
        @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="last_name" class="form-label">Author last name:</label>
        <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name"
            name="last_name" value="{{ old('last_name', $author->last_name) }}">
        @error('last_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="biography" class="form-label">Author biography:</label>
        <textarea class="form-control @error('biography') is-invalid @enderror" id="biography" name="biography" rows="5">{{ old('biography', $author->biography) }}</textarea>
        @error('biography')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="birthdate" class="form-label">Author birthdate:</label>
        <input type="date" class="form-control @error('birthdate') is-invalid @enderror" id="birthdate"
            name="birthdate" value="{{ old('birthdate', $author->birthdate) }}">
        @error('birthdate')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">{{ $button }}</button>

</form>
