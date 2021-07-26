<?php

namespace app\core\form;

use app\core\models\Model;

abstract class Field
{
    public Model $model;
    public string $attribute;

    /**
     * @param \app\core\models\Model $model
     * @param string $attribute
     */
    public function __construct(Model $model, string $attribute)
    {
        $this->model = $model;
        $this->attribute = $attribute;
    }

    abstract public function renderInput(): string;

    public function __toString()
    {
        return sprintf(
            '
            <div class="form-floating">
                %s
                <label>%s</label>
                <div class="invalid__feedback">
                    %s
                </div>
            </div>
        ',
            $this->renderInput(),
            $this->model->labels()[$this->attribute] ?? $this->attribute,
            $this->model->getFirstError($this->attribute)
        );
    }
}
