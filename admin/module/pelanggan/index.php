 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data Pelanggan</h3>
						<br/>
						<?php if(isset($_GET['success'])){?>
						<div class="alert alert-success">
							<p>Tambah Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success-edit'])){?>
						<div class="alert alert-success">
							<p>Update Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>
						<?php 
							if(!empty($_GET['uid'])){
							$sql = "SELECT * FROM pelanggan WHERE id_pelanggan = ?";
							$row = $config->prepare($sql);
							$row->execute(array($_GET['uid']));
							$edit = $row->fetch();
						?>
						<form method="POST" action="fungsi/edit/edit.php?pelanggan=edit">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['nama_pelanggan'];?>" required name="pelanggan" placeholder="Masukan Pelanggan Baru">
										<input type="hidden" name="id" value="<?= $edit['id_pelanggan'];?>">
									</td>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['alamat_pelanggan'];?>" required name="alamat" placeholder="Masukan Alamat"></td>
									<td style="width:15pc;"><input type="text" class="form-control" value="<?= $edit['telepon'];?>" required name="telepon" placeholder="Masukan Telepon"></td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-edit"></i> Ubah Data</button></td>
								</tr>
							</table>
						</form>
						<?php }else{?>
						<form method="POST" action="fungsi/tambah/tambah.php?pelanggan=tambah">
							<table>
								<tr>
									<td style="width:15pc;"><input type="text" class="form-control" required name="pelanggan" placeholder="Masukan Pelanggan Barang Baru"></td>
									<td style="width:15pc;"><input type="text" class="form-control" required name="alamat" placeholder="Masukan Alamat Pelanggan"></td>
									<td style="width:15pc;"><input type="text" class="form-control" required name="telepon" placeholder="Masukan Telepon Pelanggan"></td>
									<td style="padding-left:10px;"><button id="tombol-simpan" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button></td>
								</tr>
							</table>
						</form>
						<?php }?>
						<br/>
						<table class="table table-bordered" id="example1">
							<thead>
								<tr style="background:#DFF0D8;color:#333;">
									<th>No.</th>
									<th>Pelanggan</th>
									<th>Alamat Pelanggan</th>
									<th>Telepon</th>
									<th>Tanggal Input</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<tbody>
							<?php 
								$hasil = $lihat -> pelanggan();
								$no=1;
								foreach($hasil as $isi){
							?>
								<tr>
									<td><?php echo $no;?></td>
									<td><?php echo $isi['nama_pelanggan'];?></td>
									<td><?php echo $isi['alamat_pelanggan'];?></td>
									<td><?php echo $isi['telepon'];?></td>
									<td><?php echo $isi['tgl_input'];?></td>
									<td>
										<a href="index.php?page=pelanggan&uid=<?php echo $isi['id_pelanggan'];?>"><button class="btn btn-warning">Edit</button></a>
										<a href="fungsi/hapus/hapus.php?pelanggan=hapus&id=<?php echo $isi['id_pelanggan'];?>" onclick="javascript:return confirm('Hapus Data Pelanggan ?');"><button class="btn btn-danger">Hapus</button></a>
									</td>
								</tr>
							<?php $no++; }?>
							</tbody>
						</table>
						<div class="clearfix" style="padding-top:16%;"></div>
				  </div>
              </div>
          </section>
      </section>
	
