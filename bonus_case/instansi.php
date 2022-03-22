<?php

session_start();

if ($_SESSION['id_user'] != "") {

    include('code/conn.php');

    if ($_GET['logout'] == "true") {
        session_destroy();
        header("location:index.php");
    }

?>

    <!doctype html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
        <meta name="generator" content="Hugo 0.88.1">
        <title>Instansi</title>

        <link rel="canonical" href="https://getbootstrap.com/docs/5.1/examples/sign-in/">

        <!-- Bootstrap core CSS -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet">

    </head>

    <body class="container">

        <h1 class="mt-5">Halaman Instansi
            <a href="?logout=true" class="btn btn-sm btn-danger">Logout</a>
        </h1>

        <form class="row g-3 mt-5 mb-3">
            <div class="col-auto">
                <input type="text" class="form-control form-control-sm" name="search" placeholder="Search" value="<?php echo $_GET['search'] ?>">
            </div>
            <div class="col-auto">
                <button type="submit" value="search" class="btn btn-sm btn-danger">Search</button>
            </div>
        </form>

        <?php

        if ($_GET['create'] == "sukses") {
            echo "
        <div class='alert alert-success' role='alert'>
            Data berhasil ditambahkan.
        </div>
        ";
        } else if ($_GET['create == "update']) {
            echo "
        <div class='alert alert-success' role='alert'>
            Data berhasil diupdate.
        </div>
        ";
        } else if ($_GET['create == "delete']) {
            echo "
    <div class='alert alert-success' role='alert'>
        Data berhasil dihapus.
    </div>
    ";
        }

        ?>

        <div class="card">
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Instansi</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php

                        $no = 0;
                        if (isset($_GET['search'])) {
                            $search = $_GET['search'];
                            $data_instansi = $conn->query("SELECT * FROM tb_instansi WHERE instansi LIKE '%".$search."%' OR deskripsi LIKE '%" . $search . "%'");
                        } else {
                            $data_instansi = $conn->query("SELECT * FROM tb_instansi");
                        }
                        while ($show_instansi = $data_instansi->fetch_assoc()) {

                            $no++;

                            echo "
                        <tr>
                            <th>$no</th>
                            <td>$show_instansi[instansi]</td>
                            <td>$show_instansi[deskripsi]</td>
                            <td>
                                <button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#update' onclick='update($show_instansi[id_instansi])'>Update</button>
                                <button class='btn btn-sm btn-danger' data-bs-toggle='modal' data-bs-target='#delete' onclick='delete_instansi($show_instansi[id_instansi])'>Delete</button>
                            </td>
                        </tr>
                        ";
                        }

                        ?>

                    </tbody>
                </table>
            </div>
        </div>

        <!-- Button trigger modal -->
        <button type="button" class="btn btn-sm btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">
            Create
        </button>

        <!-- Modal Create -->
        <form method="POST" action="code/create.php">
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Create Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">Instansi</label>
                                <input type="text" class="form-control" placeholder="Instansi" name="instansi" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi" required></textarea>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
                            <button type="submit" name="save_instansi" value="save_instansi" class="btn btn-danger">Save</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Update -->
        <form method="POST" action="code/update.php">
            <div class="modal fade" id="update" tabindex="-1" aria-labelledby="updateLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="updateLabel">Create Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="update_modal"></div>
                    </div>
                </div>
            </div>
        </form>

        <!-- Modal Delete -->
        <form method="POST" action="code/delete.php">
            <div class="modal fade" id="delete" tabindex="-1" aria-labelledby="deleteLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="deleteLabel">Create Instansi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div id="delete_modal"></div>
                    </div>
                </div>
            </div>
        </form>

        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/jquery.js"></script>

        <script>
            function update(id_instansi) {
                $('#update_modal').load("code/update_modal.php?id_instansi=" + id_instansi);
            }

            function delete_instansi(id_instansi_dlt) {
                $('#delete_modal').load("code/delete_modal.php?id_instansi=" + id_instansi_dlt);
            }
        </script>

    </body>

    </html>

<?php } else {
    header("location:index.php");
} ?>