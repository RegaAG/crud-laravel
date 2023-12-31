<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crud Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <h1>Tambah Data</h1>

        <form method="post" action="/mahasiswa" enctype="multipart/form-data">
            @csrf
            <div class="my-3">
                <h5>Nama : </h5>
                <input type="text" name="nama" id="nama" placeholder="Masukan Nama" autocomplete="off"
                    required>
            </div>
            <div class="my-3">
                <h5>NIM : </h5>
                <input type="text" name="nim" id="nim" placeholder="Masukan NIM" autocomplete="off"
                    required>
            </div>
            <div class="my-3">
                <h5>Prodi : </h5>
                <input type="text" name="prodi" id="prodi" placeholder="Masukan Prodi" autocomplete="off"
                    required>
            </div>
            <div class="my-3">
                <h5>Foto : </h5>
                <input type="file" name="foto" id="foto" required>
            </div>
            <button class="btn btn-primary mt-5" type="submit">Submit</button>
        </form>


    </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
</script>

</html>
