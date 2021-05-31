<?php

namespace App\Http\Controllers;

use App\Http\Requests\PESSOARequest;
use App\Http\Controllers\Controller;
use App\Models\PESSOAModel;
use App\Api\ApiMessages;

class PESSOAController extends Controller
{

    private $pessoacrud;

    public function __construct(PESSOAModel $pessoacrud){
        $this->pessoacrud = $pessoacrud;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pessoacrud = $this->pessoacrud->paginate('10');

        return response()->json($pessoacrud, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PESSOARequest $request)
    {
        $data = $request->all();

        try{

            $pessoacrud = $this->pessoacrud->create($data);

            return response()->json([
                'data' => [
                    'msg' => 'Pessoa cadastrada com sucesso!'
                ]
            ], 200);
        }catch (Exception $e) {
            $message = new ApiMessages($e->getMessages());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {

            $pessoacrud = $this->pessoacrud->FindOrFail($id);

            return response()->json([
                'data' => $pessoacrud

            ], 200);
        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PESSOARequest $request, $id)
    {
        $data = $request->all();

        try{

            $pessoacrud = $this->pessoacrud->findOrFail($id);
            $pessoacrud->update($data);

            return response()->json([
                'data' =>[
                    'msg' => 'Pessoa atualizada!'
                ]
                ], 200);

        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $pessoacrud = $this->pessoacrud->FindOrFail($id);
            $pessoacrud->delete();

            return response()->json([
                'data' => [
                    'msg' => 'Pessoa deletada com sucesso!'
                ]
            ], 200);
        } catch (Exception $e) {
            $message = new ApiMessages($e->getMessage());
            return response()->json($message->getMessage(), 401);
        }
    }
}
