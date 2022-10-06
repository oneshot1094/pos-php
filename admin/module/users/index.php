 <!--sidebar end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <?php 
		  $hasil = $lihat -> member_all();
      ?>
      <section id="main-content">
          <section class="wrapper">

              <div class="row">
                  <div class="col-lg-12 main-chart">
						<h3>Data User</h3>
						<br/>
						<?php if(isset($_GET['success-tambah'])){?>
						<div class="alert alert-success">
							<p>Tambah User Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['success-edit'])){?>
						<div class="alert alert-success">
							<p>Edit Data Berhasil !</p>
						</div>
						<?php }?>
						<?php if(isset($_GET['remove'])){?>
						<div class="alert alert-danger">
							<p>Hapus Data Berhasil !</p>
						</div>
						<?php }?>

						<!-- Trigger the modal with a button -->
						
						<button type="button" class="btn btn-primary btn-md pull-right" data-toggle="modal" data-target="#myModal">
							<i class="fa fa-plus"></i> Insert Data</button>
						<div class="clearfix"></div>
						<br/>
						
						<!-- view barang -->	
						<div class="modal-view">
							<table class="table table-bordered table-striped" id="example1">
								<thead>
									<tr style="background:#DFF0D8;color:#333;">
										<th>No.</th>
										<th>ID User</th>
										<th>Nama</th>
										<th>Username</th>
										<th>Alamat</th>
										<th>Telepon</th>
										<th>Email</th>
										<th>Photo</th>
										<th>NIK</th>
										<th>Role</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>

								<?php 
									$no=1;
									foreach($hasil as $isi) {
								?>
									<tr>
										<td><?php echo $no;?></td>
										<td><?php echo $isi['id_member'];?></td>
										<td><?php echo $isi['nm_member'];?></td>
										<td><?php echo $isi['user'];?></td>
										<td><?php echo $isi['alamat_member'];?></td>
										<td><?php echo $isi['telepon'];?></td>
										<td><?php echo $isi['email'];?></td>
                                        <td><img src="assets/img/user/<?php echo $isi['gambar'];?>" class="img-circle" width="100" height="100"></td>
                                        <td><?php echo $isi['NIK'];?></td>
										<td><?php echo $isi['role'] == 1 ? 'Admin' : ($isi['role'] == 2 ? 'Kasir' : 'Pimpinan');?></td>
										<td>
											<a href="index.php?page=users/edit&users=<?php echo $isi['id_member'];?>"><button class="btn btn-warning btn-xs">Edit</button></a>
											<a href="fungsi/hapus/hapus.php?users=hapus&id=<?php echo $isi['id_member'];?>" onclick="javascript:return confirm('Hapus Data user ?');"><button class="btn btn-danger btn-xs">Hapus</button></a>
                                        </td>
									</tr>
								<?php 
									}
								?>
								</tbody>
							</table>
						</div>
						<div class="clearfix" style="margin-top:7pc;"></div>
					<!-- end view barang -->
					<!-- tambah barang MODALS-->
						<!-- Modal -->
					
						<div id="myModal" class="modal fade" role="dialog">
							<div class="modal-dialog">
								<!-- Modal content-->
								<div class="modal-content" style=" border-radius:0px;">
								<div class="modal-header" style="background:#285c64;color:#fff;">
									<button type="button" class="close" data-dismiss="modal">&times;</button>
									<h4 class="modal-title"><i class="fa fa-plus"></i> Tambah User</h4>
								</div>										
								<form action="fungsi/tambah/tambah.php?users=tambah" method="POST">
									<div class="modal-body">
								
										<table class="table table-striped bordered">
											<tr>
												<td>Nama User</td>
												<td><input type="text" placeholder="Nama User" required class="form-control" name="nama"></td>
											</tr>
											<tr>
												<td>Username</td>
												<td><input type="text" placeholder="Username" required class="form-control" name="username"></td>
											</tr>
											<tr>
												<td>Alamat</td>
												<td><input type="text" placeholder="Alamat" required class="form-control" name="alamat"></td>
											</tr>
											<tr>
												<td>Telepon</td>
												<td><input type="number" placeholder="Telepon" required class="form-control" name="telepon"></td>
											</tr>
											<tr>
												<td>Email</td>
												<td><input type="text" placeholder="Email" required class="form-control" name="email"></td>
											</tr>
											<tr>
												<td>NIK</td>
												<td><input type="number" placeholder="NIK" required class="form-control" name="nik"></td>
											</tr>
											<tr>
												<td>Password</td>
												<td><input type="password" placeholder="password" required class="form-control" name="password"></td>
											</tr>
											<tr>
												<td>Role</td>
												<td>
													<select name="role" id="role" class="form-control">
														<option value="1">Admin</option>
														<option value="2">Kasir</option>
													</select>
												</td>
											</tr>
										</table>
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Insert Data</button>
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
						
					</div>
              	</div>
          	</section>
      	</section>
	
