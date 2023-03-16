<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreNotebookRequest;
use App\Http\Requests\UpdateNotebookRequest;
use App\Http\Resources\NotebookResource;
use App\Models\Notebook;
use Illuminate\Http\Response;
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
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Notebook")
     *     ),
     *     @OA\Response(
     *          response="204",
     *          description="No content",
     *     ),
     * )
     *
     */
    public function index()
    {
        $data = Notebook::query()->get()->all();
        abort_if(empty($data), Response::HTTP_NO_CONTENT);

        $data = Notebook::query()->paginate(5, ['*'],'page');
        return NotebookResource::collection($data);
    }

    /**
     * @OA\Post(
     *     path="api/v1/notebook",
     *     operationId="newRecord",
     *     tags={"Notebook"},
     *     summary="Добавление записи",
     *     @OA\RequestBody(
     *          required=true,
     *          description="Запрос",
     *          @OA\JsonContent(
     *              type="object",
     *                      @OA\Property(
     *                          property="initials",
     *                          type="string",
     *                          example="Bob Big Finger"
     *                      ),
     *                      @OA\Property(
     *                          property="company",
     *                          type="string",
     *                          example="Future"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string",
     *                          example="88005553535"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string",
     *                          example="bobbigone@gmail.com"
     *                      ),
     *                      @OA\Property(
     *                          property="birthday",
     *                          type="string",
     *                          example="1935-04-15T00:00:00.000000Z"
     *                      ),
     *                      @OA\Property(
     *                          property="photo",
     *                          type="string",
     *                          example="uuid()"
     *                      ),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Notebook")
     *     ),
     *     @OA\Response(
     *          response="401",
     *          description="Unauthenticated",
     *     ),
     *     @OA\Response(
     *          response="403",
     *          description="Forbidden",
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="Resource Not Found",
     *     ),
     * )
     */
    public function store(StoreNotebookRequest $request)
    {
        $validated = $request->validated();
        Notebook::query()->create($request->validated());
        return $validated;
    }

    /**
     * @OA\Get(
     *     path="api/v1/notebook/{id}",
     *     operationId="recordById",
     *     tags={"Notebook"},
     *     summary="Получение выбранной записи",
     *     @OA\Parameter(
     *          name="id",
     *          description="Note id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Notebook")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="Resource Not Found",
     *     ),
     * )
     */
    public function show(string $id)
    {
        $note = Notebook::query()->findOrFail($id);
        abort_if(empty($note), Response::HTTP_NOT_FOUND);
        return $note ;
    }

    /**
     * @OA\Post(
     *     path="api/v1/notebook/{id}",
     *     operationId="updateRecordById",
     *     tags={"Notebook"},
     *     summary="Обновление выбранной записи",
     *     @OA\Parameter(
     *          name="id",
     *          description="Note id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *     @OA\RequestBody(
     *          required=true,
     *          description="Запрос",
     *          @OA\JsonContent(
     *              type="object",
     *                      @OA\Property(
     *                          property="initials",
     *                          type="string",
     *                          example="Bob Big Finger"
     *                      ),
     *                      @OA\Property(
     *                          property="company",
     *                          type="string",
     *                          example="Future"
     *                      ),
     *                      @OA\Property(
     *                          property="phone",
     *                          type="string",
     *                          example="88005553535"
     *                      ),
     *                      @OA\Property(
     *                          property="email",
     *                          type="string",
     *                          example="bobbigone@gmail.com"
     *                      ),
     *                      @OA\Property(
     *                          property="birthday",
     *                          type="string",
     *                          example="1935-04-15T00:00:00.000000Z"
     *                      ),
     *                      @OA\Property(
     *                          property="photo",
     *                          type="string",
     *                          example="uuid()"
     *                      ),
     *          ),
     *     ),
     *     @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(ref="#/components/schemas/Notebook")
     *     ),
     *     @OA\Response(
     *          response="404",
     *          description="Resource Not Found",
     *     ),
     * )
     */
    public function update(UpdateNotebookRequest $request, string $id)
    {
        $note = Notebook::query()->findOrFail($id);
        abort_if(empty($note), Response::HTTP_NOT_FOUND);
        $note->fill($request->validated())->save();
        return $note;
    }

    /**
     * @OA\Delete(
     *     path="api/v1/notebook/{id}",
     *     operationId="deleteRecordById",
     *     tags={"Notebook"},
     *     summary="Удаление выбранной записи",
     *     description="Удаляет запись и возвращает пустой ответ",
     *     @OA\Parameter(
     *          name="id",
     *          description="Note id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="No content",
     *       ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy(string $id)
    {
        $note = Notebook::query()->find($id);
        abort_if(empty($note), Response::HTTP_NOT_FOUND);
        $note->delete();
        return response(null, 204);
    }
}
