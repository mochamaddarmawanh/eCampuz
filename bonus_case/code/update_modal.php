<!-- Modal Update -->

<?php

include('conn.php');

$data_update = $conn->query("SELECT * FROM tb_instansi WHERE id_instansi = '$_GET[id_instansi]'");
$show_update = $data_update->fetch_assoc();

?>

<div class="modal-body">

<input type="hidden" name="id_instansi" value="<?php echo $_GET['id_instansi'] ?>">

    <div class="mb-3">
        <label class="form-label">Instansi</label>
        <input type="text" class="form-control" placeholder="Instansi" name="instansi" required value="<?php echo $show_update['instansi'] ?>">
    </div>
    <div class="mb-3">
        <label class="form-label">Deskripsi</label>
        <textarea class="form-control" rows="3" placeholder="Deskripsi" name="deskripsi" required><?php echo $show_update['deskripsi'] ?></textarea>
    </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
    <button type="submit" name="update" value="update" class="btn btn-danger">Update</button>
</div>