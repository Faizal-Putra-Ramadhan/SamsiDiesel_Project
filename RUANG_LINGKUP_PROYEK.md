# RUANG LINGKUP PROYEK AUTOSAMSI
## Sistem Manajemen Servis Otomotif Terintegrasi

---

## 1. DESKRIPSI UMUM

AutoSamsi adalah aplikasi web berbasis Laravel yang dirancang untuk mengelola operasional bengkel otomotif secara komprehensif. Sistem ini mengintegrasikan manajemen pelanggan, inventori sparepart, transaksi servis, pelaporan, dan komunikasi otomatis melalui WhatsApp Gateway untuk meningkatkan efisiensi dan kepuasan pelanggan.

---

## 2. RUANG LINGKUP PROYEK

Proyek ini mencakup pengembangan fungsi-fungsi berikut:

### 2.1 Modul Inventori Sparepart
- **Penambahan Stok**: Pencatatan masuk sparepart dengan supplier, tanggal, dan harga
- **Pengurangan Stok**: Otomatis berkurang saat sparepart digunakan dalam servis
- **Pemantauan Stok**: Dashboard monitoring stok real-time, notifikasi stok minimum, dan rekomendasi reorder
- **Laporan Inventori**: Laporan pergerakan stok harian/bulanan
- **History Sparepart**: Tracking lengkap penggunaan sparepart per transaksi servis

### 2.2 Modul Manajemen Pelanggan
- **Pendataan Pelanggan**: Pencatatan nama, nomor telepon, email, dan alamat lengkap
- **Data Kendaraan**: Tipe mesin, merek, model, nomor polisi (No. Pol), tahun produksi, dan tipe oli
- **Riwayat Servis**: Tracking lengkap semua transaksi servis per kendaraan
- **Contact Management**: Integrasi WhatsApp number untuk komunikasi langsung
- **Profil Pelanggan**: Self-service dashboard untuk pelanggan melihat riwayat dan status servis

### 2.3 Modul Transaksi & Status Servis
- **Pencatatan Servis**: Input jenis layanan, deskripsi pekerjaan, teknisi, dan biaya
- **Manajemen Sparepart**: Pencatatan detail sparepart yang digunakan beserta kuantitas dan harga satuan
- **Status Workflow**: 
  - **Pending** → **Sedang Dikerjakan** → **Selesai** → **Paid**
  - Tombol update status dengan notifikasi otomatis ke pelanggan
- **Invoice Dinamis**: Generate invoice dengan detail sparepart, jasa, dan total biaya
- **Sistem Pembayaran**: Pencatatan status pembayaran dan tanggal pembayaran

### 2.4 Modul WhatsApp Gateway
- **Notifikasi Otomatis**: Pengiriman pesan saat status servis berubah (Sedang Dikerjakan, Selesai)
- **Pengingat Servis**: Notifikasi reminder untuk pelanggan tentang jadwal servis berikutnya
- **Link Tracking**: Integrasi link tracking status untuk pelanggan memantau progress
- **Broadcast**: Fitur pengiriman broadcast untuk promosi dan informasi penting
- **Response Handling**: Log semua notifikasi yang dikirim

### 2.5 Modul Laporan
- **Laporan Transaksi Harian**: Ringkasan servis yang dikerjakan, pendapatan, dan sparepart terpakai per hari
- **Laporan Transaksi Bulanan**: Analisis pendapatan, trend servis, dan performa bisnis per bulan
- **Export Data**: Fitur export ke Excel untuk analisis lebih lanjut
- **Dashboard Analytics**: Visualisasi KPI bisnis (total revenue, jumlah servis, pelanggan baru, dll)
- **Report Customization**: Pilihan date range dan filter berdasarkan teknisi/type servis

### 2.6 Modul Manajemen Complaint
- **Input Complaint**: Pelanggan dapat melaporkan keluhan terhadap servis
- **Tracking Status**: Admin dapat update status complaint (Open → In Progress → Resolved)
- **Resolution Notes**: Dokumentasi penyelesaian masalah
- **Dashboard Complaint**: Monitoring semua complaint yang aktif

### 2.7 Modul Autentikasi & Role Management
- **Login Multi-Role**: 
  - Admin/Pemilik: Akses penuh ke semua modul
  - Customer: Akses terbatas (profil, riwayat, complaint)
- **Session Management**: Secure session handling dengan password hashing
- **Role-Based Access Control**: Pembatasan akses fitur berdasarkan peran pengguna

---

## 3. FITUR UTAMA SISTEM

