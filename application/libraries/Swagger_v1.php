<?php
class Swagger_v1 {
    public $swagger;



    public function get(){
        return $this->swagger;
    }

    public function set_basePath($base_path)
    {
        $this->_set_date('basePath',$base_path);
    }

    public function set_swagger($swagger)
    {
        $this->_set_date('swagger',$swagger);
    }

    public function set_host($host)
    {
        $this->_set_date('host ',$host);
    }

    public function set_schemes($schemes)
    {
        $this->_set_date('schemes ',[$schemes]);
    }


    public function post($name,$description = '', $operationId='')
    {
        $item = array();
        $item['consumes'] = ['application/json'];
        $item['description'] = $description;
        $item['operationId'] = $operationId;
        $item['parameters'] = [
            [
                'description' => "Pet object that needs to be added to the store",
                'in' => 'body',
                'name' => "body",
                'required' => true,
                'schema' => ['$ref' => '#/definitions/Pet']

            ]
        ];
        $item['produces'] = ['application/json'];
        $item['responses'] = ['405'=>['description'=>'adsfsdf']];
        $item['security'] = '';
        $item['summary'] = 'Add a new pet to the store';
        $item['tags'] = 'tags';
        $this->swagger['paths'][$name] = $item;
    }

    private function _set_date($key,$val){
        $this->swagger[$key] = $val;
    }

}