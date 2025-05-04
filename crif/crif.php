<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            background-image: url('../img2.jpg');
        }

        .navbar-custom {
            /* background: linear-gradient(to right, #6a8daf, #89a9c7);
            background: repeating-linear-gradient(45deg, #6a8daf, #6a8daf 2px, #89a9c7 10px, #89a9c7 20px); */
            background-color: #01153e;
            height: 75px;
            color: white;
        }

        .footer {
            position: fixed;
            left: 0;
            bottom: 0;
            width: 100%;
            background-color: gray;
            text-align: center;
            padding: 10px;
        }

        .card {
            transition: transform 0.2s;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            height: 100%;
        }

        .card img {
            object-fit: cover;
            height: 200px;
        }

        .card-body {
            flex-grow: 1;
        }

        .card-title {
            font-size: 1rem;
        }

        .card:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <a class="navbar-brand text-white" href="#">
            <img src="../nit.jpeg" width="30" height="30" class="d-inline-block align-top" alt=""
                style="border-radius:10px;">
            NITW - Online Equipment Booking System
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a href="../welcome.php" class="btn btn-outline-info">Back to Home</a>
                </li>
            </ul>
        </div>
    </nav>

    <main>
        <section class="container mt-5">
            <div class="page-header">
                <h1 class="display-5 text-center">Welcome to CRIF Equipment Booking System</h1>
                <u>
                    <h2 class="text-center mt-4">CRIF Equipments List</h2>
                </u>
            </div>
            <div class="row mt-5">
                <div class="col-md-3 mb-4">
                    <a href="icp.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/image.png" class="card-img-top" alt="LC-HRMS">
                            <div class="card-body text-center">
                                <h5 class="card-title">Liquid Chromatography-High Resolution Mass Spectrometry (LC-HRMS)
                                </h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="nmr.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/nmr.png" class="card-img-top" alt="NMR Spectroscopy">
                            <div class="card-body text-center">
                                <h5 class="card-title">NMR Spectroscopy</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="xband.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/xband.png" class="card-img-top" alt="X Band ESR Spectroscopy">
                            <div class="card-body text-center">
                                <h5 class="card-title">X Band ESR Spectroscopy</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="lc_hrms.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/icp.png" class="card-img-top" alt="ICP-OES">
                            <div class="card-body text-center">
                                <h5 class="card-title">Inductively Coupled Plasma-Optical Emission spectroscopy
                                    (ICP-OES)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/uv-nir.png" class="card-img-top" alt="UV-Vis-NIR Spectrophotometer">
                            <div class="card-body text-center">
                                <h5 class="card-title">UV-Vis-NIR Spectrophotometer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/fs.png" class="card-img-top" alt="Fluorescence Spectrophotometer">
                            <div class="card-body text-center">
                                <h5 class="card-title">Fluorescence Spectrophotometer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/utm.png" class="card-img-top" alt="Universal Testing Machine (UTM)">
                            <div class="card-body text-center">
                                <h5 class="card-title">Universal Testing Machine (UTM)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/tgdta.png" class="card-img-top" alt="TG/DTA">
                            <div class="card-body text-center">
                                <h5 class="card-title">Thermogravimetry/Differential Thermal Analysis (TG/DTA)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/ac.png" class="card-img-top" alt="Anechoic chamber">
                            <div class="card-body text-center">
                                <h5 class="card-title">Anechoic chamber</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/chns.png" class="card-img-top" alt="CHNS Analyzer">
                            <div class="card-body text-center">
                                <h5 class="card-title">CHNS Analyzer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/dsc.png" class="card-img-top" alt="Differential Scanning Calorimeter (DSC)">
                            <div class="card-body text-center">
                                <h5 class="card-title">Differential Scanning Calorimeter (DSC)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/vam.png" class="card-img-top" alt="Vacuum Arc Melting">
                            <div class="card-body text-center">
                                <h5 class="card-title">Vacuum Arc Melting</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/ia.png" class="card-img-top" alt="Impedance Analyzer">
                            <div class="card-body text-center">
                                <h5 class="card-title">Impedance Analyzer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/sem.png" class="card-img-top" alt="Scanning Electron Microscope (SEM)">
                            <div class="card-body text-center">
                                <h5 class="card-title">Scanning Electron Microscope (SEM)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/tpm.png" class="card-img-top" alt="Trinocular Polarizing Microscope">
                            <div class="card-body text-center">
                                <h5 class="card-title">Trinocular Polarizing Microscope</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/tpvna.png" class="card-img-top" alt="Two Port Vector Network Analyzer">
                            <div class="card-body text-center">
                                <h5 class="card-title">Two Port Vector Network Analyzer</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/xrd.png" class="card-img-top" alt="X-Ray Diffraction (XRD)">
                            <div class="card-body text-center">
                                <h5 class="card-title">X-Ray Diffraction (XRD)</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/pcbm.png" class="card-img-top" alt="PCB Prototype Machine">
                            <div class="card-body text-center">
                                <h5 class="card-title">PCB Prototype Machine</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/lnp.png" class="card-img-top" alt="Liquid Nitrogen Plant">
                            <div class="card-body text-center">
                                <h5 class="card-title">Liquid Nitrogen Plant</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/ftir.png" class="card-img-top" alt="Fourier-Transform Infrared Spectroscope">
                            <div class="card-body text-center">
                                <h5 class="card-title">Fourier-Transform Infrared Spectroscope</h5>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-3 mb-4">
                    <a href="crif_equipment.php" class="text-decoration-none">
                        <div class="card">
                            <img src="img/sa.png" class="card-img-top" alt="Spectrum Analyzer">
                            <div class="card-body text-center">
                                <h5 class="card-title">Spectrum Analyzer</h5>
                            </div>
                        </div>
                    </a>
                </div>
            </div><br>
        </section><br>
    </main>

    <footer class="footer">
        <p>&copy; <?php echo date("Y"); ?> Shanker. All rights reserved.</p>
    </footer>

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
</body>

</html>