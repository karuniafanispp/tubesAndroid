<div id="content" class="span10">
		<ul class="breadcrumb">
			<li>
				<?php $this->load->view('admin/breadcumb.php');?>
			</li>
		</ul>
	<!-- <a href="#tambah" data-toggle="modal" class="btn btn-md btn-primary"><i class="halflings-icon plus white"></i> Tambah</a>
	</br></br> -->
	<div class="row-fluid sortable">
		<!--mahasiswa -->
		<div class="box span12">
			<div class="box-header blue" data-original-title>
				<h2><i class="icon-file"></i><span class="break"></span> <?php echo $langit; ?> Aktif</h2>
			</div>
			</br>
			<?php $data=$this->session->flashdata('m_sukses');
			if($data!=null){
				echo "<div class='alert alert-success'><strong>Sukses!</i></strong>
					".$data."
				</div>";
			} 
			$data2=$this->session->flashdata('m_error');
			if($data2!=null){
				echo "<div class='alert alert-error'><strong>Error!</strong>
					".$data2."
				</div>";
			}?>
			<div class="box-content">
				<table class="table table-striped table-bordered bootstrap-datatable datatable">
					<thead>
						<tr>
							<th>Tahun</th>
							<th>Campaign</th>
							<th>Jumlah Calon</th>
							<th>Jumlah Pemilih</th>
							<th>Mulai Pemilihan</th>
							<th>Selesai Pemilihan</th>
							<th><center>Aksi</center></th>
						</tr>
					  </thead>   
					  <tbody>
						<?php $n=0; foreach($tahun as $row): $n++; ?>
						<tr>
							<td><?php echo $row->tahun;?></td>
							<td><?php echo $nm=$this->m_campaign->cek_id($row->id_campaign)->row_array()['nama_campaign'];?></td>
							<td><?php echo $this->m_calon->jml($row->id_campaign,$row->tahun)->row_array()['jml'];?> Calon</td>
							<td><?php echo $this->m_pemilih->cekjml($row->id_campaign,$row->tahun)->row_array()['sel'];?> Pemilih</td>
							<td><?php echo dt($row->mulai);?></td>
							<td><?php echo dt($row->selesai);?></td>
							<td class="center" >
								<center><a href="<?php echo site_url('hasil/detail/'.$this->uri->segment(3).'/'.$row->tahun);?>" title="<?php echo 'Detail Tahun '.$row->tahun.' Pada Jurusan '.$nm ;?>"
									class="btn btn-default tooltipsku"><i class="halflings-icon search white"></i> Lihat <?php echo $row->tahun; ?></a></center>
							</td>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>    
			</div>
		</div><!--/span-->
	</div>	
</div>
<?php 
	$this->load->view('admin/pemilih/tambahthn.php');
?>