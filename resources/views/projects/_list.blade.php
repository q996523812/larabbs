@if (count($projects))
  <ul class="list-unstyled">
    @foreach ($projects as $project)
      <li class="media">
 

        <div class="media-body">

          <div class="media-heading mt-0 mb-1">
            <!--<a href="{{ route('projects.show', [$project->id]) }}" title="{{ $project->title }}">-->
            <a href="{{ $project->link() }}" title="{{ $project->title }}">
              {{ $project->title }}
            </a>
            <!--<a class="float-right" href="{{ route('projects.show', [$project->id]) }}">-->
            <a href="{{ $project->link() }}" title="点击量：{{ $project->djl }}">
              <span class="badge badge-secondary badge-pill"> {{ $project->djl }} </span>
            </a>
          </div>

          <small class="media-body meta text-secondary">

            <i class="far fa-clock"></i>
            <span class="text-secondary">
            	挂牌日期：从 {{ $project->gp_date_start}} 到 {{ $project->gp_date_end }}
            </span>

            <span>  •  </span>

            <i class="far fa-money"></i>
            <span class="text-secondary">
            	挂牌底价：{{ $project->price}}
            </span>

            <span>  •  </span>

            <i class="far fa-folder"></i>
            <span class="timeago">{{ get_project_type_name($project->type) }}</span>
          </small>

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