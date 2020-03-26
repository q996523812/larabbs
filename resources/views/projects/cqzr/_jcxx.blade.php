		<tr>
			<th colspan="4" class="title">项目信息</th>
		</tr>
		<tr>
			<th class="control-label">项目编号</th>
			<td colspan="3">{{$detail->xmbh}}</td>
		</tr>
		<tr>
			<th>项目名称</th>
			<td colspan="3">{{$detail->title}}</td>
		</tr>
		<tr>
			<th>转让底价（万元）</th>
			<td>{{$detail->gpjg}}</td>
			<th>债权金额（万元）</th>
			<td>{{$detail->bidPrice}}</td>
		</tr>
		<tr>
			<th>拟转让比例（总）</th>
			<td>{{$detail->sellPercent}}</td>
			<th>拟转让股份数（总）</th>
			<td>{{$detail->proExt1}}</td>
		</tr>
		<tr>
			<th>是否导致转让标的企业的实际控制权发生转移</th>
			<td>{{getDicName('sf',$detail->ifControlTrans)}}</td>
			<th>产权隶属关系</th>
			<td>{{getDicName('pauseText',$detail->pauseText)}}</td>
		</tr>
		<tr>
			<th>合作机构信息</th>
			<td colspan="3">{{$detail->spare4}}</td>
		</tr>
		<tr>
			<th>项目概述</th>
			<td colspan="3">{{$detail->proDesc}}</td>
		</tr>
		<tr>
			<th>挂牌公告期</th>
			<td colspan="3">从 {{format_date($detail->gp_date_start)}} 至 {{format_date($detail->gp_date_end)}}</td>
		</tr>
		<tr>
			<th colspan="2">挂牌期满后，如未征集到少于等于{{$detail->delayBuyerSize}}个意向受让方是否自动延牌</th>
			<td colspan="2">{{getDicName('sf',$detail->pubDelayFlag)}}</td>
		</tr>
		<tr>
			<th colspan="2">挂牌期满后，征集到两个以上受让方采用的交易方式</th>
			<td colspan="2">{{getDicName('jyfs',$detail->pubDealWay)}}</td>
		</tr>
		@if($detail->pubDelayFlag == '1')
		<tr>
			<th>最长延长周期数</th>
			<td>{{$detail->delayMax}}</td>
			<th>延牌周期（工作日）</th>
			<td>{{$detail->delayPeroid}}</td>
		</tr>
		@endif
		<tr>
			<th>报价方式</th>
			<td colspan="3">{{getDicName('bjms',$detail->bidmode)}}</td>
		</tr>
		<tr>
			<th>权重报价或招投标实施方案主要内容</th>
			<td colspan="3">{{$detail->pubDesc}}</td>
		</tr>
		<tr>
			<th>企业管理层是否参与受让</th>
			<td>{{getDicName('sf',$detail->holderIn)}}</td>
			<th>标的企业原股东是否放弃优先受让权</th>
			<td>{{getDicName('sf',$detail->allowEndPrio)}}</td>
		</tr>
		<tr>
			<th>披露方式</th>
			<td>{{getDicNames('announceWay',$detail->announceWay)}}</td>
			<th>标的企业原股东是否放弃优先受让权</th>
			<td>{{$detail->announceMedia}}</td>
		</tr>
		<tr>
			<th>是否允许联合受让</th>
			<td>{{getDicName('sf',$detail->unitTransferee)}}</td>
			<th>是否允许网上报名</th>
			<td>{{getDicName('sf',$detail->pub0)}}</td>
		</tr>
