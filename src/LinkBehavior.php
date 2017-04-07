<?php
/**
 * @author Brett O'Donnell <cornernote@gmail.com>
 * @copyright 2016 Mr PHP
 * @link https://github.com/cornernote/yii2-link-behavior
 * @license BSD-3-Clause https://raw.github.com/cornernote/yii2-link-behavior/master/LICENSE.md
 */

namespace cornernote\linkbehavior;

use Yii;
use yii\base\Behavior;
use yii\base\Event;
use yii\db\ActiveRecord;
use yii\db\BaseActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Inflector;
use yii\helpers\StringHelper;

/**
 * LinkBehavior
 *
 * @usage:
 * ```
 * public function behaviors() {
 *     return [
 *         [
 *             'class' => 'cornernote\linkbehavior\LinkBehavior',
 *         ],
 *     ];
 * }
 * ```
 *
 * @property string|array $url
 * @property string $link
 * @property string $linkText
 * @property string $controllerName
 * @property string $primaryKeyString
 *
 * @property ActiveRecord|LinkBehavior $owner
 */
class LinkBehavior extends Behavior
{

    /**
     * @var string The name of default action for the model, usually view
     */
    public $defaultAction = 'view';

    /**
     * @var string The name of the controller to be used in links
     */
    public $moduleName;

    /**
     * @var string The name of the controller to be used in links
     */
    private $_controllerName;

    /**
     * Gets the name of the controller to be used in links
     *
     * @return string
     */
    public function getControllerName()
    {
        if ($this->_controllerName)
            return $this->_controllerName;
        return $this->_controllerName = Inflector::slug(StringHelper::basename($this->owner->className()));
    }

    /**
     * Sets the name of the controller to be used in links
     *
     * @param $controllerName
     */
    public function setControllerName($controllerName)
    {
        $this->_controllerName = $controllerName;
    }

    /**
     * The name of this model to be used in titles
     *
     * @return string
     */
    public function getLinkText()
    {
        return $this->owner->className() . '-' . $this->owner->getPrimaryKeyString();
    }

    /**
     * Returns a URL Array to the model
     *
     * @param string $action
     * @param array $params
     * @return array
     */
    public function getUrl($action = null, $params = [])
    {
        if (!$action)
            $action = $this->defaultAction;
        return ArrayHelper::merge([
            '/' . ($this->owner->moduleName ? $this->owner->moduleName . '/' : '') . $this->owner->getControllerName() . '/' . $action,
            'id' => $this->owner->getPrimaryKeyString(),
        ], $params);
    }

    /**
     * Returns a Link to the model
     *
     * @param string $title
     * @param string $action
     * @param array $params
     * @param array $options
     * @return string
     */
    public function getLink($title = null, $action = null, $params = [], $options = [])
    {
        if ($title === null)
            $title = $this->owner->linkText;
        return Html::a($title, $this->owner->getUrl($action, $params), $options);
    }

    /**
     * Returns Primary Key as a string
     *
     * @return string
     */
    public function getPrimaryKeyString()
    {
        if (is_array($this->owner->primaryKey))
            return implode('-', $this->owner->primaryKey);
        return $this->owner->primaryKey;
    }

}