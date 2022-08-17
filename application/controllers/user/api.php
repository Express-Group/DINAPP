<?php
//require(APPPATH.'/libraries/REST.php');
class api extends CI_Controller{
	private $token='bmV3aW5kaWFuZXhwcmVzcw==';
	
	public function __construct(){
		parent::__construct();
	}
	
	public function process_api(){
		$Site=$_POST['site'];
		$Count=$_POST['count'];
		$type=$_POST['type'];
		if($Site!='' && $Count!='' && $type!=''){
			$Data=$this->Get_Data($Site,$Count,$type);
			echo $this->success_response($Data,'Data complied successfully');
			exit;
		}else{
			echo $this->error_response('Invalid parameter (or) parameter missed');
			exit;
		}
 	}
	
	public function Get_Data($Site,$Count,$type){
		$HostName='10.225.182.4';$UserName='root';$Password='Enpl@456'; $DatabaseName='dm_live';
		$imageurl='http://images.dinamani.com/';$siteurl='http://www.dinamani.com/';
		
		$connection = new mysqli($HostName,$UserName,$Password,$DatabaseName);
		$connection->set_charset("utf8");
		
		if (mysqli_connect_errno()):
			return 'DB-ERROR : '.mysqli_connect_error();
		endif;
		
		$sql="SELECT title,url,article_page_image_path,last_updated_on FROM article WHERE status='P' ORDER BY content_id DESC LIMIT ".$Count."";
		 $result = $connection->query($sql);
		if($result->num_rows  > 0){
			$data=[];
			$return['data']=[];
			while($row=$result->fetch_assoc()):
				$title=strip_tags(preg_replace('/<p[^>]*>(.*)<\/p[^>]*>/i', '$1',$row['title']));
				$data['title']=str_replace(['&zwj;'],' ',$title);
				$data['url']=$siteurl.$row['url'];
				if($row['article_page_image_path']==''){
					if($type==0 || $type==2):
						$image= $imageurl=imagelibrary_image_path.'logo/dn_logo_150X150.jpg';
					else:
						$image= $imageurl=imagelibrary_image_path.'logo/dn_logo_100X65.jpg';
					endif;
				}else{
					if($type==0 || $type==2):
					$row['article_page_image_path']=str_replace('original','w150X150',$row['article_page_image_path']);
					endif;
					if($type==1 || $type==3):
					$row['article_page_image_path']=str_replace('original','w100X65',$row['article_page_image_path']);
					endif;
					$image= $imageurl.imagelibrary_image_path.$row['article_page_image_path'];
				}
				$data['image']=$image;
				$data['last_updated_on']=$row['last_updated_on'];
				$return['data'][]=$data;
			endwhile;
			$connection->close();
			return $return;
			
		}else{
			return  'No Data';
		} 
		
	
	}
	
	public function error_response($status=''){
		$response=[];
		$response['http_code']=405;
		$response['status_message']=$status;
		$response['data']='';
		return json_encode($response);
	}
	
	public function success_response($Data,$Status){
		$response=[];
		$response['http_code']=http_response_code();
		$response['status_message']=$Status;
		$response['data']=$Data;
		return json_encode($response);
	}
}
?>