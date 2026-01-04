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

// var_dump($params);

?>
<!DOCTYPE html>
<html lang="en">

<head>


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Master</title>
    <link rel="icon" href="<?= BASEURL ?>/assets/img/logo-rsmmc-nobg.png" type="image/png">
    <link rel="stylesheet" href="<?= BASEURL ?>/assets/plugin/sweetalert2/package/dist/sweetalert2.min.css">
    <!-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        @layer base {
            .font-nunito {
                font-family: 'Nunito', sans-serif;
            }
        }

        .swal-header-img {
            height: 120px;
            background: url('<?= BASEURL ?>/assets/img/logo_2.png') center/cover no-repeat;
            border-radius: 16px 16px 0 0;
        }
    </style>
</head>

<body class="  bg-sky-500 ">
    <main class="flex justify-center w-screen place-items-center  h-screen">

        <div class="bg-white size-100 max-h-200 min-h-110 rounded-4xl shadow-lg/90 mx-5 overflow-hidden  ">
            <div class=" min-w-50 min-h-20 overflow-hidden text-center max-w-100 bg-sky-100 max-h-40 content-center rounded-t-4xl  ">
                <img src="<?= BASEURL ?>/assets/img/logo_2.png" class="lg:px-20 sm:px-20 px-20" width="100%">
            </div>
            <div class="mb-10" id="icon-pengajuan">
            </div>
            <div class=" text-center my-2" id="text-pengajuan">

            </div>

            <div class="flex flex-col gap-2 w-full max-w-md my-4 mx-auto px-2" id="div-btn">


            </div>

        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="<?= BASEURL ?>/assets/plugin/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

