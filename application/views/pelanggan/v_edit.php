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
                <li class="breadcrumb-item" style="float: left;"><a href="<?= base_url() ?>"><?= $judul ?></a>
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
                    <h4 class="sub-title"></h4>
                    
                    <form action="<?php echo base_url().'pelanggan/update'?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pelanggana</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required="required" value="<?= $data['nama_pelanggan'] ?>">
                                <input type="hidden" id="id_pelanggan" name="id_pelanggan" required="required" class="form-control " value="<?= $data['id_pelanggan'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="alamat_pelanggan" name="alamat_pelanggan" required="required" value="<?= $data['alamat_pelanggan'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No Telp</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="notlp_pelanggan" name="notlp_pelanggan" required="required" value="<?= $data['notlp_pelanggan'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email_pelanggan" name="email_pelanggan" required="required" value="<?= $data['email_pelanggan'] ?>">
                            </div>
                        </div>                

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto Pelanggan</label>
                            <div class="col-sm-4">
                             <input type="file" class="form-control" id="foto_pelanggan" name="foto_pelanggan" id="exampleInputUpload Foto1" placeholder="Upload Foto">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2"></label>
                            <div class="col-sm-6">
                                <button type="submit" class="btn btn-primary m-b-0">Simpan</button>
                            </div>
                            
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>