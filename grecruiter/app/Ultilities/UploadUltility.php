<?php

namespace App\Ultilities;
class UploadUltility
{
    const PATH_STORAGE = "public";

    const PATH_UPLOAD_IMAGES = "/images";
    const PATH_UPLOAD_VIDEOS = "/videos";
    /**
     * Dùng cho upload file ảnh. Trả về chuỗi vị trí file trong thư mục Storage
     * @param \File $file
     * @return string
     */
    public static function uploadImage($file)
    {
        try {
            $ranInt = random_int(1, 100);
            $name_file = $ranInt . "_" . $file->getClientOriginalName();
            $path = $file->storeAs(UploadUltility::PATH_STORAGE . UploadUltility::PATH_UPLOAD_IMAGES, $name_file);
            return UploadUltility::PATH_UPLOAD_IMAGES . '/' . $name_file;
        } catch (\Throwable $th) {

            return "";
        }
    }

    /**
     * Dùng để upload file âm thanh. Trả về chuỗi là đường dẫn đến file nằm trong thư mục Storage
     * @param \File $file
     * @return string
     */
    public static function uploadAudio($file)
    {
        try {
            $ranInt = random_int(1, 100);
            $name_file = $ranInt . $file->getClientOriginalName();
            $path = $file->storeAs("public/audios", $name_file);
            return 'audios/' . $name_file;
        } catch (\Throwable $th) {

            return "";
        }
    }

    public static function uploadVideo($file)
    {
        try {
            $ranInt = random_int(1, 100);
            $name_file = $ranInt . $file->getClientOriginalName();
            $path = $file->storeAs(UploadUltility::PATH_STORAGE . UploadUltility::PATH_UPLOAD_IMAGES, $name_file);
            return 'audios/' . $name_file;
        } catch (\Throwable $th) {

            return "";
        }
    }
}