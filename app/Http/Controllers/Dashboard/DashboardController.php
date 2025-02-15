<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterData;
use App\Models\PurchaseRequestHead;
use App\Models\PurchaseRequestList;
use App\Models\PurchaseRequestSignature;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{

  public function index(User $user,  MasterData $masterData, PurchaseRequestHead $purchaseRequestHead, PurchaseRequestList $purchaseRequestList, PurchaseRequestSignature $purchaseRequestSignature)
  {
    $user = Auth::user();

    $data = DB::table('purchase_request_head as A')
      ->join('purchase_request_list as B', 'A.purchase_request_number', '=', 'B.purchase_request_number')
      ->whereExists(function ($query) {
        $query->select(DB::raw(1))
          ->from('purchase_request_list as B2')
          ->whereRaw('A.purchase_request_number = B2.purchase_request_number');
      })
      ->orWhereExists(function ($query) {
        $query->select(DB::raw(1))
          ->from('purchase_request_signature as C')
          ->whereRaw('A.purchase_request_number = C.purchase_request_number');
      })
      ->select('B.id', 'B.material', 'B.kategory', 'B.description', 'B.uom', 'B.qty', 'A.status', 'A.updated_at')
      ->paginate(10); // Paginate with 10 records per page;


    // $purchaseRequests = DB::table('purchase_request_list')
    //   ->join('purchase_request_signature', 'purchase_request_head.purchase_request_number', '=', 'purchase_request_signature.purchase_request_number')
    //   ->join('purchase_request_list', 'purchase_request_head.purchase_request_number', '=', 'purchase_request_list.purchase_request_number')
    //   ->select('purchase_request_head.*', 'purchase_request_signature.*', 'purchase_request_list.*')
    //   ->get();
    // please i want to join with 3 model PurchaseRequestSignature PurchaseRequestHead PurchaseRequestList with purchase_request_number same



    // dd($purchaseRequests->toArray());

    // dd($user->role);
    if ($user->role == 'admin' || $user->role == 'atasan') {
      return view('Dashboard', compact(['user', 'data']));
    } else {

      return redirect()->route('home');
    }
  }
}
