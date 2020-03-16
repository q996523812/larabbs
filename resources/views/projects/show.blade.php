
@extends('layouts.app')

@section('content')

<div class="container">
	<div class="row clearfix">
		<div class="col-md-12 column">
			<div class="page-header">
				<h1>
					{{ $project->title }} <small>Subtext for header</small>
				</h1>
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
				<div class="panel-body">
					@include('projects.'.$project->type.'._jcxx')
				</div>
				<div class="panel-footer">
					
				</div>
			</div>
			
		</div>
	</div>
</div>
@endsection