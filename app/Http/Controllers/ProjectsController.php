<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Project;
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
                        ->paginate(5);
        // 传参变量话题和分类到模板中
        return view('projects.list', compact('projects'));
    }
    public function list($type,Request $request, Project $project)
    {
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $projects = $project->withOrder($request->order)
                        ->where('type', $type)
                        ->paginate(20);

        // 传参变量话题和分类到模板中
        return view('projects.list', compact('projects'));
    }

    public function show(Project $project,Request $request)
    {dd($type);
        // 读取分类 ID 关联的话题，并按每 20 条分页
        $projects = $project->withOrder($request->order)
                        ->where('type', $type)
                        ->paginate(20);

        // 传参变量话题和分类到模板中
        return view('projects.list', compact('projects'));
    }



}
