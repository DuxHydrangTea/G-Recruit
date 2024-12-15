<?php
namespace App\Ultilities;
use Schema;
use Storage;
class DeleteWithImage
{

    const FILE_COLUMNS = ['avatar', 'thumbnail', 'file', 'image', 'audio', 'audio_file', 'pdf_cv'];



    // Trả về true nếu bản ghi record có cột tên $column
    public static function hasColumn($record, $column): bool
    {
        return Schema::hasColumn($record->getTable(), $column);
    }

    // Trả về danh sách cột chứa địa chỉ file trong 1 bản ghi
    public static function fileColumns($record): array
    {
        $existedColumns = [];
        foreach (DeleteWithImage::FILE_COLUMNS as $column) {
            if (DeleteWithImage::hasColumn($record, $column)) {
                $existedColumns[] = $column;
            }
        }
        return $existedColumns;
    }


    public static function deleteFilesFromColumns($record)
    {
        $existedColumns = DeleteWithImage::fileColumns($record);
        foreach ($existedColumns as $column) {
            if ($record[$column]) {
                // Storage::delete('public/' . $record[$column]);
                DeleteWithImage::deleteFile($record[$column]);
            }
        }
    }

    public static function deleteFile($path)
    {
        Storage::delete('public/' . $path);
    }
}