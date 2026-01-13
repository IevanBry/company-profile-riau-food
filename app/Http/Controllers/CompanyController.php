<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    /**
     * Display company page (Public)
     */
    public function index()
    {
        $company = Company::first();

        // Jika belum ada data, buat object dengan default values
        if (!$company) {
            $company = (object) [
                'image' => null,
                'description_1' => 'PT. Riau Food Lestari adalah perusahaan yang bergerak di bidang importir dan distributor produk kebutuhan sehari-hari berkualitas tinggi. Kami berlokasi di Pekanbaru, Riau dan telah melayani berbagai wilayah di Indonesia.',
                'description_2' => 'Dengan pengalaman lebih dari 10 tahun, kami memiliki komitmen kuat dalam menyediakan produk original dan berkualitas dari berbagai supplier terpercaya internasional. Jaringan distribusi kami mencakup seluruh Indonesia dengan sistem logistik yang handal dan profesional.',
                'description_3' => 'Kami percaya bahwa kepercayaan pelanggan adalah aset terbesar kami. Oleh karena itu, setiap produk yang kami distribusikan dijamin 100% original dan telah melalui proses quality control yang ketat.',
                'years_established' => '10+',
                'total_products' => '50+',
                'original_guarantee' => '100%',
                'vision' => 'Menjadi importir dan distributor terpercaya yang menyediakan produk berkualitas tinggi dengan harga kompetitif untuk seluruh Indonesia, serta membangun kemitraan bisnis yang saling menguntungkan.',
                'mission_1' => 'Menyediakan produk import original dengan jaminan kualitas 100%',
                'mission_2' => 'Memberikan harga kompetitif dan layanan terbaik kepada pelanggan',
                'mission_3' => 'Membangun jaringan distribusi yang efisien ke seluruh Indonesia',
                'mission_4' => 'Menciptakan peluang kemitraan bisnis yang menguntungkan',
                'address' => 'Jl. Soekarno Hatta, Gang Nusa Indah, Pekanbaru, Riau 28111, Indonesia',
                'phone' => '+62 823-9001-7777',
                'email' => 'info@riaufoodlestari.com',
                'map_url' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.6550706411076!2d101.41760897496472!3d0.5183089994766221!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31d5ab005ec19403%3A0x25e4fee04beb5314!2sPT%20Riau%20Food%20Lestari%20(%20Kantor%20Admin%20RFL%20)!5e0!3m2!1sen!2sid!4v1764994157028!5m2!1sen!2sid',
                'operating_hours' => '08:30 - 17:00 WIB',
                'holiday_status' => 'Tutup',
            ];
        }

        return view('company.index', compact('company'));
    }
}