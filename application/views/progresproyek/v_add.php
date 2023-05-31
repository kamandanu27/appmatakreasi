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
                    
                    <form action="<?php echo base_url().'progresproyek/insert'?>" method="post" enctype="multipart/form-data">
                    


                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Nama Proyek</label>
                            <div class="col-sm-4">
                                <select id="id_proyek" name="id_proyek" class="form-control" required>
									<option value="">- Pilih -</option>
									<?php foreach($proyek as $row){ ?>
										<option value="<?= $row->id_proyek ?>"><?= $row->nama_proyek ?></option>
										<?php } ?>
								</select>
                            </div>    
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tanggal Progres Proyek</label>
                            <div class="col-sm-4">
                                <input type="date" class="form-control" id="tgl_progres" name="tgl_progres" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Aktifitas Proyek</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="aktifitas_proyek" name="aktifitas_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Kendala Proyek</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" id="kendala_proyek" name="kendala_proyek" required="required">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Upload Foto Pencapaian Proyek</label>
                            <div class="col-sm-4">
                             <input type="file" class="form-control" id="foto_pencapaian" name="foto_pencapaian" id="exampleInputUpload Foto1" placeholder="Upload Foto">
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