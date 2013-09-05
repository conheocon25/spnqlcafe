<?php 
function tpl_521d79d2_SellingDomain__mCbAHA4cEcFtgwA5QBC8qQ(PHPTAL $tpl, PHPTAL_Context $ctx) {
$_thistpl = $tpl ;
$_translator = $tpl->getTranslator() ;
/* tag "documentElement" from line 1 */ ;
$ctx->setDocType('<!DOCTYPE html>',false) ;
?>

<?php /* tag "html" from line 2 */; ?>
<html lang="en">
	<?php /* tag "head" from line 3 */; ?>
<head>
		<?php 
/* tag "span" from line 4 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('mAdmin.xhtml/IncludeMETA', $_thistpl) ;
$ctx->popSlots() ;
?>

		<?php 
/* tag "span" from line 5 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('mAdmin.xhtml/IncludeCSS', $_thistpl) ;
$ctx->popSlots() ;
?>
		
		<?php 
/* tag "span" from line 6 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('mAdmin.xhtml/IncludeJS', $_thistpl) ;
$ctx->popSlots() ;
?>

	</head>
	<?php /* tag "body" from line 8 */; ?>
<body>
		<?php /* tag "div" from line 9 */; ?>
<div class="container-fluid">
			<?php 
/* tag "span" from line 10 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('mAdmin.xhtml/Header', $_thistpl) ;
$ctx->popSlots() ;
?>

			<?php /* tag "div" from line 11 */; ?>
<div class="row-fluid">
				<?php /* tag "div" from line 12 */; ?>
<div class="row-fluid">
					<?php /* tag "div" from line 13 */; ?>
<div class="span3">
						<?php /* tag "div" from line 14 */; ?>
<div class="menu">
							<?php /* tag "ul" from line 15 */; ?>
<ul class="nav nav-list">
								<?php /* tag "li" from line 16 */; ?>
<li class="nav-header">DANH MỤC</li>
								<?php 
/* tag "li" from line 17 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Domain1 = new PHPTAL_RepeatController($ctx->DomainAll)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Domain1 as $ctx->Domain1): ;
if (null !== ($_tmp_2 = ($ctx->Domain1->getId()==$ctx->Domain->getId()? 'active':'disable'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
									<?php 
/* tag "a" from line 18 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->Domain1, 'getURLSelling')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
><?php /* tag "span" from line 18 */; ?>
<span><?php echo phptal_escape($ctx->path($ctx->Domain1, 'getName')); ?>
</span><?php /* tag "span" from line 18 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->Domain1, 'getTables/count')); ?>
</span></a>
								</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>
																
							</ul>
						</div>						
					</div>
					<?php /* tag "div" from line 23 */; ?>
<div class="span9">
						<?php /* tag "div" from line 24 */; ?>
<div class="content">
							<?php 
/* tag "span" from line 25 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('mAdmin.xhtml/LocationBar', $_thistpl) ;
$ctx->popSlots() ;
?>

							<?php /* tag "table" from line 26 */; ?>
<table class="table table-striped table-hover">
								<?php /* tag "thead" from line 27 */; ?>
<thead>
									<?php /* tag "tr" from line 28 */; ?>
<tr>										
										<?php /* tag "th" from line 29 */; ?>
<th>BÀN</th>
										<?php /* tag "th" from line 30 */; ?>
<th width="120">PHIẾU</th>
										<?php /* tag "th" from line 31 */; ?>
<th width="60">IN</th>
										<?php /* tag "th" from line 32 */; ?>
<th width="60">VÀO</th>
										<?php /* tag "th" from line 33 */; ?>
<th width="60">RA</th>
										<?php /* tag "th" from line 34 */; ?>
<th width="60">GỌI</th>
										<?php /* tag "th" from line 35 */; ?>
<th width="60">SỔ</th>
										<?php /* tag "th" from line 36 */; ?>
<th width="60">DỜI</th>										
										<?php /* tag "th" from line 37 */; ?>
<th width="60">GOM</th>
									</tr>
								</thead>
								<?php /* tag "tbody" from line 40 */; ?>
<tbody>
									<?php 
/* tag "tr" from line 41 */ ;
$_tmp_3 = $ctx->repeat ;
$_tmp_3->Table = new PHPTAL_RepeatController($ctx->path($ctx->Domain, 'getTables'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_3->Table as $ctx->Table): ;
if (null !== ($_tmp_2 = ($ctx->Table->getSessionActive()!=null ? 'success':''))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<tr<?php echo $_tmp_2 ?>
>										
										<?php /* tag "td" from line 42 */; ?>
<td><?php /* tag "div" from line 42 */; ?>
<div><?php echo phptal_escape($ctx->path($ctx->Table, 'getName')); ?>
</div></td>
										<?php /* tag "td" from line 43 */; ?>
<td>
											<?php 
/* tag "a" from line 44 */ ;
if ($ctx->path($ctx->Table, 'getSessionActive')):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getSessionActive/getURLDetail')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
>
												<?php /* tag "span" from line 45 */; ?>
<span><?php echo phptal_escape($ctx->path($ctx->Table, 'getSessionActive/getValuePrint')); ?>
</span>
											</a><?php endif; ?>

										</td>
										<?php /* tag "td" from line 48 */; ?>
<td>
											<?php 
/* tag "a" from line 49 */ ;
if ($ctx->path($ctx->Table, 'getSessionActive')):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getSessionActive/getURLPrint')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn" target="blank"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 49 */; ?>
<span class="icon-print"></span></a><?php endif; ?>

										</td>										
										<?php /* tag "td" from line 51 */; ?>
<td>
											<?php 
/* tag "a" from line 52 */ ;
if (!($ctx->path($ctx->Table, 'getSessionActive'))):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getURLCheckinExe')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 52 */; ?>
<span class="icon-arrow-right"></span></a><?php endif; ?>

										</td>
										<?php /* tag "td" from line 54 */; ?>
<td>
											<?php 
/* tag "a" from line 55 */ ;
if ($ctx->path($ctx->Table, 'getSessionActive')):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getSessionActive/getURLCheckoutExe')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 55 */; ?>
<span class="icon-arrow-left"></span></a><?php endif; ?>

										</td>
										<?php /* tag "td" from line 57 */; ?>
<td>
											<?php 
/* tag "a" from line 58 */ ;
if ($ctx->path($ctx->Table, 'getSessionActive')):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getURLCallLoad')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 58 */; ?>
<span class="icon-plus"></span></a><?php endif; ?>

										</td>
										<?php /* tag "td" from line 60 */; ?>
<td>
											<?php 
/* tag "a" from line 61 */ ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getURLLog')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 61 */; ?>
<span class="icon-edit"></span></a>
										</td>
										<?php /* tag "td" from line 63 */; ?>
<td>
											<?php 
/* tag "a" from line 64 */ ;
if ($ctx->path($ctx->Table, 'getSessionActive')):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getURLMoveLoad')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 64 */; ?>
<span class="icon-move"></span></a><?php endif; ?>

										</td>
										<?php /* tag "td" from line 66 */; ?>
<td>
											<?php 
/* tag "a" from line 67 */ ;
if ($ctx->path($ctx->Table, 'getSessionActive')):  ;
if (null !== ($_tmp_1 = ($ctx->path($ctx->Table, 'getURLMergeLoad')))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a class="btn"<?php echo $_tmp_1 ?>
><?php /* tag "span" from line 67 */; ?>
<span class="icon-resize-small"></span></a><?php endif; ?>

										</td>
									</tr><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

								</tbody>								
							</table>							
						</div>
					</div>
				</div>
			</div>
			<?php 
/* tag "span" from line 76 */ ;
$ctx->pushSlots() ;
$tpl->_executeMacroOfTemplate('mAdmin.xhtml/Footer', $_thistpl) ;
$ctx->popSlots() ;
?>

		</div>
	</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from I:\quanly-cafe\demo1\mvc\templates\SellingDomain.html (edit that file instead) */; ?>