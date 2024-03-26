<?php

namespace frontend\modules\users\controllers;

use Yii;
use yii\helpers\Url;
use yii\web\Controller;
use yii2mod\swagger\SwaggerUIRenderer;
use yii2mod\swagger\OpenAPIRenderer;
use yii\web\ErrorAction;

/**
 * @SWG\Swagger(
 *     basePath="/",
 *     produces={"application/json"},
 *     consumes={"application/json"},
 *     @SWG\Info(version="1.0", title="User API"),
 * )
 */
class SwaggerController extends Controller
{
    /**
     * @inheritdoc
     */
    public function actions(): array
    {
        return [
            'docs' => [
                'class' => SwaggerUIRenderer::class,
                'restUrl' => Url::to(['swagger/json-schema']),
            ],
            'json-schema' => [
                'class' => OpenAPIRenderer::class,

                'scanDir' => [
                    Yii::getAlias('@frontend/modules/users/controllers'),
                    Yii::getAlias('@frontend/modules/users/models'),
                ],
            ],
            'error' => [
                'class' => ErrorAction::class,
            ],
        ];
    }
}