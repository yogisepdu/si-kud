<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Balasan Kritik & Saran</title>
</head>

<body style="margin: 0; padding: 0; background-color: #f4f6f8; font-family: Arial, Helvetica, sans-serif; color: #333;">

    <table cellpadding="0" cellspacing="0" style="background-color: #f4f6f8; padding: 30px 0;" width="100%">
        <tr>
            <td align="center">

                <table cellpadding="0" cellspacing="0"
                    style="background-color: #ffffff; border-radius: 10px; overflow: hidden; box-shadow: 0 4px 12px rgba(0,0,0,0.08);"
                    width="600">

                    <tr>
                        <td align="center" style="padding: 30px 30px 15px 30px;">
                            <img alt="Logo KUD Kampar" src="{{ config('app.url') . '/assets/img/logo.jpeg' }}"
                                style="width: 95px; height: auto; border-radius: 8px;">
                        </td>
                    </tr>

                    <tr>
                        <td align="center" style="padding: 0 30px 25px 30px;">
                            <h1 style="margin: 0; font-size: 24px; color: #198754;">
                                Balasan Kritik & Saran
                            </h1>
                            <p style="margin: 8px 0 0 0; font-size: 14px; color: #6c757d;">
                                KUD Kampar
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td style="padding: 0 35px 30px 35px; font-size: 15px; line-height: 1.7;">

                            <p style="margin-top: 0;">
                                Yth. {{ $kritikSaran->nama }},
                            </p>

                            <p>
                                Terima kasih telah mengirimkan kritik dan saran kepada KUD Kampar.
                                Kami sangat menghargai setiap masukan yang diberikan untuk meningkatkan pelayanan.
                            </p>

                            @if ($kritikSaran->judul)
                                <div style="margin-top: 22px;">
                                    <p style="margin: 0 0 8px 0; font-weight: bold; color: #333;">
                                        Judul Kritik/Saran
                                    </p>

                                    <div
                                        style="padding: 12px 15px; background-color: #f8f9fa; border-left: 4px solid #198754; border-radius: 6px;">
                                        {{ $kritikSaran->judul }}
                                    </div>
                                </div>
                            @endif

                            <div style="margin-top: 22px;">
                                <p style="margin: 0 0 8px 0; font-weight: bold; color: #333;">
                                    Pesan Anda
                                </p>

                                <div
                                    style="padding: 12px 15px; background-color: #f8f9fa; border-left: 4px solid #198754; border-radius: 6px;">
                                    {!! nl2br(e($kritikSaran->pesan)) !!}
                                </div>
                            </div>

                            <div style="margin-top: 25px;">
                                <p style="margin: 0 0 8px 0; font-weight: bold; color: #333;">
                                    Balasan dari Admin KUD Kampar
                                </p>

                                <div
                                    style="padding: 15px; background-color: #eaf7ef; border-left: 4px solid #198754; border-radius: 6px; font-size: 15px; line-height: 1.7;">
                                    {!! nl2br(e($balasan)) !!}
                                </div>
                            </div>

                            <p style="margin-top: 25px;">
                                Terima kasih atas perhatian dan masukan Anda.
                            </p>

                            <p style="margin-bottom: 0;">
                                Hormat kami,<br>
                                <strong>KUD Kampar</strong>
                            </p>

                        </td>
                    </tr>

                    <tr>
                        <td align="center"
                            style="padding: 18px 30px; background-color: #198754; color: #ffffff; font-size: 13px;">
                            Email ini dikirim oleh sistem KUD Kampar.
                        </td>
                    </tr>

                </table>

            </td>
        </tr>
    </table>

</body>

</html>
