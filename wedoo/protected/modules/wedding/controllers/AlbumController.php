<?php
class AlbumController extends WeddingCoreController
{
	/**
	 * Declares class-based actions.
	 */
	
	public function actions()
	{
		return array(
		// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
		),
		// page action renders "static" pages stored under 'protected/views/site/pages'
		// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
		),
		);
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
			echo $error['message'];
			else
			$this->render('error', $error);
		}
	}
	public function actionManage_ablum()
	{
		session_start();
		$album_id = $_REQUEST['album_id'];
		$this->render('photo_upload',array('album_id'=>$album_id));
	}
	public function actionImageUpload(){
		$data = substr($_POST['imgBase64'], strpos($_POST['imgBase64'], ",") + 1);
		$decodedData = base64_decode($data);
		
		$filename = md5(uniqid()) . '.png';
		$path	= 	YiiBase::getPathOfAlias('webroot');
		$file = $path.'/upload/album_image/'.$filename;
		$fp = fopen($file, 'wb');
		$photoalbum = new AlbumPhotoGallery();
		$photoalbum->photo_image = $filename;
		$photoalbum->save(false);
		fwrite($fp, $decodedData);
		fclose();
	}
	public function actionUploadAlbum(){
		session_start();
		if($_SESSION['uid'] && $_SESSION['wedding_id'] && isset($_REQUEST['albumName'])){
			$albumname = $_REQUEST['albumName'];
			$user_id = $_SESSION['uid'];
			$wedding_id = $_SESSION['wedding_id'];
			$albumData = (Yii::app()->db->createCommand("SELECT album.*,album_category.* FROM `album`
													   JOIN album_category ON album.`album_category_id` = album_category.album_cate_id
														WHERE album_category.album_cate_name='".$albumname."' AND album.`wedding_id`='".$wedding_id."'" ));
										
		$albumDetails = $albumData->queryRow();
		if(!empty($albumDetails)){
			$photoGallalbumModel =  AlbumPhotoGallery::model()->findAll("album_id='".$albumDetails['album_id']."'");
			if($photoGallalbumModel){
				$galleryArr = array();
				foreach($photoGallalbumModel as $galleryData){
					$gallery['album_photo_id'] = $galleryData['album_photo_id'];
					$gallery['album_id'] = $galleryData['album_id'];
					$gallery['user_id'] = $galleryData['user_id'];
					$userModel =  UserDetail::model()->find("user_id='".$galleryData['user_id']."'");
					if($userModel){
					$userText = ucfirst(substr($userModel['username'],0,1)).'.png';	
					$userImage = Yii::app()->getBaseUrl(true).'/upload/letters_image/'.$userText;
					}else{
						$userImage = Yii::app()->getBaseUrl(true).'/images/second_box_photo_comment.png';
					}
					
					$gallery['user_image'] = $userImage;
					$gallery['username'] = $userModel['username'];
					$gallery['photo_image'] = $galleryData['photo_image'];
					$gallery['caption'] = $galleryData['caption'];
					$gallery['likeCount'] = $this->LikeCount($galleryData['album_photo_id']);
					$galleryArr[] = $gallery;
				}
			}
		}
			$this->render('upload-album',array('albumDetails'=>$albumDetails,'photoGallalbumModel'=>$galleryArr));
		}else{
			$this->redirect(array('/Login/'));
		}
	}
	public function actionAlbumLike(){
		if($_POST['id']){
			session_start();
			$productLike=AlbumLike::model()->find("user_id='".$_SESSION['uid']."' AND album_photo_id='".$_POST['id']."'");
			if($productLike){
				$delLikes=$productLike->delete();
			}else{
				$productLikeModel= new AlbumLike();
				$productLikeModel->user_id= $_SESSION['uid'];
				$productLikeModel->album_photo_id=$_POST['id'];
				$addLikes = $productLikeModel->save(false);
				}
			if($delLikes || $addLikes){
			$likeCount=	count(AlbumLike::model()->findAll("album_photo_id='".$_POST['id']."'"));
				$productLikeArray=array();
				$productLikeArray[]=$delLikes;
				$productLikeArray[]=$addLikes;
			if($likeCount){
				$productLikeArray[]=$likeCount;
				echo json_encode($productLikeArray);
			}else{
				$productLikeArray[]=0;
				echo json_encode($productLikeArray);
			}
		}
		}
	}
	public function LikeCount($albumId){
		$likeCount=	count(AlbumLike::model()->findAll("album_photo_id='".$albumId."'"));
		if($likeCount){
			return $likeCount;
		}else{
			return 0;
		}
	}
	public function actionImageSave(){
			session_start();
		if($_SESSION['uid'] && $_SESSION['wedding_id']){
		$albums = Album::model()->find("album_id='".$_POST['hiddenALbumId']."'");	
		if($albums){
			$albumphotogallery = new AlbumPhotoGallery();
			$albumphotogallery->album_id = $_POST['hiddenALbumId'];
			$albumphotogallery->user_id =  $_SESSION['uid'];
		if(isset($_FILES['photoimg']['name']) && !empty($_FILES['photoimg']['name'])){
						if(($_FILES['photoimg']['name']!=''))
							{
								$path	= 	YiiBase::getPathOfAlias('webroot');
								$url=Yii::app()->getBaseUrl(true);
								$randomNumber = rand(0,1000);
								$fileType = end(explode('.', $_FILES['photoimg']['name']));
								$filename= $_SESSION['uid'].$_SESSION['wedding_id'].$_POST['hiddenALbumId'].$randomNumber.'.'.$fileType;
								move_uploaded_file($_FILES['photoimg']['tmp_name'], $path."/upload/album_image/".$filename);
								$albumphotogallery->photo_image=$filename;
							}
						}
		if($albumphotogallery->save(false)){
			//$photoGallModel =  AlbumPhotoGallery::model()->find("album_photo_id='".$albumphotogallery['album_photo_id']."'");
			
			
			$userModel =  UserDetail::model()->find("user_id='".$_SESSION['uid']."'");
			$text = ucfirst(substr($userModel['username'],0,1));
			$textImage = $text.'.png';
			if(file_exists(YiiBase::getPathOfAlias('webroot').'/upload/letters_image/'.$textImage)){
			}else{
			$getImage = $this->CreateImage($text);
			}
			$response = $this->ImageData($_POST['hiddenALbumId'],$filename,$textImage,$userModel['username']);
			echo $response;	
		}
		
 
	}
	}
	}
	public function CreateImage($text){
		$width = 106;
		$height = 104;
		 
		DEFINE("TTF_DIR",YiiBase::getPathOfAlias('webroot')."/fonts/");
		DEFINE("TTF_FONTFILE","OpenSans-Regular-webfont.ttf");
		DEFINE("TTF_TEXT",$text);
		 
		$im = imagecreatetruecolor ($width, $height);
		$white = imagecolorallocate ($im,72,209,204);
		$black = imagecolorallocate ($im, 0, 0, 0);
		$border_color = imagecolorallocate ($im, 50, 50, 50);
		 
		imagefilledrectangle($im,0,0,399,99,$white);
		imagettftext ($im, 30, 0, 40, 55, $black, TTF_DIR.TTF_FONTFILE,TTF_TEXT);
		$url = YiiBase::getPathOfAlias('webroot').'/upload/letters_image/';
		//header("Content-type: image/png");
		imagepng($im,$url.$text.'.png');
		imagedestroy($im);
		return 1;
	}
	/*public function CreateImage($text){
		$width = 106;
		$height = 104;
		 
		$im = ImageCreate($width, $height);
		$bg = ImageColorAllocate($im, 110,181,184);
		$border = ImageColorAllocate($im, 207, 199, 199);
		ImageRectangle($im, 0, 0, $width - 1, $height - 1, $border);
		 
		$textcolor = ImageColorAllocate($im,0,0,0);
		$font = 5;
		 
		$font_width = ImageFontWidth($font);
		$font_height = ImageFontHeight($font);
		$text_width = $font_width * strlen($text);
		$position_center = ceil(($width - $text_width) / 2);
		$text_height = $font_height;
		 
		$position_middle = ceil(($height - $text_height) / 2);
		 
		$image_string = ImageString($im, $font, $position_center, $position_middle, $text, $textcolor);
		$url = YiiBase::getPathOfAlias('webroot').'/upload/letters_image/';
		//header("Content-type: image/png");
		imagepng($im,$url.$text.'.png');
		imagedestroy($im);
		return 1;
	}*/
	
	public function actionRotateImageSave(){
		$album_gallery_id = $_POST['album_gallery_id'];
		$caption = $_POST['caption'];
		
		$galleryModel =  AlbumPhotoGallery::model()->find("album_photo_id='".$album_gallery_id."'");
				if(!empty($galleryModel)){
					$id = $galleryModel['album_photo_id'];
					$galleryDetails= $this->loadModel($id,'AlbumPhotoGallery');
					$galleryDetails->caption = $caption?$caption:'';
					$galleryDetails->save(false);
				}
		if(isset($_POST['degree']) && !empty($_POST['degree'])){
		$path	= 	YiiBase::getPathOfAlias('webroot');
		$rotateFilename = $path."/upload/album_image/".$_POST["imgname"]; // PATH
		$degrees = $_POST['degree'];
		
		$fileType = end(explode('.', $_POST["imgname"]));
		
		if($fileType == 'png' || $fileType == 'PNG'){
		   header('Content-type: image/png');
		   $source = imagecreatefrompng($rotateFilename);
		   $bgColor = imagecolorallocatealpha($source, 255, 255, 255, 127);
		   // Rotate
		   $rotate = imagerotate($source, $degrees, $bgColor);
		   imagesavealpha($rotate, true);
		   imagepng($rotate,$rotateFilename);
		
		}
		if($fileType == 'jpg' || $fileType == 'jpeg'){
		   header('Content-type: image/jpeg');
		   $source = imagecreatefromjpeg($rotateFilename);
		   // Rotate
		   $rotate = imagerotate($source, $degrees, 0); 
		    imagejpeg($rotate,$rotateFilename);
		}
		imagedestroy($source);
		imagedestroy($rotate);
		}
	}
	public function ImageData($hiddenId,$filename,$textImage,$username){
		 $imageData =  '<div class="photo_box pull-left">
   		 <div class="comment_part_photobox caption_box" id="'.$hiddenId.'">
         <div class="Comment_detail pull-right">
            <div class="caption">
                 <h2>captions</h2>
            </div>
            <div class="caption video-camera">
                 <a href="javascript:" class="slideshow-link"><i class="fa  fa-file-video-o"></i></a>
            </div>
            <div class="image-comment-photo preview">
                <img src="'.Yii::app()->getBaseUrl(true).'/upload/album_image/'.$filename.'" >
                        </div>
                    </div>
                    <div class="comment_part">
			<div class="person_image pull-left">
			    <img src="'. Yii::app()->getBaseUrl(true).'/upload/letters_image/'.$textImage.'" >
			</div>
                        <div class="Comment_detail Comment_detail_desc pull-right">
                        
                            <div class="comment_title">
                                <div class="commentPerson_name pull-left">
                                
                                    <a class="profile-name" href="#"> <h3>'.$username.'</h3></a>
                                    <div class="tag_icon pull-left"><img src="'.Yii::app()->getBaseUrl(true).'/images/party_icon.png" ></div>
                               
                                    <div class="comment_time pull-right">
                                    	<p>Posted 2 hours ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                 </div>
                <div class="comment_tab pull-right slider_control">
                    <ul>
                        <li>
                            <a href="#">
                                <div class="likes"><i class="fa fa-heart"></i></div>
                                <div class="Count">30</div>
                            </a>
                        </li>
                        <li>
                            <a class="all-photo-tab" href="#" id="'.$hiddenId.'">
                    <div class="Comments"><i class="fa fa-comments"></i></div>
                    <div class="Count">102</div>
                </a>
                <div  class="comment_section pull-left" >
                    <div class="title">
                        <h2>Comments</h2>
                        <span class="line_title"></span>
                    </div>
                    <div class="comment_part">
                        <div class="person_image pull-left">
                            <img src="'.Yii::app()->getBaseUrl(true).'/images/comment_person.png" >
                        </div>
                        <div class="Comment_detail pull-right">
                            <div class="comment_title">
                                <div class="commentPerson_name pull-left">
                                     <a class="profile-name" href="#"><h3>John</h3></a>
                                     <div class="comment_time pull-right">
                                     <p>Posted 2 hours ago</p>
                                </div> 
                                </div>
                               
                            </div>
                            <div class="clearfix"></div>
                            <div class="comment_desc pull-left">
                                <p>Hi there!</p>
                            </div>
                        </div>
                     </div>
                    <div class="leave_comment">
                        <div class="comment_input">
                            <textarea placeholder="Leave a comment..."></textarea>
                        </div>
                        <div class="Add_comment">
                            <input type="submit" value="Add Comment" >
                        </div>
                     </div>
                    <div class="back-button" id="'.$hiddenId.'"><a href="#"><i class="fa   fa-chevron-circle-left"></i></a> </div>
                </div>
            </li>
            <li>
                <a class="" href="#">
                    <div class="print"><i class="fa fa-print"></i></div>
                </a>
            </li>
            <li>
                <a class="all-photo-tab" href="#" id="'.$hiddenId.'">
                    <div class="share"><i class="fa fa-share-alt"></i></div>
                </a>
                <div class="comment_section  share-media pull-left" >
                    <div class="Social_share_part">
                        <div class="title">
                            <h2>Share We Doo</h2>
                            <span class="line_title"></span>
                        </div>
                        <div class="comment_part socil_media_part ">
                            <div class="Social-media-icons">
                                <div class="caption_title">
                                    <a class="facebook" href="#"><i class="fa fa-facebook"></i></a>
                                    <a class="Twitter" href="#"><i class="fa fa-twitter"></i></a>
                                    <a class="Pintrest" href="#"><i class="fa fa-pinterest-p"></i></a>
                                </div>
                            </div>
                            <div class="download_button_media">
                                <button><i class="fa fa-download"></i> &nbsp;&nbsp;Download image</button>    
                            </div>
                        </div>
                        <div class="Link-of-website">
                            <h2>Link</h2>
                            <span class="line"></span><br >
                            <span class="Site_url">https://www.wedoo.com</span>
                        </div>
                    </div>
                </div>
                <div class="back-button" id="'.$hiddenId.'"><a href="#"><i class="fa   fa-chevron-circle-left"></i></a> </div>
            </li>
            <li>
                <a class="all-photo-tab" href="#" id="'.$hiddenId.'">
                    <div class="setting"><i class="fa fa-cog"></i></div>
                </a>
                    <div class="comment_section Photo-edit pull-left">
                	<div class="back-button" id="'.$hiddenId.'"><a href="#"><i class="fa   fa-chevron-circle-left"></i></a> </div>
                    <!--Photobox_inner_part -->
                    <div class="Photobox_inner_part content">
                        <!--Edit Section title -->
                        <div class="title">
                            <h2>Edit</h2>
                            <span class="line_title"></span>
                        </div>
                      
                        <div class="comment_part edit_part">
                            <div class="caption">
                                <div class="caption_title">
                                    <span class="title_cap">
                                        Caption
                                    </span>
                                </div>
                                <div class="caption_input">
                                    <input type="text" placeholder="Add Your Caption" class="txtcaption" name="txtcaption" id="'.$hiddenId.'" >
                                </div>
                            </div>
                            <div class="Album-slider">
                                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                                  <ol class="carousel-indicators">
                                    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                                  </ol>
                                  <div class="carousel-inner" role="listbox">
                                    <div class="item active preview rotateimgPreview">
                                      <img id="'.$hiddenId.'" src="'.Yii::app()->getBaseUrl(true).'/upload/album_image/'.$filename.'" name="'.$filename.'" >
                                    </div>
                                  </div>
                                <input type="hidden" class="txtdegree" name="txtdegree" id="'.$hiddenId.'">
                                  <a class="left carousel-control rotateimg" href="#carousel-example-generic" role="button" id="'.$hiddenId.'" data-slide="prev" name="anticlockwise">
                                    <i class="fa fa-undo"></i>
                                    <span class="sr-only">Previous</span>
                                  </a>
                                  <a class="right carousel-control rotateimg" href="#carousel-example-generic" role="button" id="'.$hiddenId.'" data-slide="next" name="clockwise">
                                   <i class="fa fa-repeat"></i>
                                    <span class="sr-only">Next</span>
                                  </a>
                                </div>
                            </div>
                            <div class="caption">
                                <div class="caption_title">
                                    <span class="title_cap">
                                        Albums
                                    </span>
                                </div>
                                <div class="caption_input">
                                    <div class="Album_list">
                                        <div class="Album_box pull-left"></div>
                                        <div class="Album_box pull-left"></div>
                                    </div>
                                </div>
                            </div>
                       </div>
                 
                    </div>
                    <div class="leave_comment Edit_control">
                         <div class="edit_button">   	
                            <div class="Add_comment pull-left">
                                <input type="submit" value="Delete Image" class="btndeleteimg" id="'.$hiddenId.'">
                            </div>
                            <div class="Add_comment pull-right">
                                <input type="submit" value="Save Changes" class="btnsaveimg" id="'.$hiddenId.'">
                            </div>
                        </div>
                    </div>
               </div>
            </li>
        </ul>
    </div>
</div>';
return $imageData;
	} 
}