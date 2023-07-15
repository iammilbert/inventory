<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
// use App\Models\Debt;
use App\Http\Controllers\DebtController as Debt;
use App\Models\Sale;
use Illuminate\Support\Facades\DB;
use App\Models\Settings;


class SaleController extends Controller
{
    public function index($salesID_or_page = null, $items=null){

        if($salesID_or_page === 'held-receipt'){
            // if held receipt
            $data['sales'] = Sale::where(['on_hold'=>true])->get();
            $data['title'] = 'Held receipt';
            $data['is_held'] = true;
            $data['settings'] = Settings::where('id', '<', 10)->first();
            return view('admin.sales', $data);
        }else if($salesID_or_page === 'all'){
            $data['sales'] = Sale::where(['on_hold'=>false])->get();
            $data['settings'] = Settings::where('id', '<', 10)->first();
            $data['title'] = 'All sales';
            return view('admin.sales', $data);
        }

        $data['products'] = $this->getSellableProducts();
        $data['settings'] = Settings::where('id', '<', 10)->first();

        return view('admin.sellProductForm', $data);
    }

    public function getSellableProducts (){
        $products = Product::where(['out_of_stock' => false])
        ->where('in_stock', '>', 1)
        ->where('selling_price', '>', 1)
        ->orderBy('id', 'ASC')
        ->get();

        $products_array = [];

        foreach ($products as $product) {
            $products_array['row'.$product->id] = $product;
            // array_push($products_array, ['row'.$product->id => $product]);
        }
        return $products_array;
    }

    public function store(Request $request){
        $request->validate([
            'all_products' => ['required', 'string', 'max:255'],
            'customer_name' => ['required', 'string', 'max:255'],
            'customer_phone' => ['required', 'string', 'max:255'],
            'method_of_payment' => ['required', 'string', 'max:255'],
            // 'discount' => ['required', 'string', 'max:255'],
            // 'debt' => ['required', 'string', 'max:255'],
            'on_hold' => ['required'],
            'total' => ['required']
        ]);
        // print_r($request->all());
        $data = $request->all_products;
        $data = json_decode($data);
        $sqlStatement = '';

        foreach ($data as $key => $value) {
            $sqlStatement .= 'UPDATE products SET in_stock = in_stock - '.$value->quantity.' WHERE id = '.$key.';';
        }
        
        $debtID = uniqid();

        if(isset($request->sales_id) && $request->on_hold === '0'){
            // for updating held sales
            $salesStatus = Sale::where('id', $request->sales_id)
              ->update([
                'customer_name' => $request->customer_name,
                'products' => $request->all_products,
                'discount' => $request->discount ?? 0,
                'total' => $request->total,
                'method_of_payment' => $request->method_of_payment,
                'customer_phone' => $request->customer_phone,
                'is_having_debts' => ($request->debt >= 1),
                'debt_id' => ($request->debt >= 1) ? $debtID : NULL,
                'debt_balance' => $request->debt ?? 0,
                'on_hold' => $request->on_hold,
                'reg_by' => Auth::user()->id
            ]);
        }else {
            $salesStatus = Sale::create([
                'customer_name' => $request->customer_name,
                'products' => $request->all_products,
                'discount' => $request->discount ?? 0,
                'total' => $request->total,
                'method_of_payment' => $request->method_of_payment,
                'customer_phone' => $request->customer_phone,
                'is_having_debts' => ($request->debt >= 1),
                'debt_id' => ($request->debt >= 1) ? $debtID : NULL,
                'debt_balance' => ($request->on_hold) ? 0: $request->debt,
                'on_hold' => $request->on_hold,
                'reg_by' => Auth::user()->id
            ]);
        }
       

        if($request->on_hold){
            // sales not yet complete
            $salesOnHold = 'Sales has been put on hold. You can go to held receipts to continue';
            $products = $this->getSellableProducts();
            $settings = Settings::where('id', '<', 10)->first();
            return view('admin.sellProductForm', ['salesOnHold'=>$salesOnHold, 'settings'=>$settings, 'products'=>$products]);
        }

        if($request->debt >= 1 && $request->on_hold === '0'){
            
            Debt::addDebt([
                'debt_id' => $debtID,
                'description' => 'Customer debt on sales',
                'initial_amount' => $request->debt,
                'total_debt_before' => $request->debt ,
                'total_debt_after' => $request->debt ,
                'amount_paid' => 0,
                'debt_type' => 'sales',
                'reg_by' => Auth::user()->id
            ]);
        }

        if($salesStatus = true){
            // sales made successfully
            DB::unprepared($sqlStatement);
        }

        $data2['salesData'] = [
            'customer_name' => $request->customer_name,
            'products' => json_decode($request->all_products),
            'discount' => $request->discount ?? 0,
            'total' => $request->total,
            'method_of_payment' => $request->method_of_payment,
            'customer_phone' => $request->customer_phone,
            'is_having_debts' => ($request->debt >= 1),
            'debt_id' => ($request->debt >= 1) ? $debtID : NULL,
            'debt_balance' => $request->debt ?? 0,
            'on_hold' => $request->on_hold,
            'reg_by' => Auth::user()->name
        ];
        $data2['settings'] = Settings::where('id', '<', 10)->first();

        return view('admin.print-receipt', $data2);
        // return back()->with('success', 'Sale made succesfully.');
    }

    public static function getProd($products, $selectedID, $getTotal = false){
        $getIds = explode('#', $selectedID);
        $getIds1 = explode(',', $getIds[0]);
        $selected = [];
        $total = 0;

        if($getIds1[0] === '') return $selected; 

        for ($i=0; $i < count($getIds1); $i++) { 
            $selected['row'.$getIds1[$i]] = $products['row'.$getIds1[$i]];
            $total += $products['row'.$getIds1[$i]]->selling_price;
        }

        return ($getTotal) ? $total : $selected;
    }

    public static function explodeProducts($data){
        $data = json_decode($data);
        $products = '<small>';
        foreach ($data as $key => $prod){
            $products .= $prod->productName.' ('.$prod->quantity.' x '.$prod->selling_price.' = '.$prod->total.')<br>';
        }
        return $products.'</small>';
    }

    public function processHeldReciept($heldSaleId = null){
        if (is_null($heldSaleId)) return redirect('admin/sales/');

        $data['products'] = $this->getSellableProducts();
        $data['settings'] = Settings::where('id', '<', 10)->first();
        $data['heldSale'] = Sale::where('id', $heldSaleId)->first();
       
        if(!isset($data['heldSale']->id)) return redirect('admin/sales/');

        if(!isset($_GET['items'])){
            $saleProducts = json_decode($data['heldSale']->products);
            $productId = [];
            foreach ($saleProducts as $key => $prod){
                array_push($productId, $key);
            }
            // return view('admin.held-sales', $data);
            return redirect('admin/held-sales/'.$heldSaleId.'/?items='.implode(',',$productId));
        }
        
        // $saleProducts = json_decode($heldSale->products);
        // $productId = [];
        // foreach ($saleProducts as $key => $prod){
        //     array_push($productId, $key);
        // }
        return view('admin.held-sales', $data);
        // return redirect('admin/sales/'.$heldSaleId.'/?items='.implode(',',$productId));
    }
}
