<?php

namespace App\Http\Controllers;


use App\Helpers\Functions;
use App\Http\Requests\Clint\StoreclintRequest;
use App\Models\ClintModel;
use App\Models\Orderdetails;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;



class Clint extends Table
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $clints = ClintModel::paginate(20);
        //  $clints = ClintModel::get();
        // $clints = ClintModel::where('clintdel', '=', 1)->get();
        $clints = ClintModel::all();
        



        // $clints=DB::select("SELECT * FROM " . SELF::$tb_clints );
        // $clints = DB::table(self::$tb_clints)->where('clintdel', '=', '0')->paginate(20);
        
        return view('clints.index',compact('clints'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sellers = DB::table(self::$tb_sales)->
        whereNotIn('jobTitle',['officeboy','manger'])->
        get(['lastName','firstName','salesNumber']); 

        return view('clints.create',compact('sellers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreclintRequest $request)  
      {
       
        

        $clintsNumber	= $request->clintsNumber;
        $clintsName	= $request->clintsName;
        $contactLastName = $request->contactLastName;
        $contactFirstName=$request->contactFirstName;
        $phone	= $request->phone;
        $addressLine1 = $request->addressLine1;
        $addressLine2 = $request->addressLine2;
        $city	= $request->city;
        $state = $request->state;
        $postalCode = $request->postalCode;
        $country	= $request->country;
        $repsales = $request->Repforsales;
        $creditLimit = $request->creditLimit;

        $ins = DB::insert('INSERT INTO ' . SELF::$tb_clints .
        '(clintsNumber,
        clintsName,
        contactLastName,
        contactFirstName,
        phone,
        addressLine1,
        addressLine2,
        city,
        state,
        postalCode,
        country,
        Repforsales,
        creditLimit)VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)',[
        $clintsNumber,
        $clintsName,
        $contactLastName,
        $contactFirstName,
        $phone,
        $addressLine1,
        $addressLine2,
        $city,
        $state,
        $postalCode,
        $country,
        $repsales,
        $creditLimit        
        ]);
    if($ins){
        session(['clint_added'=> true]);
    }
       return redirect()->route('clints.show',$clintsNumber);
    }




    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    
    
    public function show($clintsNumber)
    {

        $tbclint = self::$tb_clints;
        $tblorder = self::$tb_order;
        $tbsales = self::$tb_sales;

        
        
        //   $clint = DB::selectOne("SELECT * FROM  $tbclint  c LEFT JOIN $tbsales s ON c.Repforsales = s.salesNumber
        //   WHERE c.clintsNumber = '$clintsNumber'");
        //     functions::dnb($clint);
        // $clint = ClintModel::with('sales')->findOrFail($clintsNumber);
    // one statement get the joined table
    
        // $clint = ClintModel::where('clintsNumber', '=', $clintsNumber)->leftjoin('sales','Repforsales','=','salesNumber')->get();
        // return $clint;

  // Get only the main table record

  //  $clints = ClintModel::find($clintsNumber);
        
        // $clints = ClintModel::FindorFail($clintsNumber);
    //    if(!$clints){
    //         return 'no customer found';
    //    }
    
    // get only forign table record
    
    // $sales = $clints->sales()->get();
    
    
    
    // dynamic relationship property
    
    // $clints = ClintModel::findorfail($clintsNumber);
    //     // return $clints;
    //     $sales = $clints->sales;
    //     return $sales;
    
    
    // using with return both tables forin table is sub object
    
    $clint = ClintModel::with('sales')->findOrFail($clintsNumber);
    
    
    //     // $sales = $clint->sales()->get();
    //      return $clint->sales->firstName; 
    
    $orderdetails = $clint->Orderdetails;
    
    //  return $orderdetails;
    
    $total = 0;
    foreach($orderdetails as $orderdetail){

        $total += $orderdetail['quantityOrdered'] * $orderdetail['priceEach'];
        }

        $orders = $clint->Shippedorder;
        
        // return $orders;
        
        $CountOrders = $orders->count();
        
        $first_order_on = $orders->min('orderDate');
        
        // return $first_order_on;
        
        $pices = $orderdetails->sum('quantityOrdered');
        
        
        
        
        
        //   $order = DB::scalar("SELECT COUNT(clintsNumber) orders FROM $tblorder WHERE clintsNumber = '$clintsNumber';");
       
        $clint = $clint->toArray();

        
        $msg=null;

        $added = session()->get('clint_added');
    $updated = session()->get('clint_updated');
        
        if($added){
          
            $msg="clints seccesseful added";   
        }       
        
        if($updated){
            $msg = "clints updated successfuly";
        }
        
        session(['clint_updated'=>false]);
        session(['clint_added'=>false]);
        
        // session()->remove('clints_added')
        // session()->remove('clints_updated')
         
       return view('clints.show',compact('clint','orders','msg','pices','total','first_order_on','CountOrders'));
       
    }
    // ----------------------------------------------------------
    /**
     *  
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function edit($id)
    {
        $edit = true;
        
        $clint = DB::table(self::$tb_clints)->where('clintsNumber', '=', $id)->first();

        $clint = get_object_vars($clint);

       
       

        $sellers = DB::table(self::$tb_sales)->whereNotIn('jobTitle', ['marketing', 'manger'])
        ->get(['firstName','lastName','salesNumber']);

        return view('clints.edit',compact(['clint','sellers','edit']));

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function update(Request $request, $id)
    {
        $res=DB::table(self::$tb_clints)->where('clintsNumber','=',$id)->update(
       [ 'clintsNumber'=> $request->clintsNumber,
        'clintsName' => $request->clintsName,
        'contactLastName' => $request->contactLastName,
        'contactFirstName' => $request->contactFirstName,
        'phone' =>$request->phone,
        'addressLine1' =>$request->addressLine1,
        'city' =>$request->city,
        'state' =>$request->state,
        'postalCode' =>$request->postalCode,
        'country' =>$request->country,
        'Repforsales' =>$request->Repforsales,
        'creditLimit' =>$request->creditLimit,
        ]);
        
        if($res == true){
            session(['clint_updated' => true]);
        }

        return redirect()->route('clints.show',$id);
    
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    function destroy($id)
    {
        DB::table(self::$tb_clints)->where('clintsNumber','=', $id)->update(
            ['clintdel' => 1]);
        
        return redirect()->route('clints.index');
    }

    function country($country){
        // $clints = DB::table(self::$tb_clints)->
        //     where('country', '=', $country)
        //     ->where('clintdel', '=', 0)
        //     ->simplePaginate(10);
           $clints = ClintModel::countries($country);
        //  $clints = DB::table(self::$tb_clints)->where('country', '=', $country);
        //  $nameclint=$clints->pluck('clintsName')->unique()->sort();
         return view('clints.index',compact('clints','country'));
        //  return $nameclint;
        //  $clints = DB::table(self::$tb_clints)->where('country', '=', $country)->get();
    }
    // 
    function limit($limit){
        $clints = ClintModel::limit($limit);

        return view('clints.index',compact('clints'));


    }





    function orders($id){
         $orders=DB::table(self::$tb_order)->where('clintsNumber','=',$id)->get();
        // $orders = ClintModel::orders($id)->get();
        return view('clints.orders',compact('orders'));
    }

    function order($order,$id){
        $tbl_clints= self:: $tb_clints; 
        $tbl_sales= self:: $tb_sales ;
        $tbl_order= self:: $tb_order ;
        $tbl_orderdetails= self:: $tbl_orderdetails; 
        $tbl_product= self:: $tbl_product;
      
        $order_info = DB::selectOne("SELECT `clintsName`,`shippedDate`,CONCAT(`lastName`,' ',`firstName`) `salesName` 
        FROM  $tbl_order `o` 
        JOIN $tbl_clints `c` USING(clintsNumber)
        LEFT JOIN $tbl_sales s ON c.Repforsales = s.salesNumber
        WHERE clintsNumber = '$id' AND `orderNumber` = '$order' ;" );

        $product= DB::select("SELECT `productName` ,`productCode`,`priceEach`,`quantityOrdered`
        FROM  $tbl_order o
        JOIN $tbl_clints c USING(clintsNumber)
        JOIN $tbl_orderdetails USING(orderNumber)
        join $tbl_product USING(productCode)
        WHERE `clintsNumber` = '$id' AND orderNumber = '$order' ;");

        return view('clints.order',compact('order_info','product'));

            }
           
     function delete(){
                 $clints = DB::table(self::$tb_clints)->where('clintdel','=','1')->get();
                //    $clints = ClintModel::onlyTrashed()->get();
                return view('clints.index',compact('clints'));
            }
      
     
    function restore($id){
        $res = DB::table(self::$tb_clints)->
        where('clintsnumber', '=', $id)->
        update(['clintdel' => 0]);

        if ($res) {
            session(['clintadded' => 'true']);
        }
        return redirect()->route('clints.show');
    }        


}
