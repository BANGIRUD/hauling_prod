<table class="table table-responsive">
	<thead>
	<tr>
		<th>Time</th>
		<th>No Unit</th>
		<th>Cargo</th>
		<th>CSA</th>
		<th>Time Overshift</th>
	</tr>
	</thead>
	<tbody>
		<?php foreach ($listData->result_array() as $value): $color = explode(',', $value['color'])?>
		<tr>
			<td><?= date('H:i',strtotime($value['time']));?></td>
			<td><?= $value['cn_unit'];?></td>
			<td style="background-color: <?=$color[0];?>; color: <?=@$color[1];?>;"><?= $value['cargo'];?></td>
			<td><?= $value['csa'];?></td>
			<td><?= $value['csa_time'];?></td>
		</tr>
		<?php endforeach;?>
	</tbody>

</table>