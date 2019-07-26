<!-- Begin Page Content -->
<div class="container-fluid">

	<!-- Page Heading -->
	<h1 class="h3 mb-2 text-gray-800">Subscribers</h1>
	<p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more
		information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official
			DataTables documentation</a>.</p>

	<!-- DataTales Example -->
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h6 class="m-0 font-weight-bold text-primary">Subscribers</h6>
		</div>
		<div class="card-body">
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
					<thead>
						<tr>
							<th>#</th>
							<th>Email</th>
							<th>Date</th>
						</tr>
					</thead>
					<tfoot>
						<tr>
							<th>#</th>
							<th>Email</th>
							<th>Date</th>
						</tr>
					</tfoot>
					<tbody>
						<?php foreach ($subscribers as $sub) : ?>
						<tr>
							<th><?=$sub->id?></th>
							<th><?=$sub->email?></th>
							<th><?=$sub->create_at?></th>
						</tr>
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>

</div>
<!-- /.container-fluid -->