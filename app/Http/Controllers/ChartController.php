<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Sale;
use App\Channel;
use App\Product;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ChartController extends Controller
{
  public function firstdrawChart(Request $request){
    // 初回描画
    $view = view('analytics');
    $view->salesYear = date('Y');
    $salesMonth = '未指定';
    $active_user_membership_registration_date = Auth::user()->created_at;
    list($yyyy, $mm, $dd) = explode('-', $active_user_membership_registration_date);
    $view->membership_year = $yyyy;
    $default_count = 1;
    $view->default_count = $default_count;
    $view->salesMonth = $salesMonth;
    $view->target_sales = 0;
    $unspecified = '';
    $view->unspecified = $unspecified;
    return $view;
  }

  public function drawChart(Request $request){
    // 二回目以降の描画
    $view = view('analytics');
    $sale_year = $request->salesYear;
    $sale_month = $request->salesMonth;
    $view->default_count = 1;
    $unspecified = '未指定';
    $active_user_membership_registration_date = Auth::user()->created_at;
    list($yyyy, $mm, $dd) = explode('-', $active_user_membership_registration_date);
    $view->membership_year = $yyyy;
    //  月ごとの集計
    if ($sale_month === '未指定') {
      $view->unspecified = '';
      $target_sales = Sale::whereYear('created_at', $sale_year)
      ->orderBy('created_at')
      ->get()
      ->groupBy(function ($row) {
        return $row->created_at->format('m');
      })
      ->map(function ($day) {
        return $day->sum('sales_amount');
      });
      $view->target_sales = $target_sales;
    } else {
    //   // 日付単位の集計
      $target_sales =
      Sale::whereYear('sales_date', '=' ,$sale_year)
      ->whereMonth('sales_date', '=', $sale_month)
      ->orderBy('sales_date', 'asc')
      ->get(array('sales_date', 'sales_amount'));
      $view->unspecified = $unspecified;
      $view->target_sales = $target_sales;
    }
    $view->salesYear = $request->salesYear;
    $view->salesMonth = $request->salesMonth;
    return $view;
  }
}
