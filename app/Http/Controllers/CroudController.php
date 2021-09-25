<?php

namespace App\Http\Controllers;

use App\Http\Requests\OfferRequest;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use LaravelLocalization;



class CroudController extends Controller
{

   /* public function getvalues(){
        return Offer::select('name_ar','name_en','price','id')->get();
    }*/



    public function create(){
        return view('Offers.createForm');
    }

    public function store(OfferRequest $request){
        //validation
/*         $rules = $this->getrules();
         $Messeges = $this->getMasseges();
        $validator = Validator::make($request->all(),$rules,$Messeges);
        if($validator->fails()){
           return redirect()->to('offers\create')->withErrors($validator)->withInput($request->all())->with($Messeges);
        }*/
        //insert to database
        Offer::create([
            'name_ar'=>$request->name_ar,
            'name_en'=>$request->name_en,
            'price' => $request->price,
            'details_ar' => $request->details_ar,
            'details_en' => $request->details_en,

        ]);
        return redirect()->back()->with(["success"=>__('messages.added Successfully')]);
    }

/*    protected function getrules(){
        return $rules = [
            'name'=>'required|max:100|unique:offers,name',
            'price'=>'required|numeric',
            'details' =>'required',
        ];
    }

    protected function getMasseges(){
        return $Messege = [
            'name.required' => __('messages.offer name required'),
            'name.max' =>__('messages.Offer max chars'),
            'name.unique' => __('messages.Name unique'),
            'price.required' => __('messages.offer price required'),
            'price.numeric'=>__('messages.Price numeric'),
            'details.required'=>__('messages.offer details required'),
        ];
    }*/


    public function getAllOffers(){

        $offers = Offer::select('id',
            'name_'. LaravelLocalization::getCurrentLocale(). ' as name',
            'details_'. LaravelLocalization::getCurrentLocale(). ' as details'
            ,'price')
            ->get();  //return Collection

        return view('Offers.displayOffers',compact('offers'));

    }

}
