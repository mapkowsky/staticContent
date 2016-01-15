<?php

namespace StaticContent\Form;

/**
 * @author m.lewandowski4
 */
class EditableContentForm extends Base\Form {

	protected function getName() {
		return 'editableContentForm';
	}

	/**
	 * @param StaticContent\Model\StaticContentInterface $model
	 */
	protected function prepareModel($model) {
		$model->setIsEditable(TRUE);
		return $model;
	}

}
