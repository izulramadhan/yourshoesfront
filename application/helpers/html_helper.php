<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');



if ( ! function_exists('generatehtml'))
{
    
	    
        
        
        // ---------------------------------- Textarea --------------------------------------------
    function textarea($name,$id,$class,$rows,$values)
    {
            return "<div class='$class'><textarea name='".$name."' id='".$id."' rows='".$rows."' class='form-control'>".$values."</textarea></div>";
    }
    
    
    function email($name,$placeholder,$required,$value)
    {
        $requred=$required==0?'':"required='required'";
        return "<input type='email' placeholder='$placeholder' name='$name' $required class='input-large' value='$value'>";
    }
    
    function combodumy($name,$id)
    {
        return "<select name='$name' id='$id' class='form-control'><option value='0'>Pilih data</option></select>";
    }
    
    function bulan()
    {
        $bulan=array('Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');
        echo"<select name='bulan' class='input-large'>
            
           ";
        for ($i=0;$i<=11;$i++)
        {
            echo" <option value=".$i.">".strtoupper($bulan[$i])."</option>";
        }
            echo"</select>";
    }
    
    
    function get_array_dosen()
    {
        $CI =& get_instance();
        $data=$CI->db->query('select * from app_dosen')->result();
        $hasil=array();
        foreach ($data as $r)
        {
            array_push($hasil, $r->dosen_id,$r->nama_lengkap);
        }
        return $hasil;
    }
    function buatcombo($nama,$table,$class,$field,$pk,$kondisi,$tags)
    {
        $CI =& get_instance();
        $CI->load->model('mcrud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
            
        if($kondisi==null)
        {
          $data=$CI->mcrud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
        echo"<div class='$class'><select name='".$nama."'  class='form-control' $tagtemp>";
        foreach ($data as $r)
        {
            echo" <option value=".$r->$pk.">".strtoupper($r->$field)."</option>";
        }
            echo"</select></div>";
    }
    
    
    function editcombo($nama,$table,$class,$field,$pk,$kondisi,$tags,$value)
    {
        $CI =& get_instance();
        $CI->load->model('crud');
        if(empty($tags))
            {
                $tagtemp="";
            }
            else
            {
                $tagtemp="";
                foreach($tags as $name => $tag)
                {
                    $tagtemp=$tagtemp." $name='$tag' ";
                }
            }
         if($kondisi==null)
        {
          $data=$CI->crud->getAll($table)->result();  
        }
        else
        {
            $data=$CI->db->get_where($table,$kondisi)->result();
        }
        echo "<div class='$class'><select class='form-control' name='".$nama."' id='".$nama."' $tagtemp>";
		echo "<option value=''>---Pilih $nama ---</option>";
        foreach ($data as $r)
        {
            echo "<option value='".$r->$pk."' ";
	    echo $r->$pk==$value?"selected='selected'":"";
	    echo">".$r->$field."</option>";
        }
            echo"</select></div>";
    }
    
	function pss_err($kode)
		{
			switch($kode)
				{
					case 1:
						$msg="Data gagal diinput";
						$alert="danger";
						break;
					case 2:	
						$msg="Data berhasil diinput";
						$alert="success";
						break;
					case 3:	
						$msg="Data gagal diedit";
						$alert="warning";
						break;
					case 4:	
						$msg="Data berhasil diedit";
						$alert="success";
						break;		
					case 5:	
						$msg="Data gagal dihapus";
						$alert="warning";
						break;
					case 6:	
						$msg="Data berhasil dihapus";
						$alert="success";
						break;			
				}
			if($kode>0)
				{	
	?>
                    <div class="alert alert-<?php echo $alert;?>">
                     <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                          <?php echo $msg;?>
                    </div>
    <?php		
				}
		}
	
	function buat_tab($id,$modul_input,$modul_browse,$caption)
		{

	/*$id=isset($var['id'])?$var['id']:0;
	$m=isset($var['m'])?strtoupper($var['m']):"";
	$mode=isset($var['mode'])?strtoupper($var['mode']):"INPUT";
	echo "MENUID : $menuid";*/
?>	
<ul class="nav nav-tabs">
	<?php
    	if($id>0)
			{
	?>
	<li class="active" ><a href="<?php echo base_url()?><?php echo  $modul_input;?>/edit/<?php echo $id?>" ><i class="glyphicon glyphicon-pencil"></i> Data <?php echo $caption;?></a></li>
    <?php
			}
		
	?>
    <li <?php if($id<=0) { ?> class="active" <?php } ?>><a href="<?php echo base_url()?><?php echo  $modul_input;?>/input" ><i class="glyphicon glyphicon-plus"></i>  Input <?php echo $caption;?> Baru</a></li>
        <li><a href="<?php echo base_url()?><?php echo  $modul_browse;?>" ><i class="glyphicon glyphicon-folder-open"></i> Browse <?php echo $caption;?></a></li>

</ul><br />
	<?php
		}
    
   function konversi_tanggal($tanggal,$tipe)
	{
		$bulan = array (1=>"Jan","Feb","Mar","Apr","Mei","Jun","Jul","Ags","Sep","Okt","Nov","Des");
		$bulan2 = array (1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember");
		if($tanggal>0)
			{
				$tg=substr($tanggal,8,2);	
				$b=substr($tanggal,5,2);	
				$bl=substr($tanggal,5,2)*1;	
				$bln1=$bulan[$bl];	
				$bln2=$bulan2[$bl];
				$th=substr($tanggal,0,4);
				if($tipe=="1")
					{
						return $tg." ".$bln1." ".$th;
					}
				elseif($tipe=="2")
					{
						return $tg." ".$bln2." ".$th;
					}	
				elseif($tipe=="3")
					{
						return $tg." ".$b." ".$th;
					}		
				else
					{
						return $tg." ".$bln1;
					}		
				
			}
	}
}
