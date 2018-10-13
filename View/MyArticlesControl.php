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
    const maxVideoSizeBytes = 40000000;

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
            $errorMsg =$sectionName.": Media Type not valid";
        }

        if ($type != null ||$type == $this->mediaTypeOptions[0]){
            if ($type == $this->mediaTypeOptions[1]){
                //Is Image

                //is not null
                if ($file == null){
                    $errorMsg = $sectionName.": A file must be selected to match the Media Type";
                }
                //uploaded successfully (error = 0)
                $fileError = $this->checkErrorCode($file['error']);
                if ($fileError != 0){
                    $errorMsg = $fileError;
                }
                //is only 1 file
                if (count($file['name']) > 1){
                    $errorMsg = $sectionName.": Only 1 File can be added at a time";
                }
                //size within limit for type
                if ($file['size'] > $this->maxImageSizeBytes){

                    $sizeInKb = ceil($file['size'] /$this->bytesToKb );
                    $errorMsg = $sectionName.": cover Image to big(". $sizeInKb ."KB). file cannot exceed ".($this->maxImageSizeBytes /$this->bytesToKb)."KB";
                }
                //is valid image file (jpg and png)
                $minedFileType = mime_content_type($file['tmp_name']);
                if($minedFileType != 'image/jpeg' || $minedFileType != 'image/png') {
                    $errorMsg = $sectionName.": Images must be valid jpeg or png file";
                }
            }
            if ($type == $this->mediaTypeOptions[2]){
                //Is Video

                //is not null
                //uploaded successfully (error = 0)
                //is only 1 file
                //size within limit for type
                //is valid video file (mime_content_type )
                //is valid video type MP4

            }
            if ($type == $this->mediaTypeOptions[3]){
                //Is Audio

                //is not null
                //uploaded successfully (error = 0)
                //is only 1 file
                //size within limit for type
                //is valid image file   All the audio files format has "audio/" common. So, we can
                // check the $_FILES['file']['mime_type'] and apply a preg_match() to check if "audio/" exists in this mime type or not /mime_content_type
                //
                //
                //is valid file type of (mp3 or wav)
            }
        }else{
            //no file to add
        }
        return $errorMsg;
    }

    public  function AddArticle($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt){
        $validateMsg = $this->validateArticleInput($headline, $coverImage, $category, $description, $pText, $pUrl, $pType, $pCapt,$sText,$sUrl,$sType,$sCapt,$cText,$cUrl,$cType,$cCapt);
        if ($validateMsg != ""){
            //Invalid
            return $validateMsg;
        }else{
            //Add Article
            return "valid";//TODO: upload and add to DB
        }
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
}