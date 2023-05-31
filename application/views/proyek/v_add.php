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
                    
                    <form action="<?php echo base_url().'proyek/insert'?>" method="post">

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">No Proyek</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="no_proyek" name="no_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Proyek</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="nama_proyek" name="nama_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Alamat</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="alamat_proyek" name="alamat_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Anggaran Proyek</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="anggaran_proyek" name="anggaran_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Persetujuan Proyek</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglpersetujuan_proyek" name="tglpersetujuan_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Mulai Proyek</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglmulai_proyek" name="tglmulai_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Selesai Proyek</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tglselesai_proyek" name="tglselesai_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pelanggan</label>
                            <div class="col-sm-4">
                                <select id="id_pelanggan" name="id_pelanggan" class="form-control" required>
									<option value="">- Pilih -</option>
									<?php foreach($pelanggan as $row){ ?>
										<option value="<?= $row->id_pelanggan ?>"><?= $row->nama_pelanggan ?></option>
										<?php } ?>
								</select>
                            </div>    
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Pengawas</label>
                            <div class="col-sm-4">
                                <select id="id_pengawas" name="id_pengawas" class="form-control" required>
									<option value="">- Pilih -</option>
									<?php foreach($pengawas as $row){ ?>
										<option value="<?= $row->id_pengawas ?>"><?= $row->nama_pengawas ?></option>
										<?php } ?>
								</select>
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