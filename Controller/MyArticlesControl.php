<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../../Model/Article.php';
require_once '../../Model/ArticleCategory.php';
require_once  '../../global/ConnectionSingleton.php';
require_once '../../config/config.php';
class MyArticlesControl
{
    private $con;
    private $articleModel;
    private $articleCategory;

    private $headerLengthLimit = 60;
    private $descriptionLengthLimit = 70;
    private $textLengthLimit = 4000;
    private $mediaTypeOptions = ['none','image','video','audio'];
    private $mediaCaptionLengthLimit = 200;
    private $maxImageSizeBytes = 3000000;
    private $maxAudioSizeBytes = 10000000;
    private $bytesToKb = 1000;
    private $maxVideoSizeBytes = 40000000;

    public function __construct()
    {
        $this->con = ConnectionSingleton::Instance()->GetCon();
        $this->articleModel = new Article();
        $this->articleCategory = new ArticleCategory();
    }
    public function DisplayArticleCategoriesAsOptionSet($selectInputFormID){
        $categories = json_decode($this->articleCategory->loadArticleCategories());
        if($categories != null){

            if (count($categories) > 0) {
                $html = null;
                $html .= '<select class="form-control mr-2" name="'.$selectInputFormID.'" id="'.$selectInputFormID.'" >';
                $html .= '<option value="">Category...</option>';

                foreach ($categories as $item) {
                    $html .= '<option value="' . $item->id . '">' . $item->category . '</option>';
                }
                $html .= '</select>';

                return $html;
            }else{
                return "";
            }
        }else{
            return "";
        }
    }

