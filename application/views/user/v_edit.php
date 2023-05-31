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
                    
                    <form action="<?php echo base_url().'user/update'?>" method="post">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama_user" name="nama_user" required="required" value="<?= $data['nama_user'] ?>">
                                <input type="hidden" id="id_user" name="id_user" required="required" class="form-control " value="<?= $data['id_user'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="alamat_user" name="alamat_user" required="required" value="<?= $data['alamat_user'] ?>">
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No Hp</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nohp_user" name="nohp_user" required="required" value="<?= $data['nohp_user'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="email_user" name="email_user" required="required" value="<?= $data['email_user'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Password</label>
                            <div class="col-sm-4">
                                <input type="password" class="form-control" id="password_user" name="password_user" required="required" value="<?= $data['password_user'] ?>">
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