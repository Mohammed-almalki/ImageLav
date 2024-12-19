<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ImageLav - Modern Image Uploader</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .upload-card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        .image-gallery .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .image-gallery img {
            width: 100%;
            height: auto;
            max-height: 100px;
            object-fit: cover;
            /* Maintain aspect ratio */
            display: block;
        }

        .card-body {
            padding: 10px;
            text-align: center;
        }

        .navbar {
            background-color: #007bff;
            color: white;
        }

        .navbar-brand {
            font-weight: bold;
            color: white;
        }

        .navbar-brand:hover {
            color: #dfe6e9;
        }

        .delete-btn {
            color: #dc3545;
            cursor: pointer;
        }

        @media (max-width: 576px) {
            .upload-card {
                margin-top: 20px;
            }

            .image-gallery .card {
                margin-bottom: 15px;
            }
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="#">ImageLav</a>
        </div>
    </nav>

    <!-- Main Container -->
    <div class="container py-4">
        <!-- Header Section -->
        <div class="text-center mb-4">
            <h1 class="fw-bold">Welcome to ImageLav</h1>
            <p class="text-muted">Upload your images and view them in a modern gallery.</p>
        </div>

        <!-- Upload Section -->
        <div class="card upload-card mx-auto mb-5" style="max-width: 500px;">
            <div class="card-body text-center">
                <h5 class="card-title">Upload Image</h5>
                <form action="/upload" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <input type="file" name="image" class="form-control" required>
                    </div>
                    <button type="submit" class="btn btn-primary w-100">Upload</button>
                </form>
                @if (session('success'))
                    <div class="alert alert-success mt-3">{{ session('success') }}</div>
                @endif
            </div>
        </div>

        <!-- Gallery Section -->
        <div>
            <h2 class="fw-bold mb-4 text-center">Image Gallery</h2>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 image-gallery">
                @foreach ($images as $image)
                    <div class="col">
                        <div class="card">
                            <img src="{{ asset('storage/' . $image->file_path) }}" alt="Uploaded Image"
                                class="card-img-top">
                            <div class="card-body">
                                <p class="card-text text-muted mb-1">Uploaded:</p>
                                <p class="card-text fw-bold">{{ $image->created_at->diffForHumans() }}</p>
                                <span class="delete-btn btn btn-outline-danger w-100" data-bs-toggle="modal"
                                    data-bs-target="#deleteModal{{ $image->id }}">
                                    Delete
                                </span>
                            </div>
                        </div>
                    </div>

                    <!-- Delete Confirmation Modal -->
                    <div class="modal fade" id="deleteModal{{ $image->id }}" tabindex="-1"
                        aria-labelledby="deleteModalLabel{{ $image->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel{{ $image->id }}">Confirm Deletion
                                    </h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete this image?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Cancel</button>
                                    <form action="/delete/{{ $image->id }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
