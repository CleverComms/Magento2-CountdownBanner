<?php
namespace CleverComms\CountdownBanner\Block\Adminhtml\Form\Field;
 
class ColorPicker extends \Magento\Config\Block\System\Config\Form\Field
{
	/**
	 * @param \Magento\Backend\Block\Template\Context $context
	 * @param array $data
	 */
	public function __construct(
	\Magento\Backend\Block\Template\Context $context,
	array $data = []
	) 
	{
		parent::__construct($context, $data);
	}
 
	/**
	 * add color picker in admin configuration fields
	 * @param  \Magento\Framework\Data\Form\Element\AbstractElement $element
	 * @return string script
	 */
	protected function _getElementHtml(\Magento\Framework\Data\Form\Element\AbstractElement $element)
	{
		return '<input type="color" id="' .
			$element->getHtmlId() .
			'" name="' .
			$element->getName() . 
			'" value="' .
			$element->getEscapedValue() .
			'" class="colorpicker-palette" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$"/> 
		    <input type="text" id="' .
			$element->getHtmlId() .
			'_hexcolor"  value="' .
			$element->getEscapedValue() .
			'" class="colorpicker-input" pattern="^#+([a-fA-F0-9]{6}|[a-fA-F0-9]{3})$" />';
	}
}