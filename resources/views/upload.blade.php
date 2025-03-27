<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Media</title>
</head>
<body>
    <h2>Upload Image or Video</h2>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <label>Title:</label>
        <input type="text" name="title" required>
        <br><br>
        <label>Choose File:</label>
        <input type="file" name="file" required>
        <br><br>
        <button type="submit">Upload</button>
    </form>
</body>
</html>
