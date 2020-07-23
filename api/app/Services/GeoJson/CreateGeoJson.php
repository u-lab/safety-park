<?php

namespace App\Services\GeoJson;

use File;

class CreateGeoJson
{
    public function handler(string $perfecture)
    {
        [ "ja" => $perfecture_ja ] = $this->perfecture_str_to_perfecture_obj($perfecture);

        // 公園データの取得
        $parks = $this->fetch_park($perfecture_ja);

        // 公園データをファイル用の文字列に変換
        $contents = $this->parks_to_file_contents($parks);

        // ファイルへと書き込む
        $this->put_to_file('tokyo', $this->geojson_path(), $contents);
    }

    /**
     * 公園データを取得する
     */
    protected function fetch_park(string $perfecture_ja): array
    {
        return Park::where('adm', $perfecture_ja)->get();
    }

    /**
     * GeoJsonのパスを取得する
     *
     * @return string
     */
    protected function geojson_path(): string
    {
        return storage_path('/app/public/geojson');
    }

    /**
     * 公園データをファイル用の文字列に変換
     *
     * @return string
     */
    protected function parks_to_file_contents(): string
    {
        return "";
    }

    /**
     * ローマ字の県名を内部の県データへ変換
     *
     * @param string $perfecture
     * @return array
     */
    protected function perfecture_str_to_perfecture_obj(string $perfecture): array
    {
        return [
            'en' => 'tokyo',
            'ja' => '東京都'
        ];
    }

    /**
     * ファイルへと書き込む
     *
     * @param string $filename ファイル名
     * @param string $path パス
     * @param string $contents 内容
     * @return int|bool
     */
    protected function put_to_file(string $filename, string $path, string $contents)
    {
        return File::put("{$path}/{$filename}", $contents);
    }
}
