@if (count($projects))
  <ul class="list-unstyled">
    @foreach ($projects as $project)
      <li class="media">
 

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <!--<a href="{{ route('projects.show', [$project->id]) }}" title="{{ $project->title }}">-->
            <a href="{{ $project->link() }}" title="{{ $project->title }}" style="font-size:22px;">
              {{ $project->title }}
            </a>
            <span class="badge badge-secondary badge-pill float-right" title="点击量：{{ $project->djl }}"> {{ $project->djl }} </span>
          </div>

          <div class="media-body meta text-secondary" style="font-size:16px;margin-top:15px;">
            <span>
              <i class="far fa-money"></i>
              <span class="text-secondary">
                挂牌底价：<font style="color: red; font-size:20px;">{{ $project->price}}</font>  万元
              </span>
            </span>
            <span class="float-right">
              <i class="far fa-clock"></i>
              <span class="text-secondary">
              	挂牌日期：从  {{ $project->gp_date_start}}  到  {{ $project->gp_date_end }}
              </span>
            </span>
            
          </div>
          <div style="font-size:13px;margin-top:15px;">
            <span class="float-right">{{ get_project_type_name($project->type) }}</span>
          </div>
        </div>
      </li>

      @if ( ! $loop->last)
        <hr>
      @endif

    @endforeach
  </ul>

@else
  <div class="empty-block">暂无数据 ~_~ </div>
@endif

<div id="list">
 
</div>
<script type="text/javascript">
	$(document).ready(function(){
		function getList(){
			$.ajax({
	            type : "post",
	            url : "http://zhaeec.test/api/project/list",
	            data : {},
	            cache: false,
	            processData: false,
	            contentType: false,
	            success : function(str_reponse){
	            	console.log(str_reponse);
	            	// $('#list').
	              	//str_reponse.message.id
	            },
	            error : function(XMLHttpRequest,err,e){
	              $("button").removeAttr("disabled");
	              //error(XMLHttpRequest);
	              console.log(XMLHttpRequest);
	            }
          	});
		}
		getList();
	});
</script>