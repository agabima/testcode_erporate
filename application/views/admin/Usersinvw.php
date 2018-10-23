<?php
//var_dump($this->uri->segment('4'));
//die();
$sesmember = $this->session->userdata('sesusersin');
if ($sesmember!="") {
    $field1 = $sesmember["field1"];
    $field2 = $sesmember["field2"];
    $penghubung1 = $sesmember["penghubung1"];
    $penghubung2 = $sesmember["penghubung2"];
    $katakunci1 = $sesmember["katakunci1"];
    $katakunci2 = $sesmember["katakunci2"];
  }
?>

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       USERSIN
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">USERSIN</li>
      </ol>
      <!-- /.box-header --> 
       <form action="<?php echo site_url('admin/usersinct')?>" method="post">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3 col-sm-6">              
              <div class="form-group">
                <label for="field1">Pencarian Berdasarkan</label>
                <select name="field1" class="form-control">        
				  <option value="nama" <?=($field1=="nama" ? "selected" : "") ?> >nama</option>
<option value="pass" <?=($field1=="pass" ? "selected" : "") ?> >pass</option>
<option value="tipe" <?=($field1=="tipe" ? "selected" : "") ?> >tipe</option>
				
                </select>
              </div>             
            </div>
            <div class="col-md-2 col-sm-6">
              <div class="form-group">
                <label for="penghubung1"><br/></label>
                <select name="penghubung1" class="form-control">
                  <option value="LIKE" <?=($penghubung1=="LIKE" ? "selected" : "") ?>>LIKE</option>
                  <option value="NOT LIKE" <?=($penghubung1=="NOT LIKE" ? "selected" : "") ?>>NOT LIKE</option>
                  <option value="=" <?=($penghubung1=="=" ? "selected" : "") ?>>=</option>
                  <option value=">" <?=($penghubung1==">" ? "selected" : "") ?>>></option>
                  <option value="<" <?=($penghubung1=="<" ? "selected" : "") ?>><</option>
                  <option value="<>" <?=($penghubung1=="<>" ? "selected" : "") ?>><></option>
                </select>
              </div> 
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <input type="text" placeholder="Kata Kunci" class="form-control" name="katakunci1" value="<?=$katakunci1?>">
              </div>                     
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-md-3 col-sm-6">              
              <div class="form-group">
                <label for="field2">Dan</label>
                <select name="field2" class="form-control">
				<option value="nama" <?=($field2=="nama" ? "selected" : "") ?> >nama</option>
<option value="pass" <?=($field2=="pass" ? "selected" : "") ?> >pass</option>
<option value="tipe" <?=($field2=="tipe" ? "selected" : "") ?> >tipe</option>

                </select>
              </div>             
            </div>
            <div class="col-md-2 col-sm-6">
              <div class="form-group">
                <label for="penghubung2"><br/></label>
                <select name="penghubung2" class="form-control">
                  <option value="LIKE" <?=($penghubung2=="LIKE" ? "selected" : "") ?>>LIKE</option>
                  <option value="NOT LIKE" <?=($penghubung2=="NOT LIKE" ? "selected" : "") ?>>NOT LIKE</option>
                  <option value="=" <?=($penghubung2=="=" ? "selected" : "") ?>>=</option>
                  <option value=">" <?=($penghubung2==">" ? "selected" : "") ?>>></option>
                  <option value="<" <?=($penghubung2=="<" ? "selected" : "") ?>><</option>
                  <option value="<>" <?=($penghubung2=="<>" ? "selected" : "") ?>><></option>
                </select>
                </select>
              </div> 
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <input type="text" placeholder="Kata Kunci" class="form-control" name="katakunci2" value="<?=$katakunci2?>">                
              </div> 
            </div>
            
            <div class="col-md-1 col-sm-6">
              <div class="form-group">
                <label for="hpref"><br/></label>
                <button type="submit" class="pull-right btn btn-default" id="cari">Cari
                <i class="fa fa-search"></i></button>
                
              </div> 

            </div>
            
            </div>

          </div>
          <!-- /.row -->
          </form>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
      
              <button type="button" class="btn bg-navy margin" onclick="location.href='<?php echo site_url('admin/usersinct/tambah');?>'">
                <i class="fa fa-fw fa-plus-square"></i> 
                  <b>Tambah USERSIN</b>
              </button>
              <button type="button" class="btn bg-olive margin" onclick="location.href='<?php echo site_url('admin/usersinct/excel/0');?>'" target="_blank">
                <i class="fa fa-fw fa-file-excel-o"></i> 
                  <b>Export Excel</b>
              </button>            
              <!--<button type="button" class="btn bg-red margin" onclick="window.open('<?php echo site_url('admin/usersinct/excel/1');?>','_blank','width=700,height=700')" target="_blank">
                <i class="fa fa-fw fa-file-pdf-o"></i> 
                  <b>Export PDF</b>
              </button>            
			  
              <button type="button" class="btn primary margin" onclick="location.href='<?php echo site_url('admin/usersinct/importdata');?>'" target="_blank">
                <i class="fa fa-fw fa-cloud-upload"></i> 
                  <b>Import Data</b>
              </button>-->            
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-bordered">
                <tr>
				<th>No</th>
								<th field="username">username</th>
                <th field="password">password</th>
				<th field="nama">nama</th>
        <th field="jabatan">jabatan</th>
        <th field="status">status</th>

                  <th class="pull-center">Aksi</th>
                </tr>
               
                <?php
                $no = $number;
                foreach ($query as $hasil) 
                {
                  ?>
                   <tr>
				   <td><?php echo $number++;?></td>
				   <td><?=$hasil->username?></td>
<td><?=$hasil->password?></td>
<td><?=$hasil->nama?></td>
<td><?=$hasil->jabatan?></td>
<td><?=$hasil->status?></td>

                    <td> <div class="btn-group">
                  <a class="btn btn-default btn-sm" href="<?php echo base_url().'admin/usersinct/ubah/'.$hasil->nama.'';?>"><i class="fa fa-pencil-square-o"></i></a>
                  <?php
                  if ($hasil->nama==1) 
                  {
                    ?>
                     <a href="javascript:function(){return false;}" class="btn btn-default btn-sm" ><i class="fa fa-trash-o"></i></a>
                    <?php
                  }
                  else
                  {
                    ?>
                     <a onclick="return konfirmasi()" class="btn btn-default btn-sm" href="<?php echo base_url().'admin/usersinct/hapus/'.$hasil->nama.'';?>"><i class="fa fa-trash-o"></i></a>
                    <?
                  }
                  ?>
                 
                </div></td>
                  </tr>

                  <?php
                   $no++;
                }
                ?>
              </table>
            </div>
            <!-- /.box-body -->
           
            <div class="box-footer clearfix">  
            <form action="<?=base_url().'admin/usersinct'?>" name="fperpage" method="post"> <input type="text" name="perpage" value="<?=$perpage?>" size="2" onblur="fperpage.submit()"> per page
<ul class="pagination pagination-sm no-margin pull-right">
            <!--
            <ul class="pagination pagination-sm no-margin pull-right">
                <li><a href="#">&laquo;</a></li>
                <li><a href="#">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">&raquo;</a></li>
              </ul>
              -->  
              <?php echo $halaman;?>                
    </ul>
</form>                
              
            </div>
          </div>

            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
   <script type="text/javascript">
 function konfirmasi()
 {
 tanya = confirm("Apakah Anda Yakin Akan Menghapus Data ini?");
 if (tanya == true) return true;
 else return false;
 }
  </script>
