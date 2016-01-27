<?php

namespace StaticContent\Form;

/**
 * @author m.lewandowski4
 */
class NonEditableContentForm extends Base\Form {

	protected function getName() {
		return 'nonEditableContentForm';
	}

	/**
	 * @param StaticContent\Model\StaticContentInterface $model
	 */
	protected function prepareModel($model) {
		$model->setIsEditable(FALSE);
		return $model;
	}

}
