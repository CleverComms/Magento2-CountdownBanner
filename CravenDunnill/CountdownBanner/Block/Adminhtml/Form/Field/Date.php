<?php
namespace CravenDunnill\CountdownBanner\Block\Adminhtml\Form\Field;

class Date extends \Magento\Config\Block\System\Config\Form\Field
{
	protected $_template = 'CravenDunnill_CountdownBanner::system/config/form/field/date.phtml';
	
	protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
	{
		$value = $element->getValue();
		if ($value) {
			// Convert date to YYYY-MM-DD format
			$formattedDate = date("Y-m-d", strtotime($value));
			$element->setData('value', $formattedDate);
		}
		$this->setElement($element);
		return $this->_toHtml();
	}

}
