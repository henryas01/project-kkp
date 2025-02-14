<?php

namespace App\Http\Controllers\PurchaseRequest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterData;
use App\Models\PurchaseRequestHead;
use App\Models\PurchaseRequestList;
use App\Models\PurchaseRequestSignature;
use App\Helpers\ConvertMassVolume;

class PurchaseRequestController extends Controller
{

  public function index(User $user, Request $request,  MasterData $masterData, PurchaseRequestHead $purchaseRequestHead, PurchaseRequestList $purchaseRequestList, PurchaseRequestSignature $purchaseRequestSignature)
  {
    $user = Auth::user();
    // $material = MasterData::select('material')->paginate(5);
    $material = MasterData::pluck('material');
    // $purchaseRequestNumber = $request->input('purchase_request_number', 'PRRM 0001');
    // $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";

    $purchaseRequestNumber = request('purchase_request_number');
    if ($purchaseRequestNumber && preg_match('/^[a-zA-Z0-9\s-]+$/', $purchaseRequestNumber)) {
      // Valid purchase request number
    } else {
      // Possible SQL injection or invalid input, redirect
      return redirect()->route('form-purchase', ['purchase_request_number' => 'PRRM 0001']);
    }

    //  dd($purchaseRequestNumber);

    $head = PurchaseRequestHead::where('purchase_request_number', $purchaseRequestNumber)->first() ?? new PurchaseRequestHead;
    $list = PurchaseRequestList::where('purchase_request_number', $purchaseRequestNumber)->paginate(5) ?? new PurchaseRequestList; // or you could be use collect()
    $signature = PurchaseRequestSignature::where('purchase_request_number', $purchaseRequestNumber)->first() ?? new PurchaseRequestSignature;


    //  $head = PurchaseRequestHead::all();
    // $list = PurchaseRequestList::all();
    // $signature = PurchaseRequestSignature::all();
    // dd($material->toArray(), $head->toArray(), $list->toArray(), $signature->toArray());
    // dd($head-<);

    // dd($user->role);
    return view('purchase-request.index', compact(['user', 'material', 'head', 'list', 'signature']));
    // if ($user->role == 'admin' || $user->role == 'atasan') {
    //   return view('purchase-request.index', compact(['user', 'material', 'head', 'list', 'signature']));
    // } else {
    //   return redirect()->route('home');
    // }
  }

  public function createPR(User $user,  PurchaseRequestHead $purchaseRequestHead, PurchaseRequestSignature $purchaseRequestSignature)
  {
    $user = Auth::user();
    $purchaseRequestHeadID = PurchaseRequestHead::latest()->first()->id;
    $nextNumber = $purchaseRequestHeadID + 1;
    $NewPurchaseRequestNumber = 'PRRM ' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    $dataPayloadHead = [];
    $dataPayloadHead["purchase_request_number"] = $NewPurchaseRequestNumber;
    $dataPayloadHead["user_ID"] = $user->id;
    $dataPayloadHead["document_date"] = date('Y-m-d H:i:s');
    $dataPayloadHead["status"] = 0;

    $dataPayloadSignature = [];
    $dataPayloadSignature["purchase_request_number"] = $NewPurchaseRequestNumber;
    $dataPayloadSignature["approved_user"] = $user->name;
    // $dataPayloadSignature["approved_user"] = $user->name;


    dd($dataPayloadHead, $dataPayloadSignature);
    // if ($purchaseRequestHead->create($dataPayloadHead) && $purchaseRequestSignature->create($dataPayloadSignature)) {
    //   Session()->flash("Success", "Data have been created");
    // } else {
    //   Session()->flash("Error", "Data failed to create");
    // }
  }

  // this function for insert data PR PurchaseRequest list
  public function store(Request $request,  MasterData $masterData, PurchaseRequestList $purchaseRequestList,)
  {

    $data = $request->all();
    $data['material'] = $request->material;
    $data["description"] = $request->description;
    $masterData = MasterData::where('material', $data['material'])->first();
    $data['purchase_request_number']  = request('purchase_request_number');
    $data['kategory'] = $masterData->kategory;
    $data['qty'] = $request->qty;
    $data['uom'] = $request->uom;

    $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";

    if ($purchaseRequestList->create($data)) {
      Session()->flash("Success", "Data have been created");
    } else {
      Session()->flash("Error", "Data failed to create");
    }
    return redirect()->route('purchase-request.index', $purchaseRequestNumber);
  }

