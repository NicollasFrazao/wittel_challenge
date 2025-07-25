<?php
namespace App\Filament\Resources\CustomerResource\Api\Handlers;

use Illuminate\Http\Request;
use Rupadana\ApiService\Http\Handlers;
use App\Filament\Resources\CustomerResource;
use App\Filament\Resources\CustomerResource\Api\Requests\UpdateCustomerRequest;

class UpdateHandler extends Handlers {
    public static string | null $uri = '/{id}';
    public static string | null $resource = CustomerResource::class;

    public static function getMethod()
    {
        return Handlers::PUT;
    }

    public static function getModel() {
        return static::$resource::getModel();
    }


    /**
     * Update Customer
     *
     * @param UpdateCustomerRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function handler(UpdateCustomerRequest $request)
    {
        $id = $request->route('id');

        $model = static::getModel()::find($id);

        if (!$model) return static::sendNotFoundResponse();

        $model->fill($request->all());

        $model->save();

        return static::sendSuccessResponse($model, "Successfully Update Resource");
    }
}