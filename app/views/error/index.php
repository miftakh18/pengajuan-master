<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengajuan Master</title>
    <link rel="stylesheet" href="assets/plugin/sweetalert2/package/dist/sweetalert2.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;300;400;600;700;800;900&display=swap" rel="stylesheet">
    <style>
        @layer base {
            .font-nunito {
                font-family: 'Nunito', sans-serif;
            }
        }
    </style>
</head>

<body class="bg-sky-700">
    <main class="flex justify-center w-screen place-items-center  h-screen">

        <div class="bg-white size-100 max-h-100 min-h-20 rounded-4xl shadow-xl/40 mx-5 overflow-hidden  ">
            <div class=" min-w-50 min-h-20 overflow-hidden text-center max-w-100 bg-sky-100 max-h-40 content-center rounded-t-4xl  ">
                <img src="assets/img/logo_2.png" class="lg:px-20 sm:px-20 px-20" width="100%">
            </div>
            <div class="mb-10">
                <!-- success -->
                <!-- <div style="display: flex;" class="swal2-icon swal2-success swal2-icon-show">


                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                    <span class="swal2-success-line-tip"></span> <span class="swal2-success-line-long"></span>
                    <div class="swal2-success-ring"></div>
                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>

                </div> -->
                <div class="swal2-icon swal2-question swal2-icon-show h-200" style="display: flex;">
                    <div class="swal2-icon-content">?</div>
                </div>
            </div>
            <div class=" text-center ">

                <p class="font-nunito tracking-[0.1rem] text-sky-800 font-extrabold text-2xl"> KONFIRMASI !</p>
                <p class="font-nunito text-sky-800 italic text-sm mt-2"> Jika pengajuan master sudah diinput</p>
            </div>

            <div class="flex justify-center mt-5">
                <!-- Using `motion-reduce` can mean lots of "undoing" styles -->
                <button class="bg-sky-500 hover:bg-sky-700 rounded-full text-white text-sm px-10 py-2 shadow-sm/50 active:shadow-sm/20 hover:font-light  font-bold font-nunito tracking-[0.2rem] ">KONFIRMASI</button>
            </div>
        </div>

    </main>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script src="assets/plugin/sweetalert2/package/dist/sweetalert2.all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</body>

<script>
    $(function() {

    })
</script>

</html>