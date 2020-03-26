
    <tr>
      <th colspan="4" class="title">委托方</th>
    </tr>
    <tr>
        <th>客户名称</th>
        <td colspan="3">{{$wtf->name}}</td>
    </tr>
    <tr>
      <th>所在地区</th>
      <td colspan="3">{{$wtf->province}}{{$wtf->city}}{{$wtf->county}}</td>
    </tr>
    @if($wtf->type == 2)
    <tr class="company">
      <th>是否国资</th>
      <td>
    {{getDicName('sf',$detail->sfgz)}}
    </td>
      <th>成立时间</th>
      <td>{{format_date($detail->found_date)}}</td>
    </tr>
    <tr class="company">
      <th>注册地址</th>
      <td colspan="3">
      {{$wtf->address}}
      </td>
    </tr>
    <tr class="company">
      <th>注册资本（万元）</th>
      <td>{{$wtf->funding}}（{{$wtf->currency}}）</td>
      <th>法定代表人</th>
      <td>{{$wtf->boss}}</td>
    </tr>
    <tr class="company">
      <th>所属行业</th>
      <td colspan="3">{{$wtf->industry1}}{{$wtf->industry2}}</td>
    </tr>
    <tr class="company">
      <th>金融业分类</th>
      <td colspan="3">{{$wtf->financial_industry1}}{{$wtf->financial_industry2}}</td>
    </tr>
    <tr class="company">
      <th>企业类型</th>
      <td>{{$wtf->companytype}}</td>
      <th>经济类型</th>
      <td>{{$wtf->economytype}}</td>
    </tr>
    <tr class="company">
      <th>经营规模</th>
      <td colspan="3">{{$wtf->scale}}</td>
    </tr>
    <tr class="company">
      <th>经营范围</th>
      <td colspan="3">{{$wtf->scope}}</td>
    </tr>
    <tr class="company">
      <th>主体资格证明</th>
      <td colspan="3">{{$wtf->credit_cer}}</td>
    </tr>
    <tr class="company">
      <th>内部决策情况</th>
      <td>{{$wtf->inner_audit}}</td>
      <th>内部决策情况说明</th>
      <td>{{$wtf->inner_audit_desc}}</td>
    </tr>
    <tr class="company">
      <th>股东数量(个)</th>
      <td>{{$wtf->Shareholder_num}}</td>
      <th>股份总数</th>
      <td>{{$wtf->stock_num}}</td>
    </tr>
    @elseif($wtf->type == 1)
    <tr class="person">
      <th>工作单位</th>
      <td>{{$wtf->work_unit}}</td>
      <th>职务</th>
      <td>{{$wtf->work_duty}}</td>
    </tr>
    @endif
    <tr>
      <th>传真</th>
      <td>{{$wtf->fax}}</td>
      <th>电话</th>
      <td>{{$wtf->phone}}</td>
    </tr>
    <tr>
      <th>邮箱</th>
      <td colspan="3">{{$wtf->email}}</td>
    </tr>
    <tr>
      <th>邮寄地址</th>
      <td colspan="3">{{$wtf->mailing_address}}</td>
    </tr>
