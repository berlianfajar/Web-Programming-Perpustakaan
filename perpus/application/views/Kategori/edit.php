<section class="content">
	<div class="row">
		<div class="col-sm-12">
			<div class="box box-info">
				<div class="box-header">
					<h3 class="box-title">Edit Kategori</h3>
				</div>

				<div class="box-body">
					<form action="<?=site_url('kategori/update');?>" method="post" accept-charset="utf-8">
					<input type="hidden" name="id_kategori" value="<?=$show->id_kategori;?>">
						<div class="box-body">
						<div class="form-group">
							<label>Nama Kategori</label>
							<input type="text" name="nama_kategori" class="form-control" value="<?=$show->nama_kategori;?>" placeholder="Masukan Nama Kategori" required="required">
						</div>
					<!-- /.box-body -->

						<div class="box_footer">
							<button type="button" class="btn btn-default"> <i class="fa fa-arrow-circle-left"></i> Batal</button>
							<button type="submit" class="btn btn-primary pull-right"> <i class="fa fa-send"></i> Update</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</section>