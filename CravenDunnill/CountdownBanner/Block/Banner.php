<?php
namespace CravenDunnill\CountdownBanner\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\App\Config\ScopeConfigInterface;

class Banner extends Template
{
	protected $_scopeConfig;

	public function __construct(
		Template\Context $context,
		ScopeConfigInterface $scopeConfig,
		array $data = []
	) {
		$this->_scopeConfig = $scopeConfig;
		parent::__construct($context, $data);
	}
	
	public function getEnabled()
	{
		$enabled = $this->_scopeConfig->getValue('countdownbanner/general/enabled', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $enabled ?: "0";  // default to '0' if no value found
	}
	
	public function getDeadlineDate()
	{
		return $this->_scopeConfig->getValue('countdownbanner/general/deadline_date', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	}
	
	public function getDeadlineTime()
	{
		return $this->_scopeConfig->getValue('countdownbanner/general/deadline_time', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
	}
	
	public function getFormattedDeadline()
	{
		$deadlineDate = $this->getDeadlineDate();
		$deadlineTime = $this->getDeadlineTime();
	
		if (!$deadlineDate || !$deadlineTime) {
			return false; // or some default date/time value
		}
	
		$timestamp = strtotime($deadlineDate . ' ' . $deadlineTime);
		if ($timestamp === false) {
			return false; // or some default date/time value
		}
	
		return date("F j, Y H:i:s", $timestamp);
	}

	public function getBgColor()
	{
		$bgcolor = $this->_scopeConfig->getValue('countdownbanner/general/bgcolor', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $bgcolor ?: "#000000";  // default to black if no value found
	}
	
	public function getTextColor()
	{
		$textColor = $this->_scopeConfig->getValue('countdownbanner/general/textcolor', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $textColor ?: "#FFFFFF";  // default to white if no value found
	}

	public function getExpiredMessage()
	{
		$expiredMessage = $this->_scopeConfig->getValue('countdownbanner/general/expired_message', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $expiredMessage ?: "";  // default to empty string if no value found
	}
	
	public function getCustomMessage()
	{
		$customMessage = $this->_scopeConfig->getValue('countdownbanner/general/custom_message', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $customMessage ?: "";  // default to empty string if no value found
	}

	public function getBannerLink()
	{
		$bannerLink = $this->_scopeConfig->getValue('countdownbanner/general/banner_link', \Magento\Store\Model\ScopeInterface::SCOPE_STORE);
		return $bannerLink ?: "#";  // default to '#' if no value found
	}

}
?>
