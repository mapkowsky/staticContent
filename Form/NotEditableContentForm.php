<?php

namespace StaticContent\Form;

/**
 * @author m.lewandowski4
 */
class NotEditableContentForm extends Base\Form {

	protected function getName() {
		return 'notEditableContentForm';
	}

	/**
	 * @param StaticContent\Model\StaticContentInterface $model
	 */
	protected function prepareModel($model) {
		$model->setIsEditable(FALSE);
		return $model;
	}

}
