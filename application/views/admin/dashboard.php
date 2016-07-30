<?php include('admin_header.php'); ?>
<div class="container">
	
    <div class="row">
     <div class="col-lg-6 col-lg-offset-3">
     <?= anchor('admin/store_article','Add Article',['class'=>'btn btn-default']) ?>
     </div>	
    </div>
    <?php if($error=$this->session->flashdata('feedback')):?>
    <div class="row">
     <div class="col-lg-6">
     <div class="alert alert-dismissible alert-danger">
   <!--  <button type="button" class="close" data-dismiss="alert">X</button>
      <strong>Oh snap!</strong> <a href="#" class="alert-link">Change a few things up</a> and try submitting again.-->
      <?= $error ?>
      </div>
      </div>
    </div>
<?php endif; ?>
	<table class="table">
		<thead>
			<th>S No.</th>
			<th>Title</th>
			<th>Action</th>
		</thead>
		<tbody>
		<?php  
		if(count($arti)){
			$count = $this->uri->segment(3);
			foreach ($arti as $var_arti) {
		?>
			<tr>
				<td><?= ++$count?></td>
				<td><?= $var_arti->title ?></td>
				<td>
					<!--<a href="" class="btn btn-primary">Edit</a>
					<a href="" class="btn btn-danger">Delete</a> -->
					<?= anchor("admin/edit_article/{$var_arti->id}",'Edit',['class'=>'btn btn-primary']) ?>
					<?= anchor("admin/delete_article/{$var_arti->id}",'Delete',['class'=>'btn btn-danger']) ?>
				</td>
			</tr>
		<?php  
			}
		}	
			else { ?>
			<tr>
				<td colspan="3">
					No Records Found
				</td>
			</tr>
		<?php
		}	
		?>	
		</tbody>
	</table>
	<?= $this->pagination->create_links();?>
</div>
<?php include('admin_footer.php'); ?>