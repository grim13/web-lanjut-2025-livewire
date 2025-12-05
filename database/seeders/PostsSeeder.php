<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Panduan Lengkap Laravel 11',
                'slug' => 'panduan-lengkap-laravel-11',
                'content' => 'Laravel 11 membawa banyak fitur baru yang memudahkan pengembangan aplikasi web modern. Dalam artikel ini, kita akan membahas fitur-fitur utama dan cara menggunakannya secara efektif.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Tips Produktivitas Kerja di Era Digital',
                'slug' => 'tips-produktivitas-kerja-di-era-digital',
                'content' => 'Bekerja di era digital memerlukan strategi khusus untuk tetap produktif. Berikut adalah tips-tips yang dapat membantu Anda meningkatkan produktivitas kerja.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Strategi Marketing Online untuk UMKM',
                'slug' => 'strategi-marketing-online-untuk-umkm',
                'content' => 'UMKM perlu strategi marketing online yang tepat untuk bersaing di era digital. Artikel ini membahas berbagai strategi efektif yang bisa diterapkan.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Mengenal Artificial Intelligence dan Machine Learning',
                'slug' => 'mengenal-artificial-intelligence-dan-machine-learning',
                'content' => 'AI dan Machine Learning menjadi topik yang semakin populer. Mari kita pelajari dasar-dasar teknologi ini dan bagaimana penerapannya dalam kehidupan sehari-hari.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Gaya Hidup Sehat di Tengah Kesibukan',
                'slug' => 'gaya-hidup-sehat-di-tengah-kesibukan',
                'content' => 'Menjaga kesehatan di tengah kesibukan kerja adalah tantangan tersendiri. Berikut tips untuk menjalani gaya hidup sehat meskipun jadwal padat.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Membangun Startup dari Nol',
                'slug' => 'membangun-startup-dari-nol',
                'content' => 'Memulai startup memerlukan perencanaan matang dan strategi yang tepat. Pelajari langkah-langkah membangun startup dari nol hingga sukses.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Framework JavaScript Terpopuler 2025',
                'slug' => 'framework-javascript-terpopuler-2025',
                'content' => 'Dunia JavaScript terus berkembang dengan berbagai framework baru. Mari kita bahas framework JavaScript yang paling populer di tahun 2025.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Work Life Balance: Kunci Kebahagiaan Karir',
                'slug' => 'work-life-balance-kunci-kebahagiaan-karir',
                'content' => 'Menyeimbangkan kehidupan kerja dan pribadi sangat penting untuk kebahagiaan jangka panjang. Temukan cara mencapai work-life balance yang ideal.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Investasi untuk Pemula: Mulai dari Mana?',
                'slug' => 'investasi-untuk-pemula-mulai-dari-mana',
                'content' => 'Memulai investasi bisa terasa membingungkan bagi pemula. Artikel ini memberikan panduan lengkap untuk memulai perjalanan investasi Anda.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Cloud Computing: Masa Depan Infrastruktur IT',
                'slug' => 'cloud-computing-masa-depan-infrastruktur-it',
                'content' => 'Cloud computing mengubah cara perusahaan mengelola infrastruktur IT. Pelajari keuntungan dan cara mengimplementasikan cloud computing.',
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        // Insert posts
        foreach ($posts as $post) {
            $postId = DB::table('posts')->insertGetId($post);
            
            // Insert feature image for each post
            DB::table('feature_images')->insert([
                'post_id' => $postId,
                'feature_image' => 'images/post-' . $postId . '.jpg',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            // Insert post categories (random 1-2 categories per post)
            $categoryIds = [1, 2, 3];
            $randomCategories = array_rand(array_flip($categoryIds), rand(1, 2));
            
            if (!is_array($randomCategories)) {
                $randomCategories = [$randomCategories];
            }
            
            foreach ($randomCategories as $categoryId) {
                DB::table('post_categories')->insert([
                    'post_id' => $postId,
                    'category_id' => $categoryId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
