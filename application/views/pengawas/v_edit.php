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
                    
                    <form action="<?php echo base_url().'pengawas/update'?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pengawas</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama_pengawas" name="nama_pengawas" required="required" value="<?= $data['nama_pengawas'] ?>">
                                <input type="hidden" id="id_pengawas" name="id_pengawas" required="required" class="form-control " value="<?= $data['id_pengawas'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No Telp</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="notlp_pengawas" name="notlp_pengawas" required="required" value="<?= $data['notlp_pengawas'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email_pengawas" name="email_pengawas" required="required" value="<?= $data['email_pengawas'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">User Name</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="username_pengawas" name="username_pengawas" required="required" value="<?= $data['username_pengawas'] ?>">
                            </div>
                        </div>
                    
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="password_pengawas" name="password_pengawas" required="required" value="<?= $data['password_pengawas'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Foto Pengawasan</label>
                            <div class="col-sm-4">
                             <input type="file" class="form-control" id="foto_pengawasan" name="foto_pengawasan" id="exampleInputUpload Foto1" placeholder="Upload Foto">
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