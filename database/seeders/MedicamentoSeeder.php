<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Medicamento;

class MedicamentoSeeder extends Seeder
{
    public function run(): void
    {
        Medicamento::insert([
            ['nombre' => 'Paracetamol 500mg', 'codigo' => '0', 'descripcion' => 'Analgésico y antipirético', 'precio' => 25.00, 'stock' => 100],
            ['nombre' => 'Ibuprofeno 400mg', 'codigo' => '01', 'descripcion' => 'Antiinflamatorio y analgésico', 'precio' => 30.00, 'stock' => 80],
            ['nombre' => 'Amoxicilina 500mg', 'codigo' => '011', 'descripcion' => 'Antibiótico de amplio espectro', 'precio' => 45.00, 'stock' => 60],
            ['nombre' => 'Omeprazol 20mg', 'codigo' => '0111', 'descripcion' => 'Protector gástrico', 'precio' => 20.00, 'stock' => 90],
            ['nombre' => 'Loratadina 10mg', 'codigo' => '01111', 'descripcion' => 'Antihistamínico para alergias', 'precio' => 18.00, 'stock' => 75],
            ['nombre' => 'Metformina 850mg', 'codigo' => '011111', 'descripcion' => 'Control de glucosa en diabéticos', 'precio' => 35.00, 'stock' => 50],
            ['nombre' => 'Losartán 50mg', 'codigo' => '0111111', 'descripcion' => 'Antihipertensivo', 'precio' => 40.00, 'stock' => 65],
            ['nombre' => 'Cetirizina 10mg', 'codigo' => '01111111', 'descripcion' => 'Antialérgico', 'precio' => 22.00, 'stock' => 90],
            ['nombre' => 'Clonazepam 2mg', 'codigo' => '011111111', 'descripcion' => 'Ansiolítico', 'precio' => 60.00, 'stock' => 45],
            ['nombre' => 'Furosemida 40mg', 'codigo' => '0111111111', 'descripcion' => 'Diurético', 'precio' => 28.00, 'stock' => 55],
            ['nombre' => 'Atorvastatina 20mg', 'codigo' => '01111111111', 'descripcion' => 'Control de colesterol', 'precio' => 38.00, 'stock' => 70],
            ['nombre' => 'Vitamina C 500mg', 'codigo' => '011111111111', 'descripcion' => 'Suplemento antioxidante', 'precio' => 15.00, 'stock' => 100],
            ['nombre' => 'Ranitidina 150mg', 'codigo' => '0111111111111', 'descripcion' => 'Reducción de acidez estomacal', 'precio' => 24.00, 'stock' => 60],
            ['nombre' => 'Diclofenaco 75mg', 'codigo' => '01111111111111', 'descripcion' => 'Antiinflamatorio muscular', 'precio' => 27.00, 'stock' => 50],
            ['nombre' => 'Salbutamol Inhalador', 'codigo' => '011111111111111', 'descripcion' => 'Broncodilatador para asma', 'precio' => 55.00, 'stock' => 40],
            ['nombre' => 'Aspirina 100mg', 'codigo' => '0111111111111111', 'descripcion' => 'Anticoagulante y analgésico', 'precio' => 20.00, 'stock' => 100],
            ['nombre' => 'Enalapril 10mg', 'codigo' => '01111111111111111', 'descripcion' => 'Tratamiento de hipertensión', 'precio' => 32.00, 'stock' => 60],
            ['nombre' => 'Azitromicina 500mg', 'codigo' => '011111111111111111', 'descripcion' => 'Antibiótico potente', 'precio' => 70.00, 'stock' => 35],
            ['nombre' => 'Prednisona 20mg', 'codigo' => '0111111111111111111', 'descripcion' => 'Corticoide antiinflamatorio', 'precio' => 42.00, 'stock' => 40],
            ['nombre' => 'Fluconazol 150mg', 'codigo' => '01111111111111111111', 'descripcion' => 'Antifúngico', 'precio' => 29.00, 'stock' => 50],
            ['nombre' => 'Naproxeno 500mg', 'codigo' => '011111111111111111111', 'descripcion' => 'Analgésico y antiinflamatorio', 'precio' => 26.00, 'stock' => 70],
            ['nombre' => 'Insulina NPH 100 UI', 'codigo' => '0111111111111111111111', 'descripcion' => 'Hormona para diabéticos', 'precio' => 180.00, 'stock' => 20],
            ['nombre' => 'Benzocaína 20mg', 'codigo' => '01111111111111111111111', 'descripcion' => 'Anestésico local', 'precio' => 16.00, 'stock' => 60],
            ['nombre' => 'Loperamida 2mg', 'codigo' => '011111111111111111111111', 'descripcion' => 'Antidiarreico', 'precio' => 19.00, 'stock' => 65],
            ['nombre' => 'Ketorolaco 10mg', 'codigo' => '0111111111111111111111111', 'descripcion' => 'Analgésico fuerte', 'precio' => 34.00, 'stock' => 55],
            ['nombre' => 'Buscapina Compuesta', 'codigo' => '01111111111111111111111111', 'descripcion' => 'Antiespasmódico intestinal', 'precio' => 40.00, 'stock' => 70],
            ['nombre' => 'Clorfenamina 4mg', 'codigo' => '011111111111111111111111111', 'descripcion' => 'Antialérgico', 'precio' => 21.00, 'stock' => 50],
            ['nombre' => 'Amitriptilina 25mg', 'codigo' => '0111111111111111111111111111', 'descripcion' => 'Antidepresivo tricíclico', 'precio' => 38.00, 'stock' => 30],
            ['nombre' => 'Melatonina 3mg', 'codigo' => '01111111111111111111111111111', 'descripcion' => 'Regulador del sueño', 'precio' => 33.00, 'stock' => 40],
            ['nombre' => 'Vitamina B12 1000mcg', 'codigo' => '011111111111111111111111111111', 'descripcion' => 'Suplemento energético', 'precio' => 50.00, 'stock' => 30],
            ['nombre' => 'Vitamina D3 800 IU', 'codigo' => '0111111111111111111111111111111', 'descripcion' => 'Fortalece huesos y sistema inmune', 'precio' => 36.00, 'stock' => 45],
            ['nombre' => 'Complejo B', 'codigo' => '01111111111111111111111111111111', 'descripcion' => 'Vitaminas del grupo B', 'precio' => 44.00, 'stock' => 50],
            ['nombre' => 'Calcio + Vitamina D', 'codigo' => '011111111111111111111111111111111', 'descripcion' => 'Suplemento para huesos', 'precio' => 39.00, 'stock' => 40],
            ['nombre' => 'Hierro Ferroso 300mg', 'codigo' => '0111111111111111111111111111111111', 'descripcion' => 'Tratamiento de anemia', 'precio' => 29.00, 'stock' => 50],
            ['nombre' => 'Espironolactona 25mg', 'codigo' => '01111111111111111111111111111111111', 'descripcion' => 'Diurético ahorrador de potasio', 'precio' => 30.00, 'stock' => 30],
        ]);
    }
}
