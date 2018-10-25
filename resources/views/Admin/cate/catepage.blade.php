<div id="uid">
<table class="table table-border table-bordered table-hover table-bg table-sort">
	<thead>
		<tr class="text-c">
			<th width="25"><input type="checkbox" name="" value=""></th>
			<th width="80">ID</th>
			<th width="150">分类名称</th>
			<th>pid</th>
			<th>path</th>
			<th>level</th>
			<th width="100">操作</th>
		</tr>
	</thead>
	<tbody>
	@foreach($data as $v)
		<tr class="text-c">
			<td><input type="checkbox" name="" value=""></td>
			<td>{{$v->id}}</td>
			<td class="text-l">{{$v->name}}</td>
			<td>{{$v->pid}}</td>
			<td>{{$v->path}}</td>
			<td>{{$v->level}}</td>

			
			<td class="f-14"><a title="编辑" href="javascript:;" onclick="system_category_edit('分类编辑','/admin/admincates/{{$v->id}}/edit','1','700','480')" style="text-decoration:none"><i class="Hui-iconfont">&#xe6df;</i></a>
				<a title="删除" href="javascript:;" onclick="system_category_del(this,'{{$v->id}}')" class="ml-5" style="text-decoration:none"><i class="Hui-iconfont">&#xe6e2;</i></a></td>
		</tr>
	@endforeach
	</tbody>
</table>
</div>
		
