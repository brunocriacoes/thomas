<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MesaSeeder extends Seeder
{
    public function run(): void
    {
        $mesas = [
            ["numero_mesa" => "001", "quantidade_cadeiras" => 10, "area_id" => 1, "preco" => 140.00, "evento_id" => 1],
            ["numero_mesa" => "002", "quantidade_cadeiras" => 10, "area_id" => 1, "preco" => 140.00, "evento_id" => 1],
            ["numero_mesa" => "003", "quantidade_cadeiras" => 10, "area_id" => 1, "preco" => 140.00, "evento_id" => 1],
            ["numero_mesa" => "004", "quantidade_cadeiras" => 10, "area_id" => 1, "preco" => 140.00, "evento_id" => 1],
            ["numero_mesa" => "005", "quantidade_cadeiras" => 10, "area_id" => 1, "preco" => 140.00, "evento_id" => 1],
            ["numero_mesa" => "006", "quantidade_cadeiras" => 10, "area_id" => 1, "preco" => 140.00, "evento_id" => 1],
            ["numero_mesa" => "007", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "008", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "009", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "010", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "011", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "012", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "013", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "014", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "015", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "016", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "017", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "018", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "019", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "020", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "021", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "022", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "023", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "024", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "025", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "026", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "027", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "028", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "029", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "030", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "031", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "032", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "033", "quantidade_cadeiras" => 4, "area_id" => 1, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "034", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "035", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "036", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "037", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "038", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "039", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "040", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "041", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "042", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "043", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "044", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "045", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "046", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "047", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "048", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "049", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "050", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "051", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "052", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "053", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "054", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "055", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "056", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 100.00, "evento_id" => 1],
            ["numero_mesa" => "057", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "058", "quantidade_cadeiras" => 6, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "059", "quantidade_cadeiras" => 4, "area_id" => 2, "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "060", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "061", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "062", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "063", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "064", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "065", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "066", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "067", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "068", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "069", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "070", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "071", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "072", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "073", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "074", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "075", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "076", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "077", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "078", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "079", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
            ["numero_mesa" => "080", "quantidade_cadeiras" => 4, "area_id" => 3,  "preco" => 60.00, "evento_id" => 1],
        ];

        foreach ($mesas as $mesa) {
            DB::table('mesas')->insert($mesa);
        }
    }
}
