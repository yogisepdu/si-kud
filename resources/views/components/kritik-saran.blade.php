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

                {{-- <form
                    class="needs-validation"
                    novalidate
                > --}}

                <div class="form-row">

                    <!-- Nama -->
                    <div class="form-group col-md-6">
                        <label
                            for="nama"
                            class="font-weight-bold"
                        >
                            <i class="fa fa-user text-success mr-1"></i>
                            Nama Lengkap <span class="text-danger">*</span>
                        </label>
                        <input
                            type="text"
                            class="form-control rounded-pill"
                            id="nama"
                            name="nama"
                            placeholder="Masukkan nama lengkap Anda"
                            required
                        >
                        <small class="text-muted">
                            Nama wajib diisi.
                        </small>
                    </div>

                    <!-- Email -->
                    <div class="form-group col-md-6">
                        <label
                            for="email"
                            class="font-weight-bold"
                        >
                            <i class="fa fa-envelope text-success mr-1"></i>
                            Email <span class="text-danger">*</span>
                        </label>
                        <input
                            type="email"
                            class="form-control rounded-pill"
                            id="email"
                            name="email"
                            placeholder="contoh@email.com"
                            required
                        >
                        <small class="text-muted">
                            Email digunakan untuk menghubungi Anda jika diperlukan.
                        </small>
                    </div>

                </div>

                <!-- Judul -->
                <div class="form-group">
                    <label
                        for="judul"
                        class="font-weight-bold"
                    >
                        <i class="fa fa-tag text-success mr-1"></i>
                        Judul
                    </label>
                    <input
                        type="text"
                        class="form-control rounded-pill"
                        id="judul"
                        name="judul"
                        placeholder="Contoh: Pelayanan Simpan Pinjam"
                    >
                </div>

                <!-- Kritik & Saran -->
                <div class="form-group">
                    <label
                        for="pesan"
                        class="font-weight-bold"
                    >
                        <i class="fa fa-commenting text-success mr-1"></i>
                        Kritik / Saran
                    </label>
                    <textarea
                        class="form-control"
                        id="pesan"
                        name="pesan"
                        rows="6"
                        placeholder="Silakan tuliskan kritik, saran, atau masukan Anda untuk KUD Kampar..."
                    ></textarea>
                </div>

                <div class="text-right">
                    <small class="text-danger">
                        * Wajib diisi
                    </small>
                </div>

                <div class="text-center">
                    <button class="btn btn-success px-5">
                        Kirim Kritik & Saran
                    </button>
                </div>

                {{-- </form> --}}

            </div>
        </div>

    </div>
</section>
