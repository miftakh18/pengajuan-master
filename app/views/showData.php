<?php
function parseURL()
{
    // membuat url lebih rapih 

    if (isset($_GET['url'])) {
        $url = rtrim($_GET['url'], '/');
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        return $url;
    }
}
$var   = urlencode(base64_encode(bin2hex(serialize(['user_session' => 'M.Miftakhudin', 'uuid' => 'b5b6c7cf-dbe4-11f0-88b7-080027307d45']))));
$params   = unserialize(hex2bin(base64_decode(urldecode(parseURL()[2]))));
$param   = parseURL()[2];
?>
<!doctype html>
<html lang="id">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <title>View Data Barang</title>


    <link rel="icon" href="<?= BASEURL ?>/assets/img/logo-rsmmc-nobg.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">


    <style>
        @layer base {
            .font-nunito {
                font-family: 'Nunito', sans-serif;
            }
        }

        * {
            font-family: 'Nunito', sans-serif;

        }
    </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    boxShadow: {
                        card: "0 20px 50px rgba(0,0,0,.18)",
                    },
                    borderRadius: {
                        xl2: "18px",
                    }
                }
            }
        }
    </script>
</head>

<body class="min-h-screen bg-sky-500 flex items-start justify-center p-4 sm:p-6">

    <div class="w-full max-w-6xl bg-white rounded-xl2 shadow-card overflow-hidden">

        <div class="bg-sky-50 px-5 sm:px-8 py-5 sm:py-6 text-center border-b">
            <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                <div class="h-11 w-11 rounded-xl bg-sky-100 flex items-center justify-center text-sky-700 font-extrabold">
                    <img src="<?= BASEURL ?>/assets/img/logo-rsmmc-nobg.png" alt="">
                </div>
                <div class="text-center sm:text-left">
                    <div class="text-sm text-sky-700 font-semibold">Rumah Sakit</div>
                    <div class="text-xs text-slate-500">Metropolitan Medical Centre</div>
                </div>
            </div>

            <div class="mt-5 flex flex-col items-center">


                <h1 class="mt-3 text-lg sm:text-xl font-extrabold tracking-wide text-slate-800">
                    VIEW DATA BARANG
                </h1>

            </div>
        </div>


        <div class="px-5 sm:px-8 py-6">

            <section class="mb-7">


                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div>
                        <div class="text-[11px] text-slate-500">KATEGORI BARANG</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="kategori-barang">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">NAMA BARANG</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="nama-barang">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">GOLONGAN BARANG</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="golda">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">SUB GOLONGAN BARANG</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="subgolda">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">IS GENERIK</div>
                        <div class="mt-1">

                            <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="is-generik">-</div>
                        </div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">HIGHT ALERT</div>
                        <div class="mt-1 grid grid-cols-3" id="hi-al">

                        </div>
                    </div>
                </div>
            </section>

            <section class="mb-7">
                <h2 class="text-sm font-semibold text-sky-700 mb-3">Satuan</h2>


                <div class="overflow-x-auto rounded-xl border">
                    <table class="min-w-full text-sm">
                        <thead class="bg-sky-50 text-slate-600">
                            <tr>
                                <th class="text-left px-4 py-3 font-semibold whitespace-nowrap">No</th>
                                <th class="text-left px-4 py-3 font-semibold whitespace-nowrap">Nama Barang</th>
                                <th class="text-left px-4 py-3 font-semibold whitespace-nowrap">Jenis Satuan</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y" id="body-satuans">

                        </tbody>
                    </table>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4 mt-4">
                    <div>
                        <div class="text-[11px] text-slate-500">SATUAN DOSIS</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="satdos">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">PEMBULATAN STOK RACIKAN</div>
                        <div class="mt-1 " id="psr">-</div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-3">
                        <div class="text-[11px] text-slate-500">ETIKET</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800" id="etiket">-</div>
                    </div>
                </div>
            </section>


            <section class="mb-7">

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div>
                        <div class="text-[11px] text-slate-500">KODE FORM KFA</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="kfa">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">BZA</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="bza">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">KODE INFOCOM</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="kode_infocom">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">POV</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="pov">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">POA</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="poa">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">POAK</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="poak">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">ROUTE</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="route">-</div>
                    </div>
                </div>
            </section>


            <section class="mb-7">

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div>
                        <div class="text-[11px] text-slate-500">NAMA BARANG BARU</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="nbb">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">KEKUATAN SEDIAAN</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="ks">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">VOLUME SEDIAAN</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="vs">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">BENTUK SEDIAAN</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="bs">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">COMMODITY</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="comodity">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">MATERIAL GROUP</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="mg">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">STOK MINIMAL</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="stok_min">-</div>
                    </div>
                </div>
            </section>


            <section class="mb-7">
                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div class="md:col-span-2 xl:col-span-3">
                        <div class="text-[11px] text-slate-500">INDIKASI</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="indikasi">-</div>
                    </div>

                    <div>
                        <div class="text-[11px] text-slate-500">ZAT AKTIF</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="zat_aktif">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">BENTUK DAN KEKUATAN SEDIAAN</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="bks">-</div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-3">
                        <div class="text-[11px] text-slate-500">KOMPOSISI DETAIL</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="kd">-</div>
                    </div>
                </div>
            </section>


            <section>

                <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-3">
                    <div>
                        <div class="text-[11px] text-slate-500">PRINCIPAL KERJASAMA</div>
                        <div class="mt-1" id="principal_kerjasama">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">PRINCIPAL</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="principal">-</div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">EXPIRE</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="expire">-</div>
                    </div>



                    <div>
                        <div class="text-[11px] text-slate-500">JENIS</div>
                        <div class="mt-1 rounded-lg bg-white-50 border px-3 py-2 text-sm">
                            <ul>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_formula_rs">FORMULARIUM</li>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_formula_bpjs">FORMULARIUM BPJS</li>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_askes">FORMULARIUM INHEALTH</li>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_narkotika">NARKOTIKA</li>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_psikotropika">PSIKOTROPIKA</li>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_obat_tertentu">OBAT-OBAT TERTENTU</li>
                                <li class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold  m-1" id="is_kemo">KEMO</li>
                            </ul>
                        </div>
                    </div>
                    <div>
                        <div class="text-[11px] text-slate-500">FARCON</div>
                        <div class="mt-1" id="farcon">-</div>
                    </div>

                    <div class="md:col-span-2 xl:col-span-3">
                        <div class="text-[11px] text-slate-500">BENTUK OBAT / ALKES</div>
                        <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm" id="b_obal">-</div>
                    </div>
                </div>
            </section>
            <div class="mt-7 flex flex-col sm:flex-row gap-3 justify-end ">
                <a class="w-full sm:w-auto rounded-xl border px-5 py-2.5 text-sm font-semibold text-slate-600 hover:bg-slate-50" href="<?= BASEURL; ?>/approve/pengajuan/<?= $param ?>">
                    Kembali
                </a>
            </div>
        </div>
    </div>
    <script src="<?= BASEURL ?>/assets/plugin/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script>
        function Jenistrue(val) {

            return (val === 't') ? `bg-green-50 text-green-700 border border-green-200` : `bg-light-50 text-light-700 border border-light-200`;

        }
        $(function() {
            $.ajax({
                url: `<?= BASEURL ?>/approve/getApi/<?= $param ?>/getDataMaster`,
                type: 'GET',
                dataType: 'json',
                success: function(res) {
                    $("#kategori-barang").html(`${res.header.kategori.kode_group}|${res.header.kategori.kel_brg_eng}`);
                    $("#nama-barang").html(res.header.nama_barang);
                    $("#golda").html(`${res.header.golongan.kode_golongan_group}|${res.header.golongan.golongan_group}`);
                    $("#subgolda").html(`${res.header.subgolongan.golongan_text}`);
                    $("#is-generik").html(`${res.header.is_generik.generik_name}`);
                    $("#hi-al").html(`
                    ${res.header.hight_alert === "t"?
                            `<span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 text-center mr-2">
                                YA
                            </span>
                            <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800 col-span-2">${res.header.hight_alert_true}</div>
                            `: 
                            ` <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                TIDAK
                            </span>` }`);

                    let html = ``;
                    $.each(res.detail, function(i, val) {
                        html += `<tr class="bg-white">
                                    <td class="px-4 py-3 text-slate-800 whitespace-nowrap">${i+1}</td>
                                    <td class="px-4 py-3 text-slate-800 whitespace-nowrap">${val.nama_satuan}</td>
                                    <td class="px-4 py-3 text-slate-800 whitespace-nowrap">${val.jenis_satuan ==='sb'?'SATUAN BESAR':'SATUAN KECIL'}</td>
                                </tr>`;
                    })
                    $("#body-satuans").html(html);
                    $("#satdos").html(res.header.satuan_dosis);
                    $("#hi-al").html(`
                    ${res.header.hight_alert === "t"?
                            `<span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 text-center mr-2">
                                YA
                            </span>
                            <div class="mt-1 rounded-lg bg-slate-50 border px-3 py-2 text-sm text-slate-800 col-span-2">${res.header.hight_alert_true}</div>
                            `: 
                            ` <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                TIDAK
                            </span>` }`);
                    $("#psr").html(`
                    ${res.header.pembulatan_stok_racikan === "t"?
                            `<span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 text-center mr-2">
                                YA
                            </span>
                          
                            `: 
                            ` <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                TIDAK
                            </span>` }`);
                    $("#etiket").html(`${res.header.etiket === 'pu'?'PUTIH':'BIRU'}`);
                    $("#kfa").html(`${res.header.kfa.display_form}`);
                    $("#bza").html(`${res.header.bza}`);
                    $("#kode_infocom").html(`${res.header.kode_infocom}`);
                    $("#pov").html(`${res.header.pov}`);
                    $("#poa").html(`${res.header.poa}`);
                    $("#poak").html(`${res.header.poak}`);
                    $("#route").html(`${res.header.route.display_route}`);
                    $("#nbb").html(`${res.header.nama_barang_baru}`);
                    $("#ks").html(`${res.header.kekuatan_sediaan}`);
                    $("#vs").html(`${res.header.volume_sediaan}`);
                    $("#bs").html(`${res.header.bentuk_sediaan}`);
                    $("#comodity").html(`${res.header.commodity.keterangan}`);
                    $("#mg").html(`${res.header.material_group.bentuk}`);
                    $("#stok_min").html(`${res.header.stok_minimal}`);
                    $("#indikasi").html(`${res.header.indikasi}`);
                    $("#zat_aktif").html(`${res.header.zat_aktif}`);
                    $("#bks").html(`${res.header.bentuk_dan_kekuatan_sediaan}`);
                    $("#kd").html(`${res.header.komposisi_detail}`);
                    $("#kd").html(`${res.header.komposisi_detail}`);
                    $("#principal_kerjasama").html(`
                    ${res.header.principal_kerjasama === "t"?
                            `<span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 text-center mr-2">
                                YA
                            </span>
                          
                            `: 
                            ` <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                TIDAK
                            </span>` }`);
                    $("#principal").html(`${res.header.principal}`);
                    $("#expire").html(`${res.header.expire}`);
                    $("#farcon").html(`
                    ${res.header.farcon === "t"?
                            `<span class="inline-flex items-center justify-center rounded-full px-3 py-1 text-xs font-semibold bg-emerald-50 text-emerald-700 border border-emerald-200 text-center mr-2">
                                YA
                            </span>
                          
                            `: 
                            ` <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold bg-rose-50 text-rose-700 border border-rose-200">
                                TIDAK
                            </span>` }`);
                    $("#b_obal").html(`${res.header.barang_obat_alkes.bentuk_obat_alkes}`);
                    $.each(res.header.jenis, function(i, val) {
                        $(`#${i}`).addClass(`${Jenistrue(val)}`);
                    })
                }

            })

        })
    </script>

</body>

</html>