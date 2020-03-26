<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
use App\Models\ProjectLease;
use App\Models\TargetCompanyBaseInfo;
use App\Models\TargetCompanyOwnershipStructure;
use App\Models\AuditReport;
use App\Models\FinancialStatement;
use App\Models\Assessment;
use App\Models\SellerInfo;
use App\Models\Supervise;
use App\Models\AssetInfo;
use App\Models\Contact;
use App\Http\Requests\UserRequest;
use App\Handlers\ImageUploadHandler;

class ProjectsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show','list']]);
    }

    public function index(Request $request, Project $project)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $projects = $project->withOrder($request->order)
                        ->where('status','>=',11)
                        ->paginate(5);
        // 传参变量话题和分类到模板中
        return view('projects.list', compact('projects'));
    }

    public function show($id,Request $request)
    {
        $project = Project::with('projectPurchase','sellerInfo')->find($id);
        // $project = Project::find($id);
        $detail = $project->detail;
        $wtf = $project->sellerInfo;

        $bdqy = $detail->targetCompanyBaseInfo;
        if(empty($bdqy)){
            $bdqy = new TargetCompanyBaseInfo;
        }

        $sjbg1 = null;
        $sjbg2 = null;
        $sjbg3 = null;
        $sjbgs = $detail->auditReports;
        if(!empty($sjbgs) && $sjbgs->Count()>=1){
            for($i = 0; $i < $sjbgs->Count(); $i++){
                switch ($i) {
                    case 0:
                        $sjbg1 = $sjbgs[$i];
                        break;
                    case 1:
                        $sjbg2 = $sjbgs[$i];
                        break;
                    case 2:
                        $sjbg3 = $sjbgs[$i];
                        break;
                }
            }
        }

        $bdxq = $project->assetInfo;
        if(empty($bdxq)){
            $bdxq = new AssetInfo;
        }

        $cwbb = $project->financialStatement;
        if(empty($cwbb) ){
            $cwbb = new FinancialStatement;
        }
        $pgqk = $project->assessment;
        if(empty($pgqk)){
            $pgqk = new Assessment;
        }
        $wtf = $project->sellerInfo;
        if(empty($wtf)){
            $wtf = new SellerInfo;
        }
        $jgxx = $project->supervise;
        if(empty($jgxx)){
            $jgxx = new Supervise;
        }
        $lxfs = $project->contact;
        if(empty($lxfs)){
            $lxfs = new Contact;
        }
        
        $datas['project'] = $project;
        $datas['detail'] = $detail;
        $datas['bdqy'] = $bdqy;
        $datas['bdxq'] = $bdxq;
        $datas['cwbb'] = $cwbb;
        $datas['pgqk'] = $pgqk;
        $datas['wtf'] = $wtf;
        $datas['jgxx'] = $jgxx;
        $datas['sj1'] = $sjbg1;
        $datas['sj2'] = $sjbg2;
        $datas['sj3'] = $sjbg3;
        $datas['lxfs'] = $lxfs;
        

        // $url = 'projects.'.$project->type.'.show';
        $url = 'projects.show';
        // 传参变量话题和分类到模板中
        // return view($url, compact('project','detail','wtf'));
        return view($url, $datas);
    }



}
