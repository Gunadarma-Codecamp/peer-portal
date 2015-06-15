<?php /* Smarty version Smarty-3.1.15, created on 2015-06-15 12:56:35
         compiled from "./view/template/sidebar.html" */ ?>
<?php /*%%SmartyHeaderCode:546520659557eaf63e9f797-81780551%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'ad8c6fb973e01c4d534fc5ed74a51f3a5437e207' => 
    array (
      0 => './view/template/sidebar.html',
      1 => 1425635375,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '546520659557eaf63e9f797-81780551',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'page' => 0,
    'basedomain' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_557eaf63edb812_58088294',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557eaf63edb812_58088294')) {function content_557eaf63edb812_58088294($_smarty_tpl) {?>
<div id="sidebar-wrapper" class="collapse sidebar-collapse">
	
	<div id="search">
		<form>
			<input class="form-control input-sm" type="text" name="search" placeholder="Search..." />

			<button type="submit" id="search-btn" class="btn"><i class="fa fa-search"></i></button>
		</form>		
	</div> <!-- #search -->

	<nav id="sidebar">		
		
		<ul id="main-nav" class="open-active">			
			
			
			<li class="dropdown <?php if ($_smarty_tpl->tpl_vars['page']->value['page']=='home'||$_smarty_tpl->tpl_vars['page']->value['page']=='article'||$_smarty_tpl->tpl_vars['page']->value['page']=='agenda') {?>active<?php }?>">
				<a href="javascript:;">
					<i class="fa fa-file-text"></i>
					News
					<span class="caret"></span>
				</a>				
				<ul class="sub-nav">
					<li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
home">
							<i class="fa fa-list-alt"></i> 
							Artikel
						</a>
					</li>
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
agenda">
							<i class="fa fa-calendar"></i> 
							Agenda
						</a>
					</li>
				</ul>
			</li>
            
            <li class="button <?php if ($_smarty_tpl->tpl_vars['page']->value['page']=='banner') {?>active<?php }?>">
				<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
banner">
					<i class="fa fa-file-text"></i>
					Banner
				</a>				
			</li>
            
            <li class="button <?php if ($_smarty_tpl->tpl_vars['page']->value['page']=='headlines') {?>active<?php }?>">
				<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
headlines">
					<i class="fa fa-file-text"></i>
					Kata Pembuka
					<!--span class="caret"></span-->
				</a>				
			</li>
            
            <li class="dropdown <?php if ($_smarty_tpl->tpl_vars['page']->value['page']=='gallery') {?>active<?php }?>">
				<a href="javascript:;">
					<i class="fa fa-picture-o"></i>
					Galeri 
					<span class="caret"></span>
				</a>				
				<ul class="sub-nav">
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
gallery">
							<i class="fa fa-picture-o"></i> 
							Galeri Gambar
						</a>
					</li>
                    
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
video">
							<i class="glyphicon glyphicon-play"></i> 
							Galeri Video
						</a>
					</li>
				</ul>
			</li>
            
            <li class="dropdown <?php if ($_smarty_tpl->tpl_vars['page']->value['page']=='about') {?>active<?php }?>">
				<a href="javascript:;">
					<i class="fa fa-file-text"></i>
					Tentang Organisasi 
					<span class="caret"></span>
				</a>				
				<ul class="sub-nav">
				    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/profile">
							<i class="fa fa-list-alt"></i> 
							Profil
						</a>
					</li>
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/struktur">
							<i class="fa fa-list-alt"></i> 
							Struktur Organisasi
						</a>
					</li>
                    <li>
						<a href="#">
							<i class="fa fa-list-alt"></i> 
							Anggota
						</a>
					</li>
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
about/afiliasi">
							<i class="fa fa-list-alt"></i> 
							Afiliasi
						</a>
					</li>
				</ul>
			</li>
            
            <li class="dropdown <?php if ($_smarty_tpl->tpl_vars['page']->value['page']=='direktori') {?>active<?php }?>">
				<a href="javascript:;">
					<i class="fa fa-file-text"></i>
					Direktori
					<span class="caret"></span>
				</a>				
				<ul class="sub-nav">
				    <li>
						<a href="#">
							<i class="fa fa-list-alt"></i> 
							Kepakaran
						</a>
					</li>
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
direktori/buahpikir">
							<i class="fa fa-list-alt"></i> 
							Buah Pikir
						</a>
					</li>
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
direktori/perundangan">
							<i class="fa fa-list-alt"></i> 
							Perundang-Undangan
						</a>
					</li>
                    <li>
						<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
direktori/repository">
							<i class="fa fa-file"></i> 
							Repository
						</a>
					</li>
				</ul>
			</li>
			
			<li >
				
				<a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
user">
					<i class="fa fa-list-alt"></i> 
					Member
				</a>
				
			</li>
			
		</ul>
				
	</nav> <!-- #sidebar -->

</div> <!-- /#sidebar-wrapper --><?php }} ?>
