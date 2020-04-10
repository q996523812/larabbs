
@extends('layouts.app')

@section('content')

	<div class="row clearfix">
		<div class="col-md-9 column">
			<div class="page-header">
				<span style="font-size:40px;">
					{{ $project->title }} <small></small>
				</span>
				<span class="badge badge-secondary badge-pill">围观数 {{ $project->djl }} </span>
			</div>
			<div class="panel panel-default">
				<div class="panel-heading">
					<div>转让底价：<font style="font-size: 30px;">{{ $project->price }}</font> 万元</div>
					<div class="row">
						<div class="col-md-3">项目编号：{{ $project->xmbh }}</div>
						<div class="col-md-3">保证金：{{ $project->price }}</div>
					</div>
					<div>转让方：{{ $project->price }}</div>
					<div>挂牌起止日期：{{ $project->gp_date_start }} 至 {{ $project->gp_date_end }}</div>
				</div>
				<div class="panel-body table-responsive">
					
				</div>
				<div class="panel-footer">
					
				</div>
			</div>
			
		</div>
	</div>

	<div class="row clearfix">
		<div class="col-md-9">
			<table class="project-table table">
				<thead class="thead">
			        <tr>
			        	<th style="width:25%;"></th>
			        	<th style="width:25%;"></th>
			        	<th style="width:25%;"></th>
			        	<th style="width:25%;"></th>
			        </tr>
			    </thead> 
				<tbody>
					@include('projects.'.$project->type.'._jcxx')
					@include('projects.fsxx._wtf')

					@if($project->type == 'qycg')

					@elseif($project->type == 'zczl')

					@elseif($project->type == 'cqzr')
						@include('projects.fsxx._bdqy')
					@elseif($project->type == 'zczr')

					@elseif($project->type == 'zzkg')
						@include('projects.fsxx._sjbg')
						@include('projects.fsxx._cwbb')
					@endif

					@include('projects.fsxx._lxfs')
				</tbody>
			</table>
		</div>
	</div>
@endsection