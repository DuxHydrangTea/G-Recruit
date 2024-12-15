<?php

namespace App\Ultilities;
class UploadUltility
{
    const PATH_STORAGE = "public";

    const PATH_UPLOAD_IMAGES = "/images";
    const PATH_UPLOAD_VIDEOS = "/videos";
    const PATH_UPLOAD_AUDIOS = "/audios";
    const PATH_UPLOAD_PDFS = "/pdfs";
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

            return false;
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
            $path = $file->storeAs(UploadUltility::PATH_STORAGE . UploadUltility::PATH_UPLOAD_AUDIOS, $name_file);
            return UploadUltility::PATH_UPLOAD_AUDIOS . '/' . $name_file;
        } catch (\Throwable $th) {

            return false;
        }
    }

    public static function uploadVideo($file)
    {
        try {
            $ranInt = random_int(1, 100);
            $name_file = $ranInt . $file->getClientOriginalName();
            $path = $file->storeAs(UploadUltility::PATH_STORAGE . UploadUltility::PATH_UPLOAD_VIDEOS, $name_file);
            return UploadUltility::PATH_UPLOAD_VIDEOS . '/' . $name_file;
        } catch (\Throwable $th) {

            return false;
        }
    }

    public static function uploadPdf($file)
    {
        try {
            $ranInt = '';
            $name_file = $ranInt . $file->getClientOriginalName();
            $path = $file->storeAs(UploadUltility::PATH_STORAGE . UploadUltility::PATH_UPLOAD_PDFS, $name_file);
            return UploadUltility::PATH_UPLOAD_PDFS . '/' . $name_file;
        } catch (\Throwable $th) {

            return false;
        }
    }
}