    private function validateArticleInput($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt){
        $errorMsg = "";
        //Validate Form Text Fields
        $textFieldsValidated = $this->validateArticleTextFields($headline, $description, $pText, $pCapt,$sText,$sCapt,$cText,$cCapt);
        if ($textFieldsValidated != ""){
            $errorMsg = $textFieldsValidated;
        }
        //Validate Article Category
        if ($category == ""){
            $errorMsg = "Category Required";
        }
        if ($this->articleCategory->GetCategoryByID($category) == null){
            $errorMsg = "Article Category Invalid";
        }
        //Validate File Types and Upload
        $coverImgValidation = $this->validateFileUpload($coverImage,$this->mediaTypeOptions[1],'Header');
        if ($coverImgValidation != ""){
            $errorMsg = $coverImgValidation;
        }
        $primaryMediaValidation = $this->validateFileUpload($pUrl,$pType,'Primary');
        if ($primaryMediaValidation != ""){
            $errorMsg = $primaryMediaValidation;
        }
        $secondaryMediaValidation = $this->validateFileUpload($sUrl,$sType,'Secondary');
        if ($secondaryMediaValidation != ""){
            $errorMsg = $secondaryMediaValidation;
        }
        $conclusionMediaValidation = $this->validateFileUpload($cUrl,$cType,'Conclusion');
        if ($conclusionMediaValidation != ""){
            $errorMsg = $conclusionMediaValidation;
        }

         return $errorMsg;
    }
    private function validateFileUpload($file,$type,$sectionName){
        $errorMsg = "";
        //Check media type is valid:
        if (in_array($type,$this->mediaTypeOptions)){
        }else{
            return $sectionName.": Media Type not valid";
        }

        if ($type != null){
            if ($type != $this->mediaTypeOptions[0]){
                //=======General File checks
                //is not null
                if ($file == null){
                    return $sectionName.": A file must be selected to match the Media Type";
                }
                //uploaded successfully (error = 0)
                $fileError = $this->checkErrorCode($file['error']);
                if ($fileError != 0){
                    return $sectionName.": ".$fileError;
                }
                //is only 1 file
                if (count($file['name']) > 1){
                    return $sectionName.": Only 1 File can be added at a time";
                }
                //======Type Specific checks
                if ($type == $this->mediaTypeOptions[1]){
                    //Is Image
                    //check uploads folder exists:
                    if(!is_dir(APPROOT.IMAGEFOLDER)){
                        return "Server  Error: Image uploads folder not found. Please Contact Support";
                    }
                    //check if file exists
                    if (file_exists(APPROOT.IMAGEFOLDER.$file['name'])) {
                        return  $sectionName.": Sorry, file already exists.";
                    }
                    //size within limit for type
                    if ($file['size'] > $this->maxImageSizeBytes){

                        $sizeInKb = ceil($file['size'] /$this->bytesToKb );
                        return $sectionName.": cover Image to big(". $sizeInKb ."KB). file cannot exceed ".($this->maxImageSizeBytes /$this->bytesToKb)."KB";
                    }
                    //is valid image file (jpg and png)
                    $minedFileType = mime_content_type($file['tmp_name']);
                    if($minedFileType == 'image/jpeg' || $minedFileType == 'image/png') {
                        //valid
                    }else{
                        return $sectionName.": Images must be valid jpeg or png file.";
                    }
                    if(!is_readable(APPROOT.IMAGEFOLDER)){
                        return 'Server Error: Image Directory is not readable. Please Contact Support';
                    }
                    if(!is_writable(APPROOT.IMAGEFOLDER)){
                        return 'Server Error: Image Directory is not writable. Please Contact Support';
                    }
                }
                if ($type == $this->mediaTypeOptions[2]){
                    //Is Video
                    //$errorMsg = $sectionName.": Video Not Supported Yet";
                    //return $errorMsg;

                    //size within limit for type
                            if ($file['size'] > $this->maxVideoSizeBytes){

                                $sizeInKb = ceil($file['size'] /$this->bytesToKb );
                                $errorMsg = $sectionName.": cover Image to big(". $sizeInKb ."KB). file cannot exceed ".($this->maxVideoSizeBytes /$this->bytesToKb)."KB";
                            }
                    //is valid video file (mime_content_type ) MP4
                            $minedFileType = mime_content_type($file['tmp_name']);
                            if($minedFileType != 'video/mp4') {
                                $errorMsg = $sectionName.": Images must be valid jpeg or png file";
                            }
                    //if file already exists check

                }
                if ($type == $this->mediaTypeOptions[3]){
                    //Is Audio
                    $errorMsg = $sectionName.": Audio Not Supported Yet";
                    return $errorMsg;
                    //size within limit for type
                    //is valid image file   All the audio files format has "audio/" common. So, we can
                    // check the $_FILES['file']['mime_type'] and apply a preg_match() to check if "audio/" exists in this mime type or not /mime_content_type
                    //
                    //
                    //is valid file type of (mp3 or wav)
                    //if file already exists check
                }
            }

        }else{
            //no file to add
        }
        return $errorMsg;
    }
    private function validateArticleTextFields($headline, $description, $pText, $pCapt,$sText,$sCapt,$cText,$cCapt){
        $errorMsg = "";
        if ($headline == "") {
            $errorMsg = "Header Required";
        }
        if ($description == "") {
            $errorMsg = "Description Required";
        }//are field limits valid
        if (strlen($headline) > $this->headerLengthLimit) {
            $errorMsg = "Headline length cannot exceed " . $this->headerLengthLimit;
        }
        if (strlen($description) > $this->descriptionLengthLimit) {
            $errorMsg = "Description length cannot exceed " . $this->descriptionLengthLimit;
        }
        if (strlen($pText) > $this->textLengthLimit) {
            $errorMsg = "Primary: Text length cannot exceed " . $this->textLengthLimit;
        }
        if (strlen($pCapt) > $this->mediaCaptionLengthLimit) {
            $errorMsg = "Primary: Caption length cannot exceed " . $this->mediaCaptionLengthLimit;
        }
        if (strlen($sText) > $this->textLengthLimit) {
            $errorMsg = "Secondary: Text length cannot exceed " . $this->textLengthLimit;
        }
        if (strlen($sCapt) > $this->mediaCaptionLengthLimit) {
            $errorMsg = "Secondary: Caption length cannot exceed " . $this->mediaCaptionLengthLimit;
        }
        if (strlen($cText) > $this->textLengthLimit) {
            $errorMsg = "Conclusion: Text length cannot exceed " . $this->textLengthLimit;
        }
        if (strlen($cCapt) > $this->mediaCaptionLengthLimit) {
            $errorMsg = "Conclusion: Caption length cannot exceed " . $this->mediaCaptionLengthLimit;
        }
        return $errorMsg;
    }
    private function checkErrorCode($phpFileErrorCode){
        $return = "";
        if ($phpFileErrorCode == 0){
            $return  = "";
        }
        if ($phpFileErrorCode == 1){
            $return  = "Server Error: File To big for Server";
        }
        if ($phpFileErrorCode == 2){
            $return  = "Server Error: Max File size reached";
        }
        if ($phpFileErrorCode == 3){
            $return  = "Server Error: Only partially uploaded";
        }
        if ($phpFileErrorCode == 4){
            $return  = "Server Error: No File Uploaded";
        }
        if ($phpFileErrorCode == 6){
            $return  = "Server Error";//missingTemporary folder on server
        }
        if ($phpFileErrorCode == 7){//Failed to write file to disk
            $return  = "Server Error.";
        }
        if ($phpFileErrorCode == 8){
            $return  = "Server Error: Upload Stopped";
        }
        return $return;
    }

