<?php

namespace Tests\Feature;

use Tests\CreatesApplication;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class BaseFeatureTestCase extends BaseTestCase
{
    use CreatesApplication;
    use RefreshDatabase;

    /**
     * @var string
     */
    protected $idKey = 'id';
    /**
     * @var mixed
     */
    protected $base_route = null;

    /**
     * @var mixed
     */
    protected $route_parameter = [];

    /**
     * @var mixed
     */
    protected $serverVariables = [];

    /**
     * @var mixed
     */
    protected $baseModelAttributes = null;
    /**
     * @var mixed
     */
    protected $base_model = null;

    /**
     * @param $user
     * @return mixed
     */
    protected function SignIn($user = null)
    {
        $user = $user ?? create(\App\User::class);

        $this->actingAs($user);

        return $this;
    }

    /**
     * @param $route
     */
    protected function setBaseRoute($route, $params = [])
    {
        $this->base_route = $route;
        $this->route_parameter = $params;
    }

    /**
     * @param $route
     */
    protected function setRouteParameter($params = [])
    {
        $this->route_parameter = $params;
    }

    /**
     * @param $route
     */
    protected function setServerVariables($params = [])
    {
        $this->serverVariables = $params;
    }

    /**
     * @param $model
     */
    protected function setBaseModel($model)
    {
        $this->base_model = $model;
    }

    /**
     * @param $model
     */
    protected function setBaseModelAttributes($baseModelAttributes)
    {
        $this->baseModelAttributes = $baseModelAttributes;
    }

    /**
     * @param array $attributes
     * @param $model
     * @param $route
     */
    protected function read($attributes = [], $model = '', $route = '')
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.index" : $route;
        $model = $this->base_model ?? $model;

        $attributes = raw($model, $attributes);

        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }
        
        $route = $this->processRoute($route);

        $response = $this->getJson($route, $attributes)->assertSuccessful();

        return $response;
    }

    /**
     * @param array $attributes
     * @param $model
     * @param $route
     */
    protected function create($attributes = [], $model = '', $route = '', $customAssertAttributes = null)
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.store" : $route;
        $model = $this->base_model ?? $model;

        $attributes = raw($model, $attributes);

        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }

        $route = $this->processRoute($route);

        $response = $this->postJson($route, $attributes);
            // ->withServerVariables($this->serverVariables);

        $model = new $model;

        $attributes = $customAssertAttributes ?? $attributes;

        $this->assertDatabaseHas($model->getTable(), $attributes);

        return $response;
    }

    /**
     * @param array $attributes
     * @param $model
     * @param $route
     */
    protected function update($attributes = [], $model = '', $route = '', $customAssertAttributes = null, $baseModelAttributes = [])
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.update" : $route;
        $model = $this->base_model ?? $model;
        $model = create($model, $this->baseModelAttributes ?? $baseModelAttributes);

        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }

        $route = $this->processRoute($route, [$this->idKey => $model->id]);
        $response = $this->postJson($route, $attributes);

        $attributes = $customAssertAttributes ?? $attributes;

        tap($model->fresh(), function ($model) use ($attributes) {
            collect($attributes)->each(function ($value, $key) use ($model) {
                $this->assertEquals($value, $model[$key]);
            });
        });

        return $response;
    }

    /**
     * @param $model
     * @param $route
     */
    protected function destroy($model = '', $route = '', $baseModelAttributes = [])
    {
        $this->withoutExceptionHandling();

        $route = $this->base_route ? "{$this->base_route}.delete" : $route;
        $model = $this->base_model ?? $model;

        $model = create($model, $this->baseModelAttributes ?? $baseModelAttributes);

        if (!auth()->user()) {
            $this->expectException(\Illuminate\Auth\AuthenticationException::class);
        }

        $route = $this->processRoute($route, [$this->idKey => $model->id]);
        $response = $this->deleteJson($route);

        $this->assertDatabaseMissing($model->getTable(), $model->toArray());

        return $response;
    }

    /**
     * @param $model
     * @param $route
     */
    // public function multipleDelete($model = '', $route = '')
    // {
    //     $this->withoutExceptionHandling();

    //     $route = $this->base_route ? "{$this->base_route}.destroyAll" : $route;
    //     $model = $this->base_model ?? $model;

    //     $model = create($model, [], 5);

    //     $ids = $model->map(function ($item, $key) {
    //         return $item->id;
    //     });

    //     return $this->deleteJson(route($route), ['ids' => $ids]);
    // }

    /**
     * @param $route
     * @param $id
     */
    protected function processRoute($route, $params = [])
    {
        // if ($id !== null) {

        //     return route($route, $id);
        // }

        return route($route, array_merge($this->route_parameter, $params));

    }
}