| Fitur | Pengguna | Deskripsi |
|-------|----------|-----------|
| Dashboard | Admin, Customer | Ringkasan data dan aktivitas terkini |
| Manajemen Pelanggan | Admin | Tambah, edit, lihat detail pelanggan |
| Manajemen Kendaraan | Admin, Customer | Pencatatan dan tracking kendaraan pelanggan |
| Input Servis | Admin | Pencatatan transaksi servis baru |
| Update Status | Admin | Tombol untuk ubah status: Pending → Dikerjakan → Selesai → Paid |
| Manajemen Sparepart | Admin | Tambah stok, tracking penggunaan, monitor stok minimum |
| Generate Invoice | Admin | Otomatis generate invoice berdasarkan data servis |
| WhatsApp Notifikasi | System | Pengiriman pesan otomatis ke pelanggan |
| Export Laporan | Admin | Export transaksi ke format Excel |
| Customer Portal | Customer | Lihat riwayat servis, tracking status, submit complaint |
| Complaint Management | Admin | Kelola complaint pelanggan |

---

## 4. TEKNOLOGI & STACK

- **Backend**: Laravel 11
- **Frontend**: Blade Template + Tailwind CSS
- **Database**: MySQL/PostgreSQL
- **WhatsApp Integration**: WhatsApp Business API / Twilio
- **Reporting**: Excel Export (Laravel Excel)
- **Authentication**: Laravel Authentication
- **Responsive Design**: Mobile-first approach

---

## 5. YANG TERMASUK DALAM PROYEK (IN-SCOPE)

✅ Pengembangan modul inventori dengan tracking stok real-time
✅ Database dan model untuk pelanggan, kendaraan, servis, dan sparepart
✅ Fitur CRUD (Create, Read, Update, Delete) untuk semua modul utama
✅ Sistem status workflow servis
✅ Integrasi WhatsApp Gateway untuk notifikasi otomatis
✅ Generate invoice dinamis
✅ Laporan transaksi harian dan bulanan
✅ Export data ke Excel
✅ Dashboard monitoring untuk admin dan customer
✅ Role-based access control (Admin & Customer)
✅ Responsive design untuk mobile dan desktop
✅ Testing dan debugging

---

## 6. YANG TIDAK TERMASUK DALAM PROYEK (OUT-OF-SCOPE)

❌ Sistem penggajian karyawan
❌ Akuntansi pajak yang kompleks
❌ Integrasi dengan sistem perbankan (payment gateway online)
❌ Sistem procurement/pembelian otomatis ke supplier
❌ Aplikasi mobile native (hanya responsive web)
❌ Hosting dan maintenance pasca-go-live (support berbayar terpisah)
❌ Custom branding/logo design (klien menyediakan)
❌ Training ekstensif (basic training saja)

---

## 7. DELIVERABLES

1. **Dokumentasi Database**: Schema lengkap dengan ERD
2. **Source Code**: Full source code dengan dokumentasi inline
3. **User Manual**: Panduan penggunaan untuk Admin dan Customer
4. **Database Seed**: Data dummy untuk testing
5. **Deployment Guide**: Panduan instalasi dan konfigurasi
6. **Video Tutorial**: Tutorial singkat fitur-fitur utama
7. **API Documentation** (jika ada): Dokumentasi endpoint (jika diperlukan ekspansi ke mobile app)

---

## 8. TIMELINE & MILESTONE

| Fase | Durasi | Output |
|------|--------|--------|
| Planning & Desain Database | 1-2 minggu | Schema, ERD, Wireframe |
| Development (Backend & Frontend) | 3-4 minggu | Code, Testing, Bug Fix |
| Integrasi WhatsApp | 1 minggu | API Connection, Testing |
| Testing & QA | 1 minggu | Test Report, Bug Tracking |
| Deployment & Go-Live | 1 minggu | Setup Production, Training |
| **Total** | **7-9 minggu** | **Production Ready** |

---

## 9. ASUMSI & KETENTUAN

- Klien menyediakan: Server/hosting, database credentials, WhatsApp Business Account
- Development environment: Local development terlebih dahulu, kemudian staging, production
- Komunikasi: Minimal weekly meeting untuk progress update dan clarification
- Change Request: Request perubahan scope di luar yang tertera akan dibicarakan terlebih dahulu (potential additional cost)
- Support: Post-launch support 1 bulan gratis (bug fix), extended support berbayar

---

## 10. SUCCESS CRITERIA

✓ Semua fitur berjalan sesuai spesifikasi
✓ Zero critical bugs pada production
✓ Response time < 2 detik untuk semua transaksi
✓ Uptime 99.5% pasca go-live
✓ Pelanggan dapat login dan tracking status servis dengan mudah
✓ WhatsApp notifikasi terkirim dengan akurat
✓ Laporan dapat di-export tanpa error
✓ Admin dapat mengelola stok dengan efisien

---

**Dokumen ini merupakan ringkasan ruang lingkup proyek AutoSamsi. Untuk detail teknis lebih lanjut, silakan mereferensikan pada Technical Specification Document (TSD).**

*Disiapkan: [Tanggal]*
*Disepakati oleh: [Pemilik Proyek]*
