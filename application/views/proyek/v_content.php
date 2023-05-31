<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                <div class="d-inline">
                    <h4><?= $judul ?></h4>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                <li class="breadcrumb-item" style="float: left;">
                <a href="<?= base_url() ?>dashboard"> <i class="feather icon-home"></i> </a>
                </li>
                <li class="breadcrumb-item" style="float: left;"><a href="<?= base_url() ?>proyek"><?= $judul ?></a>
                </li>
                </ul>
            </div>
        </div>
    </div>
</div>


<div class="page-body">
    <div class="row">
        <div class="col-sm-12">

            <div class="card">
                <div class="card-block">
                    <?php
                    echo validation_errors('<div class="alert alert-danger alert-dismissible">','</div>');
                    if ($this->session->flashdata('success'))
                    {
                        echo '<div class="alert alert-success alert-dismissible " role="alert">';
                        echo $this->session->flashdata('success');
                        echo '</div>';
                    }
                    if ($this->session->flashdata('error'))
                    {
                        echo '<div class="alert alert-danger alert-dismissible " role="alert">';
                        echo $this->session->flashdata('error');
                        echo '</div>';
                    }

                    ?>
                    
                    <ul class="nav navbar-right panel_toolbox">
                        
                            <p><a href="<?= base_url(); ?>proyek/add" class="btn btn-success icon-btn"><i class="icofont icofont-ui-add"></i> Tambah Data</a></p>
                        
                    </ul>

                    <div class="dt-responsive table-responsive">
                        <table id="basic-btn" class="table table-striped table-bordered nowrap">
                            <thead>
                                <tr>
                                    <th style="width: 10%;">No.</th>
                                    <th style="width: 20%;">No Proyek</th>
                                    <th style="width: 20%;">Nama Proyek</th>
                                    <th style="width: 20%;">Alamat</th>
                                    <th style="width: 20%;">Anggaran Proyek</th>
                                    <th style="width: 20%;">Tanggal Persetujuan Proyek</th>
                                    <th style="width: 20%;">Tanggal Mulai Proyek</th>
                                    <th style="width: 20%;">Tanggal Selesai Proyek</th>
                                    <th style="width: 20%;">Keterangan Proyek</th>
                                    <th style="width: 20%;">Nama Pelanggan</th>
                                    <th style="width: 20%;">Nama Pengawas</th>
                                    <th style="width: 20%;">Aksi</th>
                                </tr>
                            </thead>


                            <tbody>
                                <?php $no=1; foreach($data as $row){?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $row->no_proyek ?></td>
                                    <td><?= $row->nama_proyek ?></td>
                                    <td><?= $row->alamat_proyek ?></td>
                                    <td><?= $row->anggaran_proyek ?></td>
                                    <td><?= $row->tglpersetujuan_proyek ?></td>
                                    <td><?= $row->tglmulai_proyek ?></td>
                                    <td><?= $row->tglselesai_proyek ?></td>
                                    <td><?= $row->keterangan_proyek ?></td>
                                    <td><?= $row->nama_pelanggan ?></td>
                                    <td><?= $row->nama_pengawas ?></td>
                                    <td>
                                    
                                    <a href="<?= base_url(); ?>proyek/edit/<?= $row->id_proyek ?>" type="submit" class="btn btn-sm btn-warning" id="<?= $row->id_proyek ?>"><i class="fa fa-lg fa-edit"></i> Edit</a>

                                    <a type="submit" class="btn btn-sm btn-danger btnhapus" data-id="<?= $row->id_proyek ?>"><i class="fa fa-lg fa-trash"></i> Hapus</a></td>
                                    
                                    
                                </tr>
                                <?php } ?> 
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



        </div>
    </div>
</div>