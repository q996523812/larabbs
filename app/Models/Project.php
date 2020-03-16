<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
	public $incrementing = false;
	public function scopeWithOrder($query, $order)
    {
        // 不同的排序，使用不同的数据读取逻辑
        switch ($order) {
            case 'recent':
                $query->recent();
                break;

            default:
                $query->recentReplied();
                break;
        }
        // 预加载防止 N+1 问题
        // return $query->with('user', 'category');
        return $query;
    }
    //最快到期
    public function scopeRecentReplied($query)
    {
        // 当话题有新回复时，我们将编写逻辑来更新话题模型的 reply_count 属性，
        // 此时会自动触发框架对数据模型 updated_at 时间戳的更新
        return $query->orderBy('gp_date_end', 'desc');
    }
    //最近挂牌
    public function scopeRecent($query)
    {
        // 按照创建时间排序
        return $query->orderBy('gp_date_start', 'desc');
    }
    public function link($params = [])
    {
        return route('projects.show', array_merge([$this->id], $params));
    }

    public function getGpDateStartAttribute()
    {
        return date('Y-m-d', strtotime($this->attributes['gp_date_start']));
    }
    public function getGpDateEndAttribute()
    {
        return date('Y-m-d', strtotime($this->attributes['gp_date_end']));
    }

    public function files()
    {
        // return $this->hasMany(File::class,'filetable_id','id');
        return $this->morphMany(File::class, 'filetable');
    }
    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function projectLease()
    {
        return $this->hasOne(ProjectLease::class,'id','detail_id');
    }
    public function projectPurchase()
    {
        return $this->hasOne(ProjectPurchase::class,'id','detail_id');
    }
    public function projectConveyancing()
    {
        return $this->hasOne(ProjectConveyancing::class,'id','detail_id');
    }
    public function projectCapitalIncrease()
    {
        return $this->hasOne(ProjectCapitalIncrease::class,'id','detail_id');
    }
    public function projectTransferAsset()
    {
        return $this->hasOne(ProjectTransferAsset::class,'id','detail_id');
    }

    public function detail(){
        switch($this->type){
            case 'zczl':
                return $this->projectLease();
                break;
            case 'qycg':
                return $this->projectPurchase();
                break;
            case 'cqzr':
                return $this->ProjectConveyancing();
                break;
            case 'zzkg':
                return $this->ProjectCapitalIncrease();
                break;
            case 'zczr':
                return $this->projectTransferAsset();
                break;
            
        }
    }
    public function wtf(){
        $model = null;
        switch($this->type){
            case 'qycg':
                $model = $this->targetCompanyBaseInfo();
                break;
            case 'zczl':
                $model = $this->sellerInfo();
                break;
            case 'cqzr':
                $model = $this->sellerInfo();
                break;
            case 'zzkg':
                $model = $this->targetCompanyBaseInfo();
                break;
            case 'zczr':
                $model = $this->sellerInfo();
                break;
            
        }
        return $model;
    }
}
