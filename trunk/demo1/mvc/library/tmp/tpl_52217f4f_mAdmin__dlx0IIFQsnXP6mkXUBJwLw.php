<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_Footer(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div>
		<?php /* tag "div" from line 120 */; ?>
<div class="row-fluid footer">
			<?php /* tag "span" from line 121 */; ?>
<span class="label pull-right copyright">&#169; 2012 SPN</span>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_Menu(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="menu">
		<?php /* tag "ul" from line 84 */; ?>
<ul class="nav nav-list">
			<?php /* tag "li" from line 85 */; ?>
<li class="nav-header">DANH MỤC</li>
			<?php 
/* tag "li" from line 86 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveAdmin=='Domain'?'active':'disable'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "a" from line 87 */ ;
if (null !== ($_tmp_1 = ('/setting/domain'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>KHU VỰC<?php /* tag "span" from line 87 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->DomainAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 89 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Category'?'active':'disable'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
				<?php 
/* tag "a" from line 90 */ ;
if (null !== ($_tmp_1 = ('/setting/category'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>DANH MỤC MÓN<?php /* tag "span" from line 90 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->CategoryAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 92 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveAdmin=='Supplier'?'active':'disable'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "a" from line 93 */ ;
if (null !== ($_tmp_1 = ('/setting/supplier'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>NHÀ CUNG CẤP<?php /* tag "span" from line 93 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->SupplierAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 95 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='User'?'active':'disable'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
				<?php 
/* tag "a" from line 96 */ ;
if (null !== ($_tmp_1 = ('/setting/user'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>NGƯỜI DÙNG<?php /* tag "span" from line 96 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->UserAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 98 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveAdmin=='Customer'?'active':'disable'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "a" from line 99 */ ;
if (null !== ($_tmp_1 = ('/setting/customer'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>KHÁCH HÀNG<?php /* tag "span" from line 99 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->CustomerAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 101 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='Unit'?'active':'disable'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
				<?php 
/* tag "a" from line 102 */ ;
if (null !== ($_tmp_1 = ('/setting/unit'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>ĐƠN VỊ TÍNH<?php /* tag "span" from line 102 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->UnitAll, 'count')); ?>
</span></a>
			</li>			
			<?php 
/* tag "li" from line 104 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveAdmin=='TermPaid'?'active':'disable'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "a" from line 105 */ ;
if (null !== ($_tmp_1 = ('/setting/termpaid'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>KHOẢN CHI<?php /* tag "span" from line 105 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->TermPaidAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 107 */ ;
if (null !== ($_tmp_2 = ($ctx->ActiveAdmin=='TermCollect'?'active':'disable'))):  ;
$_tmp_2 = ' class="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<li<?php echo $_tmp_2 ?>
>
				<?php 
/* tag "a" from line 108 */ ;
if (null !== ($_tmp_1 = ('/setting/termcollect'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>KHOẢN THU<?php /* tag "span" from line 108 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->TermCollectAll, 'count')); ?>
</span></a>
			</li>
			<?php 
/* tag "li" from line 110 */ ;
if (null !== ($_tmp_3 = ($ctx->ActiveAdmin=='Config'?'active':'disable'))):  ;
$_tmp_3 = ' class="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<li<?php echo $_tmp_3 ?>
>
				<?php 
/* tag "a" from line 111 */ ;
if (null !== ($_tmp_1 = ('/setting/config'))):  ;
$_tmp_1 = ' href="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<a<?php echo $_tmp_1 ?>
>CẤU HÌNH<?php /* tag "span" from line 111 */; ?>
<span class="badge badge-info pull-right"><?php echo phptal_escape($ctx->path($ctx->ConfigAll, 'count')); ?>
</span></a>
			</li>
		</ul>
	</div><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_PageBar(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div class="pagination">
		<?php /* tag "ul" from line 76 */; ?>
<ul>
			<?php 
/* tag "li" from line 77 */ ;
$_tmp_2 = $ctx->repeat ;
$_tmp_2->P = new PHPTAL_RepeatController($ctx->path($ctx->PN, 'getPages'))
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_2->P as $ctx->P): ;
if (null !== ($_tmp_1 = ($ctx->Page==$ctx->P->getId()?'disabled':'active'))):  ;
$_tmp_1 = ' class="'.phptal_escape($_tmp_1).'"' ;
else:  ;
$_tmp_1 = '' ;
endif ;
?>
<li<?php echo $_tmp_1 ?>
>
				<?php 
/* tag "a" from line 78 */ ;
if (null !== ($_tmp_3 = ($ctx->path($ctx->P, 'getURL')))):  ;
$_tmp_3 = ' href="'.phptal_escape($_tmp_3).'"' ;
else:  ;
$_tmp_3 = '' ;
endif ;
?>
<a<?php echo $_tmp_3 ?>
><?php echo phptal_escape($ctx->path($ctx->P, 'getName')); ?>
</a>
			</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

		</ul>
	</div><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_LocationBar(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div>
		<?php /* tag "div" from line 62 */; ?>
<div class="row-fluid">			
			<?php /* tag "ul" from line 63 */; ?>
<ul class="span12 breadcrumb">
				<?php 
/* tag "li" from line 64 */ ;
$_tmp_1 = $ctx->repeat ;
$_tmp_1->Item = new PHPTAL_RepeatController($ctx->Navigation)
 ;
$ctx = $tpl->pushContext() ;
foreach ($_tmp_1->Item as $ctx->Item): ;
?>
<li>
					<?php 
/* tag "a" from line 65 */ ;
if (null !== ($_tmp_2 = ($ctx->Item[1]))):  ;
$_tmp_2 = ' href="'.phptal_escape($_tmp_2).'"' ;
else:  ;
$_tmp_2 = '' ;
endif ;
?>
<a<?php echo $_tmp_2 ?>
><?php echo phptal_escape($ctx->Item[0]); ?>
</a> <?php /* tag "span" from line 65 */; ?>
<span class="divider">/</span>
				</li><?php 
endforeach ;
$ctx = $tpl->popContext() ;
?>

				<?php /* tag "li" from line 67 */; ?>
<li class="active"><?php echo phptal_escape($ctx->Title); ?>
</li>
			</ul>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_Header(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<div>
		<?php /* tag "div" from line 42 */; ?>
<div class="navbar navbar-inverse">
			<?php /* tag "div" from line 43 */; ?>
<div class="navbar-inner">
				<?php /* tag "a" from line 44 */; ?>
<a class="brand" href="/app">
					<?php /* tag "span" from line 45 */; ?>
<span class="icon-stack">
						<?php /* tag "i" from line 46 */; ?>
<i class="icon-circle icon-stack-base"></i>
						<?php /* tag "i" from line 47 */; ?>
<i class="icon-microphone" style="color:blue;"></i>
					</span>
					Demo Cafe SPN
				</a>
				<?php /* tag "p" from line 51 */; ?>
<p class="navbar-text pull-right">
					<?php /* tag "a" from line 52 */; ?>
<a class="navbar-link" href="/signout/load"><?php 
/* tag "span" from line 52 */ ;
if (\MVC\Base\SessionRegistry::instance()->getCurrentUser()):  ;
?>
<span><?php echo phptal_escape(\MVC\Base\SessionRegistry::instance()->getCurrentUser()->getEmail()); ?>
</span><?php endif; ?>
</a>
				</p>
			</div>
		</div>
	</div><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_IncludeJS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "script" from line 34 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/script/library/jquery-1.7.1.min.js"></script>
		<?php /* tag "script" from line 35 */; ?>
<script type="text/javascript" language="javascript" src="/mvc/templates/theme/bootstrap/js/bootstrap.min.js"></script>
	</span><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_IncludeCSS(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>	
		<?php /* tag "link" from line 25 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/bootstrap.min.css" media="screen"/>
		<?php /* tag "link" from line 26 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/font-awesome.min.css"/>
		<?php /* tag "link" from line 27 */; ?>
<link rel="stylesheet" type="text/css" href="/mvc/templates/theme/bootstrap/css/madmin.css"/>
	</span><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw_IncludeMETA(PHPTAL $_thistpl, PHPTAL $tpl) {
$tpl = clone $tpl ;
$ctx = $tpl->getContext() ;
$_translator = $tpl->getTranslator() ;
?>
<span>
		<?php /* tag "title" from line 7 */; ?>
<title><?php echo 'Hệ thống quản lý Cafe SPN'; ?>
</title>
		<?php /* tag "base" from line 8 */; ?>
<base href="http://demo1.quanly-cafe.com"/>
		<?php /* tag "meta" from line 9 */; ?>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
		<?php /* tag "meta" from line 10 */; ?>
<meta http-equiv="Pragma" content="no-cache"/>
		<?php /* tag "meta" from line 11 */; ?>
<meta http-equiv="Expires" content="-1"/>
		<?php /* tag "meta" from line 12 */; ?>
<meta http-equiv="Cache-Control" content="no-cache"/>
		<?php /* tag "meta" from line 13 */; ?>
<meta name="keywords" content="Hệ thống quản lý Cafe SPN"/>
		<?php /* tag "meta" from line 14 */; ?>
<meta name="description" content="Hệ thống quản lý Cafe SPN"/>
		<?php /* tag "meta" from line 15 */; ?>
<meta name="page-topic" content="Hệ thống quản lý Cafe SPN"/>
		<?php /* tag "meta" from line 16 */; ?>
<meta name="Abstract" content="Hệ thống quản lý Cafe SPN"/>
		<?php /* tag "meta" from line 17 */; ?>
<meta name="classification" content="Hệ thống quản lý Cafe SPN"/>
		<?php /* tag "link" from line 18 */; ?>
<link rel="icon" type="image/png" href="/data/images/icon.png"/>
	</span><?php 
}

 ?>
<?php 
function tpl_52217f4f_mAdmin__dlx0IIFQsnXP6mkXUBJwLw(PHPTAL $tpl, PHPTAL_Context $ctx) {
$_thistpl = $tpl ;
$_translator = $tpl->getTranslator() ;
/* tag "documentElement" from line 1 */ ;
/* tag "html" from line 1 */ ;
?>
<html lang="en" xml:lang="en">
<?php /* tag "body" from line 2 */; ?>
<body>
	<!-- ======================================================================== -->
	<!-- META TAG INCLUDE														  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 6 */; ?>

	
	<!-- ======================================================================== -->
	<!-- CASCADING STYLE SHEETS INCLUDE											  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 24 */; ?>

	
	<!-- ======================================================================== -->
	<!-- JAVASCRIPT INCLUDE														  -->
	<!-- ======================================================================== -->
	<?php /* tag "span" from line 33 */; ?>

	
	<!-- ======================================================================== -->
	<!-- HEADER																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 41 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LOCATION BAR															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 61 */; ?>

	
	<!-- ======================================================================== -->
	<!-- LOCATION BAR															  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 75 */; ?>

							
	<?php /* tag "div" from line 83 */; ?>

	
	<!-- ======================================================================== -->
	<!-- FOOTER																	  -->
	<!-- ======================================================================== -->
	<?php /* tag "div" from line 119 */; ?>
	
</body>
</html><?php 
/* end */ ;

}

?>
<?php /* 
*** DO NOT EDIT THIS FILE ***

Generated by PHPTAL from I:\quanly-cafe\demo1\mvc\templates\mAdmin.xhtml (edit that file instead) */; ?>