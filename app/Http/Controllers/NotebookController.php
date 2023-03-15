<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use OpenApi\Annotations as OA;

class NotebookController extends Controller
{
    /**
     * @OA\Get(
     *     path="api/v1/notebook",
     *     operationId="allRecords",
     *     tags={"Notebook"},
     *     summary="Получение всех записей",
     *     @OA\Response(
     *          response=200,
     *          description="Успешно",
     *          @OA\JsonContent(ref="#/components/schemas/Notebook")
     *     )
     * )
     *
     */
    public function index()
    {
        $data = Notebook::query()->paginate(5, ['*'],'page');
        return NotebookResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreNotebookRequest $request)
    {
        $validated = $request->validated();
        Notebook::query()->create($request->validated());
        return $validated;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return Notebook::query()->findOrFail($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateNotebookRequest $request, string $id)
    {
        $note = Notebook::query()->findOrFail($id);
        $note->fill($request->validated())->save();
        return $note;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $note = Notebook::query()->findOrFail($id);
        $note->delete();
        return response(null, 204);
    }
}
