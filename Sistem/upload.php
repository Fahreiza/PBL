<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <style>
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>

<body>
<div class="container-fluid">
            <button class="btn btn-outline-light me-2" id="sidebarToggle">
                <ion-icon name="menu-outline"></ion-icon>
            </button>
            <span class="navbar-brand">SIBATTA</span>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
<div id="sidebar">
        <div class="text-center p-3">
            <img src="css/images/logo_Polinema.png" alt="Logo" width="50" height="40" class="img-fluid">
            <h5 class="mt-2 text-dark">SIBATTA</h5>
        </div>
        <ul class="nav flex-column">
            <li class="nav-item mb-3">
                <a class="nav-link text-dark d-flex align-items-center" href="#">
                    <ion-icon name="home-outline" class="me-2"></ion-icon> <span>Beranda</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link text-dark d-flex align-items-center" href="upload.php">
                    <ion-icon name="information-circle-outline" class="me-2"></ion-icon> <span>Info</span>
                </a>
            </li>
            <li class="nav-item mb-3">
                <a class="nav-link text-dark d-flex align-items-center" href="#">
                    <ion-icon name="time-outline" class="me-2"></ion-icon> <span>History</span>
                </a>
            </li>
        </ul>
    </div>
</div>
    <div class="container mt-4">
        <h1>File Upload</h1>
        <!-- Form Upload -->
        <form id="uploadForm" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="fileInput" class="form-label">Select Files</label>
                <input type="file" class="form-control" id="fileInput" name="files[]" multiple>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>

        <!-- Tabel untuk menampilkan file yang diupload -->
        <div class="table-container">
            <h3>Uploaded Files</h3>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">File Name</th>
                        <th scope="col">File Size</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody id="fileList">
                    <!-- Daftar file akan ditambahkan di sini -->
                </tbody>
            </table>
        </div>
    </div>

    <!-- Optional JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('uploadForm').addEventListener('submit', function(event) {
            event.preventDefault();

            const fileInput = document.getElementById('fileInput');
            const fileList = document.getElementById('fileList');

            const files = fileInput.files;
            if (files.length === 0) {
                alert('Please select at least one file to upload.');
                return;
            }

            // Menambahkan file yang diupload ke tabel
            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const row = document.createElement('tr');

                // Membuat elemen tabel untuk setiap file
                row.innerHTML = `
                    <td>${i + 1}</td>
                    <td>${file.name}</td>
                    <td>${(file.size / 1024).toFixed(2)} KB</td>
                    <td><button class="btn btn-danger btn-sm" onclick="deleteFileRow(this)">Delete</button></td>
                `;
                fileList.appendChild(row);
            }

            // Reset form setelah upload
            fileInput.value = '';
        });

        // Fungsi untuk menghapus baris file dari tabel
        function deleteFileRow(button) {
            const row = button.closest('tr');
            row.remove();
        }
    </script>
</body>

</html>
