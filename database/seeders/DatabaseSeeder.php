<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UserEmployee;
use App\Models\UserAdmin;
use App\Models\BioEmployee;
use App\Models\UserCompany;
use App\Models\HariKerja;
use App\Models\JamKerja;
use App\Models\BioCompany;
use App\Models\Category;
use App\Models\Industry;
use App\Models\JurusanPendidikan;
use App\Models\JenjangPendidikan;
use App\Models\EmployeeCompany;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        HariKerja::create([
            'name' =>'Senin - Sabtu'
        ]);
        HariKerja::create([
            'name' =>"Senin - Jum'at "
        ]);
        HariKerja::create([
            'name' =>'Senin - Sabtu'
        ]);
        HariKerja::create([
            'name' =>'Senin - Minggu'
        ]);
        HariKerja::create([
            'name' =>'Lainnya'
        ]);
        // JamKerja::create([
        //     'name' =>'07:00 AM'
        // ]);
        // JamKerja::create([
        //     'name' =>'07:30 AM'
        // ]);
        // JamKerja::create([
        //     'name' =>'08:00 AM'
        // ]);
        // JamKerja::create([
        //     'name' =>'08:30 AM'
        // ]);
        // JenjangPendidikan::create([
        //     'name' => 'SMA / SMK Sederajat'
        // ]);
        // JenjangPendidikan::create([
        //     'name' => 'D3'
        // ]);
        // JenjangPendidikan::create([
        //     'name' => 'D4'
        // ]);
        // JenjangPendidikan::create([
        //     'name' => 'S1'
        // ]);
        // JenjangPendidikan::create([
        //     'name' => 'Doctor'
        // ]);
        // JenjangPendidikan::create([
        //     'name' => 'Lainnya'
        // ]);
        // UserAdmin::create([
        //     'name'=>'Riski Meji',
        //     'email'=>'riskimeji6@gmail.com',
        //     'password'=>'jelek123',
        //     'password_confirmation'=>'jelek123',
        //     'phone_number'=>'085363779773',
        //     'status'=>'N',
        //     'roles'=>'A'
        // ]);
        // UserCompany::create([
        //     'name'=>'Alvin',
        //     'email'=>'alvin@gmail.com',
        //     'password'=>'jelek123',
        //     'password_confirmation'=>'jelek123',
        //     'phone_number'=>'085363779774',
        //     'roles'=>'B'
        // ]);
        // Category::create([
        //     'name'=>'Guru'
        // ]);
        // JenjangPendidikan::create([
        //     'name'=>'SMA/SMK/Sederajat'
        // ]);
        // JenjangPendidikan::create([
        //     'name'=>'Diploma'
        // ]);
        // JenjangPendidikan::create([
        //     'name'=>'Sarjana/S1'
        // ]);
        // JenjangPendidikan::create([
        //     'name'=>'Master/S2'
        // ]);
        // JenjangPendidikan::create([
        //     'name'=>'Doctor/S3'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Administrasi Bisnis(Keuangan)'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Administrasi Bisnis(Manajemen)
        //     '
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Administrasi Pendidikan
        //     '
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ahli Gizi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Akuntansi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Analisis Kesehatan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Antropologi Sosial'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Arkeologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Arsitektur'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Astronomi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Cina'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Indonesia'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Inggris'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Jerman'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Francis'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Korea'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bahasa Lainnya'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bidan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bimbingan dan Konseling'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Biokimia'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Bioteknologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Budidaya Perairan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Desain Interior'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Desain Komunikasi Visual'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Desain Produk'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ekonomi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ekonomi Pembangungan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Elektronika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Farmasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Fisioterapi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Fotografi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Geosifika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Geografi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Geologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Hubungan Internasional'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Hukum'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Administrasi Fiskal'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Administrasi Negara'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Agama'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Biologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Filasafat'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Fisika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Kelautan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Kementrian'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Kimia'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Komputer'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Komunikasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Perpustakaan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Ilmu Sosial dan Politik'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Jurnalistik'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Kedokteran Gigi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Kedokteran Hewan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Kedokteran Umum'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Kehutanan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Kesehatan Masyarakat'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Lainnya'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Lingkungan Hidup'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Makanan dan Minuman'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Manajemen'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Manajemen Informatika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Manajemen Transportasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Matematika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Meteorologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Musik'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pariwisata dan Perhotelan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pemasaran'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pendidikan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pendidikan Guru'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pendidikan Sejarah'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pendidikan Tata Boga'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pendidikan Tata Rias'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Perawat'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Perawatan Gigi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Perencanaan Perkotaan dan Urbanisasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Perikanan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Pertanian'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Peternakan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Psikologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Radiografer'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Riset Operasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sastra'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sastra Arab'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sastra Belanda'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sastra Korea'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sastra Rusia'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sekretaris'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Seni dan Desain'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Seni Drama'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Sosiologi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Statistika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Studi Pembangunan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Biomedis'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Ekologi/Lingkungan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Elektro'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Geodesi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Industri'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Informatika'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Instrumentasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Kimia'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Komputer'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Lainnya'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Material dan Metalurgi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Mesin'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Penerbangan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Perkapalan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Perminyakan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Pertambangan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Pertanian'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Sipil'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Telekomunikasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Transportasi'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Teknik Pangan'
        // ]);
        // JurusanPendidikan::create([
        //     'name'=>'Zoologi'
        // ]);
        // Industry::create([
        //     'name'=>'Keuangan / Bank'
        // ]);
        // Industry::create([
        //     'name'=>'Komputer / IT'
        // ]);
        // Industry::create([
        //     'name'=>'Ritel'
        // ]);
        // Industry::create([
        //     'name'=>'Manufaktur'
        // ]);
        // Industry::create([
        //     'name'=>'Makanan dan Minuman'
        // ]);
        // Industry::create([
        //     'name'=>'Produk Konsumen'
        // ]);
        // Industry::create([
        //     'name'=>'Konstruksi'
        // ]);
        // Industry::create([
        //     'name'=>'Pendidikan'
        // ]);
        // Industry::create([
        //     'name'=>'Farmasi'
        // ]);
        // Industry::create([
        //     'name'=>'Properti'
        // ]);
        // Industry::create([
        //     'name'=>'Servis'
        // ]);
        // Industry::create([
        //     'name'=>'Telekomunikasi'
        // ]);
        // Industry::create([
        //     'name'=>'Asuransi'
        // ]);
        // Industry::create([
        //     'name'=>'Otomotif'
        // ]);
        // Industry::create([
        //     'name'=>'Perawatan dan Kesehatan'
        // ]);
        // Industry::create([
        //     'name'=>'Media'
        // ]);
        // Industry::create([
        //     'name'=>'E-Commerce'
        // ]);
    }
}