    public  function AddArticle($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt,$status,$authorID){
        $validateMsg = $this->validateArticleInput($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt);
        if ($validateMsg != ""){
            //Invalid
            return $validateMsg;
        }else{
            //Upload CoverImage
            $pathToCoverImage = $this->uploadMediaToServer($coverImage,$this->mediaTypeOptions[1],$validateMsg);
            if ($validateMsg != ""){
                return $validateMsg;
            }
            //Upload Primary media (if Required)
            $pathToPrimaryMedia = $this->uploadMediaToServer($pUrl,$pType,$validateMsg);
            if ($validateMsg != ""){
                //if file upload failed rollback changes
                if (file_exists($pathToCoverImage)){
                    unlink($pathToCoverImage);
                }
                return $validateMsg;
            }
            //Upload Secondary media (if Required)
            $pathToSecondaryMedia = $this->uploadMediaToServer($sUrl,$sType,$validateMsg);
            if ($validateMsg != ""){
                //if file upload failed rollback changes
                if (file_exists($pathToCoverImage)){
                    unlink($pathToCoverImage);
                }
                if (file_exists($pathToPrimaryMedia)){
                    unlink($pathToPrimaryMedia);
                }
                return $validateMsg;
            }
            //Upload Conclusion media (if Required)
            $pathToConclusionMedia = $this->uploadMediaToServer($cUrl,$cType,$validateMsg);
            if ($validateMsg != ""){
                //if file upload failed rollback changes
                if (file_exists($pathToCoverImage)){
                    unlink($pathToCoverImage);
                }
                if (file_exists($pathToPrimaryMedia)){
                    unlink($pathToPrimaryMedia);
                }
                if (file_exists($pathToSecondaryMedia)){
                    unlink($pathToSecondaryMedia);
                }
                return $validateMsg;
            }
            //Add Article
            $resultJsn = $this->articleModel->CreateArticle($headline,$category,$description,$pText,$pathToCoverImage,$pathToPrimaryMedia,$pType,$pCapt,$sText,$pathToSecondaryMedia,$sType,$sCapt,$cText,$pathToConclusionMedia,$cType,$cCapt,$status,$authorID);
            $result = json_decode($resultJsn);
            if ($result == true){
                //success
            }else{
                //rollback changes
                if (file_exists($pathToCoverImage)){
                    unlink($pathToCoverImage);
                }
                if (file_exists($pathToPrimaryMedia)){
                    unlink($pathToPrimaryMedia);
                }
                if (file_exists($pathToSecondaryMedia)){
                    unlink($pathToSecondaryMedia);
                }
                return "SQL Error. please try again or contact support";
            }
            return "";
        }
    }
    private function uploadMediaToServer($file, $mediaType,&$errorMessage)
    {
        if ($mediaType == $this->mediaTypeOptions[0]){
            //No media to upload for section - do nothing
            return null;
        }
        if ($mediaType == $this->mediaTypeOptions[1]){
            //Image

                $didUpload = move_uploaded_file($file['tmp_name'], APPROOT.IMAGEFOLDER.$file['name']);
                if ($didUpload) {
                    return IMAGEDATABASE.$file['name'];

                } else {
                    $errorMessage = "An error occurred moving file to Website. Please try again or contact the admin";
                }
        }
        if ($mediaType == $this->mediaTypeOptions[2]){
            //Video
            //TODO: hear back from tutor about what to do here
            return "Not Implemented Yet";
        }
        if ($mediaType == $this->mediaTypeOptions[3]){
            //Audio
            //TODO: hear back from tutor about what to do here
            return "Not implemented Yet";
        }

        return null;
    }
}