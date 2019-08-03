<?php
App::uses('AppModel', 'Model');
/**
 * Player Model
 *
 */
class Player extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'name';

	public function __construct($id = false, $table = null, $ds = null) {
        if ( AuthComponent::user('id')   ) {
            $this->actsAs[] = 'SoftDelete';
        }
        return parent::__construct($id, $table, $ds);
    }
    public function exists($id = null) {
        if ($this->Behaviors->loaded('SoftDelete')) {
            return $this->existsAndNotDeleted($id);
        } else {
            return parent::exists($id);
        }
    }
    public function delete($id = null, $cascade = true) {
        $result = parent::delete($id, $cascade);
        if ($result === false && $this->Behaviors->enabled('SoftDelete')) {
           return (bool)$this->field('deleted', array('deleted' => 1));
        }
        return $result;
    }

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'deleted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

}
