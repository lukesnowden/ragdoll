<?php namespace Lukesnowden\Ragdoll\Repositories;

use Illuminate\Database\Eloquent\Model;
use Validator;
use View;

abstract class Repository
{

    /**
     * [$model description]
     * @var [type]
     */
    protected $model;

    /**
     * [$viewPath description]
     * @var string
     */
    protected $viewPath = '';

    /**
     * [$rules description]
     * @var array
     */
    protected $rules = array();

    /**
     * [__construct description]
     * @param Model $model [description]
     */
    public function __construct( Model $model ) {
        $this->model = $model;
    }

    /**
     * [create description]
     * @return [type] [description]
     */
    public function create( $array ) {
        $model = new $this->model;
        foreach( $this->rules as $key => $value ) {
            if( isset( $array[$key] ) ) {
                $model->{$key} = $array[$key];
            }
        }
        $model->save();
        return $model;
    }

    /**
     * [update description]
     * @param  [type] $id    [description]
     * @param  [type] $array [description]
     * @return [type]        [description]
     */
    public function update( $id, $array ) {
        $model = $this->find( $id );
        foreach( $this->rules as $key => $value ) {
            if( isset( $array[$key] ) ) {
                $model->{$key} = $array[$key];
            }
        }
        $model->save();
        return $model;
    }

    /**
     * [failsValidation description]
     * @param  Input  $input [description]
     * @return [type]        [description]
     */
    public function failsValidation( $input ) {
        $v = Validator::make( $input, $this->rules );
        if( $v->fails() ) return $v->errors();
        return false;
    }

    /**
     * [find description]
     * @param  [type] $id [description]
     * @return [type]     [description]
     */
    public function find( $id ) {
        return $this->model->findorfail( $id );
    }

    /**
     * [view description]
     * @param  [type] $view [description]
     * @return [type]       [description]
     */
    public function view( $view, $data = array() ) {
        return View::make( $this->viewPath . $view, $data );
    }

    /**
     * [paginate description]
     * @param  integer $amount [description]
     * @return [type]          [description]
     */
    public function paginate( $amount = 10 ) {
        return $this->model->paginate( $amount );
    }

}