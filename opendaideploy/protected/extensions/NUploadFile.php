<?php
/*
 * Nupload file behavior
 * @author	Naser Kholghi <kholghi67@gmail.com>
 * @link	https://github.com/na3r/NUploadFile
 * @version 1.0
 */

class NUploadFile extends CActiveRecordBehavior {
	
	protected $_uploadDirectory;
	protected $_fileField;
	protected $_tmpFile;
	// set to true if you want to change the file name
	protected $_renameFile = true;
	/*
	 * set true if you want to delete the file on delete record and when user upload new file 
	 */
	protected $_removeFile = true;
	
	public function afterFind() {
		$this->_tmpFile = $this->owner->{$this->fileField};
	}
	
	public function afterDelete() {
		$this->removeFile($this->owner->{$this->fileField});
	}	
	
	public function uploadFile($name=null) {
		if(!$this->owner->isNewRecord)
			$tmpFile = $this->_tmpFile;
		$path = $this->uploadDirectory;
		if(!is_dir($path))
			mkdir($path);
		$fileField = $this->owner->{$this->fileField};
		if (!empty($name)){
		$fileField = CUploadedFile::getInstance($this->owner, $name);
		}else{
		$fileField = CUploadedFile::getInstance($this->owner, $this->fileField);
		}
						error_log(print_r($this->fileField,true));
						error_log(print_r($this->owner,true));
						error_log(print_r($fileField,true));

		if($fileField instanceof CUploadedFile) {
			//generate unique name for uploaded file if set
			$newName = $fileField->name;		
			if ($this->renameFile){
				$newName = trim(md5(time().$fileField)).'.'.CFileHelper::getExtension($fileField->name);
			}
			$fileField->saveAs($path.$newName);
			$this->owner->{$this->fileField} = $newName;
//			$this->owner->{$this->fileField} = $this->_getDirName() . $newName;
			if(!$this->owner->isNewRecord)
				$this->removeFile($tmpFile);
			return true;
		}
		// the data could come as a result of a
		/*
		$fileArray = CUploadedFile::getInstances($this->owner, $this->fileField);
								error_log(print_r($fileArray,true));
		foreach($fileArray as $index=>$fileField){
			if($fileField instanceof CUploadedFile) {
				//generate unique name for uploaded file if set
				$newName = $fileField->name;		
				if ($this->renameFile){
					$newName = trim(md5(time().$fileField)).'.'.CFileHelper::getExtension($fileField->name);
				}
				$fileField->saveAs($path.$newName);
				$this->owner->{$this->fileField} = $newName;
	//			$this->owner->{$this->fileField} = $this->_getDirName() . $newName;
				if(!$this->owner->isNewRecord)
					$this->removeFile($tmpFile);
				return true;
			}
		}
		*/
		$this->owner->{$this->fileField} = $tmpFile;
	}
	
	public function removeFile($fileName) {
		$path = $this->uploadDirectory.$fileName;
		if(is_file($path) && $this->removeFile)
			unlink($path);
	}
	
	/*
	 * return class name as directory name
	 */
	private function _getDirName() {
		return DIRECTORY_SEPARATOR . strtolower(get_class($this->owner)) . DIRECTORY_SEPARATOR;
	}
	
	public function setUploadDirectory($dir) {
		if(!is_dir($dir))
			throw new CException(Yii::t('NUploadFile', '"{dir}" directory is not exists', array('{dir}'=>$dir)));
		$this->_uploadDirectory = $dir;
	}
	
	/*
	 * return upload directory path. if null returns runtimePath
	 */
	public function getUploadDirectory() {
		$dirName = $this->_getDirName();
		if($this->_uploadDirectory==null)
			return Yii::app()->runtimePath.$dirName;
		return str_replace('//', '/', $this->_uploadDirectory.$dirName);
	}
	
	public function setFileField($fileField) {
		$this->_fileField = $fileField;
	}
	
	public function getFileField() {
		return $this->_fileField;
	}
	
	public function setRemoveFile($removeFile) {
		$this->_removeFile = $removeFile;
	}
	
	public function getRemoveFile() {
		return $this->_removeFile;
	}
	
	public function setRenameFile($renameFile) {
		$this->_renameFile = $renameFile;
	}
	
	public function getRenameFile() {
		return $this->_renameFile;
	}

	public function getFilePath() {
		$filePath = $this->owner->{$this->fileField};
/*		if($this->_uploadDirectory==null)
			return Yii::app()->runtimePath.$filePath;
		return str_replace('//', '/', $this->_uploadDirectory.$filePath);
		*/
		return $this->uploadDirectory.$filePath;
	}
}
