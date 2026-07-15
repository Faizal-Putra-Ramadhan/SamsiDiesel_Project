<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Http;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $dir = public_path('assets/img');
        if (!is_dir($dir)) {
            mkdir($dir, 0755, true);
        }

        $this->cleanOldSeedProducts();

        $batchId = now()->format('YmdHis');

        $productSeeds = [
            [
                'name' => 'Shell Helix HX7 10W-40 4L',
                'shopee' => 'https://shopee.co.id/shell-helix-hx7',
                'image_url' => 'https://cdn11.bigcommerce.com/s-x3ki4mm/images/stencil/1500x1500/products/78/265/Shell_Helix_HX7_4L__84030.1638191103.jpg?c=2',
            ],
            [
                'name' => 'Toyota Genuine Oil Filter 04152',
                'shopee' => 'https://shopee.co.id/toyota-oil-filter',
                'image_url' => 'https://cdn11.bigcommerce.com/s-9cc30/images/stencil/1280x1280/products/55480/80759/55b0e338446945d66a99c707582828e3__56770.1712262350.jpg?c=2',
            ],
            [
                'name' => 'Bosch DPF Filter Original',
                'shopee' => 'https://shopee.co.id/bosch-dpf-filter',
                'image_url' => 'https://media.autodoc.de/360_photos/17007917/h-preview.jpg',
            ],
            [
                'name' => 'NGK Spark Plug BKR6E',
                'shopee' => 'https://shopee.co.id/ngk-bkr6e',
                'image_url' => 'https://www.nsbconcept.com/36161-thickbox_default/ngk-bkr6e-spark-plug.jpg',
            ],
            [
                'name' => 'GS Astra MF Battery NS40',
                'shopee' => 'https://shopee.co.id/gs-astra-ns40',
                'image_url' => 'https://images.tokopedia.net/img/cache/500-square/VqbcmM/2024/7/8/62731a74-1b19-409a-81a0-553c26883c23.jpg?ect=4g',
            ],
            [
                'name' => 'Total Quartz 9000 5W-40 4L',
                'shopee' => 'https://shopee.co.id/total-quartz-9000',
                'image_url' => 'https://dxm.content-center.totalenergies.com/api/wedia/dam/transform/xysh7dg731ta7ge7fkqimxefjy/5w-40-png.webp',
            ],
            [
                'name' => 'Federal SuperSteel Brake Pad',
                'shopee' => 'https://shopee.co.id/federal-brake-pad',
                'image_url' => 'https://www.webike.id/photo/20200324/5050325/8800015050325_01.jpg',
            ],
            [
                'name' => 'Denso Iridium Spark Plug IK20',
                'shopee' => 'https://shopee.co.id/denso-ik20',
                'image_url' => 'https://static.summitracing.com/global/images/prod/mediumlarge/dnp-ik20l_ml.jpg',
            ],
            [
                'name' => 'Toyota Genuine Air Filter',
                'shopee' => 'https://shopee.co.id/toyota-air-filter',
                'image_url' => 'https://static.amayama.com/schema/toyota-1780164080-1564003234760-big.jpg',
            ],
            [
                'name' => 'Motul 300V 15W-50 2L',
                'shopee' => 'https://shopee.co.id/motul-300v',
                'image_url' => 'https://m.media-amazon.com/images/I/6138D1afmgL._AC_SX679_.jpg',
            ],
        ];

        foreach ($productSeeds as $p) {
            $slug = strtolower(preg_replace('/[^a-z0-9]+/i', '_', $p['name']));
            $ext = pathinfo(parse_url($p['image_url'], PHP_URL_PATH), PATHINFO_EXTENSION);
            $ext = in_array($ext, ['jpg', 'jpeg', 'png', 'webp']) ? $ext : 'jpg';
            $filename = $slug . "_{$batchId}.{$ext}";
            $path = public_path('assets/img/' . $filename);

            $this->command->info("Downloading: {$p['name']}...");

            $downloaded = $this->downloadImage($p['image_url'], $path);

            if (!$downloaded) {
                $this->command->warn("  Download failed, generating placeholder for {$p['name']}");
                $filename = $this->generatePlaceholder($p['name'], $slug, $ext);
            }

            Product::create([
                'name' => $p['name'],
                'image_path' => $filename,
                'shopee_url' => $p['shopee'],
            ]);
        }

        $this->command->info('10 produk berhasil di-seed dengan gambar real!');
    }

    private function downloadImage(string $url, string $path): bool
    {
        $ctx = stream_context_create([
            'http' => [
                'timeout' => 15,
                'user_agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36',
                'follow_location' => true,
                'max_redirects' => 3,
            ],
            'ssl' => [
                'verify_peer' => false,
                'verify_peer_name' => false,
            ],
        ]);

        try {
            $data = @file_get_contents($url, false, $ctx);
            if ($data === false || strlen($data) < 100) {
                return false;
            }
            file_put_contents($path, $data);
            return file_exists($path) && filesize($path) > 100;
        } catch (\Exception $e) {
            return false;
        }
    }

    private function generatePlaceholder(string $name, string $slug, string $ext): string
    {
        $filename = $slug . '_placeholder.' . $ext;
        $path = public_path('assets/img/' . $filename);

        $img = imagecreatetruecolor(400, 400);
        $darkBg = imagecolorallocate($img, 15, 23, 42);
        imagefill($img, 0, 0, $darkBg);

        $accentColors = [
            [239, 68, 68], [59, 130, 246], [245, 158, 11],
            [16, 185, 129], [139, 92, 246], [236, 72, 153],
        ];
        $idx = abs(crc32($name)) % count($accentColors);
        [$r, $g, $b] = $accentColors[$idx];
        $accent = imagecolorallocate($img, $r, $g, $b);

        imagesetthickness($img, 3);
        imagerectangle($img, 20, 20, 380, 380, $accent);
        imagefilledrectangle($img, 0, 0, 400, 6, $accent);

        $words = explode(' ', $name);
        $abbr = count($words) >= 2
            ? strtoupper(substr($words[0], 0, 1) . substr($words[1], 0, 1))
            : strtoupper(substr($name, 0, 2));

        $white = imagecolorallocate($img, 255, 255, 255);
        $charW = imagefontwidth(5);
        $totalW = strlen($abbr) * $charW;
        $x = (int)((400 - $totalW) / 2);
        imagestring($img, 5, $x, 170, $abbr, $white);

        $gray = imagecolorallocate($img, 148, 163, 184);
        $dispName = strlen($name) > 28 ? substr($name, 0, 25) . '...' : $name;
        $nameW = strlen($dispName) * imagefontwidth(3);
        $nx = (int)((400 - $nameW) / 2);
        imagestring($img, 3, $nx, 320, $dispName, $gray);

        imagepng($img, $path);
        imagedestroy($img);

        return $filename;
    }

    private function cleanOldSeedProducts(): void
    {
        $oldSeeds = Product::where('image_path', 'like', '%_seed.png')->orWhere('image_path', 'like', '%_placeholder.%')->get();
        $count = $oldSeeds->count();

        foreach ($oldSeeds as $p) {
            $oldPath = public_path('assets/img/' . $p->image_path);
            if (file_exists($oldPath)) {
                @unlink($oldPath);
            }
            $p->delete();
        }

        if ($count > 0) {
            $this->command->info("Membersihkan {$count} produk seed lama...");
        }
    }
}
