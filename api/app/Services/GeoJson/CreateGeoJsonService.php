<?php

namespace App\Services\GeoJson;

use App\Models\Park;
use File;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class CreateGeoJsonService
{
    /**
     * @var string Geo Jsonのパス
     */
    const GEOPATH = '/app/public/geojson';

    public function handler(string $prefecture)
    {
        [ "ja" => $prefecture_ja, "en" => $prefecture_en ] = $this->prefecture_str_to_prefecture_obj($prefecture);

        // 公園データの取得
        $parks = $this->fetch_park($prefecture_ja);

        // 公園データをファイル用のデータに変換
        $contents = $this->parks_to_file_contents($parks);

        // ファイルへと書き込む
        $json = json_encode($contents, JSON_PRETTY_PRINT);
        $this->put_to_file("{$prefecture_en}.json", $this->geojson_path(), $json);
        $this->put_to_file("{$prefecture_en}.geojson", $this->geojson_path(), $json);
    }

    /**
     * 公園データを取得する
     *
     * @param string $prefecture_ja
     * @return Builder[]|Collection
     */
    protected function fetch_park(string $prefecture_ja)
    {
        return Park::whereAdm($prefecture_ja)->get();
    }

    /**
     * GeoJsonのパスを取得する
     *
     * @return string
     */
    protected function geojson_path(): string
    {
        return storage_path(self::GEOPATH);
    }

    /**
     * 公園データをファイル用の文字列に変換
     *
     * @param Park[] $parks
     * @return array
     */
    protected function parks_to_file_contents($parks): array
    {
        $geojson = [
            "type" => "FeatureCollection",
            "crs" => [
                "type" => "name",
                "properties" => [
                    "name" => "urn:ogc:def:crs:EPSG::4301"
                ]
            ],
            "features" => []
        ];

        foreach ($parks as $park) {
            $geojson["features"][] = [
                "type" => "Feature",
                "properties" => [
                    "id" => $park->id,
                    "pop" => $park->pop,
                    "cop" => $park->cop,
                    "name" => $park->nop,
                    "address" => $park->pop.$park->cop
                ],
                "geometry" => [
                    "type" => "Point",
                    "coordinates" => [
                        $park->longitude,
                        $park->latitude
                    ]
                ]
            ];
        }

        return $geojson;
    }

    /**
     * ローマ字の県名を内部の県データへ変換
     *
     * @param string $prefecture
     * @return array
     */
    protected function prefecture_str_to_prefecture_obj(string $prefecture): array
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
