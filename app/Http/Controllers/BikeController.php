<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bike;
use App\Http\Requests\BikeFormRequest;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    private static function getData(){
        return[
            ['id'=>1, 'name' => "S-Works Venge Di2-Sagan Collection", 'brand' =>'Specialized', 'price'=>'14,551,040원'],
            ['id'=>2, 'name' => "S-Works Tarmac SL7", 'brand' =>'Specialized', 'price'=>'18,738,901원'],
            ['id'=>3, 'name' => "Pinarello Dogma F12 Disk", 'brand' =>'Pinarello', 'price'=>'17,035,364원'],
            ['id'=>4, 'name' => "BMC Teammachine SLR 01 Disc", 'brand' =>'BMC', 'price'=>'20,584,399원'],
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //GET
        return view('bikes.index', [
            //'bikes' => self::getData(), 하드고딩된 데이터 가져오기
            'bikes' => Bike::all(), //데이터베이스에서 가져오기
            'userInput' => '<script>alert("hello")</script>'
        ]);
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('bikes.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BikeFormRequest $request)
    {

        $data = $request->validated();

        //POST
        $bike = new Bike(); //로드한 bike 모델을 통해 새 인스턴스(객체) 생성


        $bike->name = $data['bike-name'];
        $bike->brand = $data['bike-brand'];
        $bike->price = $data['bike-price'];


        $bike->save();
        return redirect()->route('bikes.index'); //table에 값 index 페이지로 이동

    }

    /**
     * Display the specified resource.
     */
    public function show(Bike $bike)
    {
        return view('bikes.show', [
            'bike'=>$bike
        ]);
    }




    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bike $bike)
    {
        //
        return view('bikes.edit', [
            'bike'=>$bike
        ]);        
    }



    /**
     * Update the specified resource in storage.
     */
    public function update(BikeFormRequest $request, Bike $bike)

    {
        //
        $data = $request->validated();


        //POST
        $bike->name = $data['bike-name'];
        $bike->brand = $data['bike-brand'];
        $bike->price = $data['bike-price'];


        $bike->save();
        return redirect()->route('bikes.show', $bike->id);    

    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
