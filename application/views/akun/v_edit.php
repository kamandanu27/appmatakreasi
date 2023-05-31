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
                    
                    <form action="<?php echo base_url().'akun/update'?>" method="post" enctype="multipart/form-data">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kode Akun</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kode_akun" name="kode_akun" required="required" value="<?= $data['kode_akun'] ?>">
                                <input type="hidden" id="id_akun" name="id_akun" required="required" class="form-control " value="<?= $data['id_akun'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Akun</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama_akun" name="nama_akun" required="required" value="<?= $data['nama_akun'] ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Saldo Awal</label>
                            <div class="col-sm-4">
                                <input type="number" class="form-control" id="saldo_akun" name="saldo_akun" required="required" value="<?= $data['saldo_akun'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
												<label for="exampleInputEmail1">D / K:</label>
												<select class="form-control" id="dk" name="dk">
													<option value="">Pilih</option>
													<option value="Debit">Debit</option>
													<option value="Kredit">Kredit</option>
                                                    <option value="Debit / Kredit">Debit / Kredit</option>
												</select>
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