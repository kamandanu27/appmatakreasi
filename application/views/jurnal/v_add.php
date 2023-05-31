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
                    
                    <form action="<?php echo base_url().'jurnal/insert'?>" method="post" enctype="multipart/form-data">
                    

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tgl_jurnal" name="tgl_jurnal" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Debit</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="debit_jurnal" name="debit_jurnal" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kredit</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kredit_jurnal" name="kredit_jurnal" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Keterangan</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="keterangan_jurnal" name="keterangan_jurnal" required="required">
                            </div>
                        </div>

                        <div class="form-group">
									<label for="exampleInputEmail1">Akun :</label>
									<select class="form-control" id="id_akun" name="id_akun">
										<option value="">Pilih</option>
										<?php foreach($list_akun as $row){ ?>
											<option value="<?= $row->id_akun ?>"><?= $row->nama_akun ?></option>
										<?php } ?>
									</select>
								</div>

                       <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Periode</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="periode_jurnal" name="periode_jurnal" required="required">
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