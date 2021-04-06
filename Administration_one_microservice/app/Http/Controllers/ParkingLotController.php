<?php

namespace App\Http\Controllers;

use App\ParkingLot;
use Illuminate\Http\Request;

class ParkingLotController extends Controller
{
    
    /**
     * @SWG\Get(
     *   path="/api/parkinglot/",
     *   summary="Get All parking lots created by the application user",
     *   operationId="getAllParkingLots",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
	 *		@SWG\Parameter(
     *          name="getall",
     *          in="path",
     *          required=false, 
     *          type="string" 
     *      ),
     * )
     *
     */
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return ParkingLot::all();
    }
        
    /**
         * @SWG\Post(
         *   path="/api/parkinglot",
         *   summary="Create parking",
         *   operationId="createparkinglot",
         *   @SWG\Response(response=200, description="successful operation"),
         *   @SWG\Response(response=406, description="not acceptable"),
         *   @SWG\Response(response=500, description="internal server error"),
         *		@SWG\Parameter(
         *          name="create a ParkingLot",
         *          in="body",
         *			description="Create ParkingLot",
         *          required=true,
         *   		@SWG\Schema(@SWG\Property(property="id-owner", type="integer", example="5324"),
         *              @SWG\Property(property="id-client", type="integer", example="123"),
         *              @SWG\Property(property="Location", type="string", example="cll40kra32"),
         *              @SWG\Property(property="type", type="string", example="car")),
         *      )
         * )
         *
         */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        return ParkingLot::create($request->all());
    }

    /**
     * @SWG\Get(
     *   path="/api/parkinglot/{id}",
     *   summary="Get the parking lot by identification number",
     *   operationId="getparkinglotById",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
	 *		@SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer" 
     *      ),
     * )
     *
     */
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return ParkingLot::find($id);
    }
	
	/**
	 *
	 * 	@SWG\Put(
	 * 		path="/parkinglot/{id}",
	 * 		summary="update parking lot data",
     *   operationId="update parking lot",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
	 *		@SWG\Parameter(
     *          name="id",
     *          in="path",
	 *			description="identify the Parking Lot",
     *          required=true, 
     *          type="integer",
     *      ),
     *      @SWG\Parameter(
     *          name="new ParkingLot data",
     *          in="body",
     *			description="New ParkingLot update data",
     *          required=true,
     *   		@SWG\Schema(@SWG\Property(property="id-owner", type="integer", example="5324"),
     *              @SWG\Property(property="id-client", type="integer", example="123"),
     *              @SWG\Property(property="Location", type="string", example="cll40kra32"),
     *              @SWG\Property(property="type", type="string", example="car")),
     *      )
	 * 	)
	 *
	 */
    /**
     * Update the specified resource in storage.
     * @param  int  $id
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update($id,Request $request)
    {
        //
        $answer = "";
        $parkinglot = ParkingLot::find($id);
        if($parkinglot != null){
            $parkinglot->update($request->all());
            $answer = "UPDATED";
        }else{
            $answer = "NOT UPDATED, PARKING LOT NOT FOUND";
        }
        return $answer;
    }


    /**
     * @SWG\Delete(
     *   path="/api/parkinglot/{id}",
     *   summary="Delete the parking lot by identification number",
     *   operationId="deleteparkinglotById",
     *   @SWG\Response(response=200, description="successful operation"),
     *   @SWG\Response(response=406, description="not acceptable"),
     *   @SWG\Response(response=500, description="internal server error"),
	 *		@SWG\Parameter(
     *          name="id",
     *          in="path",
     *          required=true,
     *          type="integer" 
     *      ),
     * )
     *
     */
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        return ParkingLot::destroy($id);
    }
}
