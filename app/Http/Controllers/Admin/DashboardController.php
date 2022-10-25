<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Course;
use App\Models\Statistical;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){
        $category_count = Category::all()->count();
        $course_count = Course::all()->count();
        $user_count = User::where('status',1)->count();
        $statisticals = Statistical::all();
        $list_course = Course::with('course_details')->orderBy('id','DESC')->get();
        $total = 0;
        foreach ($statisticals as $statistical){
            $total = $total + $statistical->total_cost;
        }

        return view('admin.dashboard.index')->with(compact('category_count','course_count','user_count','total','list_course'));
    }
    function filter_by_date(Request $request){
        $data = $request->all();
        $from_date = $data['from_date'];
        $to_day = $data['to_date'];
        $statistical = Statistical::whereBetween('registration_date',[$from_date,$to_day])->orderBy('registration_date','ASC')->get();
        $chart_data =[];
        if ($statistical) {
            foreach ($statistical as $key => $value) {
                $chart_data[] = array(
                    'total_cost' => $value->total_cost,
                    'total_user' => $value->total_user
                );
            }
            echo $data = json_encode($chart_data);
        }
    }

    function dashboard_filter(Request $request){
        $data = $request->all();
        $dauthangnay = Carbon::now('Asia/Ho_Chi_Minh')->startOfMonth()->toDateString();
        $dauthangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->startOfMonth()->toDateString();
        $cuoithangtruoc = Carbon::now('Asia/Ho_Chi_Minh')->subMonth()->endOfMonth()->toDateString();

        $sub7days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(7)->toDateString();
        $sub365days = Carbon::now('Asia/Ho_Chi_Minh')->subDays(365)->toDateString();

        $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();

        if ($data['dashboard_value'] == '7ngay'){
            $statistical = Statistical::whereBetween('registration_date',[$sub7days,$now])->orderBy('registration_date','ASC')->get();
        }elseif ($data['dashboard_value'] == 'thangtruoc'){
            $statistical = Statistical::whereBetween('registration_date',[$dauthangtruoc,$cuoithangtruoc])->orderBy('registration_date','ASC')->get();
        }elseif ($data['dashboard_value'] == 'thangnay'){
            $statistical = Statistical::whereBetween('registration_date',[$dauthangnay,$now])->orderBy('registration_date','ASC')->get();
        }elseif ($data['dashboard_value'] == '365ngay'){
            $statistical = Statistical::whereBetween('registration_date',[$sub365days,$now])->orderBy('registration_date','ASC')->get();
        }
        $chart_data =[];
        if ($statistical){
            foreach ($statistical as $key =>$value){
                $chart_data[] = array(
                    'total_cost' => $value->total_cost,
                    'total_user' => $value->total_user
                );
            }
                echo $data = json_encode($chart_data);

        }

    }
}
