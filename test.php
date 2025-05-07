<?php

session_start();

if (isset($_SESSION["user_id"])) {
    
    $mysqli = require __DIR__ . "/database.php";
    
    $sql = "SELECT * FROM user
            WHERE id = {$_SESSION["user_id"]}";
            
    $result = $mysqli->query($sql);
    
    $user = $result->fetch_assoc();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- ===== ===== Custom Css ===== ===== -->
    <link rel="stylesheet" href="style_user.css">
    <link rel="stylesheet" href="responsive.css">
    
    <!-- Google Fonts: Poppins -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    
    <!-- Tailwind CSS (via CDN) -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Remix Icons CDN -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@4.0.0/fonts/remixicon.css" rel="stylesheet">

    <!-- ===== ===== Remix Font Icons Cdn ===== ===== -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css">
</head>

<body class="font-poppins">
    <!-- ===== ===== Body Main-Background ===== ===== -->
    <span class="main_bg"></span>


    <!-- ===== ===== Main-Container ===== ===== -->
    <div class="container">

        <!-- ===== ===== Header/Navbar ===== ===== -->
        <header>
            <div class="brandLogo">
                <figure><img src="img/logo.png" alt="logo_eia" width="40px" height="40px"></figure>
                <span>Education Incentive Association</span>
            </div>
        </header>


        <!-- ===== ===== User Main-Profile ===== ===== -->
        <section class="userProfile card">
            <div class="profile">
                <figure><img src="img/logo.png" alt="profile" width="250px" height="250px"></figure>
            </div>
        </section>


        <!-- ===== ===== Work & Skills Section ===== ===== -->
        <section class="work_skills card">

            <!-- ===== ===== Work Contaienr ===== ===== -->
            <div class="work">
                <h1 class="heading">work</h1>
                <div class="primary">
                    <h1>Spotify New York</h1>
                    <span>Primary</span>
                    <p>170 William Street <br> New York, NY 10038-212-315-51</p>
                </div>

                <div class="secondary">
                    <h1>Metropolitan <br> Museum</h1>
                    <span>Secondary</span>
                    <p>S34 E 65th Street <br> New York, NY 10651-78 156-187-60</p>
                </div>
            </div>
        </section>


        <!-- ===== ===== User Details Sections ===== ===== -->
        <section class="userDetails card">
            <div class="userName">
                <h1 class="name"><?= htmlspecialchars($user["name"]) ?></h1>
                <p><?= htmlspecialchars($user["dsg"]) ?></p>
            </div>

            <div class="rank">
                <h1 class="heading">Rankings</h1>
                <span>8,6</span>
                <div class="rating">
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate"></i>
                    <i class="ri-star-fill rate underrate"></i>
                </div>
            </div>

            <div class="btns">
                <ul>
                    <li class="sendMsg">
                        <i class="ri-chat-4-fill ri"></i>
                        <a href="#">Update</a>
                    </li>

                    <li class="sendMsg active">
                        <i class="ri-check-fill ri"></i>
                        <a href="https://eia.lk/">Home</a>
                    </li>

                    <li class="sendMsg">
                        <a href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </section>


        <!-- ===== ===== Timeline & About Sections ===== ===== -->
        <section class="timeline_about card">
            <div class="tabs">
                <ul>
                    <li class="about active">
                        <i class="ri-user-3-fill ri"></i>
                        <span>About</span>
                    </li>
                </ul>
            </div>

            <div class="contact_Info">
                <h1 class="heading">Contact Information</h1>
                <ul>
                    <li class="phone">
                        <h1 class="label">Phone:</h1>
                        <span class="info"><?= htmlspecialchars($user["wano"]) ?></span>
                    </li>

                    <li class="address">
                        <h1 class="label">Address:</h1>
                        <span class="info"><?= htmlspecialchars($user["address"]) ?><br> New York, NY 10651-78 156-187-60</span>
                    </li>

                    <li class="email">
                        <h1 class="label">E-mail:</h1>
                        <span class="info"><?= htmlspecialchars($user["email"]) ?></span>
                    </li>

                    <li class="site">
                        <h1 class="label">Site:</h1>
                        <span class="info"><?= htmlspecialchars($user["is_paid"]) ?></span>
                    </li>
                    
                    <li class="site">
                        <h1 class="label">Status:</h1>
                        <span class="info">
                            <?php if ($user["is_paid"] == 1): ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-blue-100 text-blue-800">
                                    <i class="ri-check-line text-blue-800"></i> Active
                                </span>
                            <?php else: ?>
                                <span class="inline-flex items-center gap-1 px-3 py-1 rounded-full text-sm font-medium bg-red-100 text-red-800">
                                    <i class="ri-close-line text-red-800"></i> Expired
                                </span>
                            <?php endif; ?>
                        </span>
                    </li>

                </ul>
            </div>

            <div class="basic_info">
                <h1 class="heading">Basic Information</h1>
                <ul>
                    <li class="birthday">
                        <h1 class="label">Birthday:</h1>
                        <span class="info"><?= htmlspecialchars($user["dob"]) ?></span>
                    </li>

                    <li class="sex">
                        <h1 class="label">Gender:</h1>
                        <span class="info"><?= htmlspecialchars($user["sex"]) ?></span>
                    </li>
                </ul>
            </div>
        </section>
    </div>

</body>

</html>