<script>
    let btn = `   <button id="btn-confirm" data-id="<?= $param; ?>" class="block w-full border bg-green-500 hover:bg-green-700 rounded-full text-white text-sm px-10 py-2 mx-2 border shadow-sm/50 active:shadow-sm/20 hover:font-light  font-bold font-nunito tracking-[0.2rem] ">KONFIRMASI</button>`;
    let btn2 = `   <button id="btn-view" data-id="<?= $param; ?>" class="block w-full bg-sky-500 hover:bg-sky-700 rounded-full text-white text-sm px-10 py-2 shadow-sm/50 active:shadow-sm/20 hover:font-light  font-bold font-nunito tracking-[0.2rem] ">VIEW DATA</button>`;
    let textPengajuan = `
                <p class="font-nunito tracking-[0.1rem] text-sky-800 font-extrabold text-2xl"> KONFIRMASI !</p>
            <p class="font-nunito text-sky-800 font-bold text-sm mt-2 border border-t-sky-300 border-b-sky-300 border-x-0 bg-sky-100  mx-0 py-2 pl-3  bg-grey" id="nama_barang" >BARANG JADI</p>`;


    let iconPengajuan = `<div class="swal2-icon swal2-question swal2-icon-show h-200" style="display: flex;">
                            <div class="swal2-icon-content">?</div>
                        </div>`;
    $(function() {
        $.ajax({
            url: `<?= BASEURL ?>/approve/getApi/<?= $param ?>/getDataMaster`,
            type: 'GET',
            dataType: 'json',
            success: function(res) {
                console.log(res);
            }
        })



        $.ajax({
            url: `<?= BASEURL ?>/approve/getApi/<?= $param ?>/getApi`,
            type: 'GET',
            dataType: 'json',

            beforeSend: function() {
                iconPengajuan = `<div class="swal2-loader" data-button-to-replace="swal2-confirm swal2-styled" style="display: flex;"></div>`;
                textPengajuan = ` <p class="font-nunito text-sky-800 font-extrabold text-2xl animate-ping">PROSES</p>`;
                $("#icon-pengajuan").html(`<div class="flex justify-center align-middle max-h-100 min-h-20 pt-20 mb-0">${iconPengajuan}</div>`);
                $("#text-pengajuan").html(textPengajuan);
                $("#div-btn").html(`<div class="block w-full bg-white  rounded-full text-white text-sm px-10 py-2 shadow-sm/50 active:shadow-sm/20 hover:font-light  font-bold font-nunito tracking-[0.2rem] flex justify-center align-center ">${iconPengajuan}</div>`);
            },
            success: function(res) {
                $("#nama_barang").html(res.nama_barang.toUpperCase());
                if (res.approve_by !== null) {
                    btn = `<span class="text-green-500 text-sm pt-5 py-5 italic text-bold font-nunito">Approved : ${res.approve_by}</span>`;
                    iconPengajuan = `
                <div style="display: flex;" class="swal2-icon swal2-success swal2-icon-show">
                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                    <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                    <div class="swal2-success-ring"></div>
                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                </div>
               
                `;
                    textPengajuan = `
                <p class="font-nunito text-sky-800 font-extrabold text-2xl">TERKONFIRMASI</p>
                <p class="font-nunito text-sky-800 font-bold text-sm mt-2 border border-t-sky-300 border-b-sky-300 border-x-0 bg-sky-100  mx-0 py-2 pl-3  bg-grey"  id="nama_barang"></p>
                
                 `;

                    $("#div-btn").removeClass('flex justify-center');
                    $("#div-btn").addClass('text-center');
                    $("#div-btn").html(`${btn}${btn2}`);
                    $("#icon-pengajuan").html(iconPengajuan);
                    $("#text-pengajuan").html(textPengajuan);
                    $("#nama_barang").html(res.nama_barang);
                } else {
                    btn = `   <button id="btn-confirm" data-id="<?= $param; ?>" class="block w-full bg-green-500 hover:bg-green-700 rounded-full text-white text-sm px-10 py-2 shadow-sm/50 active:shadow-sm/20 hover:font-light  font-bold font-nunito tracking-[0.2rem] ">KONFIRMASI</button>`;
                    textPengajuan = `
                        <p class="font-nunito tracking-[0.1rem] text-sky-800 font-extrabold text-2xl"> KONFIRMASI !</p>
                        <p class="font-nunito text-sky-800 font-bold text-sm mt-2 border border-t-sky-300 border-b-sky-300 border-x-0 bg-sky-100  mx-0 py-2 pl-3  bg-grey" id="nama_barang" >${res.nama_barang}</p>`;
                    iconPengajuan = `<div class="swal2-icon swal2-question swal2-icon-show h-200" style="display: flex;">
                            <div class="swal2-icon-content">?</div>
                        </div>`;
                    $("#div-btn").html(`${btn}${btn2}`);
                    $("#icon-pengajuan").html(iconPengajuan);
                    $("#text-pengajuan").html(textPengajuan);
                }

            }
        });
    })

    $(document).on("click", "#btn-confirm", function() {
        let id = $(this).data('id');
        Swal.fire({

            title: 'DIPERLUKAN !',
            icon: 'warning',
            showCloseButton: true,
            allowOutsideClick: false,
            input: "text",
            inputAttributes: {
                autocapitalize: "off",
                placeholder: 'KODE BARANG',
                required: true
            },
            confirmButtonText: 'SUBMIT',
            customClass: {
                title: 'tracking-[0.1rem] text-sky-800! font-nunito font-extrabold! text-2xl!',
                icon: 'mb-[-10]!',
                popup: 'rounded-4xl! size-100! p-4 ',
                input: `text-center! rounded-full! font-nunito! border-sky-700!`,
                actions: 'flex flex-col gap-2 w-full max-w-md my-4 mx-auto px-2 font-nunito! ',
                confirmButton: ' font-nunito! bg-sky-500 hover:bg-sky-700 text-white px-10 py-2 rounded-full tracking-wider  ',

            },

            buttonsStyling: false,

        }).then((ok) => {

            $.ajax({
                url: `<?= BASEURL ?>/approve/Confirm`,
                type: 'POST',
                data: {
                    id: id,
                    kode_barang: ok.value

                },
                dataType: 'json',
                beforeSend: function() {
                    iconPengajuan = `<div class="swal2-loader" data-button-to-replace="swal2-confirm swal2-styled" style="display: flex;"></div>`;
                    textPengajuan = ` <p class="font-nunito text-sky-800 font-extrabold text-2xl animate-ping">PROSES</p>`;
                    $("#icon-pengajuan").html(`<div class="flex justify-center align-middle max-h-100 min-h-20 pt-20 mb-0">${iconPengajuan}</div>`);
                    $("#text-pengajuan").html(textPengajuan);
                    $("#div-btn").html(`<div class="block w-full bg-white  rounded-full text-white text-sm px-10 py-2 shadow-sm/50 active:shadow-sm/20 hover:font-light  font-bold font-nunito tracking-[0.2rem] flex justify-center align-center ">${iconPengajuan}</div>`);
                },
                success: function(res) {

                    btn = ` <span class="text-green-500 text-sm pt-5 py-5 italic text-bold font-nunito  px-auto">Approved : ${res.data.approve_by}</span>`;
                    iconPengajuan = `
                                <div style="display: flex;" class="swal2-icon swal2-success swal2-icon-show">
                                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                    <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                                    <div class="swal2-success-ring"></div>
                                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                </div>
                              `;




                    if (res.type === 'success') {
                        textPengajuan = `
                                <p class="font-nunito text-sky-800 font-extrabold text-2xl">TERKONFIRMASI</p>
                                <p class="font-nunito text-sky-800 font-bold text-sm mt-2 border border-t-sky-300 border-b-sky-300 border-x-0 bg-sky-100  py-2 pl-3  bg-grey"  id="nama_barang"></p>
                               
                                `;
                        $("#div-btn").removeClass('flex justify-center');
                        $("#div-btn").addClass('text-center');
                        $("#div-btn").html(`${btn}${btn2}`);
                        $("#icon-pengajuan").html(iconPengajuan);
                        $("#text-pengajuan").html(textPengajuan);
                        $("#nama_barang").html(res.data.nama_barang);

                    }

                }
            })
        })
    })
    $(document).on("click", "#btn-view", function() {
        window.location.href = `<?= BASEURL ?>/approve/ViewPengajuan`;
    })
</script>

</html>