  public function show(Request $request, $id,  PurchaseRequestList $purchaseRequestList, MasterData $masterData,)
  {
    $list = $purchaseRequestList->findOrFail($id);
    $material = MasterData::pluck('material');
    return view('purchase-request.edit', compact(['list', 'material']));
  }

  public function update(Request $request, $id)
  {
    $list = PurchaseRequestList::find($id);
    $data = $request->all();
    $data['material'] = $request->material;
    $data["description"] = $request->description;
    $masterData = MasterData::where('material', $data['material'])->first();
    $data['kategory'] = $masterData->kategory;
    $data['qty'] = $request->qty;
    $data['uom'] = $request->uom;

    $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";
    if ($list->update($data)) {
      Session()->flash("Success", "Data have been updated");
    } else {
      Session()->flash("Error", "Data failed to update");
    }
    return redirect()->route('purchase-request.index', $purchaseRequestNumber);
  }

  public function destroy($id)
  {
    $list = PurchaseRequestList::findOrFail($id);
    $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";
    if ($list->delete()) {
      Session()->flash("Success", "Data have been deleted");
    } else {
      Session()->flash("Error", "Data failed to delete");
    }
    return redirect()->route('purchase-request.index', $purchaseRequestNumber);
  }

  public function signature(Request $request, $id)
  {
    $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";
    $signature = PurchaseRequestSignature::where('purchase_request_number', $purchaseRequestNumber)->first() ?? new PurchaseRequestSignature;
    $data = $request->all();
    $data['purchase_request_number'] = $request->purchase_request_number;
    $data['approved_user'] = $request->approved_user ?? $signature->approved_user;
    $data['approved_manager'] = $request->approved_manager ?? $signature->approved_manager;
    $data['acknowledge'] = $request->acknowledge ?? $signature->acknowledge;


    // dd($data);
    if ($signature->update($data)) {
      Session()->flash("Success", "Signature have been updated");
    } else {
      Session()->flash("Error", "Signature failed to update");
    }
    return redirect()->route('purchase-request.index', $purchaseRequestNumber);
  }


  public function convertion(Request $request, PurchaseRequestHead $purchaseRequestHead, PurchaseRequestList $purchaseRequestList, PurchaseRequestSignature $purchaseRequestSignature)
  {

    // // $mass = $request->mass ?? 1; // 1 kg by default
    // // $mass = 15; // 1 kg by default
    // $mass = 117750.0;
    // $density = 'steel';

    // $volume = (new ConvertMassVolume)->kgToM3($mass, $density);
    // // $volume = (new ConvertMassVolume)->m3ToKg($mass, $density);

    // // echo "Volume: " . $volume . " m³";
    // dd($volume);


    // $head = new PurchaseRequestHead;
    // $head->purchase_request_number = $request->input('purchase_request_number', 'PRRM 0001');
    // $head->user_id = $user->id;
    // $user = Auth::user();
    // $purchaseRequestHeadID = PurchaseRequestHead::latest()->first()->id;
    // $nextNumber = $purchaseRequestHeadID + 1;
    // $NewPurchaseRequestNumber = 'PRRM ' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);

    // $dataPayloadHead = [];
    // $dataPayloadHead["purchase_request_number"] = $NewPurchaseRequestNumber;
    // $dataPayloadHead["user_ID"] = $user->id;
    // $dataPayloadHead["document_date"] = date('Y-m-d H:i:s');
    // $dataPayloadHead["status"] = 0;

    // $dataPayloadSignature = [];
    // $dataPayloadSignature["purchase_request_number"] = $NewPurchaseRequestNumber;
    // $dataPayloadSignature["approved_user"] = $user->name;
    // $dataPayloadSignature["approved_user"] = $user->name;


    // dd($dataPayloadHead, $dataPayloadSignature);
    // // $nextNumber = $lastNumber + 1;
    // return 'PRRM ' . str_pad($nextNumber, 4, '0', STR_PAD_LEFT);
  }

  public function updateUom(Request $request, $id)
  {
    $purchaseRequestNumber = request('purchase_request_number') ? request('purchase_request_number') : "PRRM 0001";
    $list = PurchaseRequestList::find($id);
    $convertMassVolume = new ConvertMassVolume();
    $calculate = $request->uom == 'kg' ? $convertMassVolume->kgToM3($list->qty) : $convertMassVolume->m3ToKg($list->qty);
    $data = $request->all();
    $data['uom'] = $request->uom;
    $data['qty'] = $calculate;

    if ($list->update($data)) {
      Session()->flash("Success", "Data have been updated");
    } else {
      Session()->flash("Error", "Data failed to update");
    }
    return redirect()->route('purchase-request.index', $purchaseRequestNumber);
  }
}
