<?php /* Smarty version Smarty-3.1.15, created on 2015-06-15 12:56:35
         compiled from "view/home.html" */ ?>
<?php /*%%SmartyHeaderCode:832765650557eaf63d101a5-67550168%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c1bdcd6c9b0c8d1a6a267d96d10c4045e955f2c' => 
    array (
      0 => 'view/home.html',
      1 => 1424675629,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '832765650557eaf63d101a5-67550168',
  'function' => 
  array (
  ),
  'variables' => 
  array (
    'basedomain' => 0,
    'data' => 0,
    'var' => 0,
  ),
  'has_nocache_code' => false,
  'version' => 'Smarty-3.1.15',
  'unifunc' => 'content_557eaf63da7ad3_08102305',
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_557eaf63da7ad3_08102305')) {function content_557eaf63da7ad3_08102305($_smarty_tpl) {?><script type="text/javascript">
	function AreAnyCheckboxesChecked () {
	  if ($("#Form2 input:checkbox:checked").length > 0)
		{
		    $("#btn-dis").removeAttr("disabled");
		}
		else
		{
		   $('#btn-dis').attr("disabled","disabled");
		}
	}
</script>
<div id="content-header">
	<h1>Artikel</h1>
</div> <!-- #content-header -->	

<div id="content-container">

	<div class="row">

		<div class="col-md-12">

			<div class="portlet">

				<div class="portlet-header">

					<h3>
						<i class="fa fa-table"></i>
						List Artikel
					</h3>

				</div> <!-- /.portlet-header -->

				<div class="portlet-content">						

					<div class="table-responsive">

					<form action="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
article/articledel" method=POST name="checks" ID="Form2" onsubmit="return confirm('Yakin ingin menghapus artikel?');">

					<a class="btn btn-default btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
article/addarticle"><i class="fa fa-plus"></i> Tambah Artikel</a>

					<button type="submit" class="btn btn-primary btn-sm" id="btn-dis" disabled><i class="fa fa-trash-o"></i> Hapus</button>
                    
                    <select id="artikel" class="btn btn-default btn-sm">
                        <option value="">All</option>
                        <option value="Berita">Berita</option>
                        <option value="Kliping Kegiatan">Kliping Kegiatan</option>
                    </select>
                    
                    <a class="btn btn-link btn-sm" href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
article/trash"><i class="fa fa-trash-o"></i> Lihat Trash</a>
					
					<table 
						class="table table-striped table-bordered table-hover table-highlight table-checkable"
						data-provide="datatable" 
						data-display-rows="10"
						data-info="true"
						data-paginate="true"
					>
							<thead>
								<tr>
									<th class="checkbox-column">
										<input type="checkbox" class="icheck-input" onchange="return AreAnyCheckboxesChecked();">
									</th>
									<th data-filterable="true" data-sortable="true" >Judul</th>
									<th data-filterable="true" data-sortable="true" >Status</th>
									<th data-filterable="true" data-sortable="true">Tanggal Buat</th>
									<th data-filterable="true" data-sortable="true">Author</th>
                                    <th data-filterable="false">Jenis Artikel</th>
								</tr>
							</thead>
							<tbody>
								<?php  $_smarty_tpl->tpl_vars['var'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['var']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['var']->key => $_smarty_tpl->tpl_vars['var']->value) {
$_smarty_tpl->tpl_vars['var']->_loop = true;
?>
								<tr>
									<td class="checkbox-column">
										<input type="checkbox" class="icheck-input" name="ids[]" value="<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" onchange="return AreAnyCheckboxesChecked();" />
									</td>
									<td><a href="<?php echo $_smarty_tpl->tpl_vars['basedomain']->value;?>
article/addarticle/?id=<?php echo $_smarty_tpl->tpl_vars['var']->value['id'];?>
" data-toggle="tooltip" data-placement="right" title="Edit or view <?php echo $_smarty_tpl->tpl_vars['var']->value['title'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['title'];?>
</a></td>
									<td style="color:<?php echo $_smarty_tpl->tpl_vars['var']->value['status_color'];?>
"><?php echo $_smarty_tpl->tpl_vars['var']->value['n_status'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['posted_date'];?>
</td>
									<td><?php echo $_smarty_tpl->tpl_vars['var']->value['username'];?>
</td>
                                    <td>
                                        <?php if ($_smarty_tpl->tpl_vars['var']->value['articleType']=='1') {?>
                                            Berita
                                        <?php } elseif ($_smarty_tpl->tpl_vars['var']->value['articleType']=='2') {?>
                                            Kliping Kegiatan
                                        <?php }?>
                                    </td>
								</tr>
								<?php } ?>
							</tbody>
						</table>
					</form>
					</div> <!-- /.table-responsive -->
					

				</div> <!-- /.portlet-content -->

			</div> <!-- /.portlet -->

		

		</div> <!-- /.col -->

	</div> <!-- /.row -->

</div>
<script>
$(document).ready(function() {
    $('.table').dataTable().fnSetColumnVis( 5, false );
    $('.form-control:last').parent().remove();
} );
</script><?php }} ?>
