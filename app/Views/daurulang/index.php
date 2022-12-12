
<div class="content-wrapper" style="min-height: 1302.12px;">
<div class="container">
    <div class="card">
        <div class="card-header">
            <h3>Data Buku Preloved</h3>
        </div>
        <div class="card-body">
            <?php if (!empty(session()->getFlashdata('message'))) : ?>
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <?php echo session()->getFlashdata('message'); ?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            <?php endif; ?>
            <a href="<?= base_url('/daur_ulang/create'); ?>" class="btn btn-primary">Tambah</a>
            <hr />
            <table class="table table-bordered">
                <tr>
                    <th>No</th>
                    <th>batch</th>
                    <th>Alamat</th>
                    <th>Keterangan</th>
                    <th>Cover</th>
                    <th>Action</th>
                </tr>
                <?php if(!empty($daurulangs)):?>
                    <?php 
                    $no = 1;
                    foreach ($daurulangs  as $row):?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $row['batch'] ?></td>
                            <td><?= $row['alamat'] ?></td>
                            <td><?= $row['keterangan'] ?></td>
                            <td>
                            <img width="auto" height="120" src="<?= base_url('uploads/images/users/'.$row["image"]);?>" alt="">  
                            </td>
                            <td>
                                <a class="btn btn-primary" href="<?= base_url('daur_ulang/edit/'.$row['id_daur_ulang']) ?>" role="button">Edit</a>
                                <a class="btn btn-danger" onclick="return confirm('yakin ingin menghapus data.');" href="<?= base_url('daur_ulang/delete/'.$row['id_daur_ulang']) ?>" role="button">Delete</a>
                            </td>
                        </tr>
                    <?php endforeach;?>
                <?php else: ?>
                    <div class="text-center">
                       <div class="alert alert-danger" role="alert">
                           <strong>No Data</strong>
                       </div>
                    </div>
                <?php endif; ?>
            </table>
        </div>
    </div>
</div>
</div>