<?php include('public_header.php');?>
<div class='container'>
<h1>Search Results</h1>
<hr>
<table class="table">
		<thead>
			<th>S No.</th>
			<th>Title</th>
			<th>Published On</th>
		</thead>
		<tbody>
		<?php  
		if(count($articles)){
			$count = $this->uri->segment(3);
			foreach ($articles as $article) {
		?>
			<tr>
				<td><?= ++$count?></td>
				<td><?= $article->title ?></td>
				<td>Date</td>
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
<!--	<?= $this->pagination->create_links(); ?> -->
 </div>
<?php include('public_footer.php');?>