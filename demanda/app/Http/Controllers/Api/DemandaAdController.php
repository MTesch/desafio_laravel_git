<?php

namespace App\Http\Controllers\Api;

use App\Demanda;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DemandaAdController extends Controller
{

    private $demanda;

    public function __construct(Demanda $demanda)
    {
		//$this->middleware('auth:ad');
    	$this->demanda = $demanda;
    }

    public function index()
    {
    	$data = ['data' => $this->demanda->all()];
		return response()->json($data);
    }

    public function show($id)
    {
		$demanda = $this->demanda->find($id);
		if(! $demanda) return response()->json(ApiError::errorMessage('Demanda não encontrada', 4040), 404);

		$data = ['data' => $demanda];
		return response()->json($data);
    }

	public function show_demanda_anunciante($anunciante)
    {
		$demanda = $this->demanda->where('anunciante', $anunciante)->get();
		if(! $demanda) return response()->json(ApiError::errorMessage('Demanda não encontrada', 4040), 404);

		$data = ['data' => $demanda];
		return response()->json($data);
    }

    public function store(Request $request)
    {
		try{

			$demandaData = $request->all();
			$this->demanda->create($demandaData);
			return response()->json(['msg' => 'Demanda criada com sucesso!'], 201);

		}catch (\Exception $e) {
			if(config('app.debug')){
			return response()->json(ApiError::errorMessage($e->getMessage(), 1010), 500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao salvar', 1010), 500);
		}
	
    }

    public function update(Request $request, $anunciante, $id)
    {
		try{

			$demandaData = $request->all();
			$demanda = $this->demanda->find($id);
			$demanda->update($demandaData);
			return response()->json(['msg' => 'Demanda atualizada com sucesso! Anunciante: ' . $anunciante . ' Id: ' . $id ], 201);

		}catch (\Exception $e) {
			if(config('app.debug')){
				return response()->json(ApiError::errorMessage($e->getMessage(), 1011), 500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao atualizar', 1011), 500);
		}
	
    }

    public function delete($anunciante, Demanda $id)
    {
		try
		{
			$id->delete();
			return response()->json(['msg' => 'Demanda: ' . $id->descricao . ' removida com sucesso!'], 200);
		} 
		catch(\Exception $e)
		{
			if(config('app.debug')){
				return response()->json(ApiError::errorMessage($e->getMessage(), 1012), 500);
			}
			return response()->json(ApiError::errorMessage('Houve um erro ao remover', 1012), 500);
		}
    }

}
