<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Student;
use App\InventoryItem;
use App\SalesItem;
use App\Product;
use App\InventoryConfig;
use App\Notification;

class ApiController extends Controller
{
    public function __construct()
    {
        
    }

    public function createInventoryItem(Request $request)
    {
        if($request->productId && $request->quantity && $request->userId){ 
            $product = Product::find($request->productId);
            $inventory_item = new InventoryItem();
            $inventory_item->user_id = $request->userId;
            $inventory_item->product_id = $request->productId;
            $inventory_item->quantity = $request->quantity;
            $inventory_item->price = $product->price;
            $inventory_item->save();

            $inventory_config = InventoryConfig::where('product_id', $request->productId)->get()->first();

            $inventory_config->quantity +=  $request->quantity;
            $inventory_config->save();

            return 'true';
        }

        return 'false';
    }

    public function createSalesItem(Request $request, $rfid, $productId, $quantity)
    {
        if($rfid && $productId && $quantity){ 
            
            try{
                $product = Product::find($productId);
                $student = Student::where('rfid',$rfid)->get()->first();
                $inventory_config = InventoryConfig::where('product_id', $productId)->get()->first();

                if($inventory_config->quantity >= $quantity){
                    $sales_item = new SalesItem();
                    $sales_item->student_id = $student->id;
                    $sales_item->product_id = $productId;
                    $sales_item->quantity = $quantity;
                    $sales_item->price = $product->price;
                    $sales_item->save();

                    $student->balance = $student->balance + ($product->price *  $quantity);
                    $student->save();
                    $inventory_config->quantity -=  $quantity;
                    $inventory_config->save();

                    return '$OK#';
                }
                

                
                return '$INSUFFICIENT#';
            }catch(Exception $e){
                dd($e);
            }
            
            
           
        }

        return '$ERROR#';
    }

    public function verifyRFID(Request $request, $rfid){
        if($rfid){
            $student = Student::where('rfid',$rfid)->get()->first();
            if($student){
                return '$VERIFIED#';
            }

            return '$UNVERIFIED#';
        }
        return '$ERROR#';
    }

    public function createNotifications(){
        $inventory_configs = InventoryConfig::all();

        foreach ($inventory_configs as $key => $inventory_config) {
            if($inventory_config->quantity > 0 && $inventory_config->quantity <= 5){
                $notification = new Notification();
                $notification->name = "Low Stock Alert!";
                $notification->product_id = $inventory_config->product_id;
                $notification->save();
            }else if($inventory_config->quantity <= 0){
                $notification = new Notification();
                $notification->name = "Out Of Stock Alert!";
                $notification->product_id = $inventory_config->product_id;
                $notification->save();
            }
        }

        return "true";
    }

    public function getStudentAccount(Request $request, int $id)
    {   
        if($id){
            $student = Student::where('id',$id)->first();

            return $student->toArray();
        }   
        

        return [];
    }

    public function updateStudentAccount(Request $request,  int $id)
    {
        if($id){
            $student = Student::where('id',$id)->first();

            $student->rfid = $request->rfid;

            $student->save();
            return "true";
        }   
        

        return "false";
    }

    // public function createStudentAccount(Request $request)
    // {
        
    // }

    // public function getStudentAccount(Request $request,  int $id)
    // {
    //     $student = Student::where('id', $id)->get();

    //     return $student->toArray();
    // }

    

    // public function deleteStudentAccount(Request $request,  int $id)
    // {
        
    // }

    // public function getInventoryItems(Request $request)
    // {
        
    // }

   

    // public function getInventoryItem(Request $request,  int $id)
    // {
        
    // }

    // public function updateInventoryItem(Request $request,  int $id)
    // {
        
    // }

    // public function deleteInventoryItem(Request $request,  int $id)
    // {
        
    // }

    // public function getSalesItems(Request $request)
    // {
        
    // }

    // public function createSalesItem(Request $request)
    // {
        
    // }

    // public function getSalesItem(Request $request,  int $id)
    // {
        
    // }

    // public function updateSalesItem(Request $request,  int $id)
    // {
        
    // }

    // public function deleteSalesItem(Request $request,  int $id)
    // {
        
    // }



    
}
