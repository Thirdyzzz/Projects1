<form action="{{ route('aestest') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <!-- Other form fields if needed -->
    <label for="file">Choose a file:</label>
    <input type="file" name="file" id="file">
    <button type="submit">Upload</button>
</form>

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif