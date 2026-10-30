NexxManage
NexxManage adalah prototipe aplikasi manajemen perusahaan IT berbasis Laravel, dikembangkan untuk Test Case Implementasi UI/UX – CV Akses Digital. Aplikasi menyediakan empat tampilan berbasis role: Owner, Manager, Finance, dan Staff.
Catatan: Data proyek, pesanan, tugas, pelanggan, dan keuangan yang ditampilkan dapat berupa data dummy untuk keperluan evaluasi. Beberapa aksi pada antarmuka mungkin masih berupa simulasi.

Akun Demo
Role	 Nama	         Email	              Password
Owner	 Fajri Nugroho	 admin@gmail.com	  admin123
Manager	 Siti Amanada	 manager@gmail.com	  manager123
Finance	 Rina Marliana	 finance@gmail.com	  finance123
Staff	 Andi Rahman	 staff@gmail.com	  staff123

atau bisa juga mengubah URL
dashboard?role=owner
dashboard?role=manager
dashboard?role=finance
dashboard?role=staff

Akun tersebut hanya ditujukan untuk evaluasi lokal, bukan deployment publik atau penggunaan produksi. Pastikan akun sudah dibuat melalui seeder pada database hasil instalasi baru.
Gambaran Modul
- Owner: dashboard dan pengelolaan projects, orders, tasks, customers, finance, expenses, users, roles & permissions, staff, serta activity log.
- Manager: dashboard dan modul terkait pengelolaan proyek, pesanan, dan tugas.
- Finance: dashboard serta informasi transaksi, pemasukan, pengeluaran, dan modul terkait.
- Staff: dashboard dan pekerjaan atau proyek yang ditugaskan.
Cakupan dan perilaku setiap halaman mengikuti implementasi yang tersedia dalam repository.
Catatan Evaluasi
Proyek ini dibuat sebagai implementasi desain UI/UX dengan fokus pada konsistensi visual, navigasi berdasarkan role, responsivitas, dan pengalaman pengguna. Data dummy digunakan sebagai contoh tampilan. Tidak semua tombol atau proses bisnis harus terhubung ke backend.