<?php
//var_dump($this->uri->segment('4'));
//die();
$sesmember = $this->session->userdata('sesminuman');
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
       MINUMAN
        <!--<small>preview of simple tables</small>-->
      </h1>
      <ol class="breadcrumb">
        <li><a href="<?php echo base_url().'admin/dashboardct';?>"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">MINUMAN</li>
      </ol>
      <!-- /.box-header -->
       <form action="<?php echo site_url('admin/minumanct')?>" method="post">
        <div class="box-body">
          <div class="row">
            <div class="col-md-3 col-sm-6">              
              <div class="form-group">
                <label for="field1">Pencarian Berdasarkan</label>
                <select name="field1" class="form-control">        
				  <option value="minuman" <?=($field1=="minuman" ? "selected" : "") ?> >minuman</option>
<option value="harga_minuman" <?=($field1=="harga_minuman" ? "selected" : "") ?> >harga_minuman</option>
<option value="tglupdate" <?=($field1=="tglupdate" ? "selected" : "") ?> >tglupdate</option>
<option value="opupdate" <?=($field1=="opupdate" ? "selected" : "") ?> >opupdate</option>
				
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
				<option value="minuman" <?=($field2=="minuman" ? "selected" : "") ?> >minuman</option>
<option value="harga_minuman" <?=($field2=="harga_minuman" ? "selected" : "") ?> >harga_minuman</option>
<option value="tglupdate" <?=($field2=="tglupdate" ? "selected" : "") ?> >tglupdate</option>
<option value="opupdate" <?=($field2=="opupdate" ? "selected" : "") ?> >opupdate</option>

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
              <?php   
              if ($this->Usersinmd->ishakok($username,'tmin'))
                { ?>
              <button type="button" class="btn bg-navy margin" onclick="location.href='<?php echo site_url('admin/minumanct/tambah');?>'">
                <i class="fa fa-fw fa-plus-square"></i> 
                  <b>Tambah MINUMAN</b>
              </button>
              <?php } ?>
              <button type="button" class="btn bg-olive margin" onclick="location.href='<?php echo site_url('admin/minumanct/excel/0');?>'" target="_blank">
                <i class="fa fa-fw fa-file-excel-o"></i> 
                  <b>Export Excel</b>
              </button>            
                         
            <div class="box-body table-responsive no-padding">
              <table class="table table-bordered table-bordered">
                <tr>
				<th>No</th>
								<th field="minuman">minuman</th>
				<th field="harga_minuman">harga_minuman</th>
				<th field="tglupdate">tglupdate</th>
				<th field="opupdate">opupdate</th>

                  <th class="pull-center">Aksi</th>
                </tr>
               
                <?php
                $no = $number;
                foreach ($query as $hasil) 
                {
                  ?>
                   <tr>
				   <td><?php echo $number++;?></td>
				   <td><?=$hasil->minuman?></td>
<td><?=$hasil->harga_minuman?></td>
<td><?=$hasil->tglupdate?></td>
<td><?=$hasil->opupdate?></td>

                    <td> <div class="btn-group">
                      <?php   
              if ($this->Usersinmd->ishakok($username,'umin'))
                { ?>
                  <a class="btn btn-default btn-sm" href="<?php echo base_url().'admin/minumanct/ubah/'.$hasil->idx.'';?>"><i class="fa fa-pencil-square-o"></i></a>
                  <?php } ?>
                  <?php   
              if ($this->Usersinmd->ishakok($username,'hmin'))
                { ?>
                     <a onclick="return konfirmasi()" class="btn btn-default btn-sm" href="<?php echo base_url().'admin/minumanct/hapus/'.$hasil->idx.'';?>"><i class="fa fa-trash-o"></i></a>
                   <?php } ?>
                 
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
            <form action="<?=base_url().'admin/minumanct'?>" name="fperpage" method="post"> <input type="text" name="perpage" value="<?=$perpage?>" size="2" onblur="fperpage.submit()"> per page
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
