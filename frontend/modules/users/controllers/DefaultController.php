<?php

namespace frontend\modules\users\controllers;

use frontend\models\SignupForm;
use Yii;
use yii\base\InvalidConfigException;
use yii\filters\auth\QueryParamAuth;
use yii\rest\ActiveController;
use frontend\modules\users\models\User;
use yii\rest\Serializer;
use yii\web\ServerErrorHttpException;

class DefaultController extends ActiveController
{
    /**
     * @SWG\Get(
     *     path="/users",
     *     tags={"Users"},
     *     summary="Retrieves the collection of User resources.",
     *     @SWG\Parameter(
     *         name="access-token",
     *         in="query",
     *         description="Auth key",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="User collection response",
     *         @SWG\Schema(ref="#/definitions/User")
     *     )
     * )
     */

    /**
     * @SWG\Post(
     *   path="/users",
     *   summary="Adds a new user - with oneOf examples",
     *   description="Adds a new user",
     *   operationId="addUser",
     *   tags={"Users"},
     *   @SWG\Parameter(
     *     name="access-token",
     *     in="query",
     *     description="Auth key",
     *     required=true,
     *     type="string"
     *   ),
     *   @SWG\Parameter(
     *     name="body",
     *     in="body",
     *     required=true,
     *     @SWG\Schema(
     *       type="object",
     *       @SWG\Property(
     *         property="username",
     *         type="string",
     *         example="John Doe"
     *       ),
     *       @SWG\Property(
     *         property="email",
     *         type="string",
     *         example="johndoe@mail.ru"
     *       ),
     *       @SWG\Property(
     *          property="password",
     *          type="string",
     *          example="12345678"
     *        )
     *     )
     *   ),
     *   @SWG\Response(
     *     response=201,
     *     description="OK"
     *   )
     * )
     */

    /**
     * @SWG\Head(
     *     path="/users",
     *     tags={"Users"},
     *     summary="Return headers",
     *     @SWG\Parameter(
     *          name="access-token",
     *          in="query",
     *          description="Auth key",
     *          required=true,
     *          type="string"
     *      ),
     *     @SWG\Response(
     *         response=200,
     *         description="Headers response"
     *     )
     * )
     */

    /**
     * @SWG\Put(
     *     path="/users/{id}",
     *     summary="Updates a user",
     *     description="Updates a user",
     *     operationId="updateUser",
     *     tags={"User"},
     *     @SWG\Parameter(
     *          name="access-token",
     *      in="query",
     *      description="Auth key",
     *      required=true,
     *      type="string"
     *    ),
     *     @SWG\Parameter(
     *         description="User id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *      name="body",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(
     *        type="object",
     *        @SWG\Property(
     *          property="username",
     *          type="string",
     *          example="John Doe2"
     *        ),
     *        @SWG\Property(
     *          property="email",
     *          type="string",
     *          example="johndoe2@mail.ru"
     *        ),
     *      )
     *    ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *         @SWG\Schema(ref = "#/definitions/User")
     *     )
     * )
     */

    /**
     * @SWG\Patch(
     *     path="/users/{id}",
     *     summary="Updates a user",
     *     description="Updates a user",
     *     operationId="updateUser",
     *     tags={"User"},
     *     @SWG\Parameter(
     *          name="access-token",
     *      in="query",
     *      description="Auth key",
     *      required=true,
     *      type="string"
     *    ),
     *     @SWG\Parameter(
     *         description="User id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Parameter(
     *      name="body",
     *      in="body",
     *      required=true,
     *      @SWG\Schema(
     *        type="object",
     *        @SWG\Property(
     *          property="username",
     *          type="string",
     *          example="John Doe2"
     *        ),
     *        @SWG\Property(
     *          property="email",
     *          type="string",
     *          example="johndoe2@mail.ru"
     *        ),
     *      )
     *    ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *         @SWG\Schema(ref = "#/definitions/User")
     *     )
     * )
     */

    /**
     * @SWG\Delete(
     *     path="/users/{id}",
     *     summary="Delete a user",
     *     description="Delete a user",
     *     operationId="deleteUser",
     *     tags={"User"},
     *     @SWG\Parameter(
     *          name="access-token",
     *      in="query",
     *      description="Auth key",
     *      required=true,
     *      type="string"
     *    ),
     *     @SWG\Parameter(
     *         description="User id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=204,
     *         description="OK",
     *     )
     * )
     */

    /**
     * @SWG\Get(
     *     path="/users/{id}",
     *     summary="Get a user",
     *     description="Get a user",
     *     operationId="getUser",
     *     tags={"User"},
     *     @SWG\Parameter(
     *          name="access-token",
     *      in="query",
     *      description="Auth key",
     *      required=true,
     *      type="string"
     *    ),
     *     @SWG\Parameter(
     *         description="User id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *         @SWG\Schema(ref = "#/definitions/User")
     *     )
     * )
     */

    /**
     * @SWG\Head(
     *     path="/users/{id}",
     *     summary="Return headers",
     *     description="Return headers",
     *     operationId="getUser",
     *     tags={"User"},
     *     @SWG\Parameter(
     *      name="access-token",
     *      in="query",
     *      description="Auth key",
     *      required=true,
     *      type="string"
     *    ),
     *     @SWG\Parameter(
     *         description="User id",
     *         in="path",
     *         name="id",
     *         required=true,
     *         type="string"
     *     ),
     *     @SWG\Response(
     *         response=200,
     *         description="OK",
     *     )
     * )
     */

    public $modelClass = User::class;

    public $serializer = [
        'class' => Serializer::class,
        'collectionEnvelope' => 'items',
    ];

    /**
     * {@inheritdoc}
     */

    public function behaviors(): array
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => QueryParamAuth::class,
        ];
        return $behaviors;
    }

    public function actions(): array
    {
        $actions = parent::actions();

        unset($actions['create']);

        return $actions;
    }

    /**
     * @throws InvalidConfigException
     * @throws ServerErrorHttpException
     */
    public function actionCreate()
    {
        $model = new SignupForm();
        $data = [
            'SignupForm' => Yii::$app->getRequest()->getBodyParams()
        ];
        if ($model->load($data) && $model->signup()) {
            $response = Yii::$app->getResponse();
            $response->setStatusCode(201);
        } else {
            throw new ServerErrorHttpException('Failed to create the object for unknown reason.');
        }
    }
}
