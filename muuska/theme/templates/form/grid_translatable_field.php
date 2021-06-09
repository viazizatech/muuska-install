<?php 
/** @var \muuska\html\form\GridTranslatableField $item */
/** @var \muuska\html\config\HtmlGlobalConfig $globalConfig */
/** @var \muuska\html\config\caller\HtmlCallerConfig $callerConfig */
?>

<?php echo $item->drawStartTag('div', $globalConfig, $callerConfig, 'form-group row'.$item->getStringFromCondition($item->hasError(), 'validated', '', true));?>
	<?php echo $item->renderLabelWithGridClasses($globalConfig, $callerConfig, 'col-form-label');?>
	<div<?php echo $item->drawInputWidthClasses($globalConfig, true, true);?>>
		<div class="row">
    		<div class="col-lg-10 lang_fields">
    			<?php echo $item->renderLangFields($globalConfig, $callerConfig, null , array('form-group'));?>
    		</div>
    		<div class="col-lg-2">
    			<?php echo $item->renderLangSwitcher($globalConfig, $callerConfig);?>
    		</div>
		</div>
		<?php echo $item->drawError('<div class="error invalid-feedback">', '</div>');?>
		<?php echo $item->renderHelpText($globalConfig, $callerConfig, '<span class="form-text text-muted">', '</span>')?>
	</div>
<?php echo $item->drawEndTag('div', $globalConfig, $callerConfig);?>