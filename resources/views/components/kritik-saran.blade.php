<section class="bg-light py-5">
    <div class="container">

        <div class="mb-5 text-center">
            <h2 class="font-weight-bold text-success">
                Kritik & Saran
            </h2>

            <p class="text-muted">
                Kami sangat menghargai kritik dan saran Anda untuk meningkatkan pelayanan KUD Kampar.
            </p>
        </div>

        <div class="card border-0 shadow">
            <div class="card-body p-5">

                <div id="kritikSaranAlert"></div>

                <form action="{{ route('kritik-saran.store') }}" class="needs-validation" id="kritikSaranForm"
                    method="POST" novalidate>
                    @csrf

                    <div class="form-row">

                        <!-- Nama -->
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold" for="nama">
                                <i class="fa fa-user text-success mr-1"></i>
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>

                            <input class="form-control rounded-pill" id="nama" name="nama"
                                placeholder="Masukkan nama lengkap Anda" required type="text">

                            <small class="text-muted">
                                Nama wajib diisi.
                            </small>
                        </div>

                        <!-- Email -->
                        <div class="form-group col-md-6">
                            <label class="font-weight-bold" for="email">
                                <i class="fa fa-envelope text-success mr-1"></i>
                                Email <span class="text-danger">*</span>
                            </label>

                            <input class="form-control rounded-pill" id="email" name="email"
                                placeholder="contoh@email.com" required type="email">

                            <small class="text-muted">
                                Email digunakan untuk menghubungi Anda jika diperlukan.
                            </small>
                        </div>

                    </div>

                    <!-- Judul -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="judul">
                            <i class="fa fa-tag text-success mr-1"></i>
                            Judul
                        </label>

                        <input class="form-control rounded-pill" id="judul" name="judul"
                            placeholder="Contoh: Pelayanan Simpan Pinjam" type="text">
                    </div>

                    <!-- Kritik & Saran -->
                    <div class="form-group">
                        <label class="font-weight-bold" for="pesan">
                            <i class="fa fa-commenting text-success mr-1"></i>
                            Kritik / Saran <span class="text-danger">*</span>
                        </label>

                        <textarea class="form-control" id="pesan" name="pesan"
                            placeholder="Silakan tuliskan kritik, saran, atau masukan Anda untuk KUD Kampar..." required rows="6"></textarea>
                    </div>

                    <div class="text-right">
                        <small class="text-danger">
                            * Wajib diisi
                        </small>
                    </div>

                    <div class="text-center">
                        <button class="btn btn-success px-5" id="btnKirimKritikSaran" type="submit">
                            Kirim Kritik & Saran
                        </button>
                    </div>

                </form>

            </div>
        </div>

    </div>
</section>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const form = document.getElementById('kritikSaranForm');
        const alertBox = document.getElementById('kritikSaranAlert');
        const button = document.getElementById('btnKirimKritikSaran');

        if (!form) {
            return;
        }

        form.addEventListener('submit', async function(event) {
            event.preventDefault();

            alertBox.innerHTML = '';

            if (!form.checkValidity()) {
                form.classList.add('was-validated');
                return;
            }

            button.disabled = true;
            button.innerText = 'Mengirim...';

            const formData = new FormData(form);
            const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute(
                'content');

            try {
                const response = await fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': csrfToken,
                        'X-Requested-With': 'XMLHttpRequest',
                        'Accept': 'application/json'
                    }
                });

                const data = await response.json();

                if (response.ok) {
                    alertBox.innerHTML = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${data.message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `;

                    form.reset();
                    form.classList.remove('was-validated');
                } else {
                    let message = data.message || 'Gagal mengirim kritik dan saran.';

                    if (data.errors) {
                        message = Object.values(data.errors).flat().join('<br>');
                    }

                    if (data.error) {
                        console.error(data.error);
                    }

                    alertBox.innerHTML = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${message}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    `;
                }

            } catch (error) {
                console.error(error);

                alertBox.innerHTML = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Terjadi kesalahan. Silakan cek console atau storage/logs/laravel.log.
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                `;
            }

            button.disabled = false;
            button.innerText = 'Kirim Kritik & Saran';
        });
    });
</script